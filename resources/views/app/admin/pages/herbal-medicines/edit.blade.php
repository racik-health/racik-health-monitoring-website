@extends('app.admin.layouts.app')

{{-- Meta --}}
@section('meta-description',
    'Ubah dan perbarui informasi jamu herbal dengan mudah. Pastikan data tetap relevan untuk
    digunakan dalam rekomendasi kesehatan.')
@section('meta-keywords', 'edit jamu, update herbal medicine, sistem jamu racik, pengobatan alternatif, manajemen jamu')
@section('og-title', 'Manajemen Jamu Herbal - Racik')
@section('og-description',
    'Form edit data jamu herbal untuk pengelolaan sistem Racik. Sesuaikan informasi sesuai
    perkembangan terbaru.')


    {{-- Title --}}
@section('title', 'Manajemen Jamu Herbal - Racik')

{{-- Content --}}
@section('content')
    <x-alert-message />

    <section class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <div class="bg-white rounded-xl shadow-xs p-4 sm:p-7">
            <div class="mb-8">
                <h2 class="text-xl font-bold text-gray-800">
                    Jamu
                </h2>
                <p class="text-sm text-gray-600">
                    Ubah data jamu baru
                </p>
            </div>
            <form method="POST" action="{{ route('admin.herbal-medicines.update', $data['herbal_medicine']->id) }}">
                @csrf
                @method('PUT')
                <div class="grid sm:grid-cols-12 gap-2 sm:gap-6">
                    <div class="sm:col-span-3">
                        <label for="name" class="inline-block text-sm text-gray-800 mt-2.5">
                            Nama Jamu<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="name" type="text"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="name" placeholder="Jamu Kunyit Asam"
                            value="{{ old('name', $data['herbal_medicine']->name) }}" autofocus required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="description" class="inline-block text-sm text-gray-800 mt-2.5">
                            Deskripsi Jamu<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="description" type="text"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="description"
                            placeholder="Jamu tradisional yang membantu meredakan nyeri haid dan menyegarkan tubuh."
                            value="{{ old('description', $data['herbal_medicine']->description) }}" required>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="ingredients" class="inline-block text-sm text-gray-800 mt-2.5">
                            Komposisi<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <textarea name="ingredients" id="ingredients" cols="20" rows="10"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"placeholder="Kunyit, Asam Jawa, Gula Merah, Garam"
                            required>{{ old('ingredients', $data['herbal_medicine']->ingredients) }}</textarea>
                        @error('ingredients')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="sm:col-span-3">
                        <label for="stock" class="inline-block text-sm text-gray-800 mt-2.5">
                            Stok<span class="text-red-500">*</span>
                        </label>
                    </div>
                    <div class="sm:col-span-9">
                        <input id="stock" type="number"
                            class="py-1.5 sm:py-2 px-3 pe-11 block w-full border-gray-200 shadow-2xs sm:text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 checked:border-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            name="stock" placeholder="10" value="{{ old('stock', $data['herbal_medicine']->stock) }}"
                            required>
                        @error('stock')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-5 flex justify-end gap-x-2">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-hidden focus:bg-gray-50"
                        onclick="window.location='{{ route('admin.herbal-medicines.index') }}'">
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
