@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Dashboard pasien Racik Health - Kelola kesehatan pribadi, input keluhan, lihat rekomendasi jamu,
    pantau riwayat konsumsi, dan kontrol dispenser dalam satu sistem terintegrasi')
@section('meta-keywords',
    'dashboard pasien, keluhan kesehatan, rekomendasi jamu, riwayat konsumsi, kontrol dispenser,
    pemantauan kesehatan, herbal medicine')
@section('og-title', 'Dashboard Pasien - Racik')
@section('og-description',
    'Panel pasien untuk mengelola kesehatan pribadi, menerima rekomendasi jamu, mencatat konsumsi,
    dan mengontrol dispenser secara mandiri. Sistem kesehatan herbal berbasis kebutuhan individu.')

    {{-- Title --}}
@section('title', 'Dashboard Pasien - Racik')

{{-- Content --}}
@section('content')
    <x-alert-message />

    {{-- Dashboard Stats --}}
    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl">
                Selamat Datang, {{ Auth::user()->name }}
            </h1>
            <p class="mt-2 text-gray-600">
                Pantau kesehatan Anda dan kelola pengobatan herbal dari dashboard pribadi Anda
            </p>
        </div>
        <!-- Main Stats Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Total Keluhan -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Total Keluhan
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalHealthInputs }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-red-50 text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="M8 19h8a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path>
                                <path d="M8 19h8"></path>
                                <path d="M8 5h8"></path>
                                <path d="M12 12h.01"></path>
                                <path d="M12 8h.01"></path>
                                <path d="M12 16h.01"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Keluhan kesehatan yang telah Anda laporkan
                    </p>
                </div>
            </div>
            <!-- Total Rekomendasi -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Total Rekomendasi
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalRecommendations }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-green-50 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Rekomendasi jamu yang telah Anda terima
                    </p>
                </div>
            </div>
            <!-- Total Konsumsi -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Total Konsumsi
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalConsumptions }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-amber-50 text-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path
                                    d="M8.8 20v-4.1l1.9.2a2.3 2.3 0 0 0 2.164-2.1V8.3A5.37 5.37 0 0 0 2 8.25c0 2.8.656 3.95 1 4.8a.2.2 0 0 1-.2.2 3.5 3.5 0 0 0-1.5 2.7">
                                </path>
                                <path d="M19.8 17.8a7.5 7.5 0 0 0-2.4-3.8"></path>
                                <path d="M22 19a7.6 7.6 0 0 0-1.1-3.8"></path>
                                <path d="M13 18.2c.2 0 .4.1.5.3a2 2 0 0 1-.5 2.2c-.9.6-1.9.7-3 .7a6.3 6.3 0 0 1-5-2"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Jumlah jamu yang telah Anda konsumsi
                    </p>
                </div>
            </div>
            <!-- Kontrol Dispenser -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Kontrol Dispenser
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $dispenserControls }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-purple-50 text-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path
                                    d="M19 5h-4V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3H1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-8h1a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1Z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">
                        Tingkat keberhasilan: {{ $successRate }}%
                    </p>
                </div>
            </div>
        </div>
        <!-- Action Cards -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Input Keluhan Card -->
            <a href="{{ route('patient.complaints.index') }}"
                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5 flex flex-col h-full">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-red-50 text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="M8 19h8a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z"></path>
                                <path d="M8 19h8"></path>
                                <path d="M8 5h8"></path>
                                <path d="M12 12h.01"></path>
                                <path d="M12 8h.01"></path>
                                <path d="M12 16h.01"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Input Keluhan</h3>
                        </div>
                    </div>
                    <p class="mt-1 text-gray-600 flex-grow">
                        Masukkan gejala atau keluhan kesehatan yang Anda rasakan untuk mendapatkan rekomendasi jamu
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm font-semibold text-gray-800">
                        Input Keluhan Baru
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </p>
                </div>
            </a>
            <!-- Kontrol Dispenser Card -->
            <a href="{{ route('patient.dispensers.controls') }}"
                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5 flex flex-col h-full">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-purple-50 text-purple-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path
                                    d="M19 5h-4V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3H1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-8h1a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1Z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Kontrol Dispenser</h3>
                        </div>
                    </div>
                    <p class="mt-1 text-gray-600 flex-grow">
                        Kontrol dispenser untuk membuat jamu berdasarkan rekomendasi yang telah Anda terima
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm font-semibold text-gray-800">
                        Kelola Dispenser
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </p>
                </div>
            </a>
            <!-- Lihat Rekomendasi Card -->
            <a href="{{ route('patient.recommendations.index') }}"
                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5 flex flex-col h-full">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-green-50 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Hasil Rekomendasi</h3>
                        </div>
                    </div>
                    <p class="mt-1 text-gray-600 flex-grow">
                        Lihat rekomendasi jamu yang telah diberikan berdasarkan keluhan kesehatan Anda
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm font-semibold text-gray-800">
                        Lihat Rekomendasi
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </p>
                </div>
            </a>
            <!-- Riwayat Konsumsi Card -->
            <a href="{{ route('patient.consumption-history.index') }}"
                class="group flex flex-col h-full bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5 flex flex-col h-full">
                    <div class="flex items-center gap-x-4 mb-3">
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-amber-50 text-amber-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path
                                    d="M8.8 20v-4.1l1.9.2a2.3 2.3 0 0 0 2.164-2.1V8.3A5.37 5.37 0 0 0 2 8.25c0 2.8.656 3.95 1 4.8a.2.2 0 0 1-.2.2 3.5 3.5 0 0 0-1.5 2.7">
                                </path>
                                <path d="M19.8 17.8a7.5 7.5 0 0 0-2.4-3.8"></path>
                                <path d="M22 19a7.6 7.6 0 0 0-1.1-3.8"></path>
                                <path d="M13 18.2c.2 0 .4.1.5.3a2 2 0 0 1-.5 2.2c-.9.6-1.9.7-3 .7a6.3 6.3 0 0 1-5-2"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-gray-800">Riwayat Konsumsi</h3>
                        </div>
                    </div>
                    <p class="mt-1 text-gray-600 flex-grow">
                        Lihat riwayat jamu yang telah Anda konsumsi dan pantau pola konsumsi Anda
                    </p>
                    <p class="mt-5 inline-flex items-center gap-x-1 text-sm font-semibold text-gray-800">
                        Lihat Riwayat
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"></path>
                        </svg>
                    </p>
                </div>
            </a>
        </div>
        <!-- Recent Activity Section -->
        <div class="grid lg:grid-cols-2 gap-6">
            <!-- Recent Recommendations -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Rekomendasi Terbaru</h3>
                </div>
                <div class="p-6">
                    @if ($recentRecommendation)
                        <div class="mb-4">
                            <h4 class="text-base font-medium text-gray-800">
                                {{ $recentRecommendation->herbalMedicine->name }}</h4>
                            <p class="mt-1 text-sm text-gray-600">{{ $recentRecommendation->herbalMedicine->description }}
                            </p>
                            <div class="mt-2 flex items-center">
                                <span class="text-xs font-medium text-gray-500">Tingkat Kepercayaan:</span>
                                <div class="ml-2 w-full max-w-[200px] bg-gray-200 rounded-full h-2">
                                    <div class="bg-green-600 h-2 rounded-full"
                                        style="width: {{ $recentRecommendation->confidence_score }}%"></div>
                                </div>
                                <span
                                    class="ml-2 text-xs font-medium text-gray-500">{{ number_format($recentRecommendation->confidence_score, 1) }}%</span>
                            </div>
                            <p class="mt-2 text-xs text-gray-500">
                                {{ $recentRecommendation->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <a href="{{ route('patient.recommendations.index') }}"
                            class="inline-flex items-center gap-x-1 text-sm font-semibold text-blue-600 hover:text-blue-800">
                            Lihat Semua Rekomendasi
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="m9 18 6  stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                        <path d="
                                    m9 18 6-6-6-6">
                                </path>
                            </svg>
                        </a>
                    @else
                        <p class="text-gray-500">Belum ada rekomendasi jamu.</p>
                    @endif
                </div>
            </div>
            <!-- Recent Consumption History -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Riwayat Konsumsi Terbaru</h3>
                </div>
                <div class="p-6">
                    @if (count($recentConsumptions) > 0)
                        <ul class="space-y-3">
                            @foreach ($recentConsumptions as $consumption)
                                <li class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-gray-800">
                                            {{ $consumption->herbalMedicine->name }}</p>
                                        <p class="text-xs text-gray-500">
                                            {{ Carbon\Carbon::parse($consumption->consumed_at)->format('d M Y, H:i') }}</p>
                                    </div>
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-amber-100 text-amber-800">
                                        {{ $consumption->quantity }} porsi
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('patient.consumption-history.index') }}"
                            class="mt-4 inline-flex items-center gap-x-1 text-sm font-semibold text-blue-600 hover:text-blue-800">
                            Lihat Semua Riwayat
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path
                                    d="m9 18 6  stroke-linecap="round" stroke-linejoin="round">
                                                                                                                                                                                                        <path d="
                                    m9 18 6-6-6-6">
                                </path>
                            </svg>
                        </a>
                    @else
                        <p class="text-gray-500">Belum ada riwayat konsumsi jamu.</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- Additional Stats Section -->
        <div class="grid lg:grid-cols-2 gap-6 mt-6">
            <!-- Most Consumed Medicine -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Jamu Paling Sering Dikonsumsi</h3>
                </div>
                <div class="p-6">
                    @if ($mostConsumedMedicine)
                        <div class="flex items-center">
                            <div
                                class="flex-shrink-0 flex justify-center items-center size-16 rounded-md bg-amber-50 text-amber-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="size-8">
                                    <path
                                        d="M8.8 20v-4.1l1.9.2a2.3 2.3 0 0 0 2.164-2.1V8.3A5.37 5.37 0 0 0 2 8.25c0 2.8.656 3.95 1 4.8a.2.2 0 0 1-.2.2 3.5 3.5 0 0 0-1.5 2.7">
                                    </path>
                                    <path d="M19.8 17.8a7.5 7.5 0 0 0-2.4-3.8"></path>
                                    <path d="M22 19a7.6 7.6 0 0 0-1.1-3.8"></path>
                                    <path d="M13 18.2c.2 0 .4.1.5.3a2 2 0 0 1-.5 2.2c-.9.6-1.9.7-3 .7a6.3 6.3 0 0 1-5-2">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-5">
                                <h4 class="text-base font-medium text-gray-800">
                                    {{ $mostConsumedMedicine->herbalMedicine->name }}</h4>
                                <p class="mt-1 text-sm text-gray-600">Total dikonsumsi: <span
                                        class="font-medium">{{ $mostConsumedMedicine->total_quantity }} porsi</span></p>
                            </div>
                        </div>
                    @else
                        <p class="text-gray-500">Belum ada data konsumsi jamu.</p>
                    @endif
                </div>
            </div>
            <!-- Dispenser Control Success Rate -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Tingkat Keberhasilan Kontrol Dispenser</h3>
                </div>
                <div class="p-6">
                    <div class="flex flex-col items-center">
                        <div class="relative inline-flex items-center justify-center size-32">
                            <svg class="size-32" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
                                <!-- Background circle -->
                                <circle cx="18" cy="18" r="16" fill="none" stroke="#e5e7eb"
                                    stroke-width="2"></circle>

                                <!-- Progress circle with stroke-dasharray and stroke-dashoffset -->
                                <circle cx="18" cy="18" r="16" fill="none" stroke="#8b5cf6"
                                    stroke-width="2" stroke-dasharray="100" stroke-dashoffset="{{ 100 - $successRate }}"
                                    transform="rotate(-90 18 18)"></circle>
                            </svg>
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="text-xl font-bold text-gray-800">{{ $successRate }}%</span>
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <p class="text-sm text-gray-600">{{ $successfulControls }} berhasil dari
                                {{ $dispenserControls }} operasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
