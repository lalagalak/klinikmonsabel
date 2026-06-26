<x-app-layout>

<div class="min-h-screen bg-[#f7f8fc] flex items-center justify-center px-4 py-8">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl overflow-hidden">

        <div class="p-6 text-center">

            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">

                <div class="text-3xl">
                    ✅
                </div>

            </div>

            <h1 class="text-2xl font-bold text-gray-800 mb-1">
                Pesanan Berhasil!
            </h1>

            <p class="text-gray-500 text-sm leading-relaxed">

                Terima kasih telah berbelanja di Monsabel Clinic 🐾

            </p>

        </div>



        <div class="bg-gray-50 px-6 py-4 border-y">

            <div class="text-center">

                <p class="text-gray-400 text-xs uppercase tracking-widest mb-1">

                    Nomor Pesanan

                </p>

                <h2 class="text-xl font-bold text-gray-800">

                    #ORD-{{ $id }}

                </h2>

            </div>

        </div>



        <div class="p-6 space-y-4">

            <div class="flex items-start gap-3">

                <div class="text-xl mt-0.5">
                    📦
                </div>

                <div>

                    <h3 class="font-bold text-gray-800 text-sm">
                        Pesanan Sedang Diproses
                    </h3>

                    <p class="text-gray-500 text-xs leading-relaxed mt-0.5">

                        Admin Monsabel akan segera memverifikasi pembayaran dan menyiapkan pesananmu.

                    </p>

                </div>

            </div>



            <div class="flex items-start gap-3">

                <div class="text-xl mt-0.5">
                    🚚
                </div>

                <div>

                    <h3 class="font-bold text-gray-800 text-sm">
                        Pengiriman / Pengambilan
                    </h3>

                    <p class="text-gray-500 text-xs leading-relaxed mt-0.5">

                        Jika memilih kurir klinik, admin akan menghubungi melalui WhatsApp.
                        Jika ambil di klinik, cukup tunjukkan nomor pesanan ini.

                    </p>

                </div>

            </div>

        </div>

        <div class="px-6 pb-6 grid md:grid-cols-2 gap-3">

            <a href="/petshop"
            class="bg-[#6250B4]
                    text-white
                    py-2.5
                    rounded-xl
                    text-center
                    font-bold
                    text-sm
                    shadow-md
                    hover:bg-[#5645A8]
                    transition">

                Lanjut Belanja

            </a>

            <a href="/history"
            class="border-2
                    border-[#6250B4]
                    text-[#6250B4]
                    py-2.5
                    rounded-xl
                    text-center
                    font-bold
                    text-sm
                    hover:bg-[#F4F0FF]
                    transition">

                Lihat Riwayat

            </a>

        </div>
    </div>

</div>

</x-app-layout>