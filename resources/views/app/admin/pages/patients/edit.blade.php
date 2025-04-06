@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Edit data pasien di Racik Health. Perbarui informasi pasien, riwayat kesehatan, dan data
    terkini untuk manajemen perawatan yang lebih akurat.')
@section('meta-keywords',
    'edit pasien, update rekam medis, perbarui data kesehatan, modifikasi data pasien, manajemen
    data pasien')
@section('og-title', 'Manajemen Pasien - Racik')
@section('og-description',
    'Formulir pembaruan data pasien dalam sistem Racik Health. Memungkinkan tenaga medis untuk
    memperbarui informasi pasien secara real-time.')

    {{-- Title --}}
@section('title', 'Manajemen Pasien - Racik')

{{-- Content --}}
@section('content')
    <x-alert-message />

    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800">
                    Pasien
                </h2>
                <p class="text-sm text-gray-600">
                    Ubah data pasien
                </p>
            </div>
            <form method="POST" action="{{ route('admin.patients.update', $data['patient']->id) }}">
                @csrf
                @method('PUT')
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5">
                            Nama Lengkap<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="name" type="text"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="name" placeholder="Salman Abdurrahman"
                            value="{{ old('name', $data['patient']->name) }}" autofocus required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="email" class="inline-block text-sm text-gray-800 mt-2.5">
                            Alamat Email<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="email" type="email"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="email" placeholder="salman@gmail.com"
                            value="{{ old('email', $data['patient']->email) }}" required>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="phone" class="inline-block text-sm text-gray-800 mt-2.5">
                            Nomor Telepon<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="phone" type="tel"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="phone_number" placeholder="+628123456789"
                            value="{{ old('phone_number', $data['patient']->phone_number) }}" required>
                        @error('phone_number')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="gender" class="inline-block text-sm text-gray-800 mt-2.5">
                            Jenis Kelamin<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <div class="sm:flex">
                            <label for="gender-male"
                                class="flex py-2 px-3 w-full border border-gray-200 shadow-2xs -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <input type="radio" name="gender"
                                    class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    id="gender-male" value="male" @checked(old('gender', $data['patient']->gender) === 'male')>
                                <span class="sm:text-sm text-gray-500 ms-3">Laki-laki</span>
                            </label>
                            <label for="gender-female"
                                class="flex py-2 px-3 w-full border border-gray-200 shadow-2xs -mt-px -ms-px first:rounded-t-lg last:rounded-b-lg sm:first:rounded-s-lg sm:mt-0 sm:first:ms-0 sm:first:rounded-se-none sm:last:rounded-es-none sm:last:rounded-e-lg text-sm relative focus:z-10 focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                                <input type="radio" name="gender"
                                    class="shrink-0 mt-0.5 border-gray-300 rounded-full text-blue-600 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    id="gender-female" value="female" @checked(old('gender', $data['patient']->gender) === 'female')>
                                <span class="sm:text-sm text-gray-500 ms-3">Perempuan</span>
                            </label>
                        </div>
                        @error('gender')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="password" class="inline-block text-sm text-gray-800 mt-2.5">
                            Kata Sandi
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="password" type="password"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="password" placeholder="********">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50"
                        onclick="window.location='{{ route('admin.patients.index') }}'">
                        Kembali
                    </button>
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
