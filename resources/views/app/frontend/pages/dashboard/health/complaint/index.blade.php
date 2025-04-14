@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Laporkan keluhan dan gejala kesehatan kamu agar sistem Racik bisa memberikan rekomendasi
    jamu herbal yang sesuai. Aman, cepat, dan berbasis data.')
@section('meta-keywords',
    'keluhan kesehatan, input keluhan, racik jamu, rekomendasi jamu herbal, sistem racik,
    kesehatan tradisional, monitoring gejala')
@section('og-title', 'Input Keluhan - Racik')
@section('og-description',
    'Masukkan keluhan dan gejala kesehatan kamu melalui dashboard Racik. Data ini akan diproses
    untuk memberikan resep jamu yang sesuai secara otomatis.')
@section('google-client-id', env('GOOGLE_CLIENT_ID'))

{{-- Title --}}
@section('title', 'Input Keluhan - Racik')

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
                                    Input Keluhan
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Masukkan keluhan kesehatan Anda untuk mendapatkan rekomendasi jamu
                                </p>
                            </div>
                        </div>
                        <div class="p-6">
                            <form action="{{ route('patient.complaints.store') }}" method="POST">
                                @csrf
                                <div class="mb-6">
                                    <label for="symptoms"
                                        class="block text-sm font-medium text-gray-700 mb-2">Keluhan</label>
                                    <textarea id="symptoms" name="symptoms" rows="4"
                                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                        placeholder="Deskripsikan keluhan kesehatan Anda secara detail..." required>{{ old('symptoms') }}</textarea>
                                    @error('symptoms')
                                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                    @enderror
                                    <p class="mt-2 text-xs text-gray-500">
                                        Jelaskan gejala yang Anda alami dengan detail untuk mendapatkan rekomendasi jamu
                                        yang tepat. *Pisahkan gejala dengan koma, contoh: nyeri, demam, sakit kepala
                                    </p>
                                </div>
                                <div class="flex justify-end gap-x-2">
                                    <a href="{{ route('patient.dashboard') }}"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
                                        Batal
                                    </a>
                                    <button type="submit"
                                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Kirim Keluhan
                                    </button>
                                </div>
                            </form>
                        </div>
                        <!-- Recent Health Inputs Section -->
                        <div class="px-6 py-4 border-t border-gray-200">
                            <h3 class="text-lg font-medium text-gray-800 mb-4">Keluhan Terbaru</h3>
                            @if (isset($recentHealthInputs) && count($recentHealthInputs) > 0)
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
                                                        Status
                                                    </span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200">
                                            @foreach ($recentHealthInputs as $input)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-normal">
                                                        <span class="text-sm text-gray-800">{{ $input->symptoms }}</span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span class="text-sm text-gray-500">
                                                            {{ \Carbon\Carbon::parse($input->created_at)->format('d F Y H:i') }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        @if ($input->recommendationResults->count() > 0)
                                                            <span
                                                                class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="size-3">
                                                                    <path d="M20 6 9 17l-5-5"></path>
                                                                </svg>
                                                                Sudah direkomendasikan
                                                            </span>
                                                        @else
                                                            <span
                                                                class="inline-flex items-center gap-1.5 py-0.5 px-2 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="size-3">
                                                                    <circle cx="12" cy="12" r="10"></circle>
                                                                    <line x1="12" y1="8" x2="12"
                                                                        y2="12"></line>
                                                                    <line x1="12" y1="16" x2="12.01"
                                                                        y2="16"></line>
                                                                </svg>
                                                                Menunggu rekomendasi
                                                            </span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="text-center py-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="size-10 mx-auto text-gray-400 mb-4">
                                        <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                        </path>
                                        <path d="M15 2H9a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z">
                                        </path>
                                        <path d="M12 11h4"></path>
                                        <path d="M12 16h4"></path>
                                        <path d="M8 11h.01"></path>
                                        <path d="M8 16h.01"></path>
                                    </svg>
                                    <p class="text-gray-500">Belum ada data keluhan kesehatan</p>
                                </div>
                            @endif
                        </div>
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div>
                                <p class="text-sm text-gray-600">
                                    Keluhan Anda akan dianalisis untuk memberikan rekomendasi jamu yang sesuai
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://apis.google.com/js/platform.js" async defer></script>
@endpush
