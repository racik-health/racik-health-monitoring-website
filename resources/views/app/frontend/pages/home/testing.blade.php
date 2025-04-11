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
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Protest+Guerrilla&display=swap"
        rel="stylesheet">

    {{-- Sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- Boxicons --}}
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    {{-- Lucide Icons --}}
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

    {{-- AOS Animation Library --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary-color: #a0430a;
            --primary-dark: #7c3207;
            --primary-light: #d57236;
            --accent-color: #e65c00;
            --text-dark: #2e1a0f;
            --text-light: #a86b52;
            --background-light: #f8f4f2;
            --background-dark: #3b2213;
        }


        .bg-mint-leaf {
            background-color: var(--background-light);
        }

        .bg-primary {
            background-color: var(--primary-color);
        }

        .bg-accent {
            background-color: var(--accent-color);
        }

        .text-primary {
            color: var(--primary-color);
        }

        .text-accent {
            color: var(--accent-color);
        }

        .border-primary {
            border-color: var(--primary-color);
        }

        .hover\:bg-primary:hover {
            background-color: var(--primary-color);
        }

        .hover\:bg-primary-dark:hover {
            background-color: var(--primary-dark);
        }

        .hover\:text-primary:hover {
            color: var(--primary-color);
        }

        .brew-brown {
            color: var(--accent-color);
        }

        .bg-brew-brown {
            background-color: var(--accent-color);
        }

        .border-brew-brown {
            border-color: var(--accent-color);
        }

        .hover\:bg-brew-brown:hover {
            background-color: var(--accent-color);
        }

        .hover\:text-brew-brown:hover {
            color: var(--accent-color);
        }

        /* Custom animations */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--background-light);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        /* Gradient text */
        .gradient-text {
            background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* Glass effect */
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }

        /* Feature card hover effect */
        .feature-card {
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Team card hover effect */
        .team-card {
            transition: all 0.3s ease;
        }

        .team-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        /* Social icon hover effect */
        .social-icon {
            transition: all 0.3s ease;
        }

        .social-icon:hover {
            transform: translateY(-3px);
            color: var(--primary-color);
        }

        /* Navbar scroll effect */
        .navbar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            z-index: 1000;
        }
    </style>
</head>

<body class="bg-mint-leaf min-h-screen overflow-x-hidden font-poppins">
    <!-- Decorative elements -->
    <div class="fixed top-20 left-0 w-12 h-12 md:w-16 md:h-16 hidden lg:block opacity-20">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full text-primary">
            <path fill="currentColor"
                d="M44.7,-76.4C58.8,-69.2,71.8,-59.1,79.6,-45.8C87.4,-32.6,90,-16.3,88.5,-1.5C87,13.3,81.4,26.6,73.6,38.6C65.8,50.6,55.9,61.3,43.7,70.3C31.4,79.4,15.7,86.7,0.4,86.1C-14.9,85.5,-29.8,77,-43.3,67.7C-56.8,58.4,-68.9,48.4,-77.1,35.9C-85.3,23.4,-89.6,8.5,-88.4,-6.2C-87.3,-20.9,-80.7,-35.5,-70.8,-47.8C-60.9,-60.1,-47.7,-70.1,-33.8,-77.3C-19.9,-84.6,-5.3,-89.1,8.9,-86.1C23.1,-83.1,46.2,-72.7,44.7,-76.4Z"
                transform="translate(100 100)" />
        </svg>
    </div>
    <div class="fixed top-1/2 right-0 w-20 h-20 md:w-32 md:h-32 hidden lg:block opacity-10">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full text-accent">
            <path fill="currentColor"
                d="M39.9,-65.7C54.1,-60,69.5,-53.8,77.9,-42.1C86.3,-30.5,87.6,-13.2,85.4,3C83.2,19.2,77.5,34.4,68.2,46.9C58.9,59.4,46,69.2,31.6,75.3C17.1,81.4,1.1,83.8,-14.9,81.7C-30.9,79.6,-46.9,73,-58.3,61.6C-69.7,50.2,-76.5,34,-79.8,17.2C-83.1,0.4,-82.9,-16.9,-76.8,-31.4C-70.7,-45.9,-58.7,-57.5,-45,-64.4C-31.3,-71.3,-15.7,-73.5,-1.2,-71.5C13.2,-69.5,26.5,-63.3,39.9,-65.7Z"
                transform="translate(100 100)" />
        </svg>
    </div>
    <div class="fixed bottom-20 left-10 w-16 h-16 md:w-24 md:h-24 hidden lg:block opacity-15">
        <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" class="w-full h-full text-primary">
            <path fill="currentColor"
                d="M47.7,-79.1C62.9,-71.9,77.1,-61.3,83.9,-47.1C90.7,-32.9,90.1,-15,87.6,2C85.2,19,80.8,35.9,71.6,49.8C62.4,63.7,48.3,74.5,32.9,79.7C17.5,84.9,0.7,84.5,-15.8,80.8C-32.3,77.2,-48.5,70.3,-62.4,59.1C-76.3,47.9,-87.9,32.4,-91.7,15C-95.5,-2.4,-91.5,-21.7,-83.2,-38.2C-74.9,-54.8,-62.3,-68.5,-47.2,-75.8C-32.1,-83.1,-14.5,-84,1.8,-87C18.1,-90,36.2,-95.1,47.7,-79.1Z"
                transform="translate(100 100)" />
        </svg>
    </div>

    <!-- Navigation -->
    <header id="navbar" class="relative z-50 w-full py-4 md:py-5 transition-all duration-300">
        <div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
            <div class="flex items-center">
                <a href="/" class="text-xl md:text-2xl font-bold italic">
                    <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" width="120" height="40"
                        alt="Racik" class="h-10 md:h-12" loading="lazy">
                </a>
            </div>
            <!-- Mobile menu button -->
            <button id="mobile-menu-button" class="md:hidden flex items-center text-primary">
                <i data-lucide="menu" class="w-7 h-7"></i>
            </button>
            <!-- Desktop navigation -->
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#" class="text-text-dark hover:text-primary transition-colors duration-300 font-medium">
                    Beranda
                </a>
                <a href="#fitur" class="text-text-dark hover:text-primary transition-colors duration-300 font-medium">
                    Fitur
                </a>
                <a href="#tentang" class="text-text-dark hover:text-primary transition-colors duration-300 font-medium">
                    Tentang
                </a>
                <a href="#kontak" class="text-text-dark hover:text-primary transition-colors duration-300 font-medium">
                    Kontak
                </a>
                <a href="#"
                    class="bg-primary text-white px-6 py-2 rounded-full hover:bg-primary-dark transition-colors duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    Daftar
                </a>
            </nav>
            <!-- Mobile navigation -->
            <div id="mobile-menu"
                class="fixed inset-0 bg-white z-50 flex flex-col items-center justify-center space-y-8 hidden">
                <button id="close-menu-button" class="absolute top-6 right-6 text-primary">
                    <i data-lucide="x" class="w-7 h-7"></i>
                </button>
                <a href="#"
                    class="text-2xl text-text-dark hover:text-primary transition-colors duration-300 font-medium">
                    Beranda
                </a>
                <a href="#fitur"
                    class="text-2xl text-text-dark hover:text-primary transition-colors duration-300 font-medium">
                    Fitur
                </a>
                <a href="#tentang"
                    class="text-2xl text-text-dark hover:text-primary transition-colors duration-300 font-medium">
                    Tentang
                </a>
                <a href="#kontak"
                    class="text-2xl text-text-dark hover:text-primary transition-colors duration-300 font-medium">
                    Kontak
                </a>
                <a href="#"
                    class="bg-primary text-white px-8 py-3 rounded-full hover:bg-primary-dark transition-colors duration-300 font-medium text-xl shadow-lg">
                    Daftar
                </a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="relative z-10 container mx-auto px-4 pt-16 md:pt-24 pb-16 md:pb-32">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-12 md:mb-0" data-aos="fade-right" data-aos-duration="1000">
                <div class="relative">
                    <div class="absolute -top-10 -left-10 w-32 h-32 bg-primary rounded-full opacity-10 blur-2xl"></div>
                    <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-accent rounded-full opacity-10 blur-3xl">
                    </div>
                    <span
                        class="inline-block px-4 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">Inovasi
                        Kesehatan</span>
                    <h1
                        class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight mb-6 md:mb-8 relative z-10 gradient-text">
                        Dispenser Otomatis dengan Analisis Kesehatan
                    </h1>
                    <p class="text-base md:text-lg text-text-light mb-8 md:mb-10 max-w-lg relative z-10">
                        Nikmati manfaat jamu dengan perawatan cerdas. Dengan teknologi IoT dan AI, kami membantu Anda
                        mendapatkan solusi kesehatan yang personal dan akurat.
                    </p>
                    <div class="flex flex-wrap gap-4 relative z-10">
                        <a href="#fitur"
                            class="bg-primary text-white px-6 py-3 rounded-full hover:bg-primary-dark transition-all duration-300 text-base font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                            Jelajahi Fitur
                        </a>
                        <button
                            class="flex items-center gap-2 border-2 border-primary text-primary px-6 py-3 rounded-full hover:bg-primary hover:text-white transition-all duration-300 text-base font-medium group">
                            <div
                                class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white group-hover:bg-white group-hover:text-primary transition-all duration-300">
                                <i data-lucide="play" class="w-4 h-4"></i>
                            </div>
                            <span>Lihat Video</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 relative" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 md:w-80 md:h-80 bg-primary rounded-full opacity-10 blur-3xl">
                </div>
                <div class="relative z-10 floating">
                    <img src="{{ asset('assets/images/frontend/home/dispenser-racik-3d.webp') }}" width="600"
                        height="300" alt="Racik Dispenser"
                        class="mx-auto w-full max-w-[400px] md:max-w-[500px] drop-shadow-2xl" loading="lazy">
                </div>
            </div>
        </div>

        <!-- Stats Section -->
        <div class="mt-16 md:mt-24 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8" data-aos="fade-up"
            data-aos-duration="1000">
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">500+</div>
                <p class="text-text-light">Pengguna Aktif</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">98%</div>
                <p class="text-text-light">Tingkat Kepuasan</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">24/7</div>
                <p class="text-text-light">Dukungan Teknis</p>
            </div>
            <div class="bg-white rounded-2xl p-6 shadow-lg text-center">
                <div class="text-3xl md:text-4xl font-bold text-primary mb-2">50+</div>
                <p class="text-text-light">Resep Jamu</p>
            </div>
        </div>
    </section>

    <!-- Video Player Section -->
    <section class="relative z-10 container mx-auto px-4 py-16 md:py-24" data-aos="fade-up" data-aos-duration="1000">
        <div class="text-center mb-12">
            <span
                class="inline-block px-4 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">Lihat
                Cara Kerjanya</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Racik dalam Aksi</h2>
            <p class="text-text-light max-w-2xl mx-auto">Saksikan bagaimana Racik dapat membantu Anda mengelola
                kesehatan dengan teknologi canggih dan ramah pengguna.</p>
        </div>
        <div class="max-w-4xl mx-auto">
            <div class="relative aspect-video bg-black rounded-2xl overflow-hidden shadow-2xl">
                <!-- Embedded YouTube video -->
                <iframe class="absolute inset-0 w-full h-full"
                    src="https://www.youtube.com/embed/TmYQjgh18I4?si=3fMFtjCGgJGlejxc" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen referrerpolicy="strict-origin-when-cross-origin">
                </iframe>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fitur" class="relative z-10 container mx-auto px-4 py-16 md:py-24">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <span
                class="inline-block px-4 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">Fitur
                Unggulan</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Kenapa Memilih Racik?</h2>
            <p class="text-text-light max-w-2xl mx-auto">Racik hadir dengan berbagai fitur inovatif yang memudahkan
                Anda mengelola kesehatan dengan jamu tradisional.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Feature 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg feature-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="100">
                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="activity" class="w-7 h-7 text-primary"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Monitoring Real-Time</h3>
                <p class="text-text-light">Pantau konsumsi jamu dan kondisi kesehatan Anda secara real-time melalui
                    aplikasi yang intuitif.</p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg feature-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="200">
                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="bar-chart-2" class="w-7 h-7 text-primary"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Laporan Konsumsi</h3>
                <p class="text-text-light">Dapatkan laporan detail tentang pola konsumsi jamu dan efeknya terhadap
                    kesehatan Anda.</p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg feature-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="300">
                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="sparkles" class="w-7 h-7 text-primary"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Rekomendasi Jamu</h3>
                <p class="text-text-light">Terima rekomendasi jamu yang dipersonalisasi berdasarkan hasil analisis
                    kesehatan Anda.</p>
            </div>

            <!-- Feature 4 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg feature-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="400">
                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="mic" class="w-7 h-7 text-primary"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Voice Control</h3>
                <p class="text-text-light">Kendalikan dispenser jamu Anda dengan perintah suara untuk pengalaman yang
                    lebih nyaman.</p>
            </div>

            <!-- Feature 5 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg feature-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="500">
                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="shield" class="w-7 h-7 text-primary"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Keamanan Data</h3>
                <p class="text-text-light">Data kesehatan Anda dilindungi dengan enkripsi tingkat tinggi untuk menjaga
                    privasi.</p>
            </div>

            <!-- Feature 6 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg feature-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="600">
                <div class="w-14 h-14 bg-primary bg-opacity-10 rounded-2xl flex items-center justify-center mb-6">
                    <i data-lucide="smartphone" class="w-7 h-7 text-primary"></i>
                </div>
                <h3 class="text-xl font-bold mb-3">Aplikasi Mobile</h3>
                <p class="text-text-light">Akses semua fitur Racik dari mana saja melalui aplikasi mobile yang
                    responsif.</p>
            </div>
        </div>

        <!-- App Preview -->
        <div class="mt-20 flex flex-col md:flex-row items-center gap-10 md:gap-16">
            <div class="md:w-1/2" data-aos="fade-right" data-aos-duration="1000">
                <span
                    class="inline-block px-4 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">Aplikasi
                    Mobile</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Kontrol di Genggaman Anda</h2>
                <p class="text-text-light mb-8">Aplikasi Racik memberikan Anda kendali penuh atas dispenser jamu dan
                    data kesehatan Anda. Pantau, analisis, dan optimalkan kesehatan Anda dengan mudah.</p>

                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div
                            class="w-6 h-6 rounded-full bg-primary flex items-center justify-center mt-1 flex-shrink-0">
                            <i data-lucide="check" class="w-4 h-4 text-white"></i>
                        </div>
                        <p>Dashboard kesehatan yang komprehensif</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div
                            class="w-6 h-6 rounded-full bg-primary flex items-center justify-center mt-1 flex-shrink-0">
                            <i data-lucide="check" class="w-4 h-4 text-white"></i>
                        </div>
                        <p>Notifikasi pengingat konsumsi jamu</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div
                            class="w-6 h-6 rounded-full bg-primary flex items-center justify-center mt-1 flex-shrink-0">
                            <i data-lucide="check" class="w-4 h-4 text-white"></i>
                        </div>
                        <p>Integrasi dengan perangkat kesehatan lainnya</p>
                    </div>
                    <div class="flex items-start gap-3">
                        <div
                            class="w-6 h-6 rounded-full bg-primary flex items-center justify-center mt-1 flex-shrink-0">
                            <i data-lucide="check" class="w-4 h-4 text-white"></i>
                        </div>
                        <p>Komunitas pengguna Racik</p>
                    </div>
                </div>

                <div class="mt-8 flex gap-4">
                    <a href="#"
                        class="flex items-center gap-2 bg-black text-white px-4 py-2 rounded-xl hover:bg-gray-800 transition-colors duration-300">
                        <i data-lucide="apple" class="w-6 h-6"></i>
                        <div>
                            <div class="text-xs">Download on the</div>
                            <div class="text-sm font-semibold">App Store</div>
                        </div>
                    </a>
                    <a href="#"
                        class="flex items-center gap-2 bg-black text-white px-4 py-2 rounded-xl hover:bg-gray-800 transition-colors duration-300">
                        <i data-lucide="play" class="w-6 h-6"></i>
                        <div>
                            <div class="text-xs">Get it on</div>
                            <div class="text-sm font-semibold">Google Play</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="md:w-1/2 relative" data-aos="fade-left" data-aos-duration="1000">
                <div
                    class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-primary rounded-full opacity-10 blur-3xl">
                </div>
                <img src="{{ asset('images/smartphone.png') }}" width="300" height="600" alt="Racik App"
                    class="mx-auto w-[250px] md:w-[300px] drop-shadow-2xl relative z-10" loading="lazy">
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section id="tentang" class="relative z-10 container mx-auto px-4 py-16 md:py-24">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <span
                class="inline-block px-4 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">Tim
                Kami</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Bertemu dengan Para Inovator</h2>
            <p class="text-text-light max-w-2xl mx-auto">Kami adalah tim yang berdedikasi untuk menghadirkan solusi
                kesehatan inovatif melalui perpaduan teknologi dan kearifan lokal.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg team-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="100">
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-primary bg-opacity-20 rounded-full mb-6 overflow-hidden">
                        <div class="w-full h-full bg-gray-400 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-bold mb-1">Nibras</h3>
                    <p class="text-primary font-medium mb-4">UI Designer</p>
                    <p class="text-text-light text-center mb-6">
                        Dengan passion untuk warna dan kecintaan pada desain yang bersih, Nibras membawa semua impian
                        desain liar kami menjadi kenyataan.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="twitter" class="w-5 h-5 text-gray-600"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="dribbble" class="w-5 h-5 text-gray-600"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="linkedin" class="w-5 h-5 text-gray-600"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg team-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="200">
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-primary bg-opacity-20 rounded-full mb-6 overflow-hidden">
                        <div class="w-full h-full bg-red-500 rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-bold mb-1">Salman</h3>
                    <p class="text-primary font-medium mb-4">Product Designer</p>
                    <p class="text-text-light text-center mb-6">
                        Salman memiliki ketelitian terhadap detail dan kemampuan untuk mengubah antarmuka yang
                        membosankan menjadi karya seni.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="twitter" class="w-5 h-5 text-gray-600"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="dribbble" class="w-5 h-5 text-gray-600"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="linkedin" class="w-5 h-5 text-gray-600"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Team Member 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg team-card" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="300">
                <div class="flex flex-col items-center">
                    <div class="w-24 h-24 bg-primary bg-opacity-20 rounded-full mb-6 overflow-hidden">
                        <div class="w-full h-full bg-[#3a0c0c] rounded-full"></div>
                    </div>
                    <h3 class="text-xl font-bold mb-1">Alwy</h3>
                    <p class="text-primary font-medium mb-4">UI Designer</p>
                    <p class="text-text-light text-center mb-6">
                        Pemimpin dalam pengalaman pengguna yang luar biasa. Alwy adalah ahli dalam membuat segala
                        sesuatu menjadi intuitif.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="twitter" class="w-5 h-5 text-gray-600"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="dribbble" class="w-5 h-5 text-gray-600"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="linkedin" class="w-5 h-5 text-gray-600"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="relative z-10 container mx-auto px-4 py-16 md:py-24">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <span
                class="inline-block px-4 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">Testimoni</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Apa Kata Pengguna Kami</h2>
            <p class="text-text-light max-w-2xl mx-auto">Dengarkan pengalaman langsung dari pengguna Racik yang telah
                merasakan manfaat dari sistem pemantauan kesehatan kami.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Testimonial 1 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="100">
                <div class="flex items-center mb-6">
                    <div class="text-accent">
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                    </div>
                </div>
                <p class="text-text-dark mb-6 italic">"Racik telah mengubah cara saya menjaga kesehatan. Saya bisa
                    memantau konsumsi jamu saya dan melihat dampaknya terhadap kesehatan saya secara real-time."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-bold">Budi Santoso</h4>
                        <p class="text-sm text-text-light">Pengguna Racik sejak 2023</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="200">
                <div class="flex items-center mb-6">
                    <div class="text-accent">
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                    </div>
                </div>
                <p class="text-text-dark mb-6 italic">"Sebagai dokter, saya merekomendasikan Racik kepada pasien saya
                    yang ingin mengintegrasikan jamu tradisional ke dalam rejimen kesehatan mereka. Sistemnya sangat
                    komprehensif."</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-bold">Dr. Siti Rahayu</h4>
                        <p class="text-sm text-text-light">Dokter Umum</p>
                    </div>
                </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="bg-white rounded-2xl p-8 shadow-lg" data-aos="fade-up" data-aos-duration="1000"
                data-aos-delay="300">
                <div class="flex items-center mb-6">
                    <div class="text-accent">
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star" class="w-5 h-5 inline-block"></i>
                        <i data-lucide="star-half" class="w-5 h-5 inline-block"></i>
                    </div>
                </div>
                <p class="text-text-dark mb-6 italic">"Fitur voice control sangat memudahkan saya yang sering sibuk.
                    Saya bisa menyiapkan jamu sambil melakukan aktivitas lain. Teknologi yang benar-benar membantu!"</p>
                <div class="flex items-center">
                    <div class="w-12 h-12 bg-gray-300 rounded-full mr-4"></div>
                    <div>
                        <h4 class="font-bold">Rina Wijaya</h4>
                        <p class="text-sm text-text-light">Pengusaha</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="relative z-10 container mx-auto px-4 py-16 md:py-24" data-aos="fade-up" data-aos-duration="1000">
        <div
            class="bg-gradient-to-r from-primary to-accent text-white rounded-3xl p-8 md:p-12 overflow-hidden relative">
            <div
                class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -translate-y-1/2 translate-x-1/2">
            </div>
            <div
                class="absolute bottom-0 left-0 w-64 h-64 bg-white opacity-10 rounded-full translate-y-1/2 -translate-x-1/2">
            </div>

            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8 text-dark">
                <div class="md:w-2/3">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Sudahkah anda minum jamu hari ini?</h2>
                    <p class="text-dark text-opacity-90 mb-6 md:mb-0 max-w-xl">Jaga kesehatan Anda dengan konsumsi
                        jamu secara teratur. Racik membantu Anda memantau dan mengoptimalkan manfaat jamu untuk
                        kesehatan yang lebih baik.</p>
                </div>
                <div class="md:w-1/3 flex flex-col items-center">
                    <button
                        class="bg-white text-primary px-8 py-4 rounded-full hover:bg-opacity-90 transition-all duration-300 text-lg font-bold shadow-lg transform hover:-translate-y-1 mb-4 w-full md:w-auto text-center">
                        Minum Sekarang
                    </button>
                    <a href="#"
                        class="text-dark underline hover:text-dark hover:opacity-80 transition-colors duration-300">Pelajari
                        lebih lanjut</a>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="relative z-10 container mx-auto px-4 py-16 md:py-24">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <span
                class="inline-block px-4 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">FAQ</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Pertanyaan yang Sering Diajukan</h2>
            <p class="text-text-light max-w-2xl mx-auto">Temukan jawaban untuk pertanyaan umum tentang Racik dan cara
                kerjanya.</p>
        </div>

        <div class="max-w-3xl mx-auto space-y-6" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
            <!-- FAQ Item 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <button class="flex justify-between items-center w-full text-left" onclick="toggleFaq(this)">
                    <h3 class="text-lg font-bold">Bagaimana cara kerja dispenser Racik?</h3>
                    <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform duration-300"></i>
                </button>
                <div class="mt-4 hidden">
                    <p class="text-text-light">Dispenser Racik menggunakan teknologi IoT untuk memantau dan mengatur
                        konsumsi jamu Anda. Dispenser akan menyiapkan jamu sesuai dengan resep yang telah diprogram, dan
                        data konsumsi akan dikirim ke aplikasi untuk analisis lebih lanjut.</p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <button class="flex justify-between items-center w-full text-left" onclick="toggleFaq(this)">
                    <h3 class="text-lg font-bold">Apakah Racik aman untuk digunakan?</h3>
                    <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform duration-300"></i>
                </button>
                <div class="mt-4 hidden">
                    <p class="text-text-light">Ya, Racik dirancang dengan memperhatikan keamanan pengguna. Semua bahan
                        yang digunakan dalam dispenser kami aman untuk kontak dengan makanan dan minuman. Selain itu,
                        data kesehatan Anda dilindungi dengan enkripsi tingkat tinggi.</p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <button class="flex justify-between items-center w-full text-left" onclick="toggleFaq(this)">
                    <h3 class="text-lg font-bold">Bagaimana cara membersihkan dispenser Racik?</h3>
                    <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform duration-300"></i>
                </button>
                <div class="mt-4 hidden">
                    <p class="text-text-light">Dispenser Racik dilengkapi dengan fitur self-cleaning yang dapat
                        diaktifkan melalui aplikasi. Untuk pembersihan manual, Anda dapat mengikuti panduan yang
                        tersedia di aplikasi atau manual pengguna.</p>
                </div>
            </div>

            <!-- FAQ Item 4 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <button class="flex justify-between items-center w-full text-left" onclick="toggleFaq(this)">
                    <h3 class="text-lg font-bold">Apakah Racik tersedia di luar Indonesia?</h3>
                    <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform duration-300"></i>
                </button>
                <div class="mt-4 hidden">
                    <p class="text-text-light">Saat ini, Racik hanya tersedia di Indonesia. Namun, kami berencana untuk
                        memperluas jangkauan kami ke negara-negara Asia Tenggara lainnya dalam waktu dekat.</p>
                </div>
            </div>

            <!-- FAQ Item 5 -->
            <div class="bg-white rounded-2xl p-6 shadow-lg">
                <button class="flex justify-between items-center w-full text-left" onclick="toggleFaq(this)">
                    <h3 class="text-lg font-bold">Bagaimana cara mendapatkan dukungan teknis?</h3>
                    <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform duration-300"></i>
                </button>
                <div class="mt-4 hidden">
                    <p class="text-text-light">Anda dapat menghubungi tim dukungan kami melalui aplikasi, email di
                        support@racik.my.id, atau menghubungi hotline kami di +62(0) 5030-1156-7. Tim kami siap membantu
                        Anda 24/7.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="relative z-10 container mx-auto px-4 py-16 md:py-24">
        <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
            <span
                class="inline-block px-4 py-1 bg-primary bg-opacity-10 text-primary rounded-full text-sm font-medium mb-4">Kontak</span>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Hubungi Kami</h2>
            <p class="text-text-light max-w-2xl mx-auto">Ada pertanyaan atau masukan? Jangan ragu untuk menghubungi
                kami. Tim kami siap membantu Anda.</p>
        </div>

        <div class="bg-white rounded-3xl p-8 md:p-10 shadow-xl" data-aos="fade-up" data-aos-duration="1000"
            data-aos-delay="100">
            <div class="flex flex-col lg:flex-row gap-10 lg:gap-16">
                <div class="lg:w-1/3">
                    <h3 class="text-2xl font-bold mb-6">Informasi Kontak</h3>

                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i data-lucide="phone" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Telepon</h4>
                                <p class="text-text-light">+62(0) 5030-1156-7</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i data-lucide="mail" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Email</h4>
                                <p class="text-text-light">hello@racik.my.id</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-4">
                            <div
                                class="w-12 h-12 bg-primary bg-opacity-10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i data-lucide="map-pin" class="w-6 h-6 text-primary"></i>
                            </div>
                            <div>
                                <h4 class="font-bold mb-1">Alamat</h4>
                                <p class="text-text-light">Jl. Teknologi No. 123, Jakarta Selatan, Indonesia</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-10">
                        <h4 class="font-bold mb-4">Ikuti Kami</h4>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center social-icon">
                                <i data-lucide="instagram" class="w-5 h-5 text-primary"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center social-icon">
                                <i data-lucide="facebook" class="w-5 h-5 text-primary"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center social-icon">
                                <i data-lucide="linkedin" class="w-5 h-5 text-primary"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center social-icon">
                                <i data-lucide="twitter" class="w-5 h-5 text-primary"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="lg:w-2/3">
                    <h3 class="text-2xl font-bold mb-6">Kirim Pesan</h3>

                    <form action="" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label for="name" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                                <input type="text" id="name" name="name"
                                    placeholder="Masukkan nama lengkap Anda"
                                    class="w-full p-3 border border-gray-200 rounded-xl text-base focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium mb-2">Email</label>
                                <input type="email" id="email" name="email"
                                    placeholder="Masukkan email Anda"
                                    class="w-full p-3 border border-gray-200 rounded-xl text-base focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="subject" class="block text-sm font-medium mb-2">Subjek</label>
                            <input type="text" id="subject" name="subject" placeholder="Masukkan subjek pesan"
                                class="w-full p-3 border border-gray-200 rounded-xl text-base focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-sm font-medium mb-2">Pesan</label>
                            <textarea id="message" name="message" rows="5" placeholder="Tulis pesan Anda di sini"
                                class="w-full p-3 border border-gray-200 rounded-xl text-base focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none"></textarea>
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-primary text-white px-8 py-3 rounded-xl hover:bg-primary-dark transition-colors duration-300 font-medium shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                Kirim Pesan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative z-10 bg-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <div>
                    <a href="/" class="inline-block mb-6">
                        <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" width="120"
                            height="40" alt="Racik" class="h-10" loading="lazy">
                    </a>
                    <p class="text-text-light mb-6">Racik adalah sistem Health Monitoring berbasis IoT untuk pemantauan
                        konsumsi jamu, manajemen resep herbal, dan pelacakan data kesehatan secara real-time.</p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="instagram" class="w-5 h-5 text-primary"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="facebook" class="w-5 h-5 text-primary"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="linkedin" class="w-5 h-5 text-primary"></i>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-primary bg-opacity-10 rounded-full flex items-center justify-center social-icon">
                            <i data-lucide="twitter" class="w-5 h-5 text-primary"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6">Tautan Cepat</h3>
                    <ul class="space-y-4">
                        <li><a href="#"
                                class="text-text-light hover:text-primary transition-colors duration-300">Beranda</a>
                        </li>
                        <li><a href="#fitur"
                                class="text-text-light hover:text-primary transition-colors duration-300">Fitur</a>
                        </li>
                        <li><a href="#tentang"
                                class="text-text-light hover:text-primary transition-colors duration-300">Tentang
                                Kami</a></li>
                        <li><a href="#kontak"
                                class="text-text-light hover:text-primary transition-colors duration-300">Kontak</a>
                        </li>
                        <li><a href="#"
                                class="text-text-light hover:text-primary transition-colors duration-300">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6">Layanan</h3>
                    <ul class="space-y-4">
                        <li><a href="#"
                                class="text-text-light hover:text-primary transition-colors duration-300">Monitoring
                                Kesehatan</a></li>
                        <li><a href="#"
                                class="text-text-light hover:text-primary transition-colors duration-300">Resep
                                Jamu</a></li>
                        <li><a href="#"
                                class="text-text-light hover:text-primary transition-colors duration-300">Konsultasi
                                Kesehatan</a></li>
                        <li><a href="#"
                                class="text-text-light hover:text-primary transition-colors duration-300">Dukungan
                                Teknis</a></li>
                        <li><a href="#"
                                class="text-text-light hover:text-primary transition-colors duration-300">Pemeliharaan
                                Dispenser</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-6">Berlangganan</h3>
                    <p class="text-text-light mb-4">Dapatkan berita dan pembaruan terbaru dari Racik.</p>
                    <form action="" method="POST" class="mb-4">
                        @csrf
                        <div class="flex">
                            <input type="email" name="subscribe_email" placeholder="Email Anda"
                                class="flex-1 p-3 border border-gray-200 rounded-l-xl text-base focus:border-primary focus:ring-1 focus:ring-primary focus:outline-none">
                            <button type="submit"
                                class="bg-primary text-white px-4 py-3 rounded-r-xl hover:bg-primary-dark transition-colors duration-300">
                                <i data-lucide="send" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </form>
                    <p class="text-text-light text-sm">Dengan berlangganan, Anda menyetujui <a href="#"
                            class="text-primary">Kebijakan Privasi</a> kami.</p>
                </div>
            </div>

            <div class="border-t border-gray-200 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-text-light text-sm mb-4 md:mb-0">© {{ date('Y') }} Racik. Dibuat dengan ❤️ oleh
                        Tim Pencari Tuhan</p>
                    <div class="flex space-x-6">
                        <a href="#"
                            class="text-text-light hover:text-primary transition-colors duration-300 text-sm">Syarat &
                            Ketentuan</a>
                        <a href="#"
                            class="text-text-light hover:text-primary transition-colors duration-300 text-sm">Kebijakan
                            Privasi</a>
                        <a href="#"
                            class="text-text-light hover:text-primary transition-colors duration-300 text-sm">Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-6 right-6 w-12 h-12 bg-primary rounded-full flex items-center justify-center text-white shadow-lg z-50 opacity-0 invisible transition-all duration-300">
        <i data-lucide="chevron-up" class="w-6 h-6"></i>
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            lucide.createIcons();

            // Initialize AOS animations
            AOS.init({
                once: true,
                disable: 'mobile'
            });

            // Mobile menu functionality
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMenuButton = document.getElementById('close-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');

            mobileMenuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            });

            closeMenuButton.addEventListener('click', function() {
                mobileMenu.classList.add('hidden');
                document.body.style.overflow = '';
            });

            // Close mobile menu when clicking on a link
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('hidden');
                    document.body.style.overflow = '';
                });
            });

            // Navbar scroll effect
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('navbar-fixed');
                } else {
                    navbar.classList.remove('navbar-fixed');
                }
            });

            // Back to top button
            const backToTopButton = document.getElementById('back-to-top');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopButton.classList.remove('opacity-0', 'invisible');
                    backToTopButton.classList.add('opacity-100', 'visible');
                } else {
                    backToTopButton.classList.add('opacity-0', 'invisible');
                    backToTopButton.classList.remove('opacity-100', 'visible');
                }
            });

            backToTopButton.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });

            // FAQ toggle functionality
            window.toggleFaq = function(button) {
                const content = button.nextElementSibling;
                const icon = button.querySelector('i');

                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-180');
                } else {
                    content.classList.add('hidden');
                    icon.classList.remove('rotate-180');
                }
            };

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    const targetId = this.getAttribute('href');
                    if (targetId === '#') return;

                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        window.scrollTo({
                            top: targetElement.offsetTop - 100,
                            behavior: 'smooth'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
