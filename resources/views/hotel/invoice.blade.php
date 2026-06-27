<x-app-layout>

<div class="max-w-3xl mx-auto py-6">

<div class="bg-white rounded-2xl shadow-md p-6">

<!-- HEADER -->
<div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 mb-6">

    <!-- Judul -->
    <div class="flex-1">

        <h1 class="text-2xl sm:text-3xl font-black text-[#6250B4] leading-tight">
            Invoice Booking Pet Hotel
        </h1>

        <p class="text-xs sm:text-sm text-gray-500 mt-2 max-w-md">
            Silakan periksa kembali detail booking Anda sebelum menyelesaikan pemesanan.
        </p>

    </div>

    <!-- Kode Booking -->
    <div class="sm:text-right bg-[#F8F7FC] border border-purple-100 rounded-xl px-4 py-3 shrink-0">

        <p class="text-[10px] uppercase tracking-wider text-gray-500">
            Kode Booking
        </p>

        <p class="mt-1 text-lg sm:text-xl font-black text-[#6250B4] break-words">
            {{ $data['kode_booking'] }}
        </p>

    </div>

</div>

    <div class="bg-gray-50 rounded-xl p-4">

        <h3 class="font-bold text-lg mb-3">

            Detail Booking

        </h3>

        <div class="grid md:grid-cols-2 gap-3 text-sm">

            <div>
                <p class="text-gray-500 text-xs">Nama Pemilik</p>
                <p class="font-semibold">{{ $data['nama_pemilik'] }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Nama Hewan</p>
                <p class="font-semibold">{{ $data['nama_hewan'] }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Jenis Hewan</p>
                <p class="font-semibold">{{ $data['jenis_hewan'] }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Berat Hewan</p>
                <p class="font-semibold">{{ $data['berat'] }} Kg</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Nomor HP</p>
                <p class="font-semibold">{{ $data['nomor_hp'] }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Tipe Kamar</p>
                <p class="font-semibold">{{ $data['tipe_kamar'] }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Check In</p>
                <p class="font-semibold">{{ $data['checkin'] }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Check Out</p>
                <p class="font-semibold">{{ $data['checkout'] }}</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Lama Menginap</p>
                <p class="font-semibold">{{ $data['lama_menginap'] }} Hari</p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Antar Jemput</p>
                <p class="font-semibold">{{ $data['antar_jemput'] }}</p>
            </div>

        </div>

    </div>


    <div class="mt-5 bg-purple-50 rounded-xl p-4 text-sm">

        <h3 class="font-bold text-lg text-purple-700 mb-3">

            🧾 Ringkasan Biaya

        </h3>

        <div class="space-y-2">

            <div class="flex justify-between">

                <span>Harga Kamar / Hari</span>

                <span>

                    Rp{{ number_format($data['harga_kamar'], 0, ',', '.') }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Lama Menginap</span>

                <span>

                    {{ $data['lama_menginap'] }} Hari

                </span>

            </div>

            <div class="flex justify-between">

                <span>Subtotal Kamar</span>

                <span>

                    Rp{{ number_format($data['harga_kamar'] * $data['lama_menginap'], 0, ',', '.') }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Biaya Antar Jemput</span>

                <span>

                    Rp{{ number_format($data['biaya_jemput'], 0, ',', '.') }}

                </span>

            </div>

        </div>

        <hr class="my-3 border-purple-200">

        <div class="flex justify-between items-center">

            <span class="text-lg font-black">

                Total Pembayaran

            </span>

            <span class="text-xl font-black text-purple-700">

                Rp{{ number_format($data['total_bayar'], 0, ',', '.') }}

            </span>

        </div>

    </div>


    <form
        action="{{ route('hotel.confirm') }}"
        method="POST"
        enctype="multipart/form-data"
        class="mt-5">

        @csrf

        <div class="mt-5">

            <div class="mt-5 bg-yellow-50 border border-yellow-200 rounded-xl p-4 text-xs">

                <h3 class="font-bold text-yellow-700 mb-1">
                    📱 Konfirmasi WhatsApp
                </h3>

                <p class="text-gray-700 leading-relaxed">
                    Klik tombol di bawah untuk menghubungi WhatsApp admin. Jika ada pertanyaan, kebutuhan khusus, atau informasi tambahan mengenai booking pethotel Anda, admin siap membantu.

                </p>

            </div>

        </div>

        <div class="mt-5">
            <input
                type="hidden"
                name="pembayaran"
                value="Bayar di Tempat">

        <button
            type="submit"
            class="w-full py-3.5 rounded-xl font-bold text-sm text-white bg-[#6250B4] hover:opacity-90 transition">

            Kirim Booking ke WhatsApp

        </button>

        </div>

    </form>

</div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const radios =
    document.querySelectorAll(
        'input[name="pembayaran"]'
    );

    const transferBox =
    document.getElementById(
        'transferBox'
    );

    radios.forEach(radio => {

        radio.addEventListener(
            'change',

            function(){

                if(this.value ===
                    'Transfer Bank'){

                    if(transferBox) {
                        transferBox.classList.remove('hidden');
                    }

                }else{

                    if(transferBox) {
                        transferBox.classList.add('hidden');
                    }
                }
            }
        );

    });

});

</script>

</x-app-layout>