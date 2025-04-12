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

@endsection
