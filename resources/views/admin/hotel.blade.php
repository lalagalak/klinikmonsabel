@extends('layouts.admin')

@section('title', 'Data Pet Hotel')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-5">

    <div>

        <h1 class="text-3xl font-bold text-[#14213D]">
            Data Pet Hotel
        </h1>

        <p class="text-gray-500 mt-1 text-sm">
            Kelola booking penitipan hewan Klinik Monsabel
        </p>

    </div>

    <!-- ADMIN CARD -->
    <div class="bg-white rounded-xl px-4 py-3 shadow-sm border border-gray-100 flex items-center gap-3">

        <div class="w-10 h-10 rounded-full
                    bg-[#6250B4]
                    flex items-center justify-center
                    text-white font-semibold text-base">

            A

        </div>

        <div>

            <h3 class="font-semibold text-base text-[#14213D]">
                Admin Monsabel
            </h3>

            <p class="text-xs text-gray-500">
                Hotel Management
            </p>

        </div>

    </div>

</div>

<!-- STATISTIK -->
<div class="grid md:grid-cols-3 lg:grid-cols-6 gap-4 mb-6">

    <!-- TOTAL -->
    <div class="bg-[#6250B4] rounded-xl p-4 text-white shadow-sm">

        <p class="text-xs uppercase tracking-wide opacity-80">
            Total Booking
        </p>

        <h1 class="text-3xl font-black mt-1">
            {{ $data->count() }}
        </h1>

    </div>

    <!-- PENDING -->
    <div class="bg-[#FDF1E2] rounded-xl p-4 shadow-sm">

        <p class="text-xs uppercase tracking-wide text-[#B45309]">
            Pending
        </p>

        <h1 class="text-3xl font-black mt-1 text-[#B45309]">
            {{ $data->where('status', 'Pending')->count() }}
        </h1>

    </div>

    <!-- MENGINAP -->
    <div class="bg-[#F4F0FF] rounded-xl p-4 shadow-sm">

        <p class="text-xs uppercase tracking-wide text-[#6250B4]">
            Menginap
        </p>

        <h1 class="text-3xl font-black mt-1 text-[#6250B4]">
            {{ $data->where('status','Menginap')->count() }}
        </h1>

    </div>

    <!-- CHECK IN -->
    <div class="bg-[#EAF4FF] rounded-xl p-4 shadow-sm">

        <p class="text-xs uppercase tracking-wide text-[#2563EB]">
            Check In Hari Ini
        </p>

        <h1 class="text-3xl font-black mt-1 text-[#2563EB]">
            {{ $data->where('checkin', date('Y-m-d'))->count() }}
        </h1>

    </div>

    <!-- CHECK OUT -->
    <div class="bg-[#FFF4E5] rounded-xl p-4 shadow-sm">

        <p class="text-xs uppercase tracking-wide text-[#D97706]">
            Check Out Hari Ini
        </p>

        <h1 class="text-3xl font-black mt-1 text-[#D97706]">
            {{ $data->where('checkout', date('Y-m-d'))->count() }}
        </h1>

    </div>

    <!-- SELESAI -->
    <div class="bg-[#ECFDF3] rounded-xl p-4 shadow-sm">

        <p class="text-xs uppercase tracking-wide text-[#16A34A]">
            Selesai
        </p>

        <h1 class="text-3xl font-black mt-1 text-[#16A34A]">
            {{ $data->where('status','Selesai')->count() }}
        </h1>

    </div>

</div>

<!-- TABLE -->
<div class="bg-white rounded-[35px] shadow-xl overflow-hidden">

    <!-- HEADER TABLE -->
    <div class="flex justify-between items-start px-5 py-4 border-b">

        <div>

            <h2 class="text-2xl font-bold text-[#14213D]">
                Booking Pet Hotel
            </h2>

            <p class="text-xs text-gray-500 mt-1">
                Data booking penitipan hewan customer
            </p>

        </div>

        <!-- FILTER -->
        <div class="flex gap-5 mt-3 border-b border-gray-200">

            <a href="?filter=all"
            class="pb-2 text-xs font-medium tracking-wide
            {{ request('filter') == 'all' || !request('filter')
                    ? 'text-[#6250B4] border-b-2 border-[#6250B4]'
                    : 'text-gray-500 hover:text-[#6250B4]' }}">

                Semua Booking

            </a>

            <a href="?filter=checkin"
            class="pb-2 text-xs font-medium tracking-wide
            {{ request('filter') == 'checkin'
                    ? 'text-[#6250B4] border-b-2 border-[#6250B4]'
                    : 'text-gray-500 hover:text-[#6250B4]' }}">

                Check In Hari Ini

            </a>

            <a href="?filter=checkout"
            class="pb-2 text-xs font-medium tracking-wide
            {{ request('filter') == 'checkout'
                    ? 'text-[#6250B4] border-b-2 border-[#6250B4]'
                    : 'text-gray-500 hover:text-[#6250B4]' }}">

                Check Out Hari Ini

            </a>

            <a href="?filter=menginap"
            class="pb-2 text-xs font-medium tracking-wide
            {{ request('filter') == 'menginap'
                    ? 'text-[#6250B4] border-b-2 border-[#6250B4]'
                    : 'text-gray-500 hover:text-[#6250B4]' }}">

                Sedang Menginap

            </a>

        </div>

        <!-- SEARCH -->
        <form method="GET">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Cari booking..."
                class="px-3 py-2 text-sm rounded-lg border border-gray-200
                    focus:outline-none focus:ring-1 focus:ring-[#6250B4]
                    w-[220px]"
            >

        </form>

    </div>

    <!-- TABLE -->
    <div class="overflow-x-auto">

        <table class="w-full text-center">

            <!-- HEAD -->
           <thead class="bg-[#6250B4] text-white">

            <tr>

            <th class="px-3 py-3 text-xs font-semibold">No Order</th>

            <th class="px-3 py-3 text-xs font-semibold">Nama Pemilik</th>

            <th class="px-3 py-3 text-xs font-semibold">Nama Hewan</th>

            <th class="px-3 py-3 text-xs font-semibold">Check In</th>

            <th class="px-3 py-3 text-xs font-semibold">Check Out</th>

            <th class="px-3 py-3 text-xs font-semibold">Lama Inap</th>

            <th class="px-3 py-3 text-xs font-semibold">Kamar</th>

            <th class="px-3 py-3 text-xs font-semibold">Status</th>

            <th class="px-3 py-3 text-xs font-semibold">Aksi</th>

            <th class="px-3 py-3 text-xs font-semibold">Detail</th>

            </tr>

            </thead>

            <!-- BODY -->
            <tbody>

                @forelse($data as $hotel)

                <tr class="border-b border-[#F1F1F1] hover:bg-[#F8F4EA] transition">

                    <!-- PEMILIK -->
                    <td class="px-3 py-3 text-center align-middle">

                        <div>

                            <h3 class="font-medium text-xs text-[#6250B4] leading-4">
                                {{ $hotel->kode_booking }}
                            </h3>

                            <p class="text-xs text-gray-500">
                                Order Booking
                            </p>

                        </div>

                    </td>

                    <!-- Nama Pemilik -->
                    <td class="px-3 py-3 text-center align-middle">

                        <div>

                            <h3 class="font-semibold text-xs text-gray-800">
                                {{ $hotel->nama_pemilik }}
                            </h3>

                            <p class="text-xs text-gray-500">
                                Pemilik
                            </p>

                        </div>

                    </td>

                    <!-- HEWAN -->
                    <td class="px-3 py-3 text-center align-middle">

                        <div>

                            <h3 class="font-semibold text-xs text-gray-800">
                                {{ $hotel->nama_hewan }}
                            </h3>

                            <p class="text-xs text-gray-500">
                                Hewan Peliharaan
                            </p>

                        </div>

                    </td>

                    <!-- CHECKIN -->
                    <td class="px-3 py-3 text-xs text-gray-700 font-medium text-center">

                        {{ date('d M Y', strtotime($hotel->checkin)) }}

                    </td>

                    <!-- CHECKOUT -->
                    <td class="px-3 py-3 text-xs text-gray-700 font-medium text-center">

                        {{ date('d M Y', strtotime($hotel->checkout)) }}

                    </td>

                    <!-- LAMA -->
                    <td class="px-6 py-5 text-center">

                        <span class="bg-[#F4F0FF] text-[#6250B4] px-2 py-1 rounded-lg text-[11px] font-medium">

                            {{ $hotel->lama_menginap }} Hari

                        </span>

                    </td>

                    <!-- KAMAR -->
                    <td class="px-3 py-3 text-center align-middle">

                        <span class="inline-block bg-[#FDF1E2] text-[#6250B4] px-2 py-1 rounded-lg text-[11px] font-medium leading-4">

                            {{ $hotel->kamar }}

                        </span>

                    </td>

                    <!-- STATUS -->
                    <td class="px-3 py-3 text-center align-middle">

                       @if($hotel->status == 'Pending')

                        <span class="bg-[#FFF4E5] text-[#D97706] px-2 py-1 rounded-full text-[11px] font-medium">
                            Pending
                        </span>

                        @elseif($hotel->status == 'Menginap')

                        <span class="bg-[#EAF4FF] text-[#2563EB] px-2 py-1 rounded-full text-[11px] font-medium">
                            Menginap
                        </span>

                        @elseif($hotel->status == 'Dibatalkan')

                        <span class="bg-[#FEE2E2] text-[#DC2626] px-2 py-1 rounded-full text-[11px] font-medium">
                            Dibatalkan
                        </span>

                        @else

                        <span class="bg-[#ECFDF3] text-[#16A34A] px-2 py-1 rounded-full text-[11px] font-medium">
                            Selesai
                        </span>

                        @endif

                    </td>

 <!-- AKSI -->
<td class="px-6 py-5 text-center">

    @if($hotel->status == 'Pending')

        <div class="relative inline-block text-left">

            <button
                onclick="toggleMenu({{ $hotel->id }})"
                class="w-8 h-8 rounded-full bg-gray-100 hover:bg-gray-200 text-sm">

                ⋮

            </button>

            <div
                id="menu{{ $hotel->id }}"
                class="hidden absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-xl border z-50">

                <form
                    action="{{ route('admin.hotel.checkin',$hotel->id) }}"
                    method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-4 py-3 hover:bg-blue-50 text-blue-600">

                        Check In

                    </button>

                </form>

                <form
                    action="{{ route('admin.hotel.batal',$hotel->id) }}"
                    method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-4 py-3 hover:bg-red-50 text-red-600">

                        Batalkan

                    </button>

                </form>

            </div>

        </div>

    @elseif($hotel->status == 'Menginap')

        <div class="relative inline-block text-left">

            <button
                onclick="toggleMenu({{ $hotel->id }})"
                class="w-10 h-10 rounded-full bg-gray-100 hover:bg-gray-200">

                ⋮

            </button>

            <div
                id="menu{{ $hotel->id }}"
                class="hidden absolute right-0 mt-2 w-40 bg-white rounded-xl shadow-xl border z-50">

                <form
                    action="{{ route('admin.hotel.checkout',$hotel->id) }}"
                    method="POST">

                    @csrf

                    <button
                        type="submit"
                        class="w-full text-left px-4 py-3 hover:bg-green-50 text-green-600">

                        Check Out

                    </button>

                </form>

            </div>

        </div>

    @else

        <button
            disabled
            class="w-10 h-10 rounded-full bg-gray-100 text-gray-400">

            ⋮

        </button>

    @endif

</td>

<!-- DETAIL -->
<td class="px-3 py-3 text-center align-middle">

    <button
        onclick="document.getElementById('detail{{ $hotel->id }}').classList.remove('hidden')"
        class="bg-[#6250B4] hover:bg-[#5443A3] text-white px-3 py-1 text-[11px] font-medium rounded-lg shadow-sm transition">

        Detail

    </button>

</td>

                </tr>

                @empty

                <!-- EMPTY -->
                <tr>

                    <td colspan="9" class="text-center py-20">

                        <div class="text-6xl mb-4">
                            🏨
                        </div>

                        <h2 class="text-2xl font-black text-gray-700">
                            Belum Ada Booking Pet Hotel
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Data booking hotel akan muncul di sini
                        </p>

                    </td>

                </tr>

                @endforelse

                @foreach($data as $hotel)

<div id="detail{{ $hotel->id }}"
     class="hidden fixed inset-0 bg-black/50 z-50">

    <div class="bg-white max-w-3xl mx-auto mt-10 rounded-3xl p-8">

        <div class="flex justify-between mb-6">

            <h2 class="text-2xl font-black">
                Detail Booking Hotel
            </h2>

            <button
                onclick="document.getElementById('detail{{ $hotel->id }}').classList.add('hidden')">

                ✕

            </button>

        </div>

        <div class="grid md:grid-cols-2 gap-4">

            <p><b>No Order:</b> {{ $hotel->kode_booking }}</p>

            <p><b>Nama Pemilik:</b> {{ $hotel->nama_pemilik }}</p>

            <p><b>Nama Hewan:</b> {{ $hotel->nama_hewan }}</p>

            <p><b>Jenis Hewan:</b> {{ $hotel->jenis_hewan }}</p>

            <p><b>Berat:</b> {{ $hotel->berat }} Kg</p>

            <p><b>Kamar:</b> {{ $hotel->kamar }}</p>

            <p><b>Check In:</b> {{ $hotel->checkin }}</p>

            <p><b>Check Out:</b> {{ $hotel->checkout }}</p>

            <p><b>Lama Menginap:</b> {{ $hotel->lama_menginap }} Hari</p>

            <p><b>Total Bayar:</b>
                Rp {{ number_format($hotel->total_bayar,0,',','.') }}
            </p>

            <p><b>Antar Jemput:</b> {{ $hotel->antar_jemput }}</p>

            <p><b>Alamat:</b> {{ $hotel->alamat_jemput ?? '-' }}</p>

        </div>

        <div class="mt-8">

            <a href="https://wa.me/62{{ ltrim($hotel->nomor_hp,'0') }}"
               target="_blank"
               class="bg-green-500 hover:bg-green-600
                      text-white px-6 py-3 rounded-xl font-bold">

                WhatsApp Pemilik

            </a>

        </div>

    </div>

</div>

@endforeach

            </tbody>

        </table>

    </div>

</div>

<script>

function toggleMenu(id)
{
    document
        .getElementById('menu' + id)
        .classList
        .toggle('hidden');
}

</script>

@endsection