@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')

<!-- HEADER -->
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-3 mb-5">

    <div>

        <h1 class="text-3xl font-black text-[#14213d]">
            Tambah Produk Baru
        </h1>

        <p class="text-gray-500 mt-1 text-sm">
            Tambahkan produk baru ke petshop Monsabel
        </p>

    </div>



    <!-- ACTION -->
    <div class="flex gap-3">

        <a href="/admin/produk"
           class="bg-white border border-gray-200
                  px-4 py-2 rounded-lg
                  font-semibold text-gray-700
                  hover:bg-gray-100 transition">

            ← Kembali

        </a>

    </div>

</div>





<!-- FORM -->
<form action="/admin/produk/store"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <div class="grid grid-cols-12 gap-4">

        <!-- LEFT -->
        <div class="col-span-4 space-y-6">

            <!-- FOTO -->
            <div class="bg-white rounded-xl shadow-sm p-4 border border-gray-100">

                <h2 class="text-lg font-bold text-[#14213d] mb-3">
                    Upload Foto
                </h2>

                <!-- PREVIEW -->
                <div id="preview-container"
                     class="w-full h-[180px]
                            rounded-xl border-2 border-dashed
                            border-gray-300 overflow-hidden
                            flex items-center justify-center
                            bg-gray-50">

                    <img id="preview-image"
                         class="hidden w-full h-full object-cover">

                    <div id="placeholder"
                         class="text-center">

                        <div class="text-4xl mb-4">
                            📸
                        </div>

                        <p class="text-gray-500">
                            Upload foto produk
                        </p>

                    </div>

                </div>

                <!-- INPUT -->
                <label class="mt-3 block">

                <input
                    type="file"
                    name="gambar"
                    id="gambar"
                    accept="image/*"
                    class="hidden">

                <div class="bg-[#6250B4]
                            hover:bg-[#5443a3]
                            text-white text-center
                            py-2.5 rounded-lg
                            text-sm font-semibold
                            cursor-pointer
                            shadow-md
                            transition">

                    Pilih Gambar

                </div>

            </label>

                </label>

            </div>

            <!-- STATUS -->
            <div class="bg-white rounded-[30px] shadow-xl p-6">

                <h2 class="text-lg font-bold text-[#14213d] mb-5">
                    Visibility
                </h2>

                <div class="flex items-center justify-between">

                    <div>

                        <p class="font-semibold text-gray-700">
                            Tampilkan Produk
                        </p>

                        <p class="text-sm text-gray-500">
                            Produk akan tampil di petshop
                        </p>

                    </div>

                    <label class="relative inline-flex items-center cursor-pointer">

                        <input type="checkbox"
                               checked
                               class="sr-only peer">

                        <div class="w-14 h-7
                                    bg-gray-200
                                    rounded-full
                                    peer
                                    peer-checked:bg-purple-600
                                    transition">

                        </div>

                    </label>

                </div>

            </div>

        </div>





        <!-- RIGHT -->
        <div class="col-span-8">

            <div class="bg-white rounded-[30px] shadow-xl p-8">

                <!-- TOP -->
                <div class="flex justify-between items-center mb-4">

                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Detail Produk
                    </h2>

                    <p class="text-xs text-gray-500 mt-1">
                        Informasi lengkap produk petshop
                    </p>

                </div>

                <span class="bg-yellow-100 text-yellow-700
                            px-3 py-1 rounded-full
                            text-xs font-semibold">

                    Draft

                </span>

                </div>

                <!-- FORM GRID -->
                <div class="grid grid-cols-2 gap-3">

                    <!-- NAMA -->
                    <div class="col-span-2">

                        <label class="text-sm font-semibold text-gray-700 block mb-1">
                            Nama Produk
                        </label>

                        <input
                            type="text"
                            name="nama_produk"
                            placeholder="Masukkan nama produk"
                            class="w-full border border-gray-200
                                rounded-lg px-3 py-2 text-sm
                                focus:outline-none
                                focus:ring-1
                                focus:ring-[#6250B4]">

                    </div>

                    <!-- KATEGORI -->
                    <div>

                        <label class="text-sm font-semibold text-gray-700 block mb-1">
                            Kategori
                        </label>

                        <select
                            name="kategori"
                            class="w-full border border-gray-200
                                rounded-lg px-3 py-2 text-sm
                                focus:outline-none
                                focus:ring-1
                                focus:ring-[#6250B4]">

                            <option value="">
                                Pilih kategori
                            </option>

                            <option>
                                Makanan Kucing
                            </option>

                            <option>
                                Makanan Anjing
                            </option>

                            <option>
                                Obat & Vitamin
                            </option>

                            <option>
                                Grooming
                            </option>

                            <option>
                                Aksesoris
                            </option>

                        </select>

                    </div>

                    <!-- BRAND -->
                    <div>

                        <label class="text-sm font-semibold text-gray-700 block mb-1">
                            Brand
                        </label>

                        <input
                            type="text"
                            name="brand"
                            placeholder="Contoh: Royal Canin"
                            class="w-full border border-gray-200
                                rounded-lg px-3 py-2 text-sm
                                focus:outline-none
                                focus:ring-1
                                focus:ring-[#6250B4]">

                    </div>

                    <!-- HARGA -->
                    <div>

                        <label class="text-sm font-semibold text-gray-700 block mb-1">
                            Harga
                        </label>

                        <input
                            type="number"
                            name="harga"
                            placeholder="Masukkan harga"
                            class="w-full border border-gray-200
                                rounded-lg px-3 py-2 text-sm
                                focus:outline-none
                                focus:ring-1
                                focus:ring-[#6250B4]">

                    </div>

                    <!-- STOK -->
                    <div>

                        <label class="text-sm font-semibold text-gray-700 block mb-1">
                            Stok
                        </label>

                        <input
                            type="number"
                            name="stok"
                            placeholder="Jumlah stok"
                            class="w-full border border-gray-200
                                rounded-lg px-3 py-2 text-sm
                                focus:outline-none
                                focus:ring-1
                                focus:ring-[#6250B4]">

                    </div>

                    <!-- DESKRIPSI -->
                    <div class="col-span-2">

                        <label class="text-sm font-semibold text-gray-700 block mb-1">
                            Deskripsi Produk
                        </label>

                        <textarea
                            name="deskripsi"
                            rows="3"
                            placeholder="Masukkan deskripsi produk..."
                            class="w-full border border-gray-200
                                rounded-lg px-3 py-2 text-sm
                                focus:outline-none
                                focus:ring-1
                                focus:ring-[#6250B4]"></textarea>

                    </div>

                </div>

               <!-- BUTTON -->
                <div class="flex justify-end gap-3 mt-5">

                    <a href="/admin/produk"
                    class="px-4 py-2 rounded-lg
                            border border-gray-200
                            bg-white
                            text-sm font-medium text-gray-700
                            hover:bg-gray-50 transition">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2 rounded-lg
                            bg-[#6250B4]
                            hover:bg-[#5443a3]
                            text-white
                            text-sm font-semibold
                            shadow-md
                            transition">

                        Publish Product

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>





<!-- PREVIEW IMAGE -->
<script>

document.getElementById('gambar').addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(event){

            document.getElementById('preview-image').src = event.target.result;

            document.getElementById('preview-image').classList.remove('hidden');

            document.getElementById('placeholder').classList.add('hidden');

        }

        reader.readAsDataURL(file);

    }

});

</script>

@endsection