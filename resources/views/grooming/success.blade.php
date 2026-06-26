<x-app-layout>

<div class="min-h-screen bg-gray-50 py-12">
<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

        <!-- Header Success -->
        <div class="bg-gradient-to-r from-purple-700 to-pink-500 p-8 text-white text-center">

            <div class="text-6xl mb-4">
                ✅
            </div>

            <h1 class="text-4xl font-black">

                Booking Grooming Berhasil

            </h1>

            <p class="mt-3 text-lg opacity-90">

                Terima kasih telah melakukan booking grooming di Monsabel Clinic

            </p>

        </div>


        <!-- Detail Booking -->
        <div class="p-8">

            <div class="bg-purple-50 rounded-2xl p-6 mb-8">

                <h2 class="text-2xl font-black text-purple-700 mb-4">

                    Kode Booking

                </h2>

                <div class="text-3xl font-black text-purple-700">

                    {{ $booking->kode_booking }}

                </div>

            </div>


            <h2 class="text-2xl font-black mb-6">

                Detail Booking

            </h2>


            <div class="grid md:grid-cols-2 gap-6">

                <div>

                    <p class="text-gray-500">
                        Nama Hewan
                    </p>

                    <p class="font-bold text-lg">
                        {{ $booking->nama_hewan }}
                    </p>

                </div>

                <div>

                    <p class="text-gray-500">
                        Jenis Hewan
                    </p>

                    <p class="font-bold text-lg">
                        {{ $booking->jenis_hewan }}
                    </p>

                </div>

                <div>

                    <p class="text-gray-500">
                        Layanan Grooming
                    </p>

                    <p class="font-bold text-lg">
                        {{ $booking->layanan }}
                    </p>

                </div>

                <div>

                    <p class="text-gray-500">
                        Metode Grooming
                    </p>

                    <p class="font-bold text-lg">
                        {{ $booking->metode }}
                    </p>

                </div>

                <div>

                    <p class="text-gray-500">
                        Tanggal Booking
                    </p>

                    <p class="font-bold text-lg">
                        {{ $booking->tanggal }}
                    </p>

                </div>

                <div>

                    <p class="text-gray-500">
                        Antar Jemput
                    </p>

                    <p class="font-bold text-lg">
                        {{ $booking->antar_jemput }}
                    </p>

                </div>

            </div>


            <hr class="my-8">


            <!-- Ringkasan Pembayaran -->
            <h2 class="text-2xl font-black mb-6">

                Ringkasan Pembayaran

            </h2>

            <div class="bg-gray-50 rounded-2xl p-6">

                <div class="flex justify-between mb-4">

                    <span>
                        Harga Grooming
                    </span>

                    <span class="font-bold">

                        Rp {{ number_format($booking->harga_layanan,0,',','.') }}

                    </span>

                </div>

                <div class="flex justify-between mb-4">

                    <span>
                        Biaya Antar Jemput
                    </span>

                    <span class="font-bold">

                        Rp {{ number_format($booking->biaya_jemput,0,',','.') }}

                    </span>

                </div>

                <hr class="my-4">

                <div class="flex justify-between items-center">

                    <span class="text-xl font-black">

                        Total Pembayaran

                    </span>

                    <span class="text-3xl font-black text-purple-700">

                        Rp {{ number_format($booking->total_bayar,0,',','.') }}

                    </span>

                </div>

            </div>


            <!-- Status -->
            <div class="mt-8">

                <h2 class="text-2xl font-black mb-4">

                    Status Booking

                </h2>

                <span class="inline-block px-5 py-3 rounded-full bg-yellow-100 text-yellow-700 font-bold">

                    {{ $booking->status }}

                </span>

            </div>


            <!-- Informasi -->
            <div class="mt-8 bg-blue-50 border border-blue-200 rounded-2xl p-6">

                <h3 class="font-black text-blue-700 mb-3">

                    Informasi Booking

                </h3>

                <ul class="space-y-2 text-gray-700">

                    <li>
                        • Simpan kode booking ini sebagai bukti pendaftaran.
                    </li>

                    <li>
                        • Tunjukkan kode booking saat datang ke klinik.
                    </li>

                    <li>
                        • Status booking dapat berubah setelah diverifikasi oleh admin.
                    </li>

                    <li>
                        • Customer dapat memantau status booking melalui akun masing-masing.
                    </li>

                </ul>

            </div>


            <!-- Tombol -->
            <div class="mt-10 flex flex-col md:flex-row gap-4">

                <a href="/"
                    class="flex-1 text-center bg-gray-200 hover:bg-gray-300 py-4 rounded-2xl font-bold">

                    Kembali ke Beranda

                </a>

                <a href="#"
                    class="flex-1 text-center bg-gradient-to-r from-purple-700 to-pink-500 text-white py-4 rounded-2xl font-bold">

                    Lihat Riwayat Booking

                </a>

            </div>

        </div>

    </div>

</div>

</div>

</x-app-layout>
