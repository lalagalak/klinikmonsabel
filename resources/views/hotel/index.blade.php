<x-app-layout>

<div class="bg-[#f8f5ff] overflow-hidden">

   <!-- ================= HERO PET HOTEL ================= -->
<section class="relative overflow-hidden bg-gradient-to-r from-[#EAF8F0] via-[#DDF4E7] to-[#CEF0DC]">

    <!-- Background Shape -->
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-[#B7E8C8] rounded-full opacity-40 translate-x-32 -translate-y-24"></div>

    <div class="max-w-6xl mx-auto px-6 lg:px-10">

        <div class="grid lg:grid-cols-2 gap-10 items-center min-h-[560px]">

            <!-- LEFT -->
            <div>

                <h1 class="mt-5 leading-none">

                    <span class="block
                                 text-[58px]
                                 lg:text-[72px]
                                 font-black
                                 text-[#14213D]">

                        Enjoy Your

                    </span>

                    <span class="block
                                 text-[62px]
                                 lg:text-[80px]
                                 italic
                                 font-bold
                                 text-[#16A34A]
                                 tracking-tight">

                        Holiday

                    </span>

                </h1>

                <p class="mt-5
                          text-gray-600
                          text-base
                          leading-8
                          max-w-lg">

                    Tinggalkan hewan kesayangan Anda dengan tenang.
                    Monsabel Pet Hotel menyediakan penitipan yang aman,
                    nyaman, bersih dan diawasi oleh tim profesional selama 24 jam.

                </p>

                <!-- Mini Stats -->
                <div class="flex gap-5 mt-8">

                    <div class="bg-white rounded-2xl px-5 py-4 shadow-md">

                        <h3 class="text-2xl font-black text-[#16A34A]">
                            24H
                        </h3>

                        <p class="text-xs text-gray-500">
                            Monitoring
                        </p>

                    </div>

                    <div class="bg-white rounded-2xl px-5 py-4 shadow-md">

                        <h3 class="text-2xl font-black text-[#16A34A]">
                            500+
                        </h3>

                        <p class="text-xs text-gray-500">
                            Hewan Menginap
                        </p>

                    </div>

                    <div class="bg-white rounded-2xl px-5 py-4 shadow-md">

                        <h3 class="text-2xl font-black text-[#16A34A]">
                            98%
                        </h3>

                        <p class="text-xs text-gray-500">
                            Pelanggan Puas
                        </p>

                    </div>

                </div>

                <div class="flex gap-4 mt-8">

                    <a href="#booking"
                       class="bg-[#6250B4]
                              hover:bg-[#5646A8]
                              text-white
                              px-7 py-3
                              rounded-xl
                              font-semibold
                              shadow-lg
                              transition">

                        Booking Sekarang

                    </a>

                    <a href="#harga"
                       class="bg-white
                              border
                              border-gray-200
                              px-7 py-3
                              rounded-xl
                              font-semibold
                              text-[#14213D]
                              hover:bg-gray-50
                              transition">

                        Lihat Tarif

                    </a>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="flex justify-center lg:justify-end">

                <style>
                    @keyframes floatPet{
                        0%{transform:translateY(0px);}
                        50%{transform:translateY(-12px);}
                        100%{transform:translateY(0px);}
                    }

                    .float-pet{
                        animation:floatPet 4s ease-in-out infinite;
                    }
                </style>

                <div class="relative float-pet">

                    <img
                        src="{{ asset('images/LOGOPET.png') }}"
                        alt="Pet Hotel Monsabel"
                        class="w-full max-w-[430px] object-contain drop-shadow-2xl">

                </div>

            </div>

        </div>

    </div>

</section>

    <!-- STATS COUNTER -->
    <section class="py-12 bg-white border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div>
                    <h3 class="text-4xl font-black text-[#6250B4]">500+</h3>
                    <p class="text-xs text-gray-500 uppercase tracking-wider mt-1">Hewan Menginap</p>
                </div>
                <div>
                    <h3 class="text-4xl font-black text-[#6250B4]">24 Jam</h3>
                    <p class="text-xs text-gray-500 uppercase tracking-wider mt-1">Pengawasan</p>
                </div>
                <div>
                    <h3 class="text-4xl font-black text-[#6250B4]">100%</h3>
                    <p class="text-xs text-gray-500 uppercase tracking-wider mt-1">Area Bersih</p>
                </div>
                <div>
                    <h3 class="text-4xl font-black text-[#6250B4]">7 Hari</h3>
                    <p class="text-xs text-gray-500 uppercase tracking-wider mt-1">Layanan Aktif</p>
                </div>
            </div>
        </div>
    </section>

<!-- ================= PRICE LIST ================= -->
<section id="harga" class="py-16 bg-[#FAFBFD]">

    <div class="max-w-6xl mx-auto px-6">

        <!-- HEADER -->
        <div class="text-center mb-12">

            <span class="inline-block
                         px-4 py-2
                         rounded-full
                         bg-[#F4F0FF]
                         text-[#6250B4]
                         text-[11px]
                         font-semibold
                         tracking-[2px]
                         uppercase">

                Price List

            </span>

            <h2 class="mt-4
                       text-3xl
                       font-black
                       text-[#14213D]">

                Tarif Pet Hotel

            </h2>

            <p class="mt-2
                      text-sm
                      text-gray-500
                      max-w-md
                      mx-auto">

                Pilihan kamar nyaman dengan harga terbaik
                sesuai jenis dan ukuran hewan peliharaan.

            </p>

        </div>

        <!-- CARD -->
        <div class="grid lg:grid-cols-2 gap-8">

            <!-- NON AC -->
            <div class="bg-white
                        rounded-[28px]
                        border
                        border-gray-100
                        shadow-lg
                        overflow-hidden">

                <div class="px-8 py-6 border-b bg-[#F8FAFC]">

                    <h3 class="text-xl font-black text-[#14213D]">
                        Rawat Inap Non AC
                    </h3>

                    <p class="text-xs text-gray-500 mt-1">
                        Ventilasi alami dengan sirkulasi udara nyaman.
                    </p>

                </div>

                <div class="p-6 space-y-3">

                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm text-gray-700">Kucing</span>
                        <span class="font-bold text-[#6250B4]">Rp70.000</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm text-gray-700">Anjing < 5 Kg</span>
                        <span class="font-bold text-[#6250B4]">Rp75.000</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm text-gray-700">Anjing 5 - 10 Kg</span>
                        <span class="font-bold text-[#6250B4]">Rp85.000</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-gray-100">
                        <span class="text-sm text-gray-700">Anjing 10 - 20 Kg</span>
                        <span class="font-bold text-[#6250B4]">Rp100.000</span>
                    </div>

                    <div class="flex justify-between items-center py-3">
                        <span class="text-sm text-gray-700">Anjing > 20 Kg</span>
                        <span class="font-bold text-[#6250B4]">Rp110.000</span>
                    </div>

                </div>

            </div>

            <!-- FULL AC -->
            <div class="bg-[#6250B4]
                        rounded-[28px]
                        shadow-xl
                        overflow-hidden">

                <div class="px-8 py-6 border-b border-white/10">

                    <h3 class="text-xl font-black text-white">
                        Rawat Inap Full AC
                    </h3>

                    <p class="text-xs text-purple-100 mt-1">
                        Kamar premium dengan suhu ruangan yang stabil.
                    </p>

                </div>

                <div class="p-6 space-y-3">

                    <div class="flex justify-between items-center py-3 border-b border-white/10">
                        <span class="text-sm text-white">Kucing</span>
                        <span class="font-bold text-white">Rp85.000</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-white/10">
                        <span class="text-sm text-white">Anjing < 5 Kg</span>
                        <span class="font-bold text-white">Rp100.000</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-white/10">
                        <span class="text-sm text-white">Anjing 5 - 10 Kg</span>
                        <span class="font-bold text-white">Rp115.000</span>
                    </div>

                    <div class="flex justify-between items-center py-3 border-b border-white/10">
                        <span class="text-sm text-white">Anjing 10 - 20 Kg</span>
                        <span class="font-bold text-white">Rp125.000</span>
                    </div>

                    <div class="flex justify-between items-center py-3">
                        <span class="text-sm text-white">Anjing > 20 Kg</span>
                        <span class="font-bold text-white">Rp150.000</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

    <!-- SECTION 3: RESERVASI BOOKING HOTEL (UKURAN DIPERKECIL & TIDAK MENGGANGGU LOGIC) -->
    <section id="booking" class="py-16 bg-[#F8F7FC]">
        <div class="max-w-4xl mx-auto px-6">
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
                
                <!-- HEADER (DIKECILKAN) -->
                <div class="bg-[#6250B4] px-8 py-6 text-center">
                    <h2 class="text-2xl font-extrabold text-white mb-1">
                        Reservasi Pet Hotel
                    </h2>
                    <p class="text-purple-200 text-xs">
                        Lengkapi data berikut untuk melakukan penitipan hewan di Klinik Hewan Monsabel
                    </p>
                </div>

                <!-- CONTENT -->
                <div class="p-6">
                    <!-- FITUR (DIKECILKAN) -->
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 mb-6">
                        <div class="bg-purple-50 border border-purple-100 p-3 rounded-xl text-center">
                            <h4 class="font-bold text-[#6250B4] text-xs">Pengawasan 24 Jam</h4>
                            <p class="text-[10px] text-gray-500 mt-1">Dipantau petugas berpengalaman.</p>
                        </div>
                        <div class="bg-purple-50 border border-purple-100 p-3 rounded-xl text-center">
                            <h4 class="font-bold text-[#6250B4] text-xs">Kandang Bersih</h4>
                            <p class="text-[10px] text-gray-500 mt-1">Dibersihkan rutin setiap hari.</p>
                        </div>
                        <div class="bg-purple-50 border border-purple-100 p-3 rounded-xl text-center">
                            <h4 class="font-bold text-[#6250B4] text-xs">Perawatan Aman</h4>
                            <p class="text-[10px] text-gray-500 mt-1">Dirawat penuh perhatian.</p>
                        </div>
                    </div>

                    <!-- FORM UTAMA -->
                    <form method="POST" action="/hotel" class="space-y-4">
                        @csrf

                        <!-- DATA PEMILIK -->
                        <div>
                            <h3 class="text-sm font-bold text-gray-800 mb-2">Informasi Pemilik</h3>
                            <div class="grid md:grid-cols-2 gap-4">
                                <input type="text" name="nama_pemilik" placeholder="Nama Pemilik"
                                    class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition">
                                <input type="text" name="nomor_hp" placeholder="Nomor HP"
                                    class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5 focus:border-[#6250B4] focus:ring-2 focus:ring-purple-100 transition">
                            </div>
                        </div>

                        <!-- DATA HEWAN -->
                        <div>
                            <h3 class="text-sm font-bold text-gray-800 mb-2">Informasi Hewan</h3>
                            <div class="grid md:grid-cols-2 gap-4">
                                <input type="text" name="nama_hewan" placeholder="Nama Hewan"
                                    class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5">
                                <select name="jenis_hewan" class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5">
                                    <option selected disabled>Pilih Jenis Hewan</option>
                                    <option>Kucing</option>
                                    <option>Anjing</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <input type="text" name="berat" placeholder="Berat Hewan (kg)"
                                    class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5">
                            </div>
                        </div>

                        <!-- PAKET -->
                        <div>
                            <h3 class="text-sm font-bold text-gray-800 mb-2">Paket Penitipan</h3>
                            <select name="kamar" class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5">
                                <option selected disabled>Pilih Paket Pet Hotel</option>
                                <option>Rawat Inap Non AC - Kucing</option>
                                <option>Rawat Inap Non AC - Anjing &lt;5kg</option>
                                <option>Rawat Inap Non AC - Anjing 5-10kg</option>
                                <option>Rawat Inap Non AC - Anjing 10-20kg</option>
                                <option>Rawat Inap Non AC - Anjing &gt;20kg</option>
                                <option>Rawat Inap Full AC - Kucing</option>
                                <option>Rawat Inap Full AC - Anjing &lt;5kg</option>
                                <option>Rawat Inap Full AC - Anjing 5-10kg</option>
                                <option>Rawat Inap Full AC - Anjing 10-20kg</option>
                                <option>Rawat Inap Full AC - Anjing &gt;20kg</option>
                            </select>
                        </div>

                        <!-- TANGGAL -->
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block mb-1 text-xs font-semibold text-gray-700">Tanggal Check In</label>
                                <input type="date" name="checkin" class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2">
                            </div>
                            <div>
                                <label class="block mb-1 text-xs font-semibold text-gray-700">Tanggal Check Out</label>
                                <input type="date" name="checkout" class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2">
                            </div>
                        </div>

                        <!-- JEMPUT -->
                        <div>
                            <select id="antar_jemput" name="antar_jemput" class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2.5">
                                <option value="">Pilih Layanan Antar Jemput</option>
                                <option value="Tidak">Tidak</option>
                                <option value="Ya">Ya (+ Rp15.000)</option>
                            </select>
                        </div>

                        <div id="alamatBox" style="display:none;">
                            <textarea name="alamat_jemput" rows="3" placeholder="Masukkan alamat penjemputan"
                                class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2"></textarea>
                        </div>

                        <!-- CATATAN -->
                        <textarea name="catatan" rows="3" placeholder="Catatan tambahan..."
                            class="w-full text-xs rounded-lg border border-gray-300 bg-gray-50 px-3 py-2"></textarea>

                        <!-- RINGKASAN (LEBIH PADAT) -->
                        <div class="bg-[#F8F7FC] border border-purple-100 p-5 rounded-xl mt-4">
                            <h3 class="text-base font-bold text-[#6250B4] mb-3">Ringkasan Pembayaran</h3>
                            <div class="space-y-2 text-xs">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Harga Kamar</span>
                                    <span id="hargaKamar" class="font-semibold">Rp0</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Lama Menginap</span>
                                    <span id="lamaMenginap" class="font-semibold">0 Hari</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Antar Jemput</span>
                                    <span id="hargaJemput" class="font-semibold">Rp0</span>
                                </div>
                            </div>
                            <hr class="my-3">
                            <!-- TOTAL -->
<div class="flex justify-between items-end gap-3 mt-4">

    <span class="text-sm font-bold text-gray-800 leading-tight">
        Total Pembayaran
    </span>

    <span id="totalHarga"
          class="text-lg sm:text-xl lg:text-3xl
                 font-extrabold
                 text-[#6250B4]
                 whitespace-nowrap">
        Rp0
    </span>

</div>
                        </div>

                        <!-- BUTTON -->
                        <button class="w-full bg-[#6250B4] hover:bg-[#51409b] text-white py-3.5 rounded-lg font-bold text-sm shadow transition mt-2">
                            Konfirmasi Reservasi
                        </button>
                    </form>
                </div>

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

<!-- SCRIPT LOGIC (SAMA SEKALI TIDAK DIUBAH) -->
<script>
    const kamarSelect = document.querySelector('[name="kamar"]');
    const checkinInput = document.querySelector('[name="checkin"]');
    const checkoutInput = document.querySelector('[name="checkout"]');
    const antarJemput = document.getElementById('antar_jemput');

    const hargaKamar = document.getElementById('hargaKamar');
    const lamaMenginap = document.getElementById('lamaMenginap');
    const hargaJemput = document.getElementById('hargaJemput');
    const totalHarga = document.getElementById('totalHarga');

    const alamatBox = document.getElementById('alamatBox');

    const hargaList = {
        'Rawat Inap Non AC - Kucing': 70000,
        'Rawat Inap Non AC - Anjing <5kg': 75000,
        'Rawat Inap Non AC - Anjing 5-10kg': 85000,
        'Rawat Inap Non AC - Anjing 10-20kg': 100000,
        'Rawat Inap Non AC - Anjing >20kg': 110000,
        'Rawat Inap Full AC - Kucing': 85000,
        'Rawat Inap Full AC - Anjing <5kg': 100000,
        'Rawat Inap Full AC - Anjing 5-10kg': 115000,
        'Rawat Inap Full AC - Anjing 10-20kg': 125000,
        'Rawat Inap Full AC - Anjing >20kg': 150000
    };

    function formatRupiah(angka) {
        return 'Rp' + angka.toLocaleString('id-ID');
    }

    function hitungTotal() {
        let harga = hargaList[kamarSelect.value] || 0;
        let hari = 0;

        if(checkinInput.value && checkoutInput.value) {
            let checkin = new Date(checkinInput.value);
            let checkout = new Date(checkoutInput.value);

            hari = Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24));
            if(hari < 1) {
                hari = 1;
            }
        }

        let jemput = 0;
        if(antarJemput.value === 'Ya') {
            jemput = 15000;
            alamatBox.style.display = 'block';
        } else {
            alamatBox.style.display = 'none';
        }

        let total = (harga * hari) + jemput;

        hargaKamar.innerHTML = formatRupiah(harga);
        lamaMenginap.innerHTML = hari + ' Hari';
        hargaJemput.innerHTML = formatRupiah(jemput);
        totalHarga.innerHTML = formatRupiah(total);
    }

    kamarSelect.addEventListener('change', hitungTotal);
    checkinInput.addEventListener('change', hitungTotal);
    checkoutInput.addEventListener('change', hitungTotal);
    antarJemput.addEventListener('change', hitungTotal);
</script>

</x-app-layout>