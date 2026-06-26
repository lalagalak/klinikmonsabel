<x-app-layout>

<div class="min-h-screen bg-gray-50 py-12">

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- HEADER -->
            <div class="bg-gradient-to-r from-purple-700 to-pink-500 p-8 text-white text-center">

                <div class="text-6xl mb-4">
                    🏨🐾
                </div>

                <h1 class="text-4xl font-black">

                    Booking Pet Hotel Berhasil

                </h1>

                <p class="mt-3 text-lg text-white/90">

                    Terima kasih telah melakukan booking Pet Hotel di Monsabel Clinic

                </p>

            </div>

            <!-- CONTENT -->
            <div class="p-8">

                <div class="bg-purple-50 rounded-2xl p-6 mb-8">

                    <h2 class="text-2xl font-black text-purple-700 mb-3">

                        Kode Booking

                    </h2>

                    <div class="text-3xl font-black text-purple-700">

                        {{ $booking->kode_booking }}

                    </div>

                </div>

                <div class="grid md:grid-cols-2 gap-6">

                    <div>
                        <p class="text-gray-500">Nama Pemilik</p>
                        <p class="font-bold">{{ $booking->nama_pemilik }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Nama Hewan</p>
                        <p class="font-bold">{{ $booking->nama_hewan }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Jenis Hewan</p>
                        <p class="font-bold">{{ $booking->jenis_hewan }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Berat Hewan</p>
                        <p class="font-bold">{{ $booking->berat }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Tipe Kamar</p>
                        <p class="font-bold">{{ $booking->tipe_kamar }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Nomor HP</p>
                        <p class="font-bold">{{ $booking->nomor_hp }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Check In</p>
                        <p class="font-bold">{{ $booking->checkin }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Check Out</p>
                        <p class="font-bold">{{ $booking->checkout }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500">Lama Menginap</p>
                        <p class="font-bold">
                            {{ $booking->lama_menginap }} Hari
                        </p>
                    </div>

                    <div>
                        <p class="text-gray-500">Metode Pembayaran</p>
                        <p class="font-bold">
                            {{ $booking->pembayaran }}
                        </p>
                    </div>

                </div>

                <hr class="my-8">

                <!-- PEMBAYARAN -->
                <div class="bg-gray-50 rounded-2xl p-6">

                    <div class="flex justify-between mb-4">

                        <span>Harga Kamar</span>

                        <span class="font-bold">

                            Rp {{ number_format($booking->harga_kamar,0,',','.') }}

                        </span>

                    </div>

                    <div class="flex justify-between mb-4">

                        <span>Biaya Antar Jemput</span>

                        <span class="font-bold">

                            Rp {{ number_format($booking->biaya_jemput,0,',','.') }}

                        </span>

                    </div>

                    <hr class="my-4">

                    <div class="flex justify-between">

                        <span class="text-xl font-black">

                            Total Pembayaran

                        </span>

                        <span class="text-3xl font-black text-purple-700">

                            Rp {{ number_format($booking->total_bayar,0,',','.') }}

                        </span>

                    </div>

                </div>

                <!-- STATUS -->
                <div class="mt-8">

                    <h3 class="font-bold text-xl mb-3">

                        Status Booking

                    </h3>

                    <span class="inline-block px-5 py-3 rounded-full bg-yellow-100 text-yellow-700 font-bold">

                        {{ $booking->status }}

                    </span>

                </div>

                <!-- INFORMASI -->
                <div class="mt-8 bg-purple-50 border border-purple-200 rounded-2xl p-6">

                    <h4 class="font-bold text-purple-700 mb-3">

                        Informasi Booking

                    </h4>

                    <ul class="space-y-2 text-gray-700">

                        <li>
                            • Simpan kode booking ini sebagai bukti penitipan.
                        </li>

                        <li>
                            • Tunjukkan kode booking saat check-in hewan.
                        </li>

                        <li>
                            • Status booking dapat berubah setelah diverifikasi admin.
                        </li>

                        <li>
                            • Pantau status melalui menu Riwayat Booking.
                        </li>

                    </ul>

                </div>

                <!-- BUTTON -->
                <div class="mt-10 flex flex-col md:flex-row gap-4">

                    <a href="/"
                       class="flex-1 text-center bg-gray-200 py-4 rounded-2xl font-bold hover:bg-gray-300">

                        Kembali ke Beranda

                    </a>

                    <a href="/history"
                       class="flex-1 text-center bg-gradient-to-r from-purple-700 to-pink-500 text-white py-4 rounded-2xl font-bold">

                        Lihat Riwayat Booking

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

</x-app-layout>