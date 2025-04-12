@extends('app.frontend.layouts.auth')

{{-- Meta --}}
@section('meta-description', 'Masuk ke akun Racik Anda untuk memantau konsumsi jamu dan data kesehatan Anda.')
@section('meta-keywords', 'Racik, login, masuk, akun racik, health monitoring, pemantauan kesehatan')
@section('og-title', 'Masuk - Racik')
@section('og-description', 'Masuk ke akun Racik Anda untuk memantau konsumsi jamu dan data kesehatan Anda.')

{{-- Title --}}
@section('title', 'Masuk - Racik')

{{-- Content --}}
@section('content')
    <section class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-lg shadow-sm p-8">
            <div class="text-center mb-8">
                <a href="{{ route('home') }}" class="inline-block mb-6">
                    <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" width="120" height="30"
                        alt="Racik" class="h-9 mx-auto" loading="lazy">
                </a>
                <h2 class="text-2xl font-bold text-brown-800 font-playfair">Masuk ke Akun Anda</h2>
            </div>
            @if ($errors->any())
                <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg mb-6">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('patient.login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium mb-2 text-brown-700">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="w-5 h-5 text-brown-400"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Masukkan email Anda"
                            class="w-full pl-10 p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brown-400"
                            required autofocus>
                    </div>
                </div>
                <div class="mb-4">
                    <div class="flex justify-between mb-2">
                        <label for="password" class="block text-sm font-medium text-brown-700">Kata Sandi</label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="w-5 h-5 text-brown-400"></i>
                        </div>
                        <input type="password" id="password" name="password" placeholder="Masukkan kata sandi Anda"
                            class="w-full pl-10 p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brown-400"
                            required>
                        <button type="button" id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i data-lucide="eye" class="w-5 h-5 text-brown-400 toggle-password"></i>
                            <i data-lucide="eye-off" class="w-5 h-5 text-brown-400 toggle-password hidden"></i>
                        </button>
                    </div>
                </div>
                <button type="submit"
                    class="w-full bg-brown-600 text-white px-6 py-3 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium">
                    Masuk
                </button>
            </form>
            <div class="mt-6 text-center">
                <p class="text-brown-600">Belum punya akun? <a href="{{ route('patient.register') }}"
                        class="text-brown-700 font-medium hover:underline">Daftar sekarang</a></p>
            </div>
        </div>
        <div class="mt-8 text-center text-brown-600 text-sm">
            <a href="{{ route('home') }}" class="hover:underline">Kembali ke Beranda</a>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        // Toggle password visibility
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            const toggleIcons = document.querySelectorAll('.toggle-password');

            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);

                // Toggle visibility of eye icons
                toggleIcons.forEach(icon => {
                    icon.classList.toggle('hidden');
                });
            });

            // Initialize Lucide icons
            lucide.createIcons();
        });
    </script>
@endpush
