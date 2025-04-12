@extends('app.frontend.layouts.auth')

{{-- Meta --}}
@section('meta-description', 'Daftar akun Racik untuk memantau konsumsi jamu dan data kesehatan Anda.')
@section('meta-keywords', 'Racik, daftar, register, akun racik, health monitoring, pemantauan kesehatan')
@section('og-title', 'Daftar - Racik')
@section('og-description', 'Daftar akun Racik untuk memantau konsumsi jamu dan data kesehatan Anda.')

{{-- Title --}}
@section('title', 'Daftar - Racik')

{{-- Content --}}
@section('content')
    <section class="min-h-screen flex flex-col items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-lg shadow-sm p-8">
            <div class="text-center mb-6">
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" width="120" height="30"
                        alt="Racik" class="h-9 mx-auto" loading="lazy">
                </a>
                <h2 class="text-2xl font-bold text-brown-800 font-playfair">Buat Akun Baru</h2>
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
            <form action="{{ route('patient.register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium mb-2 text-brown-700">Nama Lengkap</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="user" class="w-5 h-5 text-brown-400"></i>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name') }}"
                            placeholder="Masukkan nama lengkap Anda"
                            class="w-full pl-10 p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brown-400"
                            required autofocus>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium mb-2 text-brown-700">Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="mail" class="w-5 h-5 text-brown-400"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Masukkan email Anda"
                            class="w-full pl-10 p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brown-400"
                            required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium mb-2 text-brown-700">Nomor Telepon</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="phone" class="w-5 h-5 text-brown-400"></i>
                        </div>
                        <input type="tel" id="phone" name="phone_number" value="{{ old('phone_number') }}"
                            placeholder="Masukkan nomor telepon Anda"
                            class="w-full pl-10 p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brown-400"
                            required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="gender" class="block text-sm font-medium mb-2 text-brown-700">Jenis Kelamin</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="users" class="w-5 h-5 text-brown-400"></i>
                        </div>
                        <select id="gender" name="gender"
                            class="w-full pl-10 p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none appearance-none bg-white"
                            required>
                            <option value="" disabled class="hidden" {{ old('gender') ? '' : 'selected' }}>Pilih
                                jenis
                                kelamin
                            </option>
                            <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i data-lucide="chevron-down" class="w-5 h-5 text-brown-400"></i>
                        </div>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium mb-2 text-brown-700">Kata Sandi</label>
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
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium mb-2 text-brown-700">Konfirmasi
                        Kata Sandi</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i data-lucide="lock" class="w-5 h-5 text-brown-400"></i>
                        </div>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Konfirmasi kata sandi Anda"
                            class="w-full pl-10 p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brown-400"
                            required>
                        <button type="button" id="toggleConfirmPassword"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <i data-lucide="eye" class="w-5 h-5 text-brown-400 toggle-confirm-password"></i>
                            <i data-lucide="eye-off" class="w-5 h-5 text-brown-400 toggle-confirm-password hidden"></i>
                        </button>
                    </div>
                </div>
                <div class="flex items-center mb-6">
                    <input type="checkbox" id="terms" name="terms"
                        class="w-4 h-4 text-brown-600 border-brown-300 rounded focus:ring-brown-500" required>
                    <label for="terms" class="ml-2 block text-sm text-brown-600">Saya menyetujui <a href="#"
                            class="text-brown-700 hover:underline">Syarat dan Ketentuan</a></label>
                </div>
                <button type="submit"
                    class="w-full bg-brown-600 text-white px-6 py-3 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium">
                    Daftar
                </button>
            </form>
            <div class="mt-6 text-center">
                <p class="text-brown-600">Sudah punya akun? <a href="{{ route('patient.login') }}"
                        class="text-brown-700 font-medium hover:underline">Masuk sekarang</a></p>
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
            // For password field
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

            // For confirm password field
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const confirmPasswordInput = document.getElementById('password_confirmation');
            const toggleConfirmIcons = document.querySelectorAll('.toggle-confirm-password');

            toggleConfirmPassword.addEventListener('click', function() {
                const type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                confirmPasswordInput.setAttribute('type', type);

                // Toggle visibility of eye icons
                toggleConfirmIcons.forEach(icon => {
                    icon.classList.toggle('hidden');
                });
            });

            // Initialize Lucide icons
            lucide.createIcons();
        });
    </script>
@endpush
