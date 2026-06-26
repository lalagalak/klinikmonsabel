@extends('layouts.admin')

@section('title', 'Data Transaksi')

@section('content')

<div class="space-y-8">

<!-- HEADER + ADMIN INFO -->
<div class="flex items-center justify-between mb-6">

    <div>

        <h1 class="text-3xl font-bold text-[#14213D]">
            Data Transaksi
        </h1>

        <p class="text-sm text-gray-500 mt-1">
            Kelola transaksi customer Monsabel Clinic
        </p>

    </div>

    <div class="bg-white rounded-2xl px-4 py-3
                shadow-sm border border-gray-100
                flex items-center gap-3">

        <div class="w-10 h-10 rounded-full
                    bg-[#6250B4]
                    flex items-center justify-center">

            <span class="text-white font-semibold text-sm">
                A
            </span>

        </div>

        <div>

            <h3 class="font-semibold text-sm text-[#14213D]">
                Admin Monsabel
            </h3>

            <p class="text-xs text-gray-500">
                Transaction Management
            </p>

        </div>

    </div>

</div>

    <!-- STATISTIC -->
    <div class="grid grid-cols-4 gap-4 mb-6">

        <!-- TOTAL PESANAN -->
        <div class="bg-[#6250B4] rounded-xl p-4 text-white shadow-sm">

            <p class="text-[11px] uppercase tracking-wider opacity-80">
                Total Pesanan
            </p>

            <h1 class="text-3xl font-black mt-1">
                {{ $totalPesanan }}
            </h1>

        </div>

        <!-- PENDING -->
        <div class="bg-[#F4F0DD] rounded-xl p-4 text-[#14213D] shadow-sm">

            <p class="text-[11px] uppercase tracking-wider opacity-70">
                Pending
            </p>

            <h1 class="text-3xl font-black mt-1">
                {{ $pending }}
            </h1>

        </div>

        <!-- DIPROSES -->
        <div class="bg-[#F3CCDE] rounded-xl p-4 text-[#14213D] shadow-sm">

            <p class="text-[11px] uppercase tracking-wider opacity-70">
                Diproses
            </p>

            <h1 class="text-3xl font-black mt-1">
                {{ $diproses }}
            </h1>

        </div>

        <!-- PENDAPATAN -->
        <div class="bg-[#DDE7C7] rounded-xl p-4 text-[#14213D] shadow-sm">

            <p class="text-[11px] uppercase tracking-wider opacity-70">
                Pendapatan
            </p>

            <h1 class="text-2xl font-black mt-1">
                Rp {{ number_format($pendapatan) }}
            </h1>

        </div>

    </div>

<!-- TABLE -->
<div class="bg-white rounded-[35px] shadow-xl overflow-hidden">

    <!-- TOP -->
    <div class="p-6 border-b">

        <div class="flex justify-between items-center">

            <div>

                <h2 class="text-2xl font-black text-[#14213D]">
                    Orders
                </h2>

                <p class="text-sm text-gray-500 mt-1">
                    Semua transaksi customer Monsabel
                </p>

            </div>

            <!-- SEARCH -->
            <input type="text"
                   placeholder="Search order..."
                   class="px-4 py-2 rounded-xl border
                          text-sm
                          focus:outline-none focus:ring-2
                          focus:ring-purple-400
                          w-[220px]">

        </div>

        <!-- FILTER TAB -->
        <div class="flex gap-6 mt-6 text-sm text-gray-500 font-semibold">

            <a href="/admin/transaksi"
               class="{{ request('status') == null ? 'text-purple-600 border-b-2 border-purple-600 pb-1' : '' }}">

                All Orders

            </a>

            <a href="/admin/transaksi?status=Pending"
               class="{{ request('status') == 'Pending' ? 'text-purple-600 border-b-2 border-purple-600 pb-1' : '' }}">

                Pending Orders

            </a>

            <a href="/admin/transaksi?status=diproses"
               class="{{ request('status') == 'diproses' ? 'text-purple-600 border-b-2 border-purple-600 pb-1' : '' }}">

                Diproses

            </a>

            <a href="/admin/transaksi?status=selesai"
               class="{{ request('status') == 'selesai' ? 'text-purple-600 border-b-2 border-purple-600 pb-1' : '' }}">

                Delivered Orders

            </a>

            <a href="/admin/transaksi?status=ditolak"
               class="{{ request('status') == 'ditolak' ? 'text-purple-600 border-b-2 border-purple-600 pb-1' : '' }}">

                Cancelled Orders

            </a>

        </div>

    </div>

        <!-- TABLE -->
        <div class="overflow-x-auto">

            <table class="w-full">

            <!-- HEAD -->
            <thead class="bg-[#6250B4] text-white text-[11px] uppercase">

                <tr>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        ORDER ID
                    </th>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        CUSTOMER
                    </th>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        PENGIRIMAN
                    </th>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        PEMBAYARAN
                    </th>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        TOTAL
                    </th>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        STATUS
                    </th>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        BUKTI
                    </th>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        AKSI
                    </th>

                    <th class="px-4 py-3 text-center font-semibold whitespace-nowrap">
                        DETAIL
                    </th>

                </tr>

            </thead>
                <!-- BODY -->
                <tbody>

                @forelse($transaksis as $trx)
                <tr class="border-t border-gray-100 hover:bg-[#FAF9FF] transition">

                    <!-- ORDER ID -->
                    <td class="px-4 py-4 text-center">

                        <span class="font-semibold text-sm text-[#14213D]">
                            #ORD-{{ $trx->id }}
                        </span>

                    </td>

                    <!-- CUSTOMER -->
                    <td class="px-4 py-4 text-center">

                        <div>

                            <h3 class="font-semibold text-sm text-[#14213D]">

                                {{ $trx->nama_customer }}

                            </h3>

                            <p class="text-xs text-gray-500 mt-1">

                                {{ $trx->no_hp }}

                            </p>

                        </div>

                    </td>

                    <!-- PENGIRIMAN -->
                    <td class="px-4 py-4 text-center">

                        @if($trx->pengiriman == 'Kurir Klinik')

                            <span class="text-sm font-medium text-[#6250B4]">
                                Kurir Klinik
                            </span>

                        @else

                            <span class="text-sm font-medium text-[#14213D]">
                                Ambil di Klinik
                            </span>

                        @endif

                    </td>

                    <!-- PEMBAYARAN -->
                    <td class="px-4 py-4 text-center">

                        <div>

                            <h3 class="text-sm font-medium text-[#14213D]">

                                {{ $trx->metode_pembayaran }}

                            </h3>

                            <p class="text-xs text-gray-500 mt-1">

                                {{ $trx->bank }}

                            </p>

                        </div>

                    </td>

                    <!-- TOTAL -->
                    <td class="px-4 py-4 text-center">

                        <span class="font-bold text-sm text-[#6250B4]">

                            Rp {{ number_format($trx->total) }}

                        </span>

                    </td>

                    <!-- STATUS -->
                    <td class="px-4 py-4 text-center">

                        @if($trx->status == 'Pending')

                            <span class="inline-flex px-3 py-1 rounded-full
                                        bg-[#FFF4D6]
                                        text-[#B7791F]
                                        text-xs font-semibold">

                                Pending

                            </span>

                        @elseif($trx->status == 'Diproses')

                            <span class="inline-flex px-3 py-1 rounded-full
                                        bg-[#EDE9FF]
                                        text-[#6250B4]
                                        text-xs font-semibold">

                                Diproses

                            </span>

                        @elseif($trx->status == 'Selesai')

                            <span class="inline-flex px-3 py-1 rounded-full
                                        bg-[#E8F7E8]
                                        text-[#2F855A]
                                        text-xs font-semibold">

                                Selesai

                            </span>

                        @else

                            <span class="inline-flex px-3 py-1 rounded-full
                                        bg-[#FDE8E8]
                                        text-[#C53030]
                                        text-xs font-semibold">

                                Ditolak

                            </span>

                        @endif

                    </td>

                    <!-- BUKTI -->
                    <td class="px-4 py-4 text-center">

                        @if($trx->bukti_transfer)

                            <a href="{{ asset('storage/' . $trx->bukti_transfer) }}"
                            target="_blank"
                            class="text-[#6250B4] text-sm font-medium hover:underline">

                                Lihat

                            </a>

                        @else

                            <span class="text-gray-400 text-sm">

                                Tidak Ada

                            </span>

                        @endif

                    </td>

                    <!-- AKSI -->
                    <td class="px-4 py-4 text-center">

                        <div class="relative inline-block text-left">

                            <details>

                                <summary class="list-none cursor-pointer
                                                w-8 h-8 rounded-lg
                                                bg-[#F4F0FF]
                                                hover:bg-[#EAE4FF]
                                                flex items-center justify-center
                                                text-[#6250B4]
                                                font-bold">

                                    ⋮

                                </summary>

                                <div class="absolute right-0 mt-2 w-44
                                            bg-white rounded-xl
                                            shadow-lg border
                                            z-50 overflow-hidden">

                                    @if($trx->status == 'Pending')

                                        <a href="/admin/transaksi/verifikasi/{{ $trx->id }}"
                                        class="block px-4 py-3 text-sm
                                                text-green-600 hover:bg-green-50">

                                            Setujui Pesanan

                                        </a>

                                        <a href="/admin/transaksi/tolak/{{ $trx->id }}"
                                        class="block px-4 py-3 text-sm
                                                text-red-600 hover:bg-red-50">

                                            Tolak Pesanan

                                        </a>

                                    @elseif($trx->status == 'Diproses')

                                        <a href="/admin/transaksi/selesai/{{ $trx->id }}"
                                        class="block px-4 py-3 text-sm
                                                text-[#6250B4] hover:bg-[#F4F0FF]">

                                            Tandai Selesai

                                        </a>

                                    @else

                                        <div class="px-4 py-3 text-xs text-gray-400">

                                            Tidak ada aksi

                                        </div>

                                    @endif

                                </div>

                            </details>

                        </div>

                    </td>

                    <!-- DETAIL -->
                    <td class="px-4 py-4 text-center">

                        <button
                            onclick="document.getElementById('detail{{ $trx->id }}').classList.remove('hidden')"
                            class="bg-[#6250B4]
                                hover:bg-[#5645A8]
                                text-white
                                text-xs
                                px-4 py-2
                                rounded-lg">

                            Detail

                        </button>

                    </td>

                </tr>
                    @empty

                    <tr>

                        <td colspan="8" class="py-20 text-center">

                            <div class="text-7xl mb-5">
                                📦
                            </div>

                            <h2 class="text-3xl font-black text-gray-700">
                                Belum Ada Pesanan
                            </h2>

                            <p class="text-gray-500 mt-3">
                                Checkout customer akan muncul di sini
                            </p>

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

@foreach($transaksis as $trx)

<div id="detail{{ $trx->id }}"
     class="fixed inset-0 hidden z-50">

    <!-- Overlay -->
    <div
        onclick="document.getElementById('detail{{ $trx->id }}').classList.add('hidden')"
        class="absolute inset-0 bg-black/40 backdrop-blur-sm">
    </div>

    <!-- Modal -->
    <div class="absolute inset-0 flex items-center justify-center p-4">

    <div class="bg-white rounded-xl
                shadow-lg
                w-full max-w-[500px]
                overflow-hidden">

            <!-- HEADER -->
            <div class="bg-[#6250B4] px-4 py-2 flex justify-between items-center">

                <div>

                    <h2 class="text-base font-bold text-white">
                        Detail Pesanan
                    </h2>

                    <p class="text-[11px] text-white/80">
                        Order #ORD-{{ $trx->id }}
                    </p>

                </div>

                <button
                    onclick="document.getElementById('detail{{ $trx->id }}').classList.add('hidden')"
                    class="text-white text-2xl">

                    ×

                </button>

            </div>

            <!-- CONTENT -->
            <div class="p-3">

<!-- INFO -->
<div class="grid grid-cols-2 gap-2">

    <div class="bg-[#F8F6FF] rounded-lg px-3 py-2">
        <p class="text-[10px] text-gray-500">
            Nama Customer
        </p>

        <p class="text-sm font-medium text-[#14213D] leading-tight mt-0.5">
            {{ $trx->nama_customer ?: '-' }}
        </p>
    </div>

    <div class="bg-[#F8F6FF] rounded-lg px-3 py-2">
        <p class="text-[10px] text-gray-500">
            Nomor HP
        </p>

        <p class="text-sm font-medium text-[#14213D] leading-tight mt-0.5">
            {{ $trx->no_hp }}
        </p>
    </div>

    <div class="bg-[#F8F6FF] rounded-lg px-3 py-2">
        <p class="text-[10px] text-gray-500">
            Pengiriman
        </p>

        <p class="text-sm font-medium text-[#14213D] leading-tight mt-0.5">
            {{ $trx->pengiriman }}
        </p>
    </div>

    <div class="bg-[#F8F6FF] rounded-lg px-3 py-2">
        <p class="text-[10px] text-gray-500">
            Pembayaran
        </p>

        <p class="text-sm font-medium text-[#14213D] leading-tight mt-0.5">
            {{ $trx->metode_pembayaran }}
        </p>
    </div>

</div>

<!-- ALAMAT -->
<div class="mt-2 bg-[#F8F6FF] rounded-lg px-3 py-2">

    <p class="text-[10px] text-gray-500">
        Alamat Pengiriman
    </p>

    <p class="text-sm text-[#14213D] leading-tight mt-0.5">
        {{ $trx->alamat }}
    </p>

</div>

<!-- CATATAN -->
@if($trx->catatan)

<div class="mt-2 bg-[#FFF8E8] rounded-lg px-3 py-2">

    <p class="text-[10px] text-gray-500">
        Catatan Customer
    </p>

    <p class="text-sm text-[#14213D] leading-tight mt-0.5">
        {{ $trx->catatan }}
    </p>

</div>

                @endif

                <!-- PRODUK -->
                <div class="mt-6">

                    <h3 class="text-base font-bold text-[#14213D] mb-2">
                        Produk Yang Dibeli
                    </h3>

                    <div class="border rounded-xl overflow-hidden">

                        @foreach($trx->detailTransaksis as $detail)

                        <div class="flex justify-between items-center
                                    px-4 py-3 border-b last:border-b-0">

                            <div>

                                <p class="font-medium text-[#14213D]">
                                    {{ $detail->produk->nama_produk }}
                                </p>

                            </div>

                            <div class="text-right">

                                <p class="text-sm text-gray-500">

                                    {{ $detail->qty }} x
                                    Rp {{ number_format($detail->subtotal / $detail->qty) }}

                                </p>

                                <p class="font-bold text-[#6250B4]">

                                    Rp {{ number_format($detail->subtotal) }}

                                </p>

                            </div>

                        </div>

                        @endforeach

                    </div>

                </div>

                <!-- TOTAL -->
                <div class="mt-4 border rounded-lg overflow-hidden">

                    <div class="flex justify-between px-4 py-3 border-b">

                        <span class="text-sm text-gray-600">
                            Subtotal Produk
                        </span>

                        <span class="font-semibold text-[#14213D]">
                            Rp {{ number_format($trx->total - $trx->ongkir) }}
                        </span>

                    </div>

                    <div class="flex justify-between px-4 py-3 border-b">

                        <span class="text-sm text-gray-600">
                            Ongkos Kirim
                        </span>

                        <span class="font-semibold text-[#14213D]">
                            Rp {{ number_format($trx->ongkir) }}
                        </span>

                    </div>

                    <div class="flex justify-between px-4 py-4 bg-[#F4F0FF]">

                        <span class="font-bold text-[#14213D]">
                            Total Pembayaran
                        </span>

                        <span class="text-lg font-bold text-[#6250B4]">
                            Rp {{ number_format($trx->total) }}
                        </span>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@endforeach

@endsection