<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\FrontendLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(): View
    {
        return view('app.frontend.pages.auth.login');
    }

    public function authenticate(FrontendLoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            return back()->with('error', 'Email atau kata sandi salah');
        }

        $request->session()->regenerate();

        return redirect()->route('patient.dashboard')->with('success', 'Anda berhasil login');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('patient.login')->with('success', 'Anda berhasil logout');
    }
}
