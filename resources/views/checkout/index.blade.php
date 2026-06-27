<x-app-layout>

<div class="min-h-screen bg-white py-6 px-4">

    <div class="max-w-6xl mx-auto">

        <div class="mb-6">

            <h1 class="hero-title text-2xl font-bold text-[#1F2937] mb-1">
                Checkout Pesanan
            </h1>

            <p class="text-gray-500 text-sm">
                Lengkapi informasi pengiriman dan pembayaran pesanan Anda.
            </p>

        </div>



        <form method="POST"
              action="/checkout/proses"
              enctype="multipart/form-data">

            @csrf

            <div class="grid lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 space-y-5">

                    <div class="bg-white rounded-xl shadow-md border p-4">

                        <div class="flex items-center justify-between flex-wrap gap-3">

                            <div class="flex items-center gap-2.5">

                                <div class="w-8 h-8 rounded-full bg-[#6250B4] text-white flex items-center justify-center font-bold text-sm">
                                    1
                                </div>

                                <div>
                                    <h2 class="font-bold text-base">
                                        Data Customer
                                    </h2>

                                    <p class="text-xs text-gray-500">
                                        Informasi penerima pesanan
                                    </p>
                                </div>

                            </div>


                            <div class="hidden md:flex items-center gap-2 text-gray-400">

                                <div class="w-12 h-[2px] bg-gray-200"></div>

                                <div class="w-8 h-8 rounded-full bg-pink-500 text-white flex items-center justify-center font-bold text-sm">
                                    2
                                </div>

                                <div class="w-12 h-[2px] bg-gray-200"></div>

                                <div class="w-8 h-8 rounded-full bg-blue-500 text-white flex items-center justify-center font-bold text-sm">
                                    3
                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="bg-white rounded-2xl shadow-md border p-6">

                        <h2 class="hero-title text-xl font-bold text-gray-800 mb-5">
                            Informasi Pelanggan
                        </h2>


                        <div class="grid md:grid-cols-2 gap-4">

                            <div>

                                <label class="font-bold text-sm text-gray-700 block mb-1.5">
                                    Nama Lengkap
                                </label>

                                <input type="text"
                                       name="nama"
                                       value="{{ auth()->user()->name }}"
                                       readonly
                                       class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm bg-gray-100">

                            </div>


                            <div>

                                <label class="font-bold text-sm text-gray-700 block mb-1.5">
                                    Nomor HP
                                </label>

                                <input type="text"
                                       name="nohp"
                                       required
                                       placeholder="08xxxxxxxxxx"
                                       class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6250B4]">

                            </div>

                        </div>


                        <div class="mt-4">

                            <label class="font-bold text-sm text-gray-700 block mb-1.5">
                                Alamat Lengkap
                            </label>

                            <textarea
                                        id="alamat"
                                        name="alamat"
                                      rows="4"
                                      required
                                      placeholder="Masukkan alamat lengkap area Medan"
                                      class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-[#6250B4]"></textarea>

                        </div>


                        <div class="mt-4">

                            <label class="font-bold text-sm text-gray-700 block mb-1.5">
                                Catatan Pesanan
                            </label>

                            <textarea name="catatan"
                                      rows="2"
                                      placeholder="Contoh: pagar warna hitam, telpon dulu sebelum sampai"
                                      class="w-full border-2 border-gray-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:border-purple-500"></textarea>

                        </div>

                    </div>



                    <div class="bg-white rounded-2xl shadow-md border p-6">

                        <h2 class="hero-title text-xl font-bold text-gray-800 mb-5">
                            Metode Pengiriman 
                        </h2>


                        <div class="grid md:grid-cols-2 gap-4">

                            <label class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-[#6250B4] transition">

                                <input type="radio"
                                       name="pengiriman"
                                       value="Ambil di Klinik"
                                       checked
                                       class="mb-2.5">

                                <div class="text-3xl mb-2">
                                    🏥
                                </div>

                                <h3 class="font-bold text-base mb-1">
                                    Ambil di Klinik
                                </h3>

                                <p class="text-xs text-gray-500 leading-relaxed">
                                    Ambil langsung produk di Klinik Monsabel Medan.
                                </p>

                                <div class="mt-3 text-green-500 font-bold text-sm">
                                    Gratis
                                </div>

                            </label>



                            <label class="border-2 border-gray-200 rounded-xl p-4 cursor-pointer hover:border-[#6250B4] transition">

                                <input type="radio"
                                       name="pengiriman"
                                       value="Kurir Klinik"
                                       class="mb-2.5">

                                <div class="text-3xl mb-2">
                                    🛵
                                </div>

                                <h3 class="font-bold text-base mb-1">
                                    Kurir Klinik
                                </h3>

                                <p class="text-xs text-gray-500 leading-relaxed">
                                    Pengiriman khusus area Medan oleh admin/kurir klinik.
                                </p>

                                <div class="mt-3 text-purple-600 font-bold text-sm">
                                    Ongkir Flat Rp 15.000
                                </div>

                            </label>

                        </div>


                        <div class="mt-4 bg-[#FDF1E2] border-[#F0E2C8] rounded-xl p-4">

                            <div class="flex gap-3">

                                <div class="text-xl">
                                    📍
                                </div>

                                <div>

                                    <h3 class="font-bold text-sm text-yellow-700 mb-0.5">
                                        Area Pengiriman
                                    </h3>

                                    <p class="text-yellow-600 text-xs leading-relaxed">

                                        Pengiriman hanya tersedia untuk wilayah Medan dan sekitarnya.

                                    </p>

                                </div>

                            </div>

                        </div>

                    </div>



                    <div class="bg-white rounded-2xl shadow-md border p-6">

                        <h2 class="hero-title text-xl font-bold text-gray-800 mb-5">
                            Metode Pembayaran
                        </h2>


                        <div class="grid md:grid-cols-2 gap-4">

                            <label class="border-2 border-[#6250B4] bg-[#FDF1E2] rounded-xl p-4 cursor-pointer">

                                <input type="radio"
                                       name="metode"
                                       value="Transfer Bank"
                                       checked
                                       class="mb-2.5">

                                <div class="text-3xl mb-2">
                                    🏦
                                </div>

                                <h3 class="font-bold text-base mb-2">
                                    Transfer Manual
                                </h3>

                                <div class="space-y-1 text-xs text-gray-700 font-medium">

                                    <div>
                                        BCA : 123456789
                                    </div>

                                    <div>
                                        BRI : 987654321
                                    </div>

                                    <div>
                                        DANA : 08123456789
                                    </div>

                                    <div>
                                        GOPAY : 08123456789
                                    </div>

                                </div>

                            </label>



                            <div class="border-2 border-dashed border-gray-300 rounded-xl p-4">

                                <div class="text-3xl mb-2">
                                    📤
                                </div>

                                <h3 class="font-bold text-base mb-1">
                                    Upload Bukti Transfer
                                </h3>

                                <p class="text-xs text-gray-500 mb-3">
                                    Upload screenshot bukti pembayaran
                                </p>

                                <input type="file"
                                    id="bukti_transfer"
                                    name="bukti_transfer"
                                    accept="image/*"
                                    class="w-full border border-gray-200 rounded-xl p-2.5 text-xs">

                            </div>

                        </div>

                    </div>

                </div>



                <div>

                    <div class="bg-white rounded-2xl shadow-md border p-6 sticky top-24">

                        <h2 class="hero-title text-xl font-bold text-gray-800 mb-5">
                            Ringkasan Pesanan
                        </h2>


                        <div class="space-y-4 max-h-[300px] overflow-y-auto pr-1">

                            @foreach($cart as $item)

                            <div class="flex gap-3 border-b pb-4">

                                <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">

                                    @if(isset($item['gambar']))
                                        <img src="{{ asset('produk/'.$item['gambar']) }}"
                                             class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-xl">
                                            🐾
                                        </div>
                                    @endif

                                </div>


                                <div class="flex-1">

                                    <h3 class="font-bold text-sm text-gray-800 line-clamp-1">

                                        {{ $item['nama'] }}

                                    </h3>

                                    <p class="text-xs text-gray-500 mt-0.5">

                                        Qty : {{ $item['qty'] }}

                                    </p>

                                    <div class="mt-1.5 font-bold text-purple-600 text-sm">

                                        Rp{{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}

                                    </div>

                                </div>

                            </div>

                            @endforeach

                        </div>



                        <div class="mt-5 border-t pt-4 space-y-2.5 text-sm">

                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Subtotal
                                </span>

                                <span class="font-bold">
                                    Rp{{ number_format($total, 0, ',', '.') }}
                                </span>

                            </div>


                            <div class="flex justify-between">

                                <span class="text-gray-500">
                                    Ongkir
                                </span>

                                <span id="ongkirText"
                                    class="font-bold text-green-600">

                                    Rp0

                                </span>

                            </div>

                            <div class="flex justify-between items-center pt-3 border-t">

                                <span class="text-base font-bold">
                                    Total
                                </span>

                                <span id="grandTotal"
                                    class="text-2xl font-bold text-purple-600">

                                    Rp{{ number_format($total, 0, ',', '.') }}

                                </span>

                            </div>

                        </div>



                        <button class="w-full mt-5 bg-gradient-to-r from-purple-600 to-pink-500 text-white py-3 rounded-xl text-base font-bold shadow-md hover:scale-[1.01] transition">

                            Buat Pesanan 💜

                        </button>

                    </div>

                </div>

            </div>

        </form>

    </div>

</div>

<script>

const subtotal = {{ $total }};

const radios =
document.querySelectorAll('input[name="pengiriman"]');

const ongkirText =
document.getElementById('ongkirText');

const grandTotal =
document.getElementById('grandTotal');

function updateTotal(){

    let ongkir = 0;

    const selected =
    document.querySelector(
        'input[name="pengiriman"]:checked'
    );

    if(selected.value == 'Kurir Klinik'){
        ongkir = 15000;
    }

    const total = subtotal + ongkir;

    ongkirText.innerHTML =
        'Rp' +
        ongkir.toLocaleString('id-ID');

    grandTotal.innerHTML =
        'Rp' +
        total.toLocaleString('id-ID');
}

radios.forEach(radio => {

    radio.addEventListener(
        'change',
        updateTotal
    );

});

updateTotal();

</script>

<script>

document
.getElementById('bukti_transfer')
.addEventListener('change', function(){

    if(this.files.length > 0){

        Swal.fire({

            icon: 'success',

            title: 'Bukti Transfer Berhasil Diupload',

            text: 'File siap dikirim bersama pesanan',

            showConfirmButton: false,

            timer: 2000,

            width: 500

        });

    }

});

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-app-layout>