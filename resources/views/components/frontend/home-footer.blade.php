<footer class="bg-white pt-16 pb-8 mt-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
            <div>
                <a href="/" class="inline-block mb-6">
                    <img src="{{ asset('assets/icons/frontend/home/logo-racik.png') }}" width="120" height="40"
                        alt="Racik" class="h-9" loading="lazy">
                </a>
                <p class="text-brown-600 mb-6">Racik adalah sistem Health Monitoring berbasis IoT untuk pemantauan
                    konsumsi jamu, manajemen resep herbal, dan pelacakan data kesehatan secara real-time.</p>
                <div class="flex space-x-4">
                    <a href="#"
                        class="w-8 h-8 bg-brown-100 rounded-full flex items-center justify-center hover:bg-brown-200 transition-colors duration-300">
                        <i data-lucide="instagram" class="w-4 h-4 text-brown-600"></i>
                    </a>
                    <a href="#"
                        class="w-8 h-8 bg-brown-100 rounded-full flex items-center justify-center hover:bg-brown-200 transition-colors duration-300">
                        <i data-lucide="linkedin" class="w-4 h-4 text-brown-600"></i>
                    </a>
                    <a href="https://github.com/racik-health" target="_blank"
                        class="w-8 h-8 bg-brown-100 rounded-full flex items-center justify-center hover:bg-brown-200 transition-colors duration-300">
                        <i data-lucide="github" class="w-4 h-4 text-brown-600"></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 text-brown-800">Tautan Cepat</h3>
                <ul class="space-y-4">
                    <li><a href="#beranda"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Beranda</a>
                    </li>
                    <li><a href="#fitur"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Fitur</a>
                    </li>
                    <li><a href="#tentang"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Tentang
                            Kami</a></li>
                    <li><a href="#kontak"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Kontak</a>
                    </li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 text-brown-800">Layanan</h3>
                <ul class="space-y-4">
                    <li><a href="#"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Monitoring
                            Kesehatan</a></li>
                    <li><a href="#"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Resep
                            Jamu</a></li>
                    <li><a href="#"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Konsultasi
                            Kesehatan</a></li>
                    <li><a href="#"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Dukungan
                            Teknis</a></li>
                    <li><a href="#"
                            class="text-brown-600 hover:text-brown-500 transition-colors duration-300">Pemeliharaan
                            Dispenser</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-6 text-brown-800">Berlangganan</h3>
                <p class="text-brown-600 mb-4">Dapatkan berita dan pembaruan terbaru dari Racik.</p>
                <form action="" method="POST" class="mb-4">
                    @csrf
                    <div class="flex">
                        <input type="email" name="subscribe_email" placeholder="Email Anda"
                            class="flex-1 p-3 border border-brown-200 rounded-l-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brew-brown/50"
                            required>
                        <button type="submit"
                            class="bg-brown-600 text-white px-4 py-3 rounded-r-lg hover:bg-brown-700 transition-colors duration-300 cursor-pointer">
                            <i data-lucide="send" class="w-5 h-5"></i>
                        </button>
                    </div>
                </form>
                <p class="text-brown-600 text-sm">Dengan berlangganan, Anda menyetujui <a href="#"
                        class="text-brown-700 underline">Kebijakan Privasi</a> kami.</p>
            </div>
        </div>
        <div class="border-t border-brown-100 pt-8 w-full">
            <div class="flex flex-col md:flex-row justify-center items-center">
                <p class="text-brown-600 text-sm mb-4 md:mb-0 text-center">© {{ date('Y') }} Racik. Dibuat
                    dengan ❤️ oleh
                    Tim Pencari Tuhan</p>
            </div>
        </div>
    </div>
</footer>
