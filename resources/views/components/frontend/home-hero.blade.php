<section class="container mx-auto px-4 pt-16 pb-16 md:py-24">
    <div class="flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2" data-aos="fade-right" data-aos-duration="1000">
            <span class="inline-block px-3 py-1 bg-brown-100 text-brown-600 rounded-md text-sm font-medium mb-4">Inovasi
                Kesehatan</span>
            <h1 class="text-4xl md:text-5xl font-bold leading-tight mb-6 font-playfair text-brown-800">
                Dispenser Otomatis dengan Analisis Kesehatan
            </h1>
            <p class="text-brown-600 mb-8 leading-relaxed">
                Nikmati manfaat jamu dengan perawatan cerdas. Dengan teknologi IoT dan AI, kami membantu Anda
                mendapatkan solusi kesehatan yang personal dan akurat.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#fitur"
                    class="bg-brown-600 text-white px-6 py-3 rounded-lg hover:bg-brown-700 transition-all duration-300 font-medium flex items-center">
                    Jelajahi Fitur
                </a>
                <button
                    class="flex items-center gap-2 border border-brown-600 text-brown-600 px-6 py-3 rounded-lg hover:bg-brown-50 transition-all duration-300 font-medium cursor-pointer">
                    <div class="w-8 h-8 bg-brown-600 rounded-full flex items-center justify-center text-white">
                        <i data-lucide="play" class="w-4 h-4"></i>
                    </div>
                    <span>Lihat Video</span>
                </button>
            </div>
        </div>
        <div class="md:w-1/2" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200"
            data-aos-anchor-placement="top-bottom">
            <img src="{{ asset('assets/images/frontend/home/dispenser-racik-3d.webp') }}" width="400" height="300"
                alt="Racik Dispenser" class="mx-auto w-full max-w-[400px] md:max-w-[550px]" loading="lazy"
                data-aos="float" data-aos-duration="2000" data-aos-easing="ease-in-out">
        </div>
    </div>
    {{-- Stats Section --}}
    <div class="mt-16 grid grid-cols-2 md:grid-cols-4 gap-6" data-aos="fade-up" data-aos-duration="1000">
        <div class="bg-white rounded-lg p-6 shadow-sm text-center">
            <div class="text-3xl font-bold text-brown-600 mb-2">500+</div>
            <p class="text-brown-500">Pengguna Aktif</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-sm text-center">
            <div class="text-3xl font-bold text-brown-600 mb-2">98%</div>
            <p class="text-brown-500">Tingkat Kepuasan</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-sm text-center">
            <div class="text-3xl font-bold text-brown-600 mb-2">24/7</div>
            <p class="text-brown-500">Dukungan Teknis</p>
        </div>
        <div class="bg-white rounded-lg p-6 shadow-sm text-center">
            <div class="text-3xl font-bold text-brown-600 mb-2">50+</div>
            <p class="text-brown-500">Resep Jamu</p>
        </div>
    </div>
</section>
