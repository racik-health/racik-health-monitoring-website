@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Dashboard admin Racik Health - Kelola data pasien, resep jamu, monitor dispenser, dan
    laporan konsumsi dalam satu sistem terintegrasi untuk tenaga kesehatan profesional')
@section('meta-keywords',
    ' dashboard admin, sistem monitoring kesehatan, manajemen pasien, pengelolaan jamu, kontrol
    dispenser, laporan medis, analisis kesehatan')
@section('og-title', 'Dashboard Admin - Racik')
@section('og-description',
    'Panel administrasi lengkap untuk memantau data kesehatan pasien, mengelola resep herbal, dan
    mengontrol perangkat dispenser. Dilengkapi analisis real-time dan alat pelaporan untuk tenaga medis.')

    {{-- Title --}}
@section('title', 'Dashboard Admin - Racik')

{{-- Content --}}
@section('content')
    <x-alert-message />

    <!-- Dashboard Stats -->
    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Welcome Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl">
                Selamat Datang, {{ auth()->user()->name }}
            </h1>
            <p class="mt-2 text-gray-600">
                Pantau statistik dan kelola sistem Racik Health dari dashboard utama
            </p>
        </div>
        <!-- System Health Alerts -->
        @if (array_filter($systemHealth))
            <div class="mb-8">
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Peringatan Sistem</h2>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @if ($systemHealth['lowStockAlert'])
                            <div class="flex items-center gap-x-3 py-2 px-4 rounded-lg bg-amber-50 text-amber-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-5">
                                    <path
                                        d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                    </path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                <p class="text-sm">{{ $lowStockMedicines }} jamu memiliki stok rendah</p>
                            </div>
                        @endif
                        @if ($systemHealth['outOfStockAlert'])
                            <div class="flex items-center gap-x-3 py-2 px-4 rounded-lg bg-red-50 text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-5">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                <p class="text-sm">{{ $outOfStockMedicines }} jamu kehabisan stok</p>
                            </div>
                        @endif
                        @if ($systemHealth['inactiveDispenserAlert'])
                            <div class="flex items-center gap-x-3 py-2 px-4 rounded-lg bg-amber-50 text-amber-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-5">
                                    <path
                                        d="M10.29 3.86 1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                                    </path>
                                    <line x1="12" y1="9" x2="12" y2="13"></line>
                                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                                </svg>
                                <p class="text-sm">{{ $dispenserStatus['inactive'] ?? 0 }} dispenser tidak aktif</p>
                            </div>
                        @endif
                        @if ($systemHealth['maintenanceDispenserAlert'])
                            <div class="flex items-center gap-x-3 py-2 px-4 rounded-lg bg-blue-50 text-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-5">
                                    <path
                                        d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z">
                                    </path>
                                </svg>
                                <p class="text-sm">{{ $dispenserStatus['maintenance'] ?? 0 }} dispenser dalam maintenance
                                </p>
                            </div>
                        @endif
                        @if ($systemHealth['longOfflineDispenserAlert'])
                            <div class="flex items-center gap-x-3 py-2 px-4 rounded-lg bg-red-50 text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-5">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                <p class="text-sm">{{ $longOfflineDispensers }} dispenser offline >7 hari</p>
                            </div>
                        @endif
                        @if ($systemHealth['pendingOperationsAlert'])
                            <div class="flex items-center gap-x-3 py-2 px-4 rounded-lg bg-amber-50 text-amber-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="size-5">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <p class="text-sm">{{ $inProgressOperations }} operasi dispenser tertunda</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <!-- Main Stats Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- Total Patients -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Total Pasien
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalUsers }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-blue-50 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                <circle cx="9" cy="7" r="4"></circle>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"></path>
                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center gap-x-2">
                            <p class="text-xs text-gray-500">Hari ini: <span
                                    class="font-medium text-gray-800">+{{ $newUsersToday }}</span></p>
                            <p class="text-xs text-gray-500">Minggu ini: <span
                                    class="font-medium text-gray-800">+{{ $newUsersThisWeek }}</span></p>
                        </div>
                        <div class="flex items-center justify-between mt-1">
                            <p class="text-xs text-gray-500">Laki-laki: <span
                                    class="font-medium text-gray-800">{{ $genderDistribution['male'] ?? 0 }}</span></p>
                            <p class="text-xs text-gray-500">Perempuan: <span
                                    class="font-medium text-gray-800">{{ $genderDistribution['female'] ?? 0 }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Dispenser -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Dispenser
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalDispensers }}
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
                    <div class="mt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500">Aktif: <span
                                    class="font-medium text-gray-800">{{ $dispenserStatus['active'] ?? 0 }}</span></p>
                            <p class="text-xs text-gray-500">Nonaktif: <span
                                    class="font-medium text-gray-800">{{ $dispenserStatus['inactive'] ?? 0 }}</span></p>
                            <p class="text-xs text-gray-500">Maintenance: <span
                                    class="font-medium text-gray-800">{{ $dispenserStatus['maintenance'] ?? 0 }}</span>
                            </p>
                        </div>
                        <div class="mt-1">
                            <p class="text-xs text-gray-500">Aktif 24 jam terakhir: <span
                                    class="font-medium text-gray-800">{{ $recentlyActiveDispensers }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Jamu -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Total Jamu
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalHerbalMedicines }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-green-50 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="M9 11.5a5 5 0 1 0 0-10 5 5 0 0 0 0 10Z"></path>
                                <path d="M9 11.5c-1.5 0-3 .5-3 2s1.5 2 3 2 3-.5 3-2-1.5-2-3-2Z"></path>
                                <path
                                    d="M11 17.5c0 .5 0 1 .5 1s.5-.5.5-1a3 3 0 0 0-3-3c-.5 0-1 0-1 .5s.5.5 1 .5a2 2 0 0 1 2 2Z">
                                </path>
                                <path
                                    d="M14.5 14.5c-.5 0-1 0-1 .5s.5.5 1 .5a2 2 0 0 1 2 2c0 .5 0 1 .5 1s.5-.5.5-1a3 3 0 0 0-3-3Z">
                                </path>
                                <path d="M15 5.5a5 5 0 1 0 0 10 5 5 0 0 0 0-10Z"></path>
                                <path d="M15 15.5c-1.5 0-3 .5-3 2s1.5 2 3 2 3-.5 3-2-1.5-2-3-2Z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500">Total Stok: <span
                                    class="font-medium text-gray-800">{{ $totalStock }}</span></p>
                            <p class="text-xs text-gray-500">Stok Rendah: <span
                                    class="font-medium text-gray-800">{{ $lowStockMedicines }}</span></p>
                            <p class="text-xs text-gray-500">Habis: <span
                                    class="font-medium text-gray-800">{{ $outOfStockMedicines }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Konsumsi Jamu -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Konsumsi Jamu
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
                    <div class="mt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500">Hari ini: <span
                                    class="font-medium text-gray-800">{{ $consumptionsToday }}</span></p>
                            <p class="text-xs text-gray-500">Minggu ini: <span
                                    class="font-medium text-gray-800">{{ $consumptionsThisWeek }}</span></p>
                        </div>
                        <div class="mt-1 flex items-center">
                            <p class="text-xs text-gray-500">Perubahan mingguan:</p>
                            <span
                                class="ml-1 text-xs {{ $weeklyConsumptionChange >= 0 ? 'text-green-600' : 'text-red-600' }}">
                                {{ $weeklyConsumptionChange >= 0 ? '+' : '' }}{{ $weeklyConsumptionChange }}%
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Input Kesehatan -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Input Kesehatan
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalHealthInputs }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-teal-50 text-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                <path d="M15 2H9a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"></path>
                                <path d="M12 11h4"></path>
                                <path d="M12 16h4"></path>
                                <path d="M8 11h.01"></path>
                                <path d="M8 16h.01"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500">Hari ini: <span
                                    class="font-medium text-gray-800">{{ $healthInputsToday }}</span></p>
                            <p class="text-xs text-gray-500">Minggu ini: <span
                                    class="font-medium text-gray-800">{{ $healthInputsThisWeek }}</span></p>
                        </div>
                        <div class="mt-1">
                            <p class="text-xs text-gray-500">Bulan ini: <span
                                    class="font-medium text-gray-800">{{ $healthInputsThisMonth }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Rekomendasi -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Rekomendasi
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalRecommendations }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-rose-50 text-rose-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="m9 18 6-6-6-6"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500">Hari ini: <span
                                    class="font-medium text-gray-800">{{ $recommendationsToday }}</span></p>
                            <p class="text-xs text-gray-500">Minggu ini: <span
                                    class="font-medium text-gray-800">{{ $recommendationsThisWeek }}</span></p>
                        </div>
                        <div class="mt-1">
                            <p class="text-xs text-gray-500">Rata-rata Skor: <span
                                    class="font-medium text-gray-800">{{ number_format($avgConfidenceScore, 2) }}%</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Detailed Statistics Sections -->
        <div class="grid lg:grid-cols-2 gap-6 mb-6">
            <!-- Top Consumed Medicines -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Jamu Paling Banyak Dikonsumsi</h3>
                </div>
                <div class="p-6">
                    @if (count($topConsumedMedicines) > 0)
                        <ul class="space-y-3">
                            @foreach ($topConsumedMedicines as $medicine)
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 flex justify-center items-center size-8 rounded-md bg-amber-50 text-amber-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="size-4">
                                                <path
                                                    d="M8.8 20v-4.1l1.9.2a2.3 2.3 0 0 0 2.164-2.1V8.3A5.37 5.37 0 0 0 2 8.25c0 2.8.656 3.95 1 4.8a.2.2 0 0 1-.2.2 3.5 3.5 0 0 0-1.5 2.7">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm font-medium text-gray-800">
                                            {{ $medicine->herbalMedicine->name }}</p>
                                    </div>
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-amber-100 text-amber-800">
                                        {{ $medicine->total_consumed }} porsi
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Belum ada data konsumsi jamu.</p>
                    @endif
                </div>
            </div>
            <!-- Top Recommended Medicines -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Jamu Paling Sering Direkomendasikan</h3>
                </div>
                <div class="p-6">
                    @if (count($topRecommendedMedicines) > 0)
                        <ul class="space-y-3">
                            @foreach ($topRecommendedMedicines as $medicine)
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 flex justify-center items-center size-8 rounded-md bg-green-50 text-green-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="size-4">
                                                <path d="m9 18 6-6-6-6"></path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm font-medium text-gray-800">
                                            {{ $medicine->herbalMedicine->name }}</p>
                                    </div>
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-green-100 text-green-800">
                                        {{ $medicine->count }} kali
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Belum ada data rekomendasi jamu.</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- Dispenser Operations Section -->
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Operasi Dispenser</h3>
            </div>
            <div class="p-6">
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div>
                        <p class="text-sm text-gray-500">Total Operasi</p>
                        <p class="text-xl font-medium text-gray-800">{{ $dispenserOperations }}</p>
                        <p class="mt-1 text-xs text-gray-500">Hari ini: {{ $operationsToday }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Operasi Berhasil</p>
                        <p class="text-xl font-medium text-gray-800">{{ $successfulOperations }}</p>
                        <p class="mt-1 text-xs text-gray-500">Tingkat keberhasilan: {{ $successRate }}%</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Operasi Gagal</p>
                        <p class="text-xl font-medium text-gray-800">{{ $failedOperations }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Operasi Tertunda</p>
                        <p class="text-xl font-medium text-gray-800">{{ $inProgressOperations }}</p>
                    </div>
                </div>
                <!-- Most Active Dispensers -->
                @if (count($mostActiveDispensers) > 0)
                    <div class="mt-6">
                        <h4 class="text-base font-medium text-gray-800 mb-3">Dispenser Paling Aktif</h4>
                        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                            @foreach ($mostActiveDispensers as $dispenser)
                                <div class="flex items-center p-3 border border-gray-200 rounded-lg">
                                    <div
                                        class="flex-shrink-0 flex justify-center items-center size-10 rounded-md bg-purple-50 text-purple-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="size-5">
                                            <path
                                                d="M19 5h-4V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3H1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-8h1a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-800">{{ $dispenser->dispenser->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $dispenser->count }} operasi</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <!-- Common Symptoms Section -->
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Gejala Umum</h3>
            </div>
            <div class="p-6">
                @if (count($commonSymptoms) > 0)
                    <ul class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($commonSymptoms as $symptom)
                            <li class="flex items-center p-3 border border-gray-200 rounded-lg">
                                <div
                                    class="flex-shrink-0 flex justify-center items-center size-10 rounded-md bg-teal-50 text-teal-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="size-5">
                                        <path d="M8 19h8a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2Z">
                                        </path>
                                        <path d="M8 19h8"></path>
                                        <path d="M8 5h8"></path>
                                        <path d="M12 12h.01"></path>
                                        <path d="M12 8h.01"></path>
                                        <path d="M12 16h.01"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-800">{{ $symptom->symptoms }}</p>
                                    <p class="text-xs text-gray-500">{{ $symptom->count }} laporan</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-gray-500">Belum ada data gejala.</p>
                @endif
            </div>
        </div>
        <!-- Most Active Users Section -->
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Pengguna Paling Aktif</h3>
            </div>
            <div class="p-6">
                @if (count($mostActiveUsers) > 0)
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($mostActiveUsers as $user)
                            <div class="flex items-center p-3 border border-gray-200 rounded-lg">
                                <div
                                    class="flex-shrink-0 flex justify-center items-center size-10 rounded-md bg-blue-50 text-blue-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="size-5">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-800">{{ $user->user->name }}</p>
                                    <p class="text-xs text-gray-500">{{ $user->count }} operasi dispenser</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-500">Belum ada data pengguna aktif.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
