<!DOCTYPE html>
<html lang="en">

<head>
    {{-- Basic Meta Tags --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('meta-description', 'Racik Health Monitoring - Sistem pemantauan kesehatan dan manajemen jamu terintegrasi')">
    <meta name="keywords" content="@yield('meta-keywords', 'kesehatan, jamu, monitoring kesehatan, herbal, dispenser jamu')">
    <meta name="author" content="@yield('meta-author', 'Tim Pencari Tuhan')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="google-signin-client_id" content="@yield('google-client-id')">

    {{-- Twitter --}}

    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="@yield('og-type', 'website')">
    <meta property="og:url" content="@yield('og-url', url()->current())">
    <meta property="og:title" content="@yield('og-title', 'Racik Health Monitoring')">
    <meta property="og:description" content="@yield('og-description', 'Sistem pemantauan kesehatan dan manajemen jamu terintegrasi')">
    <meta property="og:image" content="@yield('og-image', asset('assets/images/og-image.jpg'))">
    <meta property="og:locale" content="id_ID">

    {{-- Structured Data --}}
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "@yield('schema-type', 'WebSite')",
            "name": "Racik Health Monitoring",
            "url": "{{ url('/') }}",
            "description": "Sistem pemantauan kesehatan dan manajemen jamu terintegrasi",
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
    <meta name="robots" content="@yield('robots', 'index, follow')">

    <title>@yield('title')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-inter">
    {{-- Header --}}
    <x-dashboard.dashboard-header />

    {{-- Breadcrumb --}}
    <x-dashboard.dashboard-breadcrumb />

    {{-- Sidebar --}}
    <x-dashboard.dashboard-sidebar />

    {{-- Content --}}
    <div class="w-full lg:ps-64">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            @yield('content')
        </div>
    </div>

    {{-- Scripts --}}
    @stack('scripts')
</body>

</html>
