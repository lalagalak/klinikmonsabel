<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Produk
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="/petshop/{{ $produk->id }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}"
                class="border p-2 w-full mb-3 rounded">

            <input type="number" name="harga" value="{{ $produk->harga }}"
                class="border p-2 w-full mb-3 rounded">

            <input type="number" name="stok" value="{{ $produk->stok }}"
                class="border p-2 w-full mb-3 rounded">

            <textarea name="deskripsi"
                class="border p-2 w-full mb-3 rounded">{{ $produk->deskripsi }}</textarea>

            <button class="bg-yellow-500 text-white px-4 py-2 rounded">
                Update
            </button>

        </form>

    </div>
</x-app-layout>