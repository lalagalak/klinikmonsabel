<x-app-layout>

@if(session('success'))

<div id="toast-container"
     class="fixed top-6 left-1/2 -translate-x-1/2 z-[9999]">

    <div id="toast-success"
         class="bg-white shadow-xl rounded-full px-6 py-3
                flex items-center gap-4 border
                border-green-100">

        <div class="w-10 h-10 rounded-full
                    bg-green-500 text-white
                    flex items-center justify-center">

            ✓

        </div>

        <div>

            <h4 class="font-bold text-gray-900">

                Berhasil

            </h4>

            <p class="text-sm text-gray-500">

                {{ session('success') }}

            </p>

        </div>

    </div>

</div>

@endif

<div class="min-h-screen bg-white py-6 px-4">

    <div class="max-w-6xl mx-auto">

        <div class="mb-6 flex justify-between items-center">

            <div>

                <h1 class="hero-title text-2xl font-bold text-[#1F2937]">
                    Keranjang Belanja
                </h1>

                <p class="text-gray-500 text-sm">
                    Kelola produk yang ingin kamu beli di Monsabel Petshop
                </p>

            </div>

        </div>

        <div class="grid lg:grid-cols-3 gap-6">

            <div class="lg:col-span-2">

                <div class="bg-white rounded-2xl shadow-md border overflow-hidden">

<div class="hidden md:grid grid-cols-12 px-5 py-3 border-b bg-[#FDF1E2] font-bold text-sm text-gray-600">
                        <div class="col-span-6">
                            Produk
                        </div>

                        <div class="col-span-2 text-center">
                            Qty
                        </div>

                        <div class="col-span-2 text-center">
                            Total
                        </div>

                        <div class="col-span-2 text-center">
                            Aksi
                        </div>

                    </div>


                    @php $total = 0; @endphp

                    @forelse($keranjang as $id => $item)

                    @php
                        $subtotal = $item['harga'] * $item['qty'];
                        $total += $subtotal;
                    @endphp

                    <div class="grid grid-cols-12 items-center px-5 py-4 border-b hover:bg-[#FDF1E2] transition">

                        <div class="col-span-6 flex items-center gap-4">

                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 shadow-sm flex-shrink-0">

                                @if(isset($item['gambar']))
                                    <img src="{{ asset('produk/'.$item['gambar']) }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-2xl">
                                        🐾
                                    </div>
                                @endif

                            </div>


                            <div>

                                <h2 class="text-base font-bold text-gray-800 mb-0.5">

                                    {{ $item['nama'] }}

                                </h2>

                                <p class="text-xs text-gray-500">
                                    Produk Petshop Monsabel
                                </p>

                                <div class="mt-1 text-[#6250B4] font-bold text-sm">

                                    Rp{{ number_format($item['harga'], 0, ',', '.') }}

                                </div>

                            </div>

                        </div>


                        <div class="col-span-2 flex justify-center">

                            <div class="flex items-center border-2 border-gray-200 rounded-xl overflow-hidden">

                               @if($item['qty'] == 1)
                                <button
                                    onclick="hapusJikaSatu('{{ $id }}')"
                                    class="px-2.5 py-1 text-sm hover:bg-gray-100">
                                    -
                                </button>

                                @else

                                <a href="/keranjang/kurangqty/{{ $id }}"
                                class="px-2.5 py-1 text-sm hover:bg-gray-100">
                                    -
                                </a>

                                @endif

                                <div class="px-3 font-bold text-sm">

                                    {{ $item['qty'] }}

                                </div>

                                <a href="/keranjang/tambahqty/{{ $id }}"
                                class="px-2.5 py-1 text-sm hover:bg-gray-100">
                                    +
                                </a>

                            </div>

                        </div>


                        <div class="col-span-2 text-center">

                            <div class="text-base font-bold text-gray-800">

                                Rp{{ number_format($subtotal, 0, ',', '.') }}

                            </div>

                        </div>


                        <div class="col-span-2 flex justify-center">

                        <button
                            onclick="hapusProduk('{{ $id }}')"
                            class="bg-red-100 hover:bg-red-500
                                text-red-500 hover:text-white
                                px-3 py-1.5 rounded-xl
                                text-xs font-bold transition">

                            Hapus

                        </button>

                        </div>

                    </div>

                    @empty

                    <div class="text-center py-16">

                        <div class="text-6xl mb-4">
                            🛒
                        </div>

                        <h2 class="text-xl font-bold text-gray-700 mb-1">
                            Keranjang Masih Kosong
                        </h2>

                        <p class="text-gray-500 text-sm mb-5">
                            Yuk tambahkan produk favoritmu dulu
                        </p>

                        <a href="/petshop"
                            class="bg-[#6250B4] text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-md hover:bg-[#5643A6] transition">
                            Belanja Sekarang

                        </a>

                    </div>

                    @endforelse

                </div>


                @if(count($keranjang) > 0)

                <div class="mt-5 flex gap-3">

                    <a href="/petshop"
                        class="bg-white border-2 border-[#6250B4] text-[#6250B4] px-5 py-2.5 rounded-xl text-sm font-bold hover:bg-[#FDF1E2] transition">
                        + Tambah Produk Lagi

                    </a>

                        <button
                            onclick="kosongkanKeranjang()"
                            class="bg-red-500 hover:bg-red-600
                                text-white px-5 py-2.5 rounded-xl
                                text-sm font-bold">

                            Kosongkan Keranjang

                        </button>
                </div>

                @endif

            </div>



            <div>

                <div class="bg-white rounded-2xl shadow-md border p-6 sticky top-24">

                    <h2 class="hero-title text-2xl font-bold text-[#1F2937] mb-4">
                        Ringkasan Pesanan
                    </h2>


                    <div class="flex gap-2 mb-5">

                        <input type="text"
                               placeholder="Kode voucher"
                               class="flex-1 border-2 border-gray-200 rounded-xl px-4 py-2 text-sm focus:outline-none focus:border-purple-500">

                        <button class="bg-[#6250B4] text-white px-4 rounded-xl text-sm font-bold hover:bg-[#5643A6]">

                            Apply

                        </button>

                    </div>



                    <div class="space-y-3 border-b pb-4 text-sm">

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

                            <span class="font-bold text-green-500">
                                Gratis
                            </span>

                        </div>


                        <div class="flex justify-between">

                            <span class="text-gray-500">
                                Diskon
                            </span>

                            <span class="font-bold text-pink-500">
                                Rp0
                            </span>

                        </div>

                    </div>



                    <div class="flex justify-between items-center py-4">

                        <span class="text-lg font-bold">
                            Total
                        </span>

                        <span class="text-2xl font-bold text-[#6250B4]">

                            Rp{{ number_format($total, 0, ',', '.') }}

                        </span>

                    </div>

                    <div class="bg-[#F4F0DD] border-[#E9DFC1] rounded-xl p-4 mb-5">

                        <div class="flex items-start gap-2.5">

                            <div class="text-xl">
                                🚚
                            </div>

                            <div>

                                <h3 class="font-bold text-sm text-gray-800 mb-0.5">
                                    Pengiriman Monsabel
                                </h3>

                                <p class="text-xs text-gray-500 leading-relaxed">

                                    Pengiriman khusus area Medan menggunakan kurir klinik atau bisa ambil langsung di klinik.

                                </p>

                            </div>

                        </div>

                    </div>



                    <a href="/checkout"
                        class="block w-full bg-[#6250B4] text-white text-center py-3 rounded-xl font-bold text-base shadow-md hover:bg-[#5643A6] transition">

                        Checkout Sekarang

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

// Contoh untuk fungsi hapusProduk
function hapusProduk(id){
    Swal.fire({
        title: 'Apakah Anda yakin untuk menghapus?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
        reverseButtons: true,
        // TAMBAHKAN INI UNTUK MENGECILKAN TAMPILAN:
        customClass: {
            popup: 'w-80 text-sm',
            title: 'text-lg',
            actions: 'text-sm'
        }
    }).then((result)=>{
        if(result.isConfirmed){
            window.location = '/keranjang/hapus/' + id;
        }
    });
}

function kosongkanKeranjang(){

    Swal.fire({
        title: 'Kosongkan seluruh keranjang?',
        text: 'Semua produk akan dihapus',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
        reverseButtons: true
    }).then((result)=>{

        if(result.isConfirmed){

            window.location =
                '/keranjang/kosongkan';

        }

    });

}

function hapusJikaSatu(id){

    Swal.fire({
        title: 'Apakah Anda yakin untuk menghapus?',
        text: 'Produk akan dihapus dari keranjang',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak',
        reverseButtons: true
    }).then((result)=>{

        if(result.isConfirmed){

            window.location =
                '/keranjang/kurangqty/' + id;

        }

    });

}

</script>

<script>

setTimeout(() => {

    const toast =
        document.getElementById(
            'toast-container'
        );

    if(toast){

        toast.remove();

    }

},3000);

</script>

</x-app-layout>