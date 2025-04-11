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

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-mint-leaf min-h-screen overflow-x-hidden font-poppins">
    <!-- Decorative elements - responsive positioning -->
    {{-- <div class="absolute top-20 left-0 w-12 h-12 md:w-16 md:h-16 hidden sm:block">
        <img src="{{ asset('images/decorative-1.svg') }}" width="64" height="64" alt=""
            class="opacity-70 w-full h-full" loading="lazy">
    </div>
    <div class="absolute top-80 right-10 w-12 h-12 md:w-16 md:h-16 hidden sm:block">
        <img src="{{ asset('images/decorative-2.svg') }}" width="64" height="64" alt=""
            class="opacity-70 w-full h-full" loading="lazy">
    </div>
    <div class="absolute bottom-40 left-10 w-12 h-12 md:w-16 md:h-16 hidden sm:block">
        <img src="{{ asset('images/decorative-3.svg') }}" width="64" height="64" alt=""
            class="opacity-70 w-full h-full" loading="lazy">
    </div>
    <div class="absolute bottom-80 right-0 w-12 h-12 md:w-16 md:h-16 hidden sm:block">
        <img src="{{ asset('images/decorative-4.svg') }}" width="64" height="64" alt=""
            class="opacity-70 w-full h-full" loading="lazy">
    </div> --}}
    <!-- Navigation -->
    <header class="relative z-20 container mx-auto px-4 py-4 md:py-6 flex justify-between items-center">
        <div class="flex items-center">
            <a href="/" class="text-xl md:text-2xl font-bold italic">
                <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" width="120" height="40"
                    alt="Racik" class="h-8 md:h-10" loading="lazy">
            </a>
        </div>
        <!-- Mobile menu button -->
        <button id="mobile-menu-button" class="md:hidden flex items-center">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        <!-- Desktop navigation -->
        <nav class="hidden md:flex items-center space-x-8">
            <a href="#" class="text-black hover:text-brew-brown">
                Beranda
            </a>
            <a href="#fitur" class="text-black hover:text-brew-brown">
                Fitur
            </a>
            <a href="#tentang" class="text-black hover:text-brew-brown">
                Tentang
            </a>
            <a href="#" class="bg-black text-white px-4 py-1 rounded-full hover:bg-brew-brown transition">
                Daftar
            </a>
        </nav>
        <!-- Mobile navigation -->
        <div id="mobile-menu"
            class="fixed inset-0 bg-[#e0ebe8] z-50 flex flex-col items-center justify-center space-y-8 hidden">
            <button id="close-menu-button" class="absolute top-4 right-4">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <a href="#" class="text-xl text-black hover:text-brew-brown">
                Beranda
            </a>
            <a href="#fitur" class="text-xl text-black hover:text-brew-brown">
                Fitur
            </a>
            <a href="#tentang" class="text-xl text-black hover:text-brew-brown">
                Tentang
            </a>
            <a href="#" class="bg-black text-white px-6 py-2 rounded-full hover:bg-brew-brown transition text-xl">
                Daftar
            </a>
        </div>
    </header>
    <!-- Hero Section -->
    <section class="relative z-10 container mx-auto px-4 pt-6 md:pt-10 pb-12 md:pb-20">
        <div class="flex flex-col md:flex-row items-center">
            <div class="md:w-1/2 mb-10 md:mb-0">
                <div class="relative">
                    <!-- Orange blob - responsive size -->
                    {{-- <div
                        class="absolute -top-10 -right-5 md:-top-20 md:-right-10 w-40 h-40 md:w-64 md:h-64 bg-brew-brown rounded-full opacity-80 z-0">
                    </div> --}}
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold leading-tight mb-4 md:mb-6 relative z-10">
                        Dispenser Otomatis dengan Analisis Kesehatan
                    </h1>
                    <p class="text-sm md:text-base text-gray-700 mb-6 md:mb-8 max-w-lg relative z-10">
                        Nikmati manfaat jamu dengan perawatan cerdas. Dengan teknologi IoT dan AI, kami membantu Anda
                        mendapatkan solusi kesehatan yang personal dan akurat.
                    </p>
                    <div class="flex space-x-3 md:space-x-4 relative z-10">
                        <button
                            class="bg-black text-white px-4 py-2 md:px-6 md:py-2 rounded-full hover:bg-brew-brown transition text-sm md:text-base">
                            Explore
                        </button>
                        <button
                            class="flex items-center space-x-1 md:space-x-2 border-2 border-brew-brown text-brew-brown px-3 py-1 md:px-4 md:py-2 rounded-full hover:bg-brew-brown hover:text-white transition text-sm md:text-base">
                            <div class="w-4 h-4 bg-brew-brown rounded-full flex items-center justify-center">
                                <span class="text-white text-xs">▶</span>
                            </div>
                            <span>Lihat Video</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="relative z-10">
                    <img src="{{ asset('assets/images/frontend/home/dispenser-racik-3d.webp') }}" width="600"
                        height="300" alt="Racik Dispenser" class="mx-auto w-full max-w-[300px] md:max-w-[600px]"
                        loading="lazy">
                </div>
            </div>
        </div>
    </section>
    <!-- Video Player Section -->
    <section class="relative z-10 container mx-auto px-4 py-6 md:py-10">
        <div class="max-w-2xl mx-auto">
            <div class="relative aspect-video bg-gray-200 rounded-lg overflow-hidden">
                <!-- Embedded YouTube video -->
                <iframe class="absolute inset-0 w-full h-full"
                    src="https://www.youtube.com/embed/TmYQjgh18I4?si=3fMFtjCGgJGlejxc" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen referrerpolicy="strict-origin-when-cross-origin">
                </iframe>
                <!-- Controls overlay (non-functional, for visual only) -->
                <div
                    class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-80 p-2 flex items-center space-x-4 z-10">
                    <button class="text-white">
                        <i data-lucide="pause" class="w-4 h-4"></i>
                    </button>
                    <button class="text-white">
                        <i data-lucide="skip-back" class="w-4 h-4"></i>
                    </button>
                    <button class="text-white">
                        <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                    </button>
                    <button class="text-white">
                        <i data-lucide="rotate-cw" class="w-4 h-4"></i>
                    </button>
                    <div class="flex-1"></div>
                    <button class="text-white">
                        <i data-lucide="volume-2" class="w-4 h-4"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <!-- Features Section -->
    <section id="fitur" class="relative z-10 container mx-auto px-4 py-10 md:py-16">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/3 mb-8 md:mb-0">
                <div class="relative">
                    <img src="{{ asset('images/smartphone.png') }}" width="200" height="400" alt="Smartphone"
                        class="mx-auto w-[150px] md:w-[200px]" loading="lazy">
                </div>
            </div>
            <div class="md:w-2/3">
                <h2 class="text-2xl md:text-3xl font-bold mb-6 md:mb-8 flex items-center">
                    <span class="text-brew-brown">Fitur</span>
                    <span class="ml-2">Racik</span>
                    <img src="{{ asset('assets/icons/frontend/home/favicon 32x32.png') }}" width="30"
                        height="30" alt="" class="ml-2 w-6 h-6 md:w-8 md:h-8" loading="lazy">
                </h2>
                <div class="grid gap-3 md:gap-4">
                    <div class="bg-white rounded-lg p-2 md:p-3 flex items-center">
                        <div
                            class="w-7 h-7 md:w-8 md:h-8 bg-black rounded flex items-center justify-center mr-2 md:mr-3">
                            <span class="text-white text-xs">1</span>
                        </div>
                        <span class="text-sm md:text-base">Monitoring Dispenser Secara Real-Time</span>
                    </div>
                    <div class="bg-white rounded-lg p-2 md:p-3 flex items-center">
                        <div
                            class="w-7 h-7 md:w-8 md:h-8 bg-black rounded flex items-center justify-center mr-2 md:mr-3">
                            <span class="text-white text-xs">2</span>
                        </div>
                        <span class="text-sm md:text-base">Laporan Konsumsi</span>
                    </div>
                    <div class="bg-white rounded-lg p-2 md:p-3 flex items-center">
                        <div
                            class="w-7 h-7 md:w-8 md:h-8 bg-black rounded flex items-center justify-center mr-2 md:mr-3">
                            <span class="text-white text-xs">3</span>
                        </div>
                        <span class="text-sm md:text-base">Rekomendasi Jamu Berdasarkan Hasil Analisis</span>
                    </div>
                    <div class="bg-white rounded-lg p-2 md:p-3 flex items-center">
                        <div
                            class="w-7 h-7 md:w-8 md:h-8 bg-black rounded flex items-center justify-center mr-2 md:mr-3">
                            <span class="text-white text-xs">4</span>
                        </div>
                        <span class="text-sm md:text-base">Voice Control</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section -->
    <section id="tentang" class="relative z-10 container mx-auto px-4 py-10 md:py-16">
        <h2 class="text-2xl md:text-3xl font-bold mb-6 md:mb-10 text-center">Tim Kami</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 md:gap-6">
            <!-- Team Member 1 -->
            <div class="bg-white rounded-lg p-4 md:p-6 shadow-sm">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-gray-400 rounded-full mb-3 md:mb-4"></div>
                    <h3 class="font-bold text-base md:text-lg mb-1">Nibras</h3>
                    <p class="text-xs md:text-sm text-gray-500 mb-3 md:mb-4">UI Designer</p>
                    <p class="text-xs md:text-sm text-center mb-4 md:mb-6">
                        With a passion for color and a love for clean lines, Sarah brings all our wildest design dreams
                        to life.
                    </p>
                    <div class="flex space-x-3 md:space-x-4">
                        <a href="#" class="text-brew-brown text-xs">
                            Twitter
                        </a>
                        <a href="#" class="text-brew-brown text-xs">
                            Dribbble
                        </a>
                        <a href="#" class="text-brew-brown text-xs">
                            LinkedIn
                        </a>
                    </div>
                </div>
            </div>
            <!-- Team Member 2 -->
            <div class="bg-white rounded-lg p-4 md:p-6 shadow-sm">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-red-500 rounded-full mb-3 md:mb-4"></div>
                    <h3 class="font-bold text-base md:text-lg mb-1">Salman</h3>
                    <p class="text-xs md:text-sm text-gray-500 mb-3 md:mb-4">Product Designer</p>
                    <p class="text-xs md:text-sm text-center mb-4 md:mb-6">
                        Michael's got a thing for detail and the ability to turn any boring interface into a work of
                        art.
                    </p>
                    <div class="flex space-x-3 md:space-x-4">
                        <a href="#" class="text-brew-brown text-xs">
                            Twitter
                        </a>
                        <a href="#" class="text-brew-brown text-xs">
                            Dribbble
                        </a>
                        <a href="#" class="text-brew-brown text-xs">
                            LinkedIn
                        </a>
                    </div>
                </div>
            </div>
            <!-- Team Member 3 -->
            <div class="bg-white rounded-lg p-4 md:p-6 shadow-sm sm:col-span-2 md:col-span-1">
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 md:w-20 md:h-20 bg-[#3a0c0c] rounded-full mb-3 md:mb-4"></div>
                    <h3 class="font-bold text-base md:text-lg mb-1">Alwy</h3>
                    <p class="text-xs md:text-sm text-gray-500 mb-3 md:mb-4">UI Designer</p>
                    <p class="text-xs md:text-sm text-center mb-4 md:mb-6">
                        Leaders in the exceptional behind all the seamless user experience you love. She's a wizard at
                        making things intuitive.
                    </p>
                    <div class="flex space-x-3 md:space-x-4">
                        <a href="#" class="text-brew-brown text-xs">
                            Twitter
                        </a>
                        <a href="#" class="text-brew-brown text-xs">
                            Dribbble
                        </a>
                        <a href="#" class="text-brew-brown text-xs">
                            LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CTA Section -->
    <section class="relative z-10 container mx-auto px-4 py-10 md:py-16">
        <div class="bg-[#1a1a1a] text-white rounded-lg p-6 md:p-8">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 md:mb-6 text-center">Sudahkah anda minum jamu hari ini?</h2>
            <div class="flex justify-center mb-6 md:mb-8">
                <button
                    class="bg-brew-brown text-white px-5 py-2 md:px-6 md:py-2 rounded-full hover:bg-[#a04d1c] transition text-sm md:text-base">
                    Minum
                </button>
            </div>
            <div class="max-w-md mx-auto">
                <img src="{{ asset('images/jamu-illustration.png') }}" width="400" height="200"
                    alt="Jamu Illustration" class="mx-auto w-full max-w-[300px] md:max-w-[400px]" loading="lazy">
            </div>
        </div>
    </section>
    <!-- Contact Section -->
    <section class="relative z-10 container mx-auto px-4 py-10 md:py-16">
        <div class="bg-white rounded-lg p-6 md:p-8 shadow-sm">
            <h2 class="text-2xl md:text-3xl font-bold mb-1 md:mb-2">Hubungi kami!</h2>
            <p class="text-sm md:text-base text-gray-600 mb-6 md:mb-8">Kami siap membantu Anda dengan cepat dan ramah.
            </p>
            <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                <div class="md:w-1/3">
                    <div class="mb-6">
                        <div class="flex items-center mb-2">
                            <span class="mr-2">📞</span>
                            <span class="text-sm md:text-base">+62(0) 5030-1156-7</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <span class="mr-2">📧</span>
                            <span class="text-sm md:text-base">hello@racik.my.id</span>
                        </div>
                    </div>
                    <div>
                        <h3 class="font-bold mb-3 text-sm md:text-base">Hubungi kami</h3>
                        <div class="flex space-x-3">
                            <a href="#"
                                class="w-7 h-7 md:w-8 md:h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-xs md:text-sm">IG</span>
                            </a>
                            <a href="#"
                                class="w-7 h-7 md:w-8 md:h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-xs md:text-sm">FB</span>
                            </a>
                            <a href="#"
                                class="w-7 h-7 md:w-8 md:h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-xs md:text-sm">LI</span>
                            </a>
                            <a href="#"
                                class="w-7 h-7 md:w-8 md:h-8 bg-gray-200 rounded-full flex items-center justify-center">
                                <span class="text-xs md:text-sm">TW</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:w-2/3">
                    <form action="" method="POST">
                        @csrf
                        <div class="mb-4">
                            <input type="text" name="name" placeholder="Full Name"
                                class="w-full p-2 md:p-3 border border-gray-300 rounded-lg text-sm md:text-base focus:border-none focus:outline-brew-brown focus:ring-0">
                        </div>
                        <div class="mb-4">
                            <input type="email" name="email" placeholder="Email"
                                class="w-full p-2 md:p-3 border border-gray-300 rounded-lg text-sm md:text-base focus:border-none focus:outline-brew-brown focus:ring-0">
                        </div>
                        <div class="mb-4">
                            <textarea name="message" placeholder="Message"
                                class="w-full p-2 md:p-3 border border-gray-300 rounded-lg h-24 md:h-32 text-sm md:text-base focus:border-none focus:outline-brew-brown focus:ring-0"></textarea>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-brew-brown text-white px-5 py-2 md:px-6 md:py-2 rounded-full hover:bg-[#a04d1c] transition text-sm md:text-base">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="relative z-10 container mx-auto px-4 py-4 md:py-6 text-center text-xs md:text-sm text-gray-600">
        <p>© {{ date('Y') }} Racik dibuat dengan ❤️ oleh Tim Pencari Tuhan</p>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Lucide icons
            lucide.createIcons();

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
        });
    </script>
</body>

</html>
