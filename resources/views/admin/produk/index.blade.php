@extends('layouts.admin')

@section('title', 'Produk Petshop')

@section('content')

<!-- HEADER -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">

    <div>
        <h1 class="text-3xl font-black text-slate-800">
            Manajemen Produk
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Kelola produk petshop Klinik Hewan Monsabel
        </p>
    </div>

    <a href="/admin/produk/create"
       class="bg-[#6250B4] hover:bg-[#52429c]
       text-white px-5 py-3 rounded-xl
       font-semibold shadow-md transition">

        + Tambah Produk

    </a>

</div>

@if(session('success'))

<script>

document.addEventListener('DOMContentLoaded',function(){

Swal.fire({

icon:'success',

title:'{{ session("success") }}',

showConfirmButton:false,

timer:1800,

timerProgressBar:true,

width:420

});

});

</script>

@endif


<div class="bg-white rounded-3xl border border-purple-100 shadow-md overflow-hidden">

    <!-- TOP BAR -->
    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 px-6 py-4 bg-slate-50 border-b">

        <div class="flex gap-2">

            <button class="px-4 py-2 rounded-lg bg-green-100 text-green-700 text-sm font-medium">
                + Add
            </button>

            <button class="px-4 py-2 rounded-lg bg-red-100 text-red-600 text-sm font-medium">
                Delete
            </button>

            <button class="px-4 py-2 rounded-lg bg-blue-100 text-blue-600 text-sm font-medium">
                Action
            </button>

        </div>

        <form method="GET"
      action="{{ url('/admin/produk') }}"
      class="flex gap-2 w-full lg:w-auto">

    <input
        type="text"
        name="search"
        value="{{ request('search') }}"
        placeholder="Cari produk..."
        class="w-full lg:w-72 px-4 py-2.5 rounded-xl border border-gray-200 bg-white focus:ring-2 focus:ring-[#6250B4] outline-none">

    <button
        type="submit"
        class="px-5 rounded-xl bg-[#6250B4] text-white hover:bg-[#5541aa]">

        Cari

    </button>

    <a href="{{ url('/admin/produk') }}"
   class="px-5 py-2 rounded-xl bg-gray-100 hover:bg-gray-200">

    Reset

</a>

</form>

    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead>

                <tr class="bg-slate-50 border-b text-xs uppercase tracking-wider text-gray-500">

                    <th class="px-4 py-3 w-10">
                        <input type="checkbox">
                    </th>

                    <th class="px-4 py-3">
                        Gambar
                    </th>

                    <th class="px-4 py-3">
                        Produk
                    </th>

                    <th class="px-4 py-3">
                        Kategori
                    </th>

                    <th class="px-4 py-3">
                        Brand
                    </th>

                    <th class="px-4 py-3">
                        Harga
                    </th>

                    <th class="px-4 py-3">
                        Stok
                    </th>

                    <th class="px-4 py-3">
                        Status
                    </th>

                    <th class="px-4 py-3 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($produks as $produk)

                <tr class="border-b hover:bg-purple-50 transition">

                    <!-- CHECKBOX -->
                    <td class="px-4 py-3">

                        <input type="checkbox">

                    </td>

                    <!-- IMAGE -->
                    <td class="px-4 py-3">

                        @if($produk->gambar)

                            <img
                                src="{{ asset('produk/'.$produk->gambar) }}"
                                class="w-14 h-14 rounded-xl object-cover border border-gray-200">

                        @else

                            <div class="w-14 h-14 rounded-xl bg-slate-100 flex items-center justify-center">

                                🐾

                            </div>

                        @endif

                    </td>

                    <!-- PRODUCT -->
                    <td class="px-4 py-3">

                        <div class="font-semibold text-slate-800">

                            {{ $produk->nama_produk }}

                        </div>

                    </td>

                    <!-- CATEGORY -->
                    <td class="px-4 py-3">

                        <span class="px-3 py-1 rounded-full bg-purple-100 text-purple-700 text-xs font-semibold">

                            {{ $produk->kategori }}

                        </span>

                    </td>

                    <!-- BRAND -->
                    <td class="px-4 py-3 text-slate-700">

                        {{ $produk->brand }}

                    </td>

                    <!-- PRICE -->
                    <td class="px-4 py-3">

                        <span class="font-bold text-[#6250B4]">

                            Rp {{ number_format($produk->harga,0,',','.') }}

                        </span>

                    </td>

                    <!-- STOCK -->
                    <td class="px-4 py-3">

                        <span class="font-semibold">

                            {{ $produk->stok }}

                        </span>

                    </td>

                    <!-- STATUS -->
                    <td class="px-4 py-3">

                        @if($produk->stok > 0)

                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">

                                Active

                            </span>

                        @else

                            <span class="px-3 py-1 rounded-full bg-red-100 text-red-600 text-xs font-semibold">

                                Empty

                            </span>

                        @endif

                    </td>

                    <!-- ACTION -->
                    <td class="px-4 py-3">

                        <div class="flex justify-center gap-2">

                            <a href="/admin/produk/edit/{{ $produk->id }}?page={{ request('page',1) }}"
                               class="w-9 h-9 rounded-lg bg-yellow-100 text-yellow-600 flex items-center justify-center hover:scale-105 transition">

                                ✏️

                            </a>

                            <form id="hapusForm{{ $produk->id }}"
                                action="{{ route('admin.produk.destroy', $produk->id) }}"
                                method="POST">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="button"
                                    onclick="konfirmasiHapus({{ $produk->id }})"
                                    class="w-9 h-9 rounded-lg bg-red-100 text-red-600">

                                    🗑️

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="9"
                        class="py-16 text-center text-gray-400">

                        Belum ada produk

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    <!-- FOOTER -->
    <div class="flex flex-col lg:flex-row gap-3 lg:justify-between lg:items-center px-6 py-4 bg-slate-50 border-t">

        <p class="text-sm text-gray-500">

            Menampilkan
            {{ $produks->firstItem() ?? 0 }}
            -
            {{ $produks->lastItem() ?? 0 }}
            dari
            {{ $produks->total() }}
            produk

        </p>

        <div>

            {{ $produks->links() }}

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function konfirmasiHapus(id){

    Swal.fire({

        title:'Hapus Produk?',

        text:'Apakah Anda yakin ingin menghapus produk ini?',

        icon:'warning',

        showCancelButton:true,

        confirmButtonText:'Ya',

        cancelButtonText:'Tidak',

        reverseButtons:true,

        confirmButtonColor:'#dc2626',

        cancelButtonColor:'#6b7280'

    }).then((result)=>{

        if(result.isConfirmed){

            document
                .getElementById('hapusForm'+id)
                .submit();

        }

    });

}

</script>

@endsection