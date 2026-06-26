<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Transaksi 📊
        </h2>
    </x-slot>

    <div class="p-6">

        <div class="bg-green-100 p-4 rounded mb-4">
            <strong>Total Pemasukan: Rp {{ number_format($totalSemua) }}</strong>
        </div>

        <form method="GET" class="mb-4 flex gap-2">
            <input type="date" name="from" class="border p-2 rounded">
            <input type="date" name="to" class="border p-2 rounded">
            <button class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
        </form>

        <button onclick="window.print()" class="bg-gray-500 text-white px-4 py-2 rounded mb-4">
            Print
        </button>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300">
                <tr class="bg-gray-200">
                    <th class="p-2">ID</th>
                    <th class="p-2">Nama Pembeli</th>
                    <th class="p-2">Total</th>
                    <th class="p-2">Tanggal</th>
                    <th class="p-2">Aksi</th>
                </tr>

                @foreach($transaksi as $t)
                <tr class="border-t">
                    <td class="p-2">{{ $t->id }}</td>
                    <td class="p-2">{{ $t->nama_pembeli }}</td>
                    <td class="p-2">Rp {{ number_format($t->total) }}</td>
                    <td class="p-2">{{ $t->created_at }}</td>
                    <td class="p-2">
                        <a href="/transaksi/{{ $t->id }}" class="bg-blue-500 text-white px-2 py-1 rounded">
                            Detail
                        </a>
                    </td>
                </tr>
                @endforeach

            </table>
        </div>

    </div>
</x-app-layout>