<x-app-layout>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Tangerine:wght@700&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<style>

body{
    font-family:'Poppins',sans-serif;
}

.grooming-script{
    font-family:'Tangerine',cursive;
    font-weight:700;
    line-height:0.9;
    letter-spacing:0;
}

.grooming-heading{
    font-family:'Poppins',sans-serif;
    font-weight:800;
    line-height:1.05;
}

.grooming-hero-desc{
    font-family:'Poppins',sans-serif;
    font-weight:400;
}

</style>

<div class="bg-[#f7f4fb] overflow-hidden text-sm">

    <!-- SECTION 1: HERO & WHY GROOMING -->
    <section class="bg-[#F8F7FC] py-10">
        <div class="max-w-5xl mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                
                <!-- Left Column: Text & Stats -->
                <div>

                    <h1 class="grooming-script text-7xl lg:text-8xl text-[#14213D]">

                        Grooming

                    </h1>

                    <h2 class="grooming-heading text-3xl lg:text-4xl text-[#6250B4] -mt-3">

                        Terbaik Untuk Hewan Kesayangan

                    </h2>

                    <p class="grooming-hero-desc mt-5 text-gray-600 leading-relaxed text-sm">

                        Klinik Hewan Monsabel menyediakan layanan grooming profesional
                        untuk menjaga kebersihan, kesehatan kulit bulu, serta meningkatkan
                        kenyamanan hewan peliharaan Anda agar terhindar dari kutu,
                        jamur, dan infeksi bakteri.

                    </p>

                </div>

                <!-- Right Column: Cute Animal Image with Organic Frame Shape -->
                <div class="flex justify-center items-end h-[420px]">
                <div class="relative w-full max-w-[380px] aspect-square group">
                    
                    <div class="absolute inset-0 transition-all duration-500 overflow-hidden"
                        style="border-radius: 60% 40% 60% 40% / 40% 60% 40% 60%;">
                        
                        <div class="absolute inset-0 bg-[#A3D9C9] shadow-xl"></div>
                        
                        <img src="{{ asset('images/cute-grooming-dog.png') }}" 
                            alt="Grooming Body" 
                            class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[120%] max-w-none h-[120%] object-contain origin-bottom transition-all duration-500 group-hover:scale-105"
                        >
                    </div>

                    <div class="absolute inset-0 pointer-events-none" style="clip-path: inset(-50% -50% 75% -50%);">
                        <img src="{{ asset('images/cute-grooming-dog.png') }}" 
                            alt="Grooming Head" 
                            class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[120%] max-w-none h-[120%] object-contain origin-bottom transition-all duration-500 group-hover:scale-105"
                        >
                    </div>
                    
                </div>
            </div>

            </div>
        </div>
    </section>

<!-- SECTION 2: PRICELIST (Gaya Kombinasi WhatsApp Image & image_6fee05.png) -->
    <section id="harga" class="py-16 bg-white font-sans">
        <div class="max-w-6xl mx-auto px-6">
            
            <div class="text-center mb-12">
                <span class="bg-purple-100 text-[#6250B4] px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider">
                    Price List
                </span>
                <h2 class="text-3xl font-black text-gray-900 mt-3 tracking-tight">
                    Harga Grooming Monsabel
                </h2>
                <p class="text-gray-500 mt-2 text-xs font-medium">
                    Tarif transparan berdasarkan kategori dan ukuran berat tubuh hewan peliharaan Anda
                </p>
            </div>

            <!-- Tiga Kolom Card Paket -->
            <div class="grid md:grid-cols-3 gap-8">

                <!-- CARD 1: KUCING -->
                <div class="bg-[#FBFBFE] rounded-[32px] p-6 shadow-sm border border-purple-100/70 flex flex-col justify-between transition-all hover:shadow-md">
                    <div>
                        <!-- Header Paket + Container Gambar Kucing (Mengikuti image_6fee05.png) -->
                        <div class="bg-white rounded-2xl p-4 mb-5 text-center border border-purple-50">
                            <div class="w-full h-28 bg-gray-50 rounded-xl overflow-hidden mb-3 flex items-center justify-center border border-gray-100">
                                <img src="{{ asset('images/kucing.png') }}" alt="Grooming Kucing" class="h-full w-auto object-contain">
                            </div>
                            <h3 class="font-black text-[#6250B4] text-base tracking-tight">Grooming Kucing</h3>
                            <p class="text-gray-400 text-[11px] font-medium mt-0.5">Perawatan Intensif Khusus Kucing</p>
                        </div>
                        
                        <!-- List Harga -->
                        <ul class="space-y-3 my-4 text-xs">
                            <li class="flex justify-between items-center pb-2.5 border-b border-dashed border-gray-200">
                                <span class="text-gray-600 font-semibold">Mandi Biasa + Kering</span>
                                <span class="font-extrabold text-[#6250B4] text-sm">Rp 85.000</span>
                            </li>
                            <li class="text-gray-400 text-[11px] leading-relaxed pt-1">
                                * Termasuk potong kuku & bersihkan telinga
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Tombol Pilih Paket -->
                    <a href="#booking" class="block w-full text-center py-3 bg-[#6250B4] text-white font-black text-xs rounded-xl hover:bg-[#5241a4] transition-all tracking-wider uppercase mt-4 shadow-sm">
                        Pilih Paket
                    </a>
                </div>

                <!-- CARD 2: ANJING KECIL - MEDIUM -->
                <div class="bg-[#FFF9FA] rounded-[32px] p-6 shadow-sm border border-pink-100/70 flex flex-col justify-between transition-all hover:shadow-md">
                    <div>
                        <!-- Header Paket + Container Gambar Anjing Kecil -->
                        <div class="bg-white rounded-2xl p-4 mb-5 text-center border border-pink-50">
                            <div class="w-full h-28 bg-gray-50 rounded-xl overflow-hidden mb-3 flex items-center justify-center border border-gray-100">
                                <img src="{{ asset('images/anjing kecil.png') }}" alt="Anjing Kecil" class="h-full w-auto object-contain">
                            </div>
                            <h3 class="font-black text-pink-600 text-base tracking-tight">Anjing Kecil – Medium</h3>
                            <p class="text-gray-400 text-[11px] font-medium mt-0.5">Berat Badan di Bawah 10kg</p>
                        </div>
                        
                        <!-- List Harga -->
                        <ul class="space-y-3 my-4 text-xs">
                            <li class="flex justify-between items-center pb-2.5 border-b border-dashed border-gray-200">
                                <span class="text-gray-600 font-semibold">Anjing &lt; 5kg</span>
                                <span class="font-extrabold text-pink-600 text-sm">Rp 100.000</span>
                            </li>
                            <li class="flex justify-between items-center pb-2.5 border-b border-dashed border-gray-200">
                                <span class="text-gray-600 font-semibold">Anjing 5 - 10kg</span>
                                <span class="font-extrabold text-pink-600 text-sm">Rp 125.000</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Tombol Pilih Paket -->
                    <a href="#booking" class="block w-full text-center py-3 bg-pink-600 text-white font-black text-xs rounded-xl hover:bg-pink-700 transition-all tracking-wider uppercase mt-4 shadow-sm">
                        Pilih Paket
                    </a>
                </div>

                <!-- CARD 3: ANJING RAS BESAR -->
                <div class="bg-[#F6FBF9] rounded-[32px] p-6 shadow-sm border border-teal-100/70 flex flex-col justify-between transition-all hover:shadow-md">
                    <div>
                        <!-- Header Paket + Container Gambar Anjing Besar -->
                        <div class="bg-white rounded-2xl p-4 mb-5 text-center border border-teal-50">
                            <div class="w-full h-28 bg-gray-50 rounded-xl overflow-hidden mb-3 flex items-center justify-center border border-gray-100">
                                <img src="{{ asset('images/anjing besar.png') }}" alt="Anjing Besar" class="h-full w-auto object-contain">
                            </div>
                            <h3 class="font-black text-teal-700 text-base tracking-tight">Anjing Ras Besar</h3>
                            <p class="text-gray-400 text-[11px] font-medium mt-0.5">Berat Badan di Atas 10kg</p>
                        </div>
                        
                        <!-- List Harga -->
                        <ul class="space-y-3 my-4 text-xs">
                            <li class="flex justify-between items-center pb-2.5 border-b border-dashed border-gray-200">
                                <span class="text-gray-600 font-semibold">Anjing 10 - 20kg</span>
                                <span class="font-extrabold text-teal-600 text-sm">Rp 150.000</span>
                            </li>
                            <li class="flex justify-between items-center pb-2.5 border-b border-dashed border-gray-200">
                                <span class="text-gray-600 font-semibold">Anjing &gt; 20kg</span>
                                <span class="font-extrabold text-teal-600 text-sm">Rp 175.000</span>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Tombol Pilih Paket -->
                    <a href="#booking" class="block w-full text-center py-3 bg-teal-600 text-white font-black text-xs rounded-xl hover:bg-teal-700 transition-all tracking-wider uppercase mt-4 shadow-sm">
                        Pilih Paket
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- SECTION 3: RESERVASI (UKURAN DIKECILKAN AGAR PROPORSIAL/TIDAK ZOOM) -->
    <section id="booking" class="pb-16 px-6 bg-gray-50">
        <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-md border border-gray-100 overflow-hidden">

            <div class="bg-[#6250B4] px-6 py-6 text-center">
                <h2 class="text-xl md:text-2xl font-extrabold text-white mb-1">
                    Reservasi Grooming
                </h2>
                <p class="text-purple-100 text-xs">
                    Lengkapi data berikut untuk melakukan konfirmasi booking jadwal grooming
                </p>
            </div>

            <div class="p-6">
                <div class="mb-4">
                    <h3 class="text-base font-bold text-gray-800">Informasi Hewan</h3>
                    <p class="text-gray-500 text-xs">Masukkan informasi detail peliharaan yang akan dirawat.</p>
                </div>

                <form method="POST" action="/grooming" class="space-y-4">
                    @csrf

                    <!-- DATA HEWAN -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <input type="text" name="nama_hewan" placeholder="Nama Hewan" required
                            class="w-full text-xs rounded-xl border border-gray-300 bg-gray-50 px-3 py-2 text-gray-700 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition">

                        <select name="jenis_hewan" required
                            class="w-full text-xs rounded-xl border border-gray-300 bg-gray-50 px-3 py-2 text-gray-700 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition">
                            <option value="" selected disabled>Pilih Jenis Hewan</option>
                            <option value="Kucing">Kucing</option>
                            <option value="Anjing">Anjing</option>
                        </select>
                    </div>

                    <!-- LAYANAN -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <select id="layanan" name="layanan" required
                            class="w-full text-xs rounded-xl border border-gray-300 bg-gray-50 px-3 py-2 text-gray-700 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition">
                            <option value="" selected disabled>Pilih Paket Grooming</option>
                            <option value="Mandi Biasa Kucing">Mandi Biasa Kucing</option>
                            <option value="Anjing < 5kg">Anjing &lt; 5kg</option>
                            <option value="Anjing 5-10kg">Anjing 5-10kg</option>
                            <option value="Anjing 10-20kg">Anjing 10-20kg</option>
                            <option value="Anjing > 20kg">Anjing &gt; 20kg</option>
                        </select>

                        <select name="metode" required
                            class="w-full text-xs rounded-xl border border-gray-300 bg-gray-50 px-3 py-2 text-gray-700 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition">
                            <option value="Datang ke Klinik">Datang ke Klinik</option>
                            <option value="Home Visit">Home Visit</option>
                        </select>
                    </div>

                    <!-- TANGGAL & ANTAR JEMPUT -->
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block mb-1 text-xs font-semibold text-gray-700">Tanggal Booking</label>
                            <input type="date" name="tanggal" required
                                class="w-full text-xs rounded-xl border border-gray-300 bg-gray-50 px-3 py-2 text-gray-700 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition">
                            <p class="text-[10px] text-gray-400 mt-1">Tersedia Setiap Hari 10.00 - 17.00 WIB</p>
                        </div>

                        <div>
                            <label class="block text-xs font-semibold mb-1 text-gray-700">Antar Jemput</label>
                            <select id="antar_jemput" name="antar_jemput"
                                class="w-full text-xs rounded-xl border border-gray-300 bg-gray-50 px-3 py-2 text-gray-700 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition">
                                <option value="" selected disabled>Pilih Opsi Antar Jemput</option>
                                <option value="Tidak">Tidak</option>
                                <option value="Ya">Ya (+ Rp15.000)</option>
                            </select>
                        </div>
                    </div>

                    <!-- ALAMAT BOX -->
                    <div id="alamatBox" style="display:none;">
                        <textarea name="alamat_jemput" rows="2" placeholder="Masukkan alamat penjemputan lengkap"
                            class="w-full text-xs rounded-xl border border-gray-300 bg-gray-50 px-3 py-2 text-gray-700 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition"></textarea>
                    </div>

                    <!-- CATATAN -->
                    <textarea name="catatan" rows="2" placeholder="Catatan tambahan (misal: ada riwayat alergi)..."
                        class="w-full text-xs rounded-xl border border-gray-300 bg-gray-50 px-3 py-2 text-gray-700 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition"></textarea>

                    <!-- INVOICE SUMMARY (LEBIH RINGKAS & PADAT) -->
                    <div class="bg-[#F8F7FC] p-4 rounded-xl border border-purple-100 text-xs">
                        <h3 class="font-bold text-[#6250B4] mb-2">Ringkasan Pembayaran</h3>
                        <div class="space-y-2">
                            <div class="flex justify-between">
                                <span class="text-gray-500">Paket Grooming</span>
                                <span id="hargaLayanan" class="font-semibold text-gray-700">Rp 0</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500">Antar Jemput</span>
                                <span id="hargaJemput" class="font-semibold text-gray-700">Rp 0</span>
                            </div>
                            <hr class="border-gray-200 my-1">
                            <div class="flex justify-between items-center pt-1">
                                <span class="font-bold text-gray-800 text-sm">Total Pembayaran</span>
                                <span id="totalHarga" class="text-lg font-black text-[#6250B4]">Rp 0</span>
                            </div>
                        </div>
                    </div>

                    <button class="w-full bg-[#6250B4] hover:bg-[#51409b] text-white font-bold text-xs py-2.5 rounded-xl shadow transition-all duration-300">
                        Konfirmasi Booking
                    </button>
                </form>
            </div>

        </div>
    </section>

</div>

<!-- ================= FOOTER ================= -->
<footer id="contact" class="bg-[#F7F5F1] text-[#11141a] pt-16 relative overflow-hidden font-sans border-t border-gray-100">

    <div class="max-w-7xl mx-auto px-8">

        <!-- MAIN FOOTER CONTENT -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-10 items-start pb-12">

            <!-- BRAND SECTION (Lebar 2 Kolom) -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logo.png') }}" class="w-14 h-14 rounded-full p-1 shadow-md border border-gray-100">
                    <div>
                        <h3 class="text-2xl font-black tracking-tight uppercase leading-none">
                            Monsabel Clinic
                        </h3>
                        <p class="uppercase tracking-[3px] text-[10px] text-red-600 font-bold mt-1">
                            Veterinary Clinic
                        </p>
                    </div>
                </div>
                
                <hr class="w-40 border-t border-[#11141a] my-2">
                
                <p class="text-sm text-gray-600 leading-relaxed max-w-xs">
                    Klinik hewan terpercaya dengan layanan kesehatan, grooming, pet hotel dan petshop untuk hewan kesayangan Anda.
                </p>

                <!-- SOCIAL MEDIA CIRCLES -->
                <div class="flex gap-2 pt-2">
                    <a href="https://www.instagram.com/monsabelpetsclinic?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="w-8 h-8 rounded-full bg-red-600 text-white flex items-center justify-center text-xs font-bold hover:bg-red-700 transition">
                        IG
                    </a>
                    <a href="https://www.facebook.com/monsabel.petsclinic.5?locale=id_ID" target="_blank" class="w-8 h-8 rounded-full bg-[#1877F2] text-white flex items-center justify-center text-xs font-bold hover:bg-[#166FE5] transition">                        FB
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-200 text-[#11141a] flex items-center justify-center text-xs font-bold hover:bg-gray-300 transition">
                        TT
                    </a>
                </div>
            </div>

            <!-- LINKS SECTION -->
            <div>
                <h4 class="font-bold text-sm uppercase tracking-wider mb-5 text-[#11141a]">
                    Useful Links
                </h4>
                <ul class="space-y-3 text-sm text-gray-600">
                    <li><a href="/" class="hover:text-red-600 transition">Home</a></li>
                    <li><a href="#about" class="hover:text-red-600 transition">About Us</a></li>
                    <li><a href="/petshop" class="hover:text-red-600 transition">Petshop</a></li>
                    <li><a href="/grooming" class="hover:text-red-600 transition">Pet Grooming</a></li>
                    <li><a href="/hotel" class="hover:text-red-600 transition">Pet Hotel</a></li>
                </ul>
            </div>

            <!-- CONTACT INFO SECTION -->
            <div class="lg:col-span-1">
                <h4 class="font-bold text-sm uppercase tracking-wider mb-5 text-[#11141a]">
                    Contact Info
                </h4>
                <div class="space-y-4 text-sm text-gray-600">
                    <div>
                        <span class="block font-bold text-[#11141a]">Call:</span>
                        <a href="https://wa.me/6281361175932" class="hover:text-red-600 transition">0813-6117-5932</a>
                    </div>
                    <div>
                        <span class="block font-bold text-[#11141a]">Instagram:</span>
                        <a href="https://www.instagram.com/monsabelpetsclinic?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="hover:text-red-600 transition">@monsabelpetsclinic</a>
                    </div>
                    <div>
                        <span class="block font-bold text-[#11141a]">Address:</span>
                        <p class="leading-relaxed">Jl. Karya Rakyat No.46, Sei Agul, Medan Barat, Kota Medan</p>
                    </div>
                </div>
            </div>

            <!-- OPENING HOURS SECTION -->
            <div>
                <h4 class="font-bold text-sm uppercase tracking-wider mb-5 text-[#11141a]">
                    Opening Hours
                </h4>
                <ul class="space-y-2 text-xs text-gray-600">
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Senin</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Selasa</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Rabu</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Kamis</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Jumat</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Sabtu</span><span class="font-semibold text-[#11141a]">09.00 - 19.00</span></li>
                    <li class="flex justify-between text-red-600 font-bold"><span>Minggu</span><span>Tutup</span></li>
                </ul>
            </div>

            <!-- GOOGLE MAPS EMBED SECTION -->
            <div class="w-full h-44 rounded-2xl overflow-hidden shadow-sm border border-gray-200">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9613149959683!2d98.6601449!3d3.6077395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131ec5aa263ad%3A0xb304b4df9d0fa422!2sJl.%20Karya%20Rakyat%20No.46%2C%20Sei%20Agul%2C%20Kec.%20Medan%20Barat%2C%20Kota%20Medan%2C%20Sumatera%20Utara%2020114!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                    class="w-full h-full border-0" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

    </div>

    <!-- SUB-FOOTER / BOTTOM BAR -->
    <div class="bg-[#6250B4] text-white py-5 text-xs mt-8">
        <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <span class="text-white">|</span>
                <a href="#about" class="hover:text-white transition">Our History</a>
                <span class="text-white">|</span>
                <a href="https://maps.app.goo.gl/gJ88k5BFiGQ2Ehh88" target="_blank" class="hover:text-white transition">Find Us On Map</a>
            </div>

            <div>
                &copy; 2026 Monsabel Pet Clinic. All images are for demo purposes only.
            </div>

        </div>
    </div>

</footer>

<!-- SCRIPT TETAP DIPERTAHANKAN SESUAI LOGIKA AWAL -->
<script>
const layanan = document.getElementById('layanan');
const jemput = document.getElementById('antar_jemput');
const alamatBox = document.getElementById('alamatBox');
const hargaLayanan = document.getElementById('hargaLayanan');
const hargaJemput = document.getElementById('hargaJemput');
const totalHarga = document.getElementById('totalHarga');

function hitungTotal() {
    let harga = 0;

    if(!layanan.value){
        hargaLayanan.innerHTML = 'Rp 0';
        hargaJemput.innerHTML = 'Rp 0';
        totalHarga.innerHTML = 'Rp 0';
        return;
    }

    switch (layanan.value) {
        case 'Mandi Biasa Kucing':
            harga = 85000;
            break;
        case 'Anjing < 5kg':
            harga = 100000;
            break;
        case 'Anjing 5-10kg':
            harga = 125000;
            break;
        case 'Anjing 10-20kg':
            harga = 150000;
            break;
        case 'Anjing > 20kg':
            harga = 175000;
            break;
    }

    let biayaJemput = 0;

    if (jemput.value == 'Ya') {
        biayaJemput = 15000;
        alamatBox.style.display = 'block';
    } else {
        alamatBox.style.display = 'none';
    }

    let total = harga + biayaJemput;

    hargaLayanan.innerHTML = 'Rp ' + harga.toLocaleString('id-ID');
    hargaJemput.innerHTML = 'Rp ' + biayaJemput.toLocaleString('id-ID');
    totalHarga.innerHTML = 'Rp ' + total.toLocaleString('id-ID');
}

layanan.addEventListener('change', hitungTotal);
jemput.addEventListener('change', hitungTotal);

hitungTotal();
</script>

</x-app-layout>