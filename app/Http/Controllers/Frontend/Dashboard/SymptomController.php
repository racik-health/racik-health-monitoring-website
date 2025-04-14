<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Dispenser;
use App\Models\DispenserControlLog;
use App\Models\HealthInput;
use App\Models\HerbalMedicine;
use App\Models\RecommendationResult;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class SymptomController extends Controller
{
    public function index(): View
    {
        // Get recent health inputs for the authenticated user
        $recentHealthInputs = HealthInput::where('user_id', '=', Auth::id())
            ->with('recommendationResults')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('app.frontend.pages.dashboard.health.complaint.index', compact('recentHealthInputs'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'symptoms' => 'required|string|max:1000',
        ]);

        DB::beginTransaction();

        try {
            $message = HealthInput::create([
                'user_id' => Auth::id(),
                'symptoms' => $validatedData['symptoms'],
            ]);

            DB::commit();

            // Local function to limit reason
            $getShortReason = function ($text, $maxSentences = 2) {
                $sentences = preg_split('/(?<=[.!?])\s+/', $text, -1, PREG_SPLIT_NO_EMPTY);
                return implode(' ', array_slice($sentences, 0, $maxSentences));
            };

            $geminiApiKey = env('GEMINI_API_KEY');

            // PENTING: Gunakan API Key via query string
            $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$geminiApiKey";

            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->post($url, [
                        'contents' => [
                            [
                                'parts' => [
                                    [
                                        'text' => "Saya mengalami keluhan berikut: {$validatedData['symptoms']}. 
                                        Tolong rekomendasikan hanya **satu** dari **empat jamu berikut ini**: 
                                        1. Kunyit Asam, 
                                        2. Beras Kencur, 
                                        3. Temulawak, 
                                        4. Cabe Puyang. 

                                        Jelaskan **mengapa jamu tersebut paling cocok** untuk keluhan saya dengan alasannya, dan berikan step selanjutnya untuk menjaga kesehatan saya,
                                        dan jangan sebutkan jamu lain di luar daftar tersebut.

                                        Jangan memberikan rekomendasi jika keluhan saya tidak terkait dengan jamu herbal."
                                    ]
                                ]
                            ]
                        ]
                    ]);

            if ($response->successful()) {
                $output = $response->json();
                $replyText = $output['candidates'][0]['content']['parts'][0]['text'] ?? 'Maaf, tidak bisa memberikan rekomendasi.';
                $shortReason = $getShortReason($replyText);

                $knownJamus = ['Kunyit Asam', 'Beras Kencur', 'Temulawak', 'Cabe Puyang'];
                $detectedJamu = null;

                foreach ($knownJamus as $jamu) {
                    if (stripos($replyText, $jamu) !== false) {
                        $detectedJamu = $jamu;
                        break;
                    }
                }

                if ($detectedJamu) {
                    RecommendationResult::create([
                        'user_id' => Auth::id(),
                        'health_input_id' => $message->id,
                        'herbal_medicine_id' => HerbalMedicine::where('name', $detectedJamu)->value('id'),
                        'reason' => $shortReason,
                        'confidence_score' => 1.0,
                    ]);
                } else {
                    Log::warning("Gemini tidak bisa menentukan nama jamu: " . $replyText);
                }
            } else {
                Log::error("Gagal terhubung ke Gemini API: " . $response->body());
            }

            return redirect()->route('patient.recommendations.index')->with('success', 'Keluhan Anda telah berhasil dikirim.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Terjadi kesalahan saat mengirim keluhan: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim keluhan anda, silahkan coba lagi');
        }
    }
}
