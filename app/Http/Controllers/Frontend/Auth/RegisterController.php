<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendRegisterRequest;
use App\Repositories\Contracts\Frontend\FrontendRegisterRepositoryInterface;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct(public FrontendRegisterRepositoryInterface $frontendRegisterRepository)
    {
        $this->frontendRegisterRepository = $frontendRegisterRepository;
    }

    public function index(): View
    {
        return view('app.frontend.pages.auth.register');
    }

    public function store(FrontendRegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            $patient = $this->frontendRegisterRepository->register($validated);

            return redirect()->route('patient.login')->with('success', 'Anda berhasil mendaftar');
        } catch (\Exception $e) {
            Log::error('Terjadi kesalahan saat mendaftar: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat mendaftar, silahkan coba lagi');
        }
    }
}
