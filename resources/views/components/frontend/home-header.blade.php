<header id="navbar" class="relative z-50 w-full py-4 transition-all duration-300">
    <div class="container mx-auto px-4 flex justify-between items-center">
        <div class="flex items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold">
                <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" width="120" height="30"
                    alt="Racik" class="h-9" loading="lazy">
            </a>
        </div>
        {{-- Mobile menu button --}}
        <button id="mobile-menu-button" class="md:hidden flex items-center text-brown-700">
            <i data-lucide="menu" class="w-6 h-6"></i>
        </button>
        {{-- Desktop navigation --}}
        <nav class="hidden md:flex items-center space-x-8">
            <a href="#beranda" class="text-brown-700 hover:text-brown-500 transition-colors duration-300 font-medium">
                Beranda
            </a>
            <a href="#fitur" class="text-brown-700 hover:text-brown-500 transition-colors duration-300 font-medium">
                Fitur
            </a>
            <a href="#tentang" class="text-brown-700 hover:text-brown-500 transition-colors duration-300 font-medium">
                Tentang
            </a>
            <a href="#kontak" class="text-brown-700 hover:text-brown-500 transition-colors duration-300 font-medium">
                Kontak
            </a>
        </nav>
        @unless (Auth::check())
            <a href="{{ route('patient.login') }}"
                class="bg-brown-600 text-white px-6 py-2 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium hidden md:flex items-center space-x-8">
                Masuk
            </a>
        @endunless
        @role('patient')
            <a href="{{ route('patient.dashboard') }}"
                class="bg-brown-600 text-white px-6 py-2 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium hidden md:flex items-center space-x-8">
                Dashboard
            </a>
        @endrole
        @role('admin')
            <a href="{{ route('admin.dashboard') }}"
                class="bg-brown-600 text-white px-6 py-2 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium hidden md:flex items-center space-x-8">
                Dashboard
            </a>
        @endrole
        {{-- Mobile navigation --}}
        <div id="mobile-menu"
            class="fixed inset-0 bg-white z-50 flex flex-col items-center justify-center space-y-8 hidden">
            <button id="close-menu-button" class="absolute top-6 right-6 text-brown-700">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <a href="#"
                class="text-xl text-brown-700 hover:text-brown-500 transition-colors duration-300 font-medium">
                Beranda
            </a>
            <a href="#fitur"
                class="text-xl text-brown-700 hover:text-brown-500 transition-colors duration-300 font-medium">
                Fitur
            </a>
            <a href="#tentang"
                class="text-xl text-brown-700 hover:text-brown-500 transition-colors duration-300 font-medium">
                Tentang
            </a>
            <a href="#kontak"
                class="text-xl text-brown-700 hover:text-brown-500 transition-colors duration-300 font-medium">
                Kontak
            </a>
            @unless (Auth::check())
                <a href="{{ route('patient.login') }}"
                    class="bg-brown-600 text-white px-6 py-2 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium">
                    Masuk
                </a>
            @endunless
            @role('patient')
                <a href="{{ route('patient.dashboard') }}"
                    class="bg-brown-600 text-white px-6 py-2 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium">
                    Dashboard
                </a>
            @endrole
            @role('admin')
                <a href="{{ route('admin.dashboard') }}"
                    class="bg-brown-600 text-white px-6 py-2 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium">
                    Dashboard
                </a>
            @endrole
        </div>
    </div>
</header>
