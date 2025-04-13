@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Dashboard monitoring dispenser Racik Health - Pantau status dispenser, operasi, dan
    kinerja dalam satu tampilan terintegrasi untuk pengelolaan yang efisien')
@section('meta-keywords',
    'monitoring dispenser, status dispenser, operasi dispenser, kinerja dispenser, dashboard
    dispenser, sistem monitoring dispenser')
@section('og-title', 'Dashboard Admin - Racik')
@section('og-description',
    'Panel monitoring lengkap untuk memantau status dispenser, operasi, dan kinerja. Dilengkapi
    analisis real-time dan alat pelaporan untuk pengelolaan dispenser yang efisien.')

    {{-- Title --}}
@section('title', 'Dashboard Admin - Racik')

{{-- Content --}}
@section('content')
    <x-alert-message />

    <!-- Dashboard Stats -->
    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl">
                Monitoring Dispenser
            </h1>
            <p class="mt-2 text-gray-600">
                Pantau status dan operasi semua dispenser dalam sistem Racik Health
            </p>
        </div>
        <!-- System Health Alerts -->
        @if (array_filter($systemHealth))
            <div class="mb-8">
                <div class="bg-white border border-gray-200 shadow-sm rounded-xl p-4 md:p-5">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Peringatan Sistem</h2>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-5">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                <p class="text-sm">{{ $inProgressOperations }} operasi dispenser tertunda</p>
                            </div>
                        @endif
                        @if ($systemHealth['neverOnlineDispenserAlert'])
                            <div class="flex items-center gap-x-3 py-2 px-4 rounded-lg bg-red-50 text-red-800">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-5">
                                    <rect width="18" height="18" x="3" y="3" rx="2" ry="2"></rect>
                                    <line x1="9" x2="15" y1="9" y2="15"></line>
                                    <line x1="15" x2="9" y1="9" y2="15"></line>
                                </svg>
                                <p class="text-sm">{{ $neverOnlineDispensers }} dispenser belum pernah online</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endif
        <!-- Main Stats Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
            <!-- Total Dispensers -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Total Dispenser
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
                    </div>
                </div>
            </div>
            <!-- Online Status -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Status Online
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $recentlyActiveDispensers }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-green-50 text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="M6.5 6.5h11v11h-11z"></path>
                                <path d="m21 21-5.2-5.2"></path>
                                <path d="m3 3 5.2 5.2"></path>
                                <path d="M14 7h-4"></path>
                                <path d="M17 10h-7"></path>
                                <path d="M17 13h-7"></path>
                                <path d="M10 16h-3"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500">Aktif 24 jam terakhir</p>
                        </div>
                        <div class="mt-1">
                            <p class="text-xs text-gray-500">Offline >7 hari: <span
                                    class="font-medium text-gray-800">{{ $longOfflineDispensers }}</span></p>
                        </div>
                        <div class="mt-1">
                            <p class="text-xs text-gray-500">Belum pernah online: <span
                                    class="font-medium text-gray-800">{{ $neverOnlineDispensers }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Total Operations -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Total Operasi
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $totalOperations }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-blue-50 text-blue-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500">Hari ini: <span
                                    class="font-medium text-gray-800">{{ $operationsToday }}</span></p>
                            <p class="text-xs text-gray-500">Minggu ini: <span
                                    class="font-medium text-gray-800">{{ $operationsThisWeek }}</span></p>
                        </div>
                        <div class="mt-1">
                            <p class="text-xs text-gray-500">Tingkat keberhasilan: <span
                                    class="font-medium text-gray-800">{{ $successRate }}%</span></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Operations Status -->
            <div
                class="group flex flex-col bg-white border border-gray-200 shadow-sm rounded-xl hover:shadow-md hover:border-gray-300 transition">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-xs uppercase tracking-wide text-gray-500">
                                Status Operasi
                            </p>
                            <div class="mt-1">
                                <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                                    {{ $successfulOperations }}
                                </h3>
                            </div>
                        </div>
                        <div
                            class="flex-shrink-0 flex justify-center items-center size-12 rounded-md bg-teal-50 text-teal-600">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="size-6">
                                <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z"></path>
                                <path d="m9 12 2 2 4-4"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="flex items-center justify-between">
                            <p class="text-xs text-gray-500">Berhasil: <span
                                    class="font-medium text-gray-800">{{ $successfulOperations }}</span></p>
                            <p class="text-xs text-gray-500">Gagal: <span
                                    class="font-medium text-gray-800">{{ $failedOperations }}</span></p>
                            <p class="text-xs text-gray-500">Tertunda: <span
                                    class="font-medium text-gray-800">{{ $inProgressOperations }}</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Weekly Operations Chart -->
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Tren Operasi Mingguan</h3>
            </div>
            <div class="p-6">
                <div class="h-64">
                    <div class="flex h-full items-end gap-x-2">
                        @foreach ($dateRange as $date => $count)
                            @php
                                $height = $count > 0 ? ($count / max($dateRange)) * 100 : 0;
                                $formattedDate = \Carbon\Carbon::parse($date)->format('d/m');
                            @endphp
                            <div class="flex flex-col items-center flex-1">
                                <div class="w-full bg-gray-200 rounded-t-md" style="height: {{ $height }}%">
                                    <div class="bg-purple-500 w-full h-full rounded-t-md"></div>
                                </div>
                                <div class="mt-3 text-xs text-gray-500">{{ $formattedDate }}</div>
                                <div class="mt-1 text-xs font-medium">{{ $count }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Dispenser Status Distribution -->
        <div class="grid lg:grid-cols-2 gap-6 mb-6">
            <!-- Most Active Dispensers -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Dispenser Paling Aktif</h3>
                </div>
                <div class="p-6">
                    @if (count($mostActiveDispensers) > 0)
                        <ul class="space-y-3">
                            @foreach ($mostActiveDispensers as $dispenser)
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 flex justify-center items-center size-8 rounded-md bg-purple-50 text-purple-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="size-4">
                                                <path
                                                    d="M19 5h-4V2a1 1 0 0 0-1-1H6a1 1 0 0 0-1 1v3H1a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h1v8a1 1 0 0 0 1 1h14a1 1 0 0 0 1-1v-8h1a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1Z">
                                                </path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm font-medium text-gray-800">
                                            {{ $dispenser->dispenser->name }}</p>
                                    </div>
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-purple-100 text-purple-800">
                                        {{ $dispenser->count }} operasi
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Belum ada data operasi dispenser.</p>
                    @endif
                </div>
            </div>
            <!-- Most Common Commands -->
            <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-800">Perintah Paling Umum</h3>
                </div>
                <div class="p-6">
                    @if (count($commonCommands) > 0)
                        <ul class="space-y-3">
                            @foreach ($commonCommands as $command)
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <div
                                            class="flex-shrink-0 flex justify-center items-center size-8 rounded-md bg-blue-50 text-blue-600">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="size-4">
                                                <path
                                                    d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z">
                                                </path>
                                                <path d="m9 12 2 2 4-4"></path>
                                            </svg>
                                        </div>
                                        <p class="ml-3 text-sm font-medium text-gray-800">{{ $command->command }}</p>
                                    </div>
                                    <span
                                        class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-blue-100 text-blue-800">
                                        {{ $command->count }} kali
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500">Belum ada data perintah dispenser.</p>
                    @endif
                </div>
            </div>
        </div>
        <!-- Users with Most Operations -->
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Pengguna dengan Operasi Terbanyak</h3>
            </div>
            <div class="p-6">
                @if (count($usersWithMostOperations) > 0)
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($usersWithMostOperations as $user)
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
                    <p class="text-gray-500">Belum ada data pengguna dengan operasi dispenser.</p>
                @endif
            </div>
        </div>
        <!-- Recent Operations -->
        <div class="bg-white border border-gray-200 shadow-sm rounded-xl">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Operasi Terbaru</h3>
            </div>
            <div class="p-6">
                @if (count($recentOperations) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dispenser
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Pengguna
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Perintah
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Waktu
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($recentOperations as $operation)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800">
                                            {{ $operation->dispenser->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $operation->user->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $operation->command }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($operation->status === 'completed')
                                                <span
                                                    class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-green-100 text-green-800">
                                                    Berhasil
                                                </span>
                                            @elseif ($operation->status === 'failed')
                                                <span
                                                    class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-red-100 text-red-800">
                                                    Gagal
                                                </span>
                                            @else
                                                <span
                                                    class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-amber-100 text-amber-800">
                                                    Tertunda
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ \Carbon\Carbon::parse($operation->executed_at)->format('d/m/Y H:i') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-500">Belum ada data operasi dispenser terbaru.</p>
                @endif
            </div>
        </div>
    </section>
@endsection
