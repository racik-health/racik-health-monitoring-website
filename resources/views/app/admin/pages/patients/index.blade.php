@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Kelola data pasien dengan mudah di Racik Health. Pantau riwayat kesehatan, resep, dan
    perkembangan pasien secara terintegrasi.')
@section('meta-keywords',
    'manajemen pasien, data kesehatan pasien, rekam medis digital, sistem monitoring pasien,
    dashboard tenaga medis')
@section('og-title', 'Manajemen Pasien - Racik')
@section('og-description',
    'Sistem manajemen pasien terintegrasi untuk memudahkan tenaga kesehatan dalam memantau dan
    mengelola data pasien secara efisien.')

    {{-- Title --}}
@section('title', 'Manajemen Pasien - Racik')

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
                                    Kelola Pasien
                                </h2>
                                <p class="text-sm text-gray-600">
                                    Tambah, ubah, dan hapus data pasien
                                </p>
                            </div>
                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="{{ route('admin.patients.create') }}">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Tambah Pasien
                                    </a>
                                </div>
                            </div>
                        </div>
                        <table class="min-w-full divide-y divide-gray-200" id="myTable">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="ps-6 py-3 text-start"></th>
                                    <th scope="col" class="py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Nama Lengkap
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Alamat Email
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Nomer Telepon
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Jenis Kelamin
                                            </span>
                                        </div>
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Dibuat Pada
                                            </span>
                                        </div>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span class="text-xs font-semibold uppercase text-gray-800">
                                                Aksi
                                            </span>
                                        </div>
                                    </th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($data['patients'] as $patient)
                                    <tr>
                                        <td class="size-px whitespace-nowrap"></td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3">
                                                <span class="text-sm">{{ $patient->name }}</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm">{{ $patient->email }}</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm">{{ $patient->phone_number }}</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="text-sm">{{ $patient->gender === 'male' ? 'Laki-laki' : 'Perempuan' }}</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500">
                                                    {{ \Carbon\Carbon::parse($patient->created_at)->format('d F Y') }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium"
                                                    href="{{ route('admin.patients.edit', $patient->id) }}">
                                                    Edit
                                                </a>
                                                <form action="{{ route('admin.patients.destroy', $patient->id) }}"
                                                    method="post"
                                                    class="inline-flex items-center gap-x-1 text-sm text-red-600 decoration-2 hover:underline focus:outline-hidden focus:underline font-medium">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="cursor-pointer"
                                                        onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                        Hapus
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <p class="text-center">Data pasien masih kosong</p>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold text-gray-800">{{ count($data['patients']) }}</span> pasien
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
