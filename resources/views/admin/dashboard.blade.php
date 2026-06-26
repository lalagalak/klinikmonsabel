@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')

<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
    <div>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight antialiased">
            Dashboard Admin
        </h1>
        <p class="text-gray-400 mt-1 text-xs font-medium tracking-wide uppercase">
            Sistem Informasi Klinik Hewan Monsabel
        </p>
    </div>

    <div class="flex items-center justify-between sm:justify-end gap-3.5">
        <div class="relative">
            <button onclick="toggleNotif()" class="relative bg-white w-12 h-12 rounded-2xl border border-gray-100/80 flex items-center justify-center shadow-[0_4px_12px_rgba(0,0,0,0.03)] hover:bg-gray-50 hover:border-gray-200 transition-all active:scale-95 duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5.5 h-5.5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M15 17h5l-1.4-1.4A2 2 0 0118 14.17V11a6 6 0 10-12 0v3.17a2 2 0 01-.6 1.43L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                </svg>
                @php
                    $totalNotif = $groomingTerbaru->count() + $hotelTerbaru->count() + $recentTransaksi->count();
                @endphp
                @if($totalNotif > 0)
                    <span class="absolute top-2.5 right-2.5 w-2.5 h-2.5 bg-red-500 rounded-full ring-4 ring-white animate-pulse"></span>
                @endif
            </button>

            <div id="notifDropdown" class="hidden absolute right-0 mt-3 w-[420px] bg-white/95 backdrop-blur-xl rounded-3xl shadow-[0_24px_60px_rgba(0,0,0,0.08)] border border-gray-100/80 overflow-hidden z-50 transition-all duration-300">
                <div class="px-6 py-5 border-b border-gray-50 flex items-center justify-between bg-gray-50/40">
                    <div>
                        <h3 class="font-bold text-gray-900 text-sm">Pusat Aktivitas</h3>
                        <p class="text-[11px] text-gray-400 mt-0.5 font-medium">Pemantauan sistem secara langsung</p>
                    </div>
                    <span class="bg-[#6250B4]/10 text-[#6250B4] text-[11px] font-bold px-2.5 py-1 rounded-xl">
                        {{ $totalNotif }} Antrean Baru
                    </span>
                </div>

                <div class="max-h-[380px] overflow-y-auto divide-y divide-gray-50/60">
                    {{-- GROOMING --}}
                    @foreach($groomingTerbaru as $item)
                    <a href="/admin/grooming?booking={{ $item->id }}" class="block p-5 hover:bg-[#6250B4]/5 transition-all duration-200">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 rounded-2xl bg-purple-50 flex items-center justify-center text-base shadow-sm">✂️</div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-bold text-xs text-gray-800">Booking Grooming Baru</h4>
                                    <span class="text-[10px] font-medium text-gray-400">{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-[11px] font-semibold text-[#6250B4] mt-1 bg-[#6250B4]/5 px-2 py-0.5 rounded-md w-max tracking-wider">{{ $item->kode_booking }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach

                    {{-- HOTEL --}}
                    @foreach($hotelTerbaru as $item)
                    <a href="/admin/hotel?booking={{ $item->id }}" class="block p-5 hover:bg-blue-50/40 transition-all duration-200">
                        <div class="flex gap-4">
                            <div class="w-10 h-10 rounded-2xl bg-blue-50 flex items-center justify-center text-base shadow-sm">🏨</div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-bold text-xs text-gray-800">Booking Hotel Baru</h4>
                                    <span class="text-[10px] font-medium text-gray-400">{{ $item->created_at->diffForHumans() }}</span>
                                </div>
                                <p class="text-[11px] font-semibold text-blue-600 mt-1 bg-blue-50 px-2 py-0.5 rounded-md w-max tracking-wider">{{ $item->kode_booking }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach

                    @if($totalNotif == 0)
                    <div class="p-10 text-center text-gray-400 text-xs">
                        <div class="text-3xl mb-2">✨</div>
                        Semua aktivitas telah ditangani.
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-white border border-gray-100/80 shadow-[0_4px_12px_rgba(0,0,0,0.03)] rounded-2xl p-1.5 pr-4 flex items-center gap-3">
            <div class="w-9 h-9 bg-gradient-to-tr from-[#6250B4] to-[#806ee3] rounded-xl flex items-center justify-center text-white font-black text-xs shadow-sm shadow-[#6250B4]/20">
                {{ strtoupper(substr(auth()->user()->name,0,1)) }}
            </div>
            <div class="hidden sm:block">
                <h4 class="font-bold text-xs text-gray-800 leading-tight tracking-tight">{{ auth()->user()->name }}</h4>
                <p class="text-[10px] text-gray-400 font-medium mt-0.5">Super Administrator</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
    <div class="bg-gradient-to-br from-[#14213D] to-[#253556] rounded-[32px] p-6 text-white shadow-[0_12px_24px_rgba(20,33,61,0.08)] relative overflow-hidden group">
        <div class="absolute right-0 top-0 w-32 h-32 bg-white/5 rounded-full blur-2xl transition-all group-hover:scale-125"></div>
        <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400/90">Total Pendapatan</p>
        <h2 class="text-2xl font-black mt-4 tracking-tight">Rp {{ number_format($totalPemasukan,0,',','.') }}</h2>
        <div class="mt-4 flex items-center gap-1 text-[11px] font-semibold text-emerald-400 bg-emerald-500/10 px-2.5 py-1 rounded-xl w-max">
            <span>Active Wallet</span>
        </div>
    </div>

    <div class="bg-white rounded-[32px] p-6 border border-gray-100/70 shadow-[0_12px_24px_rgba(0,0,0,0.02)] flex flex-col justify-between group hover:border-gray-200 transition-all duration-300">
        <div>
            <div class="flex items-center justify-between">
                <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400">Perlu Konfirmasi</p>
                <span class="w-2.5 h-2.5 rounded-full bg-amber-400"></span>
            </div>
            <h2 class="text-3xl font-black text-gray-900 mt-4 tracking-tight group-hover:text-[#6250B4] transition-colors">{{ $pendingTransaksi }}</h2>
        </div>
        <div class="text-[11px] text-amber-600 bg-amber-50/70 px-3 py-1.5 rounded-xl w-max mt-5 font-semibold tracking-wide">Invoice Tertunda</div>
    </div>

    <div class="bg-white rounded-[32px] p-6 border border-gray-100/70 shadow-[0_12px_24px_rgba(0,0,0,0.02)] flex flex-col justify-between group hover:border-gray-200 transition-all duration-300">
        <div>
            <div class="flex items-center justify-between">
                <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400">Grooming Hari Ini</p>
                <span class="w-2.5 h-2.5 rounded-full bg-pink-400"></span>
            </div>
            <h2 class="text-3xl font-black text-gray-900 mt-4 tracking-tight group-hover:text-[#6250B4] transition-colors">{{ $groomingHariIni }}</h2>
        </div>
        <div class="text-[11px] text-pink-600 bg-pink-50/70 px-3 py-1.5 rounded-xl w-max mt-5 font-semibold tracking-wide">Antrean Berjalan</div>
    </div>

    <div class="bg-white rounded-[32px] p-6 border border-gray-100/70 shadow-[0_12px_24px_rgba(0,0,0,0.02)] flex flex-col justify-between group hover:border-gray-200 transition-all duration-300">
        <div>
            <div class="flex items-center justify-between">
                <p class="text-[11px] font-bold uppercase tracking-widest text-gray-400">Kamar Terisi</p>
                <span class="w-2.5 h-2.5 rounded-full bg-emerald-400"></span>
            </div>
            <h2 class="text-3xl font-black text-gray-900 mt-4 tracking-tight group-hover:text-[#6250B4] transition-colors">{{ $hotelAktif }}</h2>
        </div>
        <div class="text-[11px] text-emerald-600 bg-emerald-50/70 px-3 py-1.5 rounded-xl w-max mt-5 font-semibold tracking-wide">Kapasitas Hotel</div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-8">
    <div class="xl:col-span-2 bg-white rounded-[32px] p-7 border border-gray-100/70 shadow-[0_12px_24px_rgba(0,0,0,0.02)] flex flex-col justify-between">
        <div class="flex justify-between items-start mb-6">
            <div>
                <h3 class="text-base font-bold text-gray-900 tracking-tight">Analisis Grafik Penjualan</h3>
                <p class="text-xs text-gray-400 mt-0.5 font-medium">Statistik pendapatan klinik & petshop</p>
            </div>
            <div class="flex items-center gap-2 bg-gray-50 p-1 rounded-xl border border-gray-100">
                <button class="text-[11px] font-bold px-3 py-1.5 rounded-lg bg-white text-gray-800 shadow-sm">Garis Tren</button>
            </div>
        </div>
        <div class="h-[290px] w-full relative">
            <canvas id="chartPenjualan"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-[32px] p-7 border border-gray-100/70 shadow-[0_12px_24px_rgba(0,0,0,0.02)] flex flex-col justify-between">
        <div>
            <h3 class="text-base font-bold text-gray-900 tracking-tight mb-5">Statistik Akumulasi</h3>
            <div class="space-y-1">
                <div class="flex justify-between items-center py-3 border-b border-gray-50 text-xs font-medium">
                    <span class="text-gray-400">Total Macam Produk</span>
                    <span class="text-gray-900 font-bold bg-gray-50 border border-gray-100 px-2.5 py-1 rounded-xl text-[11px]">{{ $totalProduk }} Items</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-50 text-xs font-medium">
                    <span class="text-gray-400">Total Basis Data Customer</span>
                    <span class="text-gray-900 font-bold bg-gray-50 border border-gray-100 px-2.5 py-1 rounded-xl text-[11px]">{{ $totalCustomer }} Member</span>
                </div>
                <div class="flex justify-between items-center py-3 border-b border-gray-50 text-xs font-medium">
                    <span class="text-gray-400">Keseluruhan Transaksi</span>
                    <span class="text-gray-900 font-bold bg-gray-50 border border-gray-100 px-2.5 py-1 rounded-xl text-[11px]">{{ $totalTransaksi }} Rekor</span>
                </div>
            </div>
        </div>

        <div class="mt-6 pt-4 bg-gray-50/40 border border-gray-100/50 rounded-2xl p-4 grid grid-cols-2 gap-3 text-center">
            <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-[0_2px_8px_rgba(0,0,0,0.01)]">
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Diproses</p>
                <p class="text-2xl font-black text-[#6250B4] mt-1 tracking-tight">{{ $diprosesTransaksi }}</p>
            </div>
            <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-[0_2px_8px_rgba(0,0,0,0.01)]">
                <p class="text-[10px] text-gray-400 font-bold uppercase tracking-wider">Selesai</p>
                <p class="text-2xl font-black text-emerald-500 mt-1 tracking-tight">{{ $selesaiTransaksi }}</p>
            </div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-6">
    <div class="bg-white rounded-[32px] p-6 border border-gray-100/70 shadow-[0_12px_24px_rgba(0,0,0,0.02)]">
        <div class="flex justify-between items-center mb-5 px-1">
            <div>
                <h4 class="font-bold text-gray-900 text-sm tracking-tight">Antrean Grooming Terkini</h4>
                <p class="text-[11px] text-gray-400 font-medium">Data pembersihan & perawatan hewan</p>
            </div>
            <a href="/admin/grooming" class="text-[11px] text-[#6250B4] bg-[#6250B4]/5 font-bold px-3 py-1.5 rounded-xl hover:bg-[#6250B4]/10 transition">Manajemen</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left text-gray-500">
                <thead class="text-[10px] text-gray-400 uppercase tracking-wider bg-gray-50/60 rounded-xl">
                    <tr>
                        <th class="py-3.5 px-4 rounded-l-xl font-bold">Nama Pemilik</th>
                        <th class="py-3.5 px-4 rounded-r-xl font-bold text-right">Tanggal Pelaksanaan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50/60">
                    @forelse($groomingTerbaru as $item)
                    <tr class="hover:bg-gray-50/30 transition-all group">
                        <td class="py-4 px-4 font-bold text-gray-800 group-hover:text-[#6250B4] transition-colors">{{ $item->nama }}</td>
                        <td class="py-4 px-4 text-gray-400 font-medium text-right">{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="py-8 text-center text-gray-400 font-medium">Belum ada antrean masuk</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-white rounded-[32px] p-6 border border-gray-100/70 shadow-[0_12px_24px_rgba(0,0,0,0.02)]">
        <div class="flex justify-between items-center mb-5 px-1">
            <div>
                <h4 class="font-bold text-gray-900 text-sm tracking-tight">Registrasi Pet Hotel Terkini</h4>
                <p class="text-[11px] text-gray-400 font-medium">Log masuk penitipan hewan peliharaan</p>
            </div>
            <a href="/admin/hotel" class="text-[11px] text-blue-600 bg-blue-50 font-bold px-3 py-1.5 rounded-xl hover:bg-blue-100/60 transition">Manajemen</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-xs text-left text-gray-500">
                <thead class="text-[10px] text-gray-400 uppercase tracking-wider bg-gray-50/60 rounded-xl">
                    <tr>
                        <th class="py-3.5 px-4 rounded-l-xl font-bold">Nama Pemilik</th>
                        <th class="py-3.5 px-4 rounded-r-xl font-bold text-right">Tanggal Check-In</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50/60">
                    @forelse($hotelTerbaru as $item)
                    <tr class="hover:bg-gray-50/30 transition-all group">
                        <td class="py-4 px-4 font-bold text-gray-800 group-hover:text-blue-600 transition-colors">{{ $item->nama }}</td>
                        <td class="py-4 px-4 text-gray-400 font-medium text-right">{{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="py-8 text-center text-gray-400 font-medium">Kamar penitipan kosong</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('chartPenjualan').getContext('2d');
    
    // Gradien area ultra-halus ala Fincheck / Fintech modern
    const gradient = ctx.createLinearGradient(0, 0, 0, 260);
    gradient.addColorStop(0, 'rgba(98, 80, 180, 0.16)');
    gradient.addColorStop(0.5, 'rgba(98, 80, 180, 0.04)');
    gradient.addColorStop(1, 'rgba(98, 80, 180, 0.0)');

    const labels = {!! json_encode($grafik->pluck('tanggal')) !!};
    const data = {!! json_encode($grafik->pluck('total')) !!};

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pemasukan (Rp)',
                data: data,
                borderColor: '#6250B4',
                borderWidth: 2.5,
                backgroundColor: gradient,
                fill: true,
                tension: 0.42, // Membuat pergerakan grafik dinamis melengkung mulus
                pointBackgroundColor: '#FFFFFF',
                pointBorderColor: '#6250B4',
                pointBorderWidth: 2,
                pointRadius: 4,
                pointHoverRadius: 6,
                pointHoverBorderWidth: 3,
                pointHoverBackgroundColor: '#6250B4'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#14213D',
                    titleFont: { size: 11, weight: 'bold' },
                    bodyFont: { size: 12 },
                    padding: 12,
                    cornerRadius: 12,
                    displayColors: false
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { color: '#9ca3af', font: { size: 10, weight: '500' } }
                },
                y: {
                    grid: { color: '#f3f4f6', drawBorder: false },
                    ticks: { color: '#9ca3af', font: { size: 10, weight: '500' } }
                }
            }
        }
    });
});

// DROPDOWN MANAGER CONTROL
function toggleNotif() {
    document.getElementById('notifDropdown').classList.toggle('hidden');
}

document.addEventListener('click', function(e) {
    const dropdown = document.getElementById('notifDropdown');
    const button = e.target.closest('button');
    if (!e.target.closest('#notifDropdown') && !button) {
        dropdown.classList.add('hidden');
    }
});
</script>

@endsection