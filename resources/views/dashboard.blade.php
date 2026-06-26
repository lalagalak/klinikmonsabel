<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold">Dashboard Admin</h2>
    </x-slot>

    <div class="p-6 grid grid-cols-3 gap-4">

        <div class="bg-blue-500 text-white p-4 rounded shadow">
            <h3>Total Produk</h3>
            <h1 class="text-2xl font-bold">{{ $totalProduk }}</h1>
        </div>

        <div class="bg-green-500 text-white p-4 rounded shadow">
            <h3>Total Transaksi</h3>
            <h1 class="text-2xl font-bold">{{ $totalTransaksi }}</h1>
        </div>

        <div class="bg-yellow-500 text-white p-4 rounded shadow">
            <h3>Total Pemasukan</h3>
            <h1 class="text-2xl font-bold">
                Rp {{ number_format($totalPemasukan) }}
            </h1>
        </div>

        <div class="p-6">
    <canvas id="chartPenjualan"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const labels = {!! json_encode($grafik->pluck('tanggal')) !!};
const data = {!! json_encode($grafik->pluck('total')) !!};

const ctx = document.getElementById('chartPenjualan');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: labels,
        datasets: [{
            label: 'Pemasukan',
            data: data,
            borderWidth: 2
        }]
    }
});
</script>
    </div>
</x-app-layout>