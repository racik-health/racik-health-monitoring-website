@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Tambah laporan konsumsi jamu pasien di Racik Health. Catat konsumsi jamu pasien untuk
    pemantauan kesehatan terintegrasi.')
@section('meta-keywords',
    'tambah laporan konsumsi, catatan konsumsi jamu, rekam medis digital, sistem monitoring
    pasien, dashboard tenaga medis')
@section('og-title', 'Manajemen Laporan Konsumsi - Racik')
@section('og-description', 'Formulir pencatatan konsumsi jamu pasien dalam sistem Racik Health.')

{{-- Title --}}
@section('title', 'Manajemen Laporan Konsumsi - Racik')

{{-- Content --}}
@section('content')
    <x-alert-message />

    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800">
                    Laporan Konsumsi
                </h2>
                <p class="text-sm text-gray-600">
                    Tambahkan data laporan konsumsi baru
                </p>
            </div>
            <form method="POST" action="{{ route('admin.consumption-reports.store') }}">
                @csrf
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5">
                            Nama Pasien<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <select id="user_id" name="user_id" required
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                            <option value="" disabled selected>Pilih Nama Pasien</option>
                            @foreach ($data['patients'] as $patient)
                                <option value="{{ $patient->id }}" {{ old('user_id') == $patient->id ? 'selected' : '' }}>
                                    {{ $patient->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="herbal_medicine_id" class="inline-block text-sm text-gray-800 mt-2.5">
                            Nama Jamu<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <select id="herbal_medicine_id" name="herbal_medicine_id" required
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none">
                            <option value="" disabled selected>Pilih Nama Jamu</option>
                            @foreach ($data['herbal_medicines'] as $herbalMedicine)
                                <option value="{{ $herbalMedicine->id }}"
                                    {{ old('herbal_medicine_id') == $herbalMedicine->id ? 'selected' : '' }}>
                                    {{ $herbalMedicine->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('herbal_medicine_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="quantity" class="inline-block text-sm text-gray-800 mt-2.5">
                            Jumlah Konsumsi<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="quantity" type="number"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="quantity" placeholder="2" value="{{ old('quantity') }}" required>
                        @error('quantity')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="note" class="inline-block text-sm text-gray-800 mt-2.5">
                            Catatan<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="note" type="text"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="note" placeholder="Catatan singkat tentang konsumsi jamu" value="{{ old('note') }}"
                            required>
                        @error('note')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="consumed_at" class="inline-block text-sm text-gray-800 mt-2.5">
                            Dikonsumsi Pada<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="consumed_at" type="datetime-local"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="consumed_at" placeholder="YYYY-MM-DDTHH:MM" value="{{ old('consumed_at') }}" required>
                        @error('consumed_at')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50"
                        onclick="window.location='{{ route('admin.consumption-reports.index') }}'">
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
