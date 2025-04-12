<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    {{-- Basic Meta Tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description"
        content="Racik adalah sistem Health Monitoring berbasis IoT untuk pemantauan konsumsi jamu, manajemen resep herbal, dan pelacakan data kesehatan secara real-time. Solusi modern untuk gaya hidup sehat dan terintegrasi.">
    <meta name="keywords"
        content="Racik, health monitoring, pemantauan kesehatan, jamu herbal, IoT kesehatan, gaya hidup sehat, dispenser jamu pintar, data kesehatan real-time, resep herbal digital, teknologi kesehatan Indonesia">
    <meta name="author" content="Tim Pencari Tuhan">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="Racik - Sistem Pemantauan Kesehatan Herbal Terintegrasi">
    <meta property="og:description"
        content="Kenali Racik, sistem inovatif berbasis IoT untuk memantau konsumsi jamu, mengelola resep herbal, dan mendukung hidup sehat dengan teknologi. Cocok untuk rumah tangga dan fasilitas kesehatan.">
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

    <title>Beranda - Racik</title>

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

<body class="bg-beige min-h-screen font-poppins text-brown-900">
    {{-- Alert Message --}}
    <x-alert-message />
    {{-- Navigation --}}
    <x-frontend.home-header />
    {{-- Hero Section --}}
    <x-frontend.home-hero />
    {{-- Video Player Section --}}
    <x-frontend.home-video-player />
    {{-- Features Section --}}
    <x-frontend.home-features />
    {{-- Team Section --}}
    <x-frontend.home-team />
    {{-- CTA Section --}}
    <x-frontend.home-cta />
    {{-- FAQ Section --}}
    <x-frontend.home-faq />
    {{-- Contact Section --}}
    <x-frontend.home-contact />
    {{-- Footer --}}
    <x-frontend.home-footer />
    {{-- Back to Top Button --}}
    <button id="back-to-top"
        class="fixed bottom-6 right-6 w-10 h-10 bg-brown-600 rounded-full flex items-center justify-center text-white shadow-md z-50 opacity-0 invisible transition-all duration-300">
        <i data-lucide="chevron-up" class="w-5 h-5"></i>
    </button>

    {{-- AOS Animation Library --}}
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
