<?php

namespace App\Http\Controllers\Frontend\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\HealthInput;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

            return redirect()->back()->with('success', 'Keluhan Anda telah berhasil dikirim.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Terjadi kesalahan saat mengirim keluhan: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim keluhan anda, silahkan coba lagi');
        }
    }
}
