<section id="kontak" class="container mx-auto px-4 py-16">
    <div class="text-center mb-16" data-aos="fade-up" data-aos-duration="1000">
        <span
            class="inline-block px-3 py-1 bg-brown-100 text-brown-600 rounded-md text-sm font-medium mb-4">Kontak</span>
        <h2 class="text-3xl font-bold mb-4 font-playfair text-brown-800">Hubungi Kami</h2>
        <p class="text-brown-600 max-w-2xl mx-auto">Ada pertanyaan atau masukan? Jangan ragu untuk menghubungi
            kami. Tim kami siap membantu Anda.</p>
    </div>
    <div class="bg-white rounded-lg p-8 shadow-sm" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
        <div class="flex flex-col lg:flex-row gap-10">
            <div class="lg:w-1/3">
                <h3 class="text-2xl font-bold mb-6 text-brown-800">Informasi Kontak</h3>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-brown-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="phone" class="w-5 h-5 text-brown-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1 text-brown-800">Telepon</h4>
                            <p class="text-brown-600">+6281282159360</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-brown-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="mail" class="w-5 h-5 text-brown-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1 text-brown-800">Email</h4>
                            <p class="text-brown-600">hello@racik.my.id</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-10 h-10 bg-brown-100 rounded-lg flex items-center justify-center flex-shrink-0">
                            <i data-lucide="map-pin" class="w-5 h-5 text-brown-600"></i>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1 text-brown-800">Alamat</h4>
                            <p class="text-brown-600">Gg. Kapuas No.47, Jetis, Wedomartani, Ngemplak, Sleman, DIY
                                55584, Indonesia Jetis, Wedomartani, Kec. Ngemplak, Kabupaten Sleman, Daerah
                                Istimewa Yogyakarta 55281</p>
                        </div>
                    </div>
                </div>
                <div class="mt-10">
                    <h4 class="font-bold mb-4 text-brown-800">Ikuti Kami</h4>
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
            </div>
            <div class="lg:w-2/3">
                <h3 class="text-2xl font-bold mb-6 text-brown-800">Kirim Pesan</h3>
                <form action="{{ route('home.send-message') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="name" class="block text-sm font-medium mb-2 text-brown-700">Nama
                                Lengkap</label>
                            <input type="text" id="name" name="name" placeholder="Masukkan nama lengkap Anda"
                                class="w-full p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brew-brown/50"
                                required>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium mb-2 text-brown-700">Email</label>
                            <input type="email" id="email" name="email" placeholder="Masukkan email Anda"
                                class="w-full p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brew-brown/50"
                                required>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label for="subject" class="block text-sm font-medium mb-2 text-brown-700">Subjek</label>
                        <input type="text" id="subject" name="subject" placeholder="Masukkan subjek pesan"
                            class="w-full p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brew-brown/50"
                            required>
                    </div>
                    <div class="mb-6">
                        <label for="message" class="block text-sm font-medium mb-2 text-brown-700">Pesan</label>
                        <textarea id="message" name="message" rows="5" placeholder="Tulis pesan Anda di sini"
                            class="w-full p-3 border border-brown-200 rounded-lg text-base focus:border-brown-600 focus:ring-1 focus:ring-brown-600 focus:outline-none placeholder:text-brew-brown/50"
                            required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit"
                            class="bg-brown-600 text-white px-8 py-3 rounded-lg hover:bg-brown-700 transition-colors duration-300 font-medium cursor-pointer">
                            Kirim Pesan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
