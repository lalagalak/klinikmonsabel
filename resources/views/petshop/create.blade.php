<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tambah Produk
        </h2>
    </x-slot>

    <div class="p-6">

        <form action="/petshop" method="POST">
            @csrf

            <input type="text" name="nama_produk" placeholder="Nama Produk"
                class="border p-2 w-full mb-3 rounded">

            <input type="number" name="harga" placeholder="Harga"
                class="border p-2 w-full mb-3 rounded">

            <input type="number" name="stok" placeholder="Stok"
                class="border p-2 w-full mb-3 rounded">

            <textarea name="deskripsi" placeholder="Deskripsi"
                class="border p-2 w-full mb-3 rounded"></textarea>

            <button class="bg-green-500 text-white px-4 py-2 rounded">
                Simpan
            </button>

        </form>

    </div>
</x-app-layout>