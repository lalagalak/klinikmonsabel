<x-app-layout>

<div class="max-w-3xl mx-auto py-6">

<div class="bg-white rounded-2xl shadow-md p-6">

    {{-- HEADER --}}
    <div class="flex justify-between items-center mb-5">

        <div>

            <h1 class="text-2xl font-black text-[#6250B4]">

                Invoice Booking Grooming

            </h1>

            <p class="text-sm text-gray-500 mt-1">

                Silakan periksa kembali detail booking Anda.

            </p>

        </div>

        <div class="text-right">

            <p class="text-xs text-gray-500">

                Kode Booking

            </p>

            <p class="font-black text-lg text-[#6250B4]">

                {{ $data['kode_booking'] }}

            </p>

        </div>

    </div>



    {{-- DETAIL BOOKING --}}
    <div class="bg-gray-50 rounded-xl p-4">

        <h3 class="font-bold text-lg mb-3">

            Detail Booking

        </h3>

        <div class="grid md:grid-cols-2 gap-3 text-sm">

            <div>
                <p class="text-gray-500 text-xs">Nama Hewan</p>
                <p class="font-semibold">
                    {{ $data['nama_hewan'] }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Jenis Hewan</p>
                <p class="font-semibold">
                    {{ $data['jenis_hewan'] }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Layanan</p>
                <p class="font-semibold">
                    {{ $data['layanan'] }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Metode Grooming</p>
                <p class="font-semibold">
                    {{ $data['metode'] }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Tanggal Booking</p>
                <p class="font-semibold">
                    {{ $data['tanggal'] }}
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Antar Jemput</p>
                <p class="font-semibold">
                    {{ $data['antar_jemput'] }}
                </p>
            </div>

        </div>

    </div>



    {{-- RINGKASAN BIAYA --}}
    <div class="mt-5 bg-purple-50 rounded-xl p-4 text-sm">

        <h3 class="font-bold text-lg text-[#6250B4] mb-3">

            🧾 Ringkasan Biaya

        </h3>

        <div class="space-y-2">

            <div class="flex justify-between">

                <span>Paket Grooming</span>

                <span>

                    Rp {{ number_format($data['harga']) }}

                </span>

            </div>

            <div class="flex justify-between">

                <span>Biaya Antar Jemput</span>

                <span>

                    Rp {{ number_format($data['biaya_jemput']) }}

                </span>

            </div>

        </div>

        <hr class="my-3 border-purple-200">

        <div class="flex justify-between items-center">

            <span class="text-lg font-black">

                Total Pembayaran

            </span>

            <span class="text-xl font-black text-[#6250B4]">

                Rp {{ number_format($data['total']) }}

            </span>

        </div>

    </div>



    {{-- INFO --}}
    <div class="mt-5 bg-yellow-50 border border-yellow-200 rounded-xl p-4 text-xs">

        <h3 class="font-bold text-yellow-700 mb-1">

            📱 Konfirmasi WhatsApp

        </h3>

        <p class="text-gray-700 leading-relaxed">

            Setelah menekan tombol di bawah, data booking akan otomatis tersimpan ke sistem Klinik Hewan Monsabel dan Anda akan diarahkan ke WhatsApp admin untuk konfirmasi jadwal grooming.

        </p>

    </div>



    {{-- TOMBOL --}}
    <form
        action="{{ route('grooming.confirm') }}"
        method="POST"
        class="mt-5">

        @csrf

        <button
            type="submit"
            class="w-full py-3.5 rounded-xl font-bold text-sm text-white bg-[#6250B4] hover:opacity-90 transition">

            Kirim Booking ke WhatsApp

        </button>

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

                    transferBox.classList.remove(
                        'hidden'
                    );

                }else{

                    transferBox.classList.add(
                        'hidden'
                    );
                }
            }
        );

    });

});

</script>

</x-app-layout>