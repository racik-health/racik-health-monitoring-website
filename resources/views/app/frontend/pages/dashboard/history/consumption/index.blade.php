@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Lihat dan pantau riwayat konsumsi jamu Anda dengan mudah. Dapatkan catatan lengkap
    mengenai jenis jamu, waktu konsumsi, dan manfaatnya secara terorganisir.')
@section('meta-keywords',
    'riwayat konsumsi jamu, dashboard pengguna, konsumsi herbal, pemantauan kesehatan, jamu
    tradisional, Racik Health')
@section('og-title', 'Laporan Konsumsi - Racik')
@section('og-description',
    'Dashboard pribadi Anda untuk memantau konsumsi jamu secara menyeluruh. Lihat riwayat, dosis,
    dan manfaat dari jamu yang telah dikonsumsi untuk mendukung kesehatan Anda.')


    {{-- Title --}}
@section('title', 'Laporan Konsumsi - Racik')

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
                                    Laporan Konsumsi
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Lihat data laporan konsumsi
                                </p>
                            </div>
                            <div>
                                <div class="inline-flex gap-x-2"></div>
                            </div>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200" id="myTable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="ps-6 py-3 text-start"></th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Nama Jamu
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Jumlah Konsumsi
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Catatan
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Dikonsumsi Pada
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Dibuat Pada
                                            </span>
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($data['consumption_reports'] as $report)
                                    <tr>
                                        <td class="size-px whitespace-nowrap"></td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm">{{ $report->herbalMedicine->name }}</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm">{{ $report->quantity }} gelas</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm">{{ $report->note }}</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($report->consumed_at)->format('d F Y H:i') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($report->created_at)->format('d F Y H:i') }}
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <p class="text-center">Data laporan konsumsi masih kosong</p>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div>
                                <p class="text-sm text-gray-600">
                                    <span
                                        class="font-semibold text-gray-800">{{ count($data['consumption_reports']) }}</span>
                                    laporan konsumsi
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
