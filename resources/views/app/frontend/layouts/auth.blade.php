<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    {{-- Basic Meta Tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('meta-description', 'Racik Health Monitoring - Sistem pemantauan kesehatan dan manajemen jamu terintegrasi')">
    <meta name="keywords" content="@yield('meta-keywords', 'kesehatan, jamu, monitoring kesehatan, herbal, dispenser jamu')">
    <meta name="author" content="Tim Pencari Tuhan">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('og-title', 'Racik Health Monitoring')">
    <meta property="og:description" content="@yield('og-description', 'Sistem pemantauan kesehatan dan manajemen jamu terintegrasi')">
    <meta property="og:image" content="{{ asset('assets/icons/frontend/home/logo-racik.png') }}">
    <meta property="og:locale" content="id_ID">

    {{-- Structured Data --}}
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "@yield('schema-type', 'WebSite')",
            "name": "Beranda - Racik",
            "url": "{{ url()->current() }}",
            "description": "Racik adalah sistem Health Monitoring berbasis IoT untuk pemantauan konsumsi jamu, manajemen resep herbal, dan pelacakan data kesehatan secara real-time. Solusi modern untuk gaya hidup sehat dan terintegrasi.",
            "publisher": {
                "@type": "Organization",
                "name": "Racik Health",
                "logo": {
                    "@type": "ImageObject",
                    "url": "{{ asset('assets/icons/frontend/home/logo-racik.png') }}"
                }
            }
        }
    </script>

    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ URL::current() }}" />

    {{-- Favicon --}}
    <link rel="icon" type="image/png" sizes="32x32"
        href="{{ asset('assets/icons/frontend/home/favicon 32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16"
        href="{{ asset('assets/icons/frontend/home/favicon 16x16.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">

    {{-- Security Headers --}}
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    {{-- Robots --}}
    <meta name="robots" content="index, follow">

    <title>@yield('title')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap"
        rel="stylesheet">

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    {{-- AOS Animation Library --}}
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-beige min-h-screen font-poppins text-brown-900 flex flex-col">
    {{-- Alert Message --}}
    <x-alert-message />

    {{-- Content --}}
    @yield('content')

    {{-- AOS Animation Library --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    {{-- Custom Javascript --}}
    @stack('scripts')
</body>

</html>
