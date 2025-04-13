<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Subscriber;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('app.frontend.pages.home.index');
    }

    public function submitMessage(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:1000',
        ]);

        DB::beginTransaction();

        try {
            $message = Message::create($validated);

            DB::commit();

            return redirect()->back()->with('success', 'Pesan Anda telah berhasil dikirim.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Terjadi kesalahan saat mengirim pesan: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan, silahkan coba lagi');
        }
    }

    public function subscribeEmail(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'required|email:rfc,dns|unique:subscribers,email|max:255',
        ]);

        DB::beginTransaction();

        try {
            $email = Subscriber::create($validated);

            DB::commit();

            return redirect()->back()->with('success', 'Terima kasih telah berlangganan!');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Terjadi kesalahan saat berlangganan: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat berlangganan, silahkan coba lagi');
        }
    }
}
