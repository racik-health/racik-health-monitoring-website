@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Lihat semua rekomendasi jamu herbal berdasarkan keluhan kesehatan Anda. Pantau riwayat
    rekomendasi dan akses informasi lengkap tentang jamu yang direkomendasikan.')
@section('meta-keywords',
    'daftar rekomendasi jamu, riwayat rekomendasi, jamu herbal, racik health, pengobatan
    tradisional, kesehatan alami')
@section('og-title', 'Rekomendasi Jamu - Racik')
@section('og-description',
    'Akses semua rekomendasi jamu herbal yang pernah diberikan berdasarkan keluhan kesehatan
    Anda. Lihat detail dan siapkan jamu melalui dispenser Racik.')

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
                                    Daftar Rekomendasi Jamu
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Semua rekomendasi jamu berdasarkan keluhan kesehatan Anda
                                </p>
                            </div>
                        </div>
                        @if ($healthInputs->count() > 0)
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-start">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Keluhan
                                                </span>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-start">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Tanggal Input
                                                </span>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-start">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Rekomendasi
                                                </span>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-start">
                                                <span class="text-xs font-semibold uppercase text-gray-800">
                                                    Aksi
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($healthInputs as $healthInput)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-normal">
                                                    <span
                                                        class="text-sm text-gray-800">{{ Str::limit($healthInput->symptoms, 50) }}</span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="text-sm text-gray-500">
                                                        {{ \Carbon\Carbon::parse($healthInput->created_at)->format('d F Y H:i') }}
                                                    </span>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex flex-col gap-1">
                                                        @foreach ($healthInput->recommendationResults as $recommendation)
                                                            <span
                                                                class="inline-flex items-center gap-x-1.5 py-1 px-2 rounded-md text-xs font-medium bg-green-100 text-green-800">
                                                                {{ $recommendation->herbalMedicine->name }}
                                                                ({{ number_format($recommendation->confidence_score, 1) }}%)
                                                            </span>
                                                        @endforeach
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <a href="{{ route('patient.recommendations.show', $healthInput->id) }}"
                                                        class="py-1.5 px-2.5 inline-flex items-center gap-x-1.5 text-xs font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="size-3.5">
                                                            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                        Lihat Detail
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                                <div>
                                    <p class="text-sm text-gray-600">
                                        Menampilkan {{ $healthInputs->count() }} dari {{ $healthInputs->total() }}
                                        rekomendasi
                                    </p>
                                </div>
                                <div>
                                    {{ $healthInputs->links() }}
                                </div>
                            </div>
                        @else
                            <div class="text-center py-10">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="size-10 mx-auto text-gray-400 mb-4">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                                <p class="text-gray-500">Belum ada rekomendasi jamu</p>
                                <div class="mt-5">
                                    <a href="{{ route('patient.complaints.index') }}"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700">
                                        Input Keluhan Baru
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
