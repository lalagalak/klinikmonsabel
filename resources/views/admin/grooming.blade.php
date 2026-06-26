@extends('layouts.admin')

@section('title', 'Data Grooming')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-5">

    <div>

        <h1 class="text-3xl font-bold text-[#14213D]">
            Data Grooming
        </h1>

        <p class="text-gray-500 mt-1 text-sm">
            Kelola booking grooming Klinik Monsabel
        </p>

    </div>

    <!-- ADMIN CARD -->
    <div class="bg-white rounded-xl px-4 py-3 shadow-sm border border-gray-100 flex items-center gap-3">

        <div class="w-10 h-10 rounded-full bg-[#6250B4]
                    flex items-center justify-center
                    text-white font-semibold text-base">

            A

        </div>

        <div>

            <h3 class="font-semibold text-base text-[#14213D]">
                Admin Monsabel
            </h3>

            <p class="text-xs text-gray-500">
                Grooming Management
            </p>

        </div>

    </div>

</div>

<!-- STATISTIC -->
<div class="grid grid-cols-4 gap-4 mb-6">

    <!-- HARI INI -->
    <div class="bg-[#6250B4] rounded-xl p-4 text-white shadow-sm">

        <p class="text-[11px] uppercase tracking-wider opacity-80">
            Grooming Hari Ini
        </p>

        <h1 class="text-3xl font-black mt-1">
            {{ $todayCount }}
        </h1>

    </div>

    <!-- BESOK -->
    <div class="bg-[#F4F0DD] rounded-xl p-4 text-[#14213D] shadow-sm">

        <p class="text-[11px] uppercase tracking-wider opacity-70">
            Grooming Besok
        </p>

        <h1 class="text-3xl font-black mt-1">
            {{ $tomorrowCount }}
        </h1>

    </div>

    <!-- PENDING -->
    <div class="bg-[#F3CCDE] rounded-xl p-4 text-[#14213D] shadow-sm">

        <p class="text-[11px] uppercase tracking-wider opacity-70">
            Pending
        </p>

        <h1 class="text-3xl font-black mt-1">
            {{ $pendingCount }}
        </h1>

    </div>

    <!-- SELESAI -->
    <div class="bg-[#DDE7C7] rounded-xl p-4 text-[#14213D] shadow-sm">

        <p class="text-[11px] uppercase tracking-wider opacity-70">
            Selesai
        </p>

        <h1 class="text-3xl font-black mt-1">
            {{ $selesaiCount }}
        </h1>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-[35px] shadow-xl overflow-hidden">

    <!-- HEADER -->
   <div class="flex justify-between items-center px-5 py-4 border-b">

    <div>

        <h2 class="text-2xl font-bold text-[#14213D]">
            Booking Grooming
        </h2>

        <p class="text-xs text-gray-500 mt-1">
            Data booking grooming customer
        </p>

    </div>

    <form method="GET" class="flex items-center gap-2">

        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Cari nama hewan..."
            class="px-3 py-2 text-sm rounded-lg border border-gray-200 focus:outline-none focus:ring-1 focus:ring-[#6250B4] w-[200px]">

        <input
            type="date"
            name="tanggal"
            value="{{ request('tanggal') }}"
            class="px-3 py-2 text-sm rounded-lg border border-gray-200 focus:outline-none focus:ring-1 focus:ring-[#6250B4]">

        <select
            name="status"
            class="px-3 py-2 text-sm rounded-lg border border-gray-200 focus:outline-none focus:ring-1 focus:ring-[#6250B4]">

            <option value="">
                Semua Status
            </option>

            <option value="Pending"
                {{ request('status')=='Pending' ? 'selected' : '' }}>
                Pending
            </option>

            <option value="Diproses"
                {{ request('status')=='Diproses' ? 'selected' : '' }}>
                Diproses
            </option>

            <option value="Selesai"
                {{ request('status')=='Selesai' ? 'selected' : '' }}>
                Selesai
            </option>

            <option value="Dibatalkan"
                {{ request('status')=='Dibatalkan' ? 'selected' : '' }}>
                Dibatalkan
            </option>

        </select>

        <button
            class="bg-[#6250B4]
                   hover:bg-[#5443a3]
                   text-white
                   px-4 py-2
                   text-sm font-medium
                   rounded-lg
                   shadow-sm
                   transition">

            Cari

        </button>

    </form>

</div>

    <!-- TABLE -->
    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-[#6250B4] text-white">

            <tr>

                <th class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wide">No Order</th>

                <th class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wide">Nama Hewan</th>

                <th class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wide">Paket Grooming</th>

                <th class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wide">Home Visit</th>

                <th class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wide">Tanggal Grooming</th>

                <th class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wide">Status</th>

                <th class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wide">Aksi</th>

                <th class="px-4 py-3 text-[11px] font-semibold uppercase tracking-wide">Detail</th>

            </tr>

</thead>
    
    <tbody>

    @forelse($data as $item)

    <tr class="border-b border-gray-100 hover:bg-[#FDF1E2] transition">

        <!-- NOMOR ORDER -->
        <td class="px-4 py-3 text-sm text-center align-middle">

            <span class="font-medium text-sm text-[#6250B4]">

                {{ $item->kode_booking }}

            </span>

        </td>

        <!-- NAMA HEWAN -->
        <td class="px-4 py-3 text-sm text-center align-middle">

            <div>

                <h3 class="font-bold">

                    {{ $item->nama_hewan }}

                </h3>

                <p class="text-sm text-gray-500">

                    {{ $item->jenis_hewan }}

                </p>

            </div>

        </td>

        <!-- PAKET -->
        <td class="px-4 py-3 text-sm text-center align-middle">

            <span class="text-[#6250B4] text-sm font-medium">

                {{ $item->layanan }}

            </span>

        </td>

        <!-- HOME VISIT -->
        <td class="px-4 py-3 text-sm text-center align-middle">

            @if($item->antar_jemput == 'Ya')

                <span class="bg-[#DDE7C7] text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                    Ya
                </span>

            @else

                <span class="bg-gray-100 text-gray-700
                            px-4 py-2 rounded-xl">

                    Tidak

                </span>

            @endif

        </td>

        <!-- TANGGAL -->
        <td class="px-4 py-3 text-sm text-center align-middle">

            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}

        </td>

        <!-- STATUS -->
        <td class="px-4 py-3 text-sm text-center align-middle">

            @if($item->status == 'Pending')

                <span class="bg-yellow-100 text-yellow-700
                            px-4 py-2 rounded-xl">

                    Pending

                </span>

            @elseif($item->status == 'Diproses')

                <span class="bg-blue-100 text-blue-700
                            px-4 py-2 rounded-xl">

                    Diproses

                </span>

            @elseif($item->status == 'Dibatalkan')

                <span class="bg-red-100 text-red-700
                            px-4 py-2 rounded-xl">

                    Dibatalkan

                </span>

            @else

                <span class="bg-green-100 text-green-700
                            px-4 py-2 rounded-xl">

                    Selesai

                </span>

            @endif

        </td>

        <!-- AKSI -->
    <td class="px-6 py-5 text-center">

    <div class="relative inline-block">

        <button
            onclick="toggleMenu({{ $item->id }})"
            class="w-10 h-10 rounded-full bg-gray-100
                hover:bg-gray-200 text-xl">

            ⋮

        </button>

        <div
            id="menu{{ $item->id }}"
            class="hidden absolute right-0 mt-2
                w-44 bg-white rounded-2xl
                shadow-xl overflow-hidden z-50">

            <form action="{{ route('admin.grooming.proses',$item->id) }}"
                method="POST">

                @csrf

                <button
                    class="w-full text-left px-4 py-3
                        hover:bg-blue-50">

                    Proses

                </button>

            </form>

            <form action="{{ route('admin.grooming.selesai',$item->id) }}"
                method="POST">

                @csrf

                <button
                    class="w-full text-left px-4 py-3
                        hover:bg-green-50">

                    Selesai

                </button>

            </form>

            <form action="{{ route('admin.grooming.batal',$item->id) }}"
                method="POST">

                @csrf

                <button
                    class="w-full text-left px-4 py-3
                        text-red-600 hover:bg-red-50">

                    Batal

                </button>

            </form>

        </div>

    </div>

    </td>

        <!-- DETAIL -->
        <td class="px-4 py-3 text-center align-middle">

            <button
                onclick="document.getElementById('detail{{ $item->id }}').classList.remove('hidden')"
                class="bg-[#6250B4] hover:bg-[#5443a3] text-white px-3 py-1.5 text-sm font-medium
                    rounded-lg
                    shadow-sm
                    transition">

                Detail

            </button>

        </td>

        </td>

    </tr>

   <div id="detail{{ $item->id }}"
    class="hidden fixed inset-0 bg-black/40 backdrop-blur-sm z-50 overflow-y-auto">

    <div class="min-h-screen flex items-center justify-center p-6">

        <div
            class="bg-white w-full max-w-3xl rounded-[32px]
                   shadow-[0_25px_80px_rgba(0,0,0,0.15)]
                   overflow-hidden">

            <!-- HEADER -->
            <div
                class="bg-[#6250B4] px-8 py-6 flex justify-between items-center">

                <div>

                    <h2 class="text-3xl font-bold text-white">
                        Detail Booking
                    </h2>

                    <p class="text-purple-100 mt-1">
                        Informasi lengkap booking grooming
                    </p>

                </div>

                <button
                    onclick="document.getElementById('detail{{ $item->id }}').classList.add('hidden')"
                    class="w-10 h-10 rounded-full bg-white/20 hover:bg-white/30 text-white transition">

                    ✕

                </button>

            </div>

            <!-- CONTENT -->
            <div class="p-8">

                <div class="grid md:grid-cols-2 gap-x-10 gap-y-4">

                    <div class="border-b border-gray-100 pb-3">
                        <p class="text-sm text-gray-500">
                            Nomor Order
                        </p>

                        <p class="font-semibold text-[#6250B4]">
                            {{ $item->kode_booking }}
                        </p>
                    </div>

                    <div class="border-b border-gray-100 pb-3">
                        <p class="text-sm text-gray-500">
                            Nama Hewan
                        </p>

                        <p class="font-semibold">
                            {{ $item->nama_hewan }}
                        </p>
                    </div>

                    <div class="border-b border-gray-100 pb-3">
                        <p class="text-sm text-gray-500">
                            Jenis Hewan
                        </p>

                        <p class="font-semibold">
                            {{ $item->jenis_hewan }}
                        </p>
                    </div>

                    <div class="border-b border-gray-100 pb-3">
                        <p class="text-sm text-gray-500">
                            Paket Grooming
                        </p>

                        <p class="font-semibold">
                            {{ $item->layanan }}
                        </p>
                    </div>

                    <div class="border-b border-gray-100 pb-3">
                        <p class="text-sm text-gray-500">
                            Metode
                        </p>

                        <p class="font-semibold">
                            {{ $item->metode }}
                        </p>
                    </div>

                    <div class="border-b border-gray-100 pb-3">
                        <p class="text-sm text-gray-500">
                            Tanggal Grooming
                        </p>

                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}
                        </p>
                    </div>

                    <div class="border-b border-gray-100 pb-3">
                        <p class="text-sm text-gray-500">
                            Jam
                        </p>

                        <p class="font-semibold">
                            {{ $item->jam ?? '-' }}
                        </p>
                    </div>

                    <div class="border-b border-gray-100 pb-3">
                        <p class="text-sm text-gray-500">
                            Home Visit
                        </p>

                        <p class="font-semibold">
                            {{ $item->antar_jemput }}
                        </p>
                    </div>

                </div>

                <!-- ALAMAT -->
                <div class="mt-6">

                    <p class="text-sm text-gray-500 mb-2">
                        Alamat Penjemputan
                    </p>

                    <div
                        class="bg-[#FDF1E2]
                               rounded-2xl
                               p-4 text-gray-700">

                        {{ $item->alamat_jemput ?? '-' }}

                    </div>

                </div>

                <!-- CATATAN -->
                <div class="mt-5">

                    <p class="text-sm text-gray-500 mb-2">
                        Catatan Tambahan
                    </p>

                    <div
                        class="bg-gray-50
                               rounded-2xl
                               p-4 text-gray-700">

                        {{ $item->catatan ?? '-' }}

                    </div>

                </div>

                <!-- TOTAL -->
                <div
                    class="mt-8
                           bg-gradient-to-r
                           from-[#FDF1E2]
                           to-[#F8F4EA]
                           rounded-3xl
                           p-6">

                    <div
                        class="flex justify-between items-center">

                        <div>

                            <p class="text-gray-500">
                                Total Pembayaran
                            </p>

                            <h3
                                class="text-3xl font-bold text-[#6250B4]">

                                Rp {{ number_format($item->total_bayar,0,',','.') }}

                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


    @empty

    <tr>
        <td colspan="8" class="text-center py-10">
            Belum ada data grooming
        </td>
    </tr>

    @endforelse
            </tbody>

        </table>

    </div>

</div>

<script>

function toggleMenu(id)
{
    document
        .getElementById('menu'+id)
        .classList
        .toggle('hidden');
}

window.onclick = function(event)
{
    if(!event.target.matches('button'))
    {
        document
            .querySelectorAll('[id^="menu"]')
            .forEach(menu =>
            {
                menu.classList.add('hidden');
            });
    }
}

</script>

@endsection