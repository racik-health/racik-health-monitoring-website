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

@endsection
