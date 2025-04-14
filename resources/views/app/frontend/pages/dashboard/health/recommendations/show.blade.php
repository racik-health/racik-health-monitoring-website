@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Lihat rekomendasi jamu herbal yang sesuai dengan keluhan kesehatan Anda. Dapatkan informasi
    lengkap tentang manfaat, bahan, dan cara konsumsi jamu yang direkomendasikan.')
@section('meta-keywords',
    'rekomendasi jamu, hasil analisis keluhan, jamu herbal, racik health, pengobatan tradisional,
    kesehatan alami')
@section('og-title', 'Rekomendasi Jamu - Racik')
@section('og-description',
    'Hasil analisis keluhan kesehatan Anda dengan rekomendasi jamu herbal yang tepat. Lihat
    informasi lengkap dan siapkan jamu Anda melalui dispenser Racik.')

    {{-- Title --}}
@section('title', 'Rekomendasi Jamu - Racik')

{{-- Content --}}
@section('content')
    <x-alert-message />

    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-2xs overflow-hidden">
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800">
                                    Rekomendasi Jamu
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Hasil analisis keluhan kesehatan Anda
                                </p>
                            </div>
                            <div>
                                <a href="{{ route('patient.recommendations.index') }}"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="size-4">
                                        <path d="m15 18-6-6 6-6"></path>
                                    </svg>
                                    Kembali
                                </a>
                            </div>
                        </div>
                        <!-- Health Input Details -->
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-800 mb-2">Keluhan Anda</h3>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-gray-700">{{ $healthInput->symptoms }}</p>
                                <p class="text-xs text-gray-500 mt-2">
                                    Diinput pada: {{ \Carbon\Carbon::parse($healthInput->created_at)->format('d F Y H:i') }}
                                </p>
                            </div>
                        </div>
                        <!-- Recommendations -->
                        <div class="px-6 py-4">
                            <h3 class="text-lg font-medium text-gray-800 mb-4">Jamu yang Direkomendasikan</h3>
                            @if ($healthInput->recommendationResults->count() > 0)
                                <div class="grid md:grid-cols-2 gap-6">
                                    @foreach ($healthInput->recommendationResults as $recommendation)
                                        <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                                            <div class="p-4 md:p-5">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <h4 class="text-lg font-semibold text-gray-800">
                                                            {{ $recommendation->herbalMedicine->name }}
                                                        </h4>
                                                        <div class="mt-1 flex items-center">
                                                            <span class="text-sm text-gray-500 mr-2">Tingkat
                                                                Kepercayaan:</span>
                                                            <span
                                                                class="inline-flex items-center gap-x-1 py-1 px-2 rounded-md text-xs font-medium {{ $recommendation->confidence_score >= 80 ? 'bg-green-100 text-green-800' : ($recommendation->confidence_score >= 60 ? 'bg-amber-100 text-amber-800' : 'bg-red-100 text-red-800') }}">
                                                                {{ number_format($recommendation->confidence_score, 1) }}%
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-green-50 text-green-600">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="size-6">
                                                            <path d="M9 11.5a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z"></path>
                                                            <path d="M9 11.5c-1.5 0-3 .5-3 2s1.5 2 3 2 3-.5 3-2-1.5-2-3-2Z">
                                                            </path>
                                                            <path
                                                                d="M11 17.5c0 .5 0 1 .5 1s.5-.5.5-1a3 3 0 0 0-3-3c-.5 0-1 0-1 .5s.5.5 1 .5a2 2 0 0 1 2 2Z">
                                                            </path>
                                                            <path
                                                                d="M14.5 14.5c-.5 0-1 0-1 .5s.5.5 1 .5a2 2 0 0 1 2 2c0 .5 0 1 .5 1s.5-.5.5-1a3 3 0 0 0-3-3Z">
                                                            </path>
                                                            <path d="M15 5.5a5 5 0 1 0 0 10 5 5 0 0 0 0-10Z"></path>
                                                            <path
                                                                d="M15 15.5c-1.5 0-3 .5-3 2s1.5 2 3 2 3-.5 3-2-1.5-2-3-2Z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="mt-4">
                                                    <h5 class="text-sm font-medium text-gray-800">Deskripsi:</h5>
                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ $recommendation->herbalMedicine->description }}</p>
                                                </div>
                                                <div class="mt-3">
                                                    <h5 class="text-sm font-medium text-gray-800">Bahan:</h5>
                                                    <p class="mt-1 text-sm text-gray-600">
                                                        {{ $recommendation->herbalMedicine->ingredients }}</p>
                                                </div>
                                                <div class="mt-3">
                                                    <h5 class="text-sm font-medium text-gray-800">Alasan Rekomendasi:</h5>
                                                    <p class="mt-1 text-sm text-gray-600">{{ $recommendation->reason }}</p>
                                                </div>
                                                <div class="mt-3">
                                                    <h5 class="text-sm font-medium text-gray-800">Stok Tersedia:</h5>
                                                    <p
                                                        class="mt-1 text-sm {{ $recommendation->herbalMedicine->stock > 0 ? 'text-green-600' : 'text-red-600' }}">
                                                        {{ $recommendation->herbalMedicine->stock > 0 ? $recommendation->herbalMedicine->stock . ' porsi' : 'Stok habis' }}
                                                    </p>
                                                </div>
                                                @if ($recommendation->herbalMedicine->stock > 0 && $activeDispensers->count() > 0)
                                                    <div class="mt-5">
                                                        <button type="button"
                                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700"
                                                            data-hs-overlay="#dispenser-modal-{{ $recommendation->id }}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="size-4">
                                                                <path
                                                                    d="M19 5h-4V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3H1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-8h1a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1Z">
                                                                </path>
                                                            </svg>
                                                            Siapkan di Dispenser
                                                        </button>
                                                    </div>
                                                    <!-- Dispenser Modal -->
                                                    <div id="dispenser-modal-{{ $recommendation->id }}"
                                                        class="hs-overlay hidden w-full h-full fixed top-0 left-0 z-[60] overflow-x-hidden overflow-y-auto">
                                                        <div
                                                            class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
                                                            <div
                                                                class="bg-white border border-gray-200 rounded-xl shadow-sm">
                                                                <div class="p-4 sm:p-7">
                                                                    <div class="text-center">
                                                                        <h3 class="text-lg font-semibold text-gray-800">
                                                                            Siapkan Jamu di Dispenser
                                                                        </h3>
                                                                        <p class="mt-1 text-sm text-gray-600">
                                                                            Pilih dispenser dan jumlah porsi jamu yang ingin
                                                                            disiapkan
                                                                        </p>
                                                                    </div>
                                                                    <div class="mt-5">
                                                                        <form
                                                                            action="{{ route('patient.recommendations.prepare') }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="recommendation_id"
                                                                                value="{{ $recommendation->id }}">

                                                                            <div class="mb-4">
                                                                                <label for="dispenser_id"
                                                                                    class="block text-sm font-medium text-gray-700 mb-2">Pilih
                                                                                    Dispenser</label>
                                                                                <select id="dispenser_id"
                                                                                    name="dispenser_id"
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                                                    required>
                                                                                    <option value="">Pilih dispenser
                                                                                    </option>
                                                                                    @foreach ($activeDispensers as $dispenser)
                                                                                        <option
                                                                                            value="{{ $dispenser->id }}">
                                                                                            {{ $dispenser->name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="mb-6">
                                                                                <label for="quantity"
                                                                                    class="block text-sm font-medium text-gray-700 mb-2">Jumlah
                                                                                    Porsi</label>
                                                                                <select id="quantity" name="quantity"
                                                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500"
                                                                                    required>
                                                                                    @for ($i = 1; $i <= min(5, $recommendation->herbalMedicine->stock); $i++)
                                                                                        <option
                                                                                            value="{{ $i }}">
                                                                                            {{ $i }} porsi
                                                                                        </option>
                                                                                    @endfor
                                                                                </select>
                                                                                <p class="mt-2 text-xs text-gray-500">
                                                                                    Maksimal 5 porsi per permintaan
                                                                                </p>
                                                                            </div>
                                                                            <div class="flex justify-end gap-x-2">
                                                                                <button type="button"
                                                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50"
                                                                                    data-hs-overlay="#dispenser-modal-{{ $recommendation->id }}">
                                                                                    Batal
                                                                                </button>
                                                                                <button type="submit"
                                                                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                                                                    Siapkan Jamu
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif($recommendation->herbalMedicine->stock <= 0)
                                                    <div class="mt-5">
                                                        <button type="button"
                                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed"
                                                            disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="size-4">
                                                                <path
                                                                    d="M19 5h-4V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3H1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-8h1a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1Z">
                                                                </path>
                                                            </svg>
                                                            Stok Habis
                                                        </button>
                                                    </div>
                                                @elseif($activeDispensers->count() <= 0)
                                                    <div class="mt-5">
                                                        <button type="button"
                                                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-gray-200 bg-gray-100 text-gray-400 cursor-not-allowed"
                                                            disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="size-4">
                                                                <path
                                                                    d="M19 5h-4V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3H1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-8h1a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1Z">
                                                                </path>
                                                            </svg>
                                                            Tidak Ada Dispenser Aktif
                                                        </button>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="size-10 mx-auto text-gray-400 mb-4">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                    </svg>
                                    <p class="text-gray-500">Belum ada rekomendasi jamu untuk keluhan ini</p>
                                </div>
                            @endif
                        </div>
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div>
                                <p class="text-sm text-gray-600">
                                    Rekomendasi jamu diberikan berdasarkan analisis keluhan kesehatan Anda
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
