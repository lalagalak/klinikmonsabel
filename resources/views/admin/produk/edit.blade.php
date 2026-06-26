@extends('layouts.admin')

@if(session('success'))

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.addEventListener(
'DOMContentLoaded',

function(){

Swal.fire({

icon:'success',

title:'Produk Berhasil Diperbarui',

text:'Perubahan produk berhasil disimpan.',

showConfirmButton:false,

timer:2000,

width:480

});

});

</script>

@endif

@section('title', 'Edit Produk')

@section('content')

<!-- HEADER -->
<div class="flex flex-col lg:flex-row lg:justify-between lg:items-center gap-3 mb-4">

    <div>

        <h1 class="text-xl font-bold text-slate-800">
            Edit Produk
        </h1>

        <p class="text-xs text-gray-500 mt-1">
            Kelola detail produk petshop Monsabel
        </p>

    </div>

    <div class="flex items-center gap-2">

        <a href="/admin/produk"
           class="px-3 py-1.5 rounded-lg border border-gray-200 bg-white hover:bg-gray-50 text-sm font-medium text-gray-700 shadow-sm transition">

            ← Kembali

        </a>

    </div>

</div>

<!-- ERROR -->
@if ($errors->any())

<div class="bg-red-100 border border-red-300 text-red-700 p-5 rounded-3xl mb-6">

    <ul class="list-disc ml-5 space-y-1">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif

<form
    id="formProduk"
    action="/admin/produk/update/{{ $produk->id }}?page={{ $page }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf

    <div class="grid grid-cols-1 xl:grid-cols-12 gap-5">

        <!-- LEFT -->
        <div class="xl:col-span-4 space-y-6">

            <!-- FOTO -->
            <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100">

                <h2 class="text-lg font-semibold text-gray-800 mb-3">
                    Foto Produk
                </h2>

                <!-- PREVIEW -->
                <div class="mb-5">

                    @if($produk->gambar)

                        <img
                            id="preview"
                            src="{{ asset('produk/'.$produk->gambar) }}"
                            class="w-full h-[160px] object-cover rounded-xl border border-gray-200">

                    @else

                        <img
                            id="preview"
                            src="https://placehold.co/600x600/e5e7eb/9ca3af?text=No+Image"
                            class="w-full h-[160px] object-cover rounded-xl border border-gray-200">

                    @endif

                </div>

                <!-- INPUT -->
                <label
                    class="flex flex-col items-center justify-center border border-dashed border-purple-200 bg-purple-50 rounded-lg p-3 cursor-pointer hover:bg-purple-100 transition">

                    <span class="text-sm font-semibold text-purple-700">
                        Upload Gambar Baru
                    </span>

                    <span class="text-xs text-gray-500 mt-1">
                        JPG, PNG, JPEG
                    </span>

                    <input
                        id="gambar"
                        type="file"
                        name="gambar"
                        accept="image/*"
                        onchange="previewImage(event)"
                        class="hidden">

                </label>

            </div>
            <!-- INFO -->
            <div class="bg-white rounded-[15px] p-5 shadow-lg border border-gray-100">

                <h2 class="text-xl font-bold text-gray-800 mb-5">
                    Informasi
                </h2>

                <div class="space-y-4 text-gray-600">

                    <div class="flex justify-between">

                        <span>ID Produk</span>

                        <span class="font-bold text-gray-800">
                            #{{ $produk->id }}
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Status</span>

                        <span class="bg-green-100 text-green-600 px-4 py-1 rounded-xl text-sm font-bold">
                            Active
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span>Last Update</span>

                        <span class="font-semibold">
                            {{ $produk->updated_at->format('d M Y') }}
                        </span>

                    </div>

                </div>

            </div>

        </div>

        <!-- RIGHT -->
        <div class="xl:col-span-8">

        <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100">

            <div class="flex justify-between items-center mb-4">

                <div>

                    <h2 class="text-xl font-bold text-slate-800">
                        Detail Produk
                    </h2>

                    <p class="text-xs text-gray-500 mt-1">
                        Lengkapi informasi produk dengan detail
                    </p>

                </div>

                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-xs font-semibold">
                    Draft
                </span>

            </div>

                <!-- FORM GRID -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">

                    <!-- NAMA -->
                    <div class="md:col-span-2">

                        <label class="font-bold text-gray-700 mb-2 block">

                            Nama Produk

                        </label>

                        <input
                            type="text"
                            name="nama_produk"
                            value="{{ old('nama_produk', $produk->nama_produk) }}"
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none">

                    </div>

                    <!-- BRAND -->
                    <div>

                        <label class="font-bold text-gray-700 mb-2 block">

                            Brand

                        </label>

                        <input
                            type="text"
                            name="brand"
                            value="{{ old('brand', $produk->brand) }}"
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none">

                    </div>

                   <!-- KATEGORI -->
                    <div>

                        <label class="font-bold text-gray-700 mb-2 block">

                            Kategori

                        </label>

                        <select
                            name="kategori"
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none">

                            <option value="Makanan Kucing"
                                {{ $produk->kategori == 'Makanan Kucing' ? 'selected' : '' }}>
                                Makanan Kucing
                            </option>

                            <option value="Makanan Anjing"
                                {{ $produk->kategori == 'Makanan Anjing' ? 'selected' : '' }}>
                                Makanan Anjing
                            </option>

                            <option value="Snack"
                                {{ $produk->kategori == 'Snack' ? 'selected' : '' }}>
                                Snack
                            </option>

                            <option value="Aksesoris"
                                {{ $produk->kategori == 'Aksesoris' ? 'selected' : '' }}>
                                Aksesoris
                            </option>

                            <option value="Obat & Vitamin"
                                {{ $produk->kategori == 'Obat & Vitamin' ? 'selected' : '' }}>
                                Obat & Vitamin
                            </option>

                        </select>

                    </div>

                    <!-- HARGA -->
                    <div>

                        <label class="font-bold text-gray-700 mb-2 block">

                            Harga

                        </label>

                        <input
                            type="number"
                            name="harga"
                            value="{{ old('harga', $produk->harga) }}"
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none">

                    </div>

                    <!-- STOK -->
                    <div>

                        <label class="font-bold text-gray-700 mb-2 block">

                            Stok

                        </label>

                        <input
                            type="number"
                            name="stok"
                            value="{{ old('stok', $produk->stok) }}"
                            class="w-full border border-gray-200 bg-gray-50 rounded-xl px-4 py-3 focus:ring-2 focus:ring-purple-500 outline-none">

                    </div>

                </div>

                <!-- DESKRIPSI -->
                <div class="mt-8">

                    <label class="font-bold text-gray-700 mb-2 block">

                        Deskripsi Produk

                    </label>

                    <textarea
                        name="deskripsi"
                        rows="2"
                        class="w-full border border-gray-200 bg-gray-50 rounded-xl p-4 focus:ring-2 focus:ring-purple-500 outline-none">{{ old('deskripsi', $produk->deskripsi) }}</textarea>

                </div>

                <!-- BUTTON -->
                <div class="flex justify-end gap-3 mt-5">

                    <a href="/admin/produk"
                    class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 font-medium text-sm text-gray-700 transition">

                        Cancel

                    </a>

                    <button
                        type="submit"
                        class="px-5 py-2 rounded-lg bg-[#6250B4] hover:bg-[#5443a3] text-white text-sm font-medium shadow-md transition">

                        Update Product

                    </button>

                </div>

            </div>

        </div>

    </div>

</form>

<!-- PREVIEW IMAGE -->
<script>

function previewImage(event)
{
    const preview = document.getElementById('preview');

    preview.src =
        URL.createObjectURL(event.target.files[0]);

    Swal.fire({

        icon:'success',

        title:'Foto Berhasil Ditambahkan',

        text:'Klik "Update Produk" untuk menyimpan perubahan.',

        showConfirmButton:false,

        timer:1800,

        timerProgressBar:true,

        width:450

    });

}

</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function previewImage(event)
{
    const preview =
        document.getElementById('preview');

    preview.src =
        URL.createObjectURL(
            event.target.files[0]
        );

    Swal.fire({

        icon:'success',

        title:'Foto berhasil ditambahkan',

        text:'Gambar siap disimpan.',

        showConfirmButton:false,

        timer:1800,

        width:450

    });

}

</script>

@endsection