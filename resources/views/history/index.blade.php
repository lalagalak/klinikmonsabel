<x-app-layout>

<div class="max-w-6xl mx-auto px-4 py-6">

    <div class="mb-8">

        <h1 class="text-3xl font-black text-[#14213D]">
            Riwayat Aktivitas
        </h1>

        <p class="text-gray-500 mt-2">
            Seluruh riwayat layanan yang pernah Anda lakukan di Monsabel Clinic.
        </p>

    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 mb-6">

        <!-- TOTAL GROOMING -->
        <div class="bg-white rounded-xl shadow-md border p-3 md:p-4">

            <p class="text-gray-500 text-xs font-medium">
                Total Grooming
            </p>

            <h2 class="text-2xl font-bold text-[#6250B4] mt-1">
                {{ $groomings->count() }}
            </h2>

        </div>

        <!-- TOTAL PET HOTEL -->
        <div class="bg-white rounded-xl shadow-md border p-4">

            <p class="text-gray-500 text-xs font-medium">
                Total Pet Hotel
            </p>

            <h2 class="text-2xl font-bold text-[#6250B4] mt-1">
                {{ $hotels->count() }}
            </h2>

        </div>

        <!-- TOTAL PETSHOP -->
        <div class="bg-white rounded-xl shadow-md border p-4">

            <p class="text-gray-500 text-xs font-medium">
                Total Petshop
            </p>

            <h2 class="text-2xl font-bold text-[#6250B4] mt-1">
                {{ $transaksis->count() }}
            </h2>

        </div>

        <!-- TOTAL AKTIVITAS -->
        <div class="bg-white rounded-xl shadow-md border p-4">

            <p class="text-gray-500 text-xs font-medium">
                Total Aktivitas
            </p>

            <h2 class="text-2xl font-bold text-[#6250B4] mt-1">
                {{ $groomings->count() + $hotels->count() + $transaksis->count() }}
            </h2>

        </div>

    </div>

    <div class="bg-white rounded-xl shadow-md border overflow-hidden">

    <div class="border-b bg-white">

        <div class="flex">

            <button onclick="showTab('grooming')"
                class="tab-btn px-8 py-4 text-sm font-semibold border-b-2 border-[#6250B4] text-[#6250B4]">

                Grooming

            </button>

            <button onclick="showTab('hotel')"
                class="tab-btn px-8 py-4 text-sm font-semibold text-gray-500">

                Pet Hotel

            </button>

            <button onclick="showTab('petshop')"
                class="tab-btn px-8 py-4 text-sm font-semibold text-gray-500">

                Petshop

            </button>

        </div>

    </div>

        <div id="groomingTab" class="p-4">

            @forelse($groomings as $booking)

            <div class="border rounded-xl p-4 mb-3 hover:shadow-md transition">

                <div class="flex justify-between items-center pb-3 border-b border-gray-100">

                    <div>

                        <h3 class="text-base font-bold text-gray-800">
                            {{ $booking->nama_hewan }}
                        </h3>

                        <p class="text-xs text-[#6250B4] font-semibold mt-0.5">
                            {{ $booking->kode_booking }}
                        </p>

                    </div>

                    <span class="px-3 py-1 rounded-full text-xs font-semibold
                        @if($booking->status == 'Pending')
                            bg-yellow-100 text-yellow-700
                        @elseif($booking->status == 'Diproses')
                            bg-blue-100 text-blue-700
                        @elseif($booking->status == 'Selesai')
                            bg-green-100 text-green-700
                        @else
                            bg-red-100 text-red-700
                        @endif">

                        {{ $booking->status }}

                    </span>

                </div>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-3">

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Layanan</p>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $booking->layanan }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Tanggal</p>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $booking->tanggal }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Antar Jemput</p>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $booking->antar_jemput }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Total Bayar</p>
                        <p class="text-sm font-bold text-[#6250B4] mt-0.5">
                            Rp {{ number_format($booking->total_bayar,0,',','.') }}
                        </p>
                    </div>

                </div>

            </div>

            @empty

            <div class="text-center py-8 text-xs text-gray-500">
                Belum ada riwayat grooming.
            </div>

            @endforelse

        </div>

        <div id="hotelTab" class="hidden p-4">

            @forelse($hotels as $hotel)

            <div class="border rounded-xl p-4 mb-3 hover:shadow-md transition">

                <div class="flex justify-between items-center pb-3 border-b border-gray-100">

                    <div>

                        <h3 class="text-base font-bold text-gray-800">
                            {{ $hotel->nama_hewan }}
                        </h3>

                        <p class="text-xs text-blue-600 font-semibold mt-0.5">
                            {{ $hotel->kode_booking }}
                        </p>

                    </div>

                    <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-xs font-semibold">

                        {{ $hotel->status }}

                    </span>

                </div>

                <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mt-3">

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Kamar</p>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $hotel->tipe_kamar }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Lama Inap</p>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $hotel->lama_menginap }} Hari</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Check In</p>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $hotel->checkin }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Check Out</p>
                        <p class="text-sm font-semibold text-gray-700 mt-0.5">{{ $hotel->checkout }}</p>
                    </div>

                    <div>
                        <p class="text-gray-400 text-[11px] uppercase tracking-wider">Total Bayar</p>
                        <p class="text-sm font-bold text-[#6250B4] mt-0.5">
                            Rp {{ number_format($hotel->total_bayar,0,',','.') }}
                        </p>
                    </div>

                </div>

            </div>

            @empty

            <div class="text-center py-8 text-xs text-gray-500">
                Belum ada riwayat pet hotel.
            </div>

            @endforelse

        </div>

                <div id="petshopTab" class="hidden p-4">

            @forelse($transaksis as $transaksi)

            <div class="border rounded-xl p-4 mb-3 hover:shadow-md transition">

                <div class="flex justify-between items-center pb-3 border-b border-gray-100">

                    <div>

                        <h3 class="text-base font-bold text-gray-800">
                            Pesanan Petshop
                        </h3>

                        <p class="text-xs text-[#6250B4] font-semibold mt-1">
                            ORD-{{ $transaksi->id }}
                        </p>

                    </div>

                    <span class="bg-[#F4F0FF]
                                text-[#6250B4]
                                px-3 py-1
                                rounded-full
                                text-xs
                                font-semibold">

                        {{ ucfirst($transaksi->status) }}

                    </span>

                </div>

                <div class="grid md:grid-cols-4 gap-4 mt-4">

                    <div>

                        <p class="text-gray-400 text-[11px] uppercase">
                            Nama Customer
                        </p>

                        <p class="font-semibold text-sm mt-1">
                            {{ $transaksi->nama_customer }}
                        </p>

                    </div>

                    <div>

                        <p class="text-gray-400 text-[11px] uppercase">
                            Pembayaran
                        </p>

                        <p class="font-semibold text-sm mt-1">
                            {{ $transaksi->metode_pembayaran }}
                        </p>

                    </div>

                    <div>

                        <p class="text-gray-400 text-[11px] uppercase">
                            Pengiriman
                        </p>

                        <p class="font-semibold text-sm mt-1">
                            {{ $transaksi->pengiriman }}
                        </p>

                    </div>

                    <div>

                        <p class="text-gray-400 text-[11px] uppercase">
                            Total
                        </p>

                        <p class="font-bold text-[#6250B4] mt-1">
                            Rp {{ number_format($transaksi->total,0,',','.') }}
                        </p>

                    </div>

                </div>

            </div>

            @empty

            <div class="text-center py-10 text-gray-500">

                Belum ada riwayat pembelian petshop.

            </div>

            @endforelse

        </div>

    </div>

</div>

<script>

function showTab(tab)
{
    document.getElementById('groomingTab').classList.add('hidden');
    document.getElementById('hotelTab').classList.add('hidden');
    document.getElementById('petshopTab').classList.add('hidden');

    const buttons = document.querySelectorAll('.tab-btn');

    buttons.forEach(btn => {

        btn.classList.remove(
            'border-b-2',
            'border-[#6250B4]',
            'text-[#6250B4]'
        );

        btn.classList.add(
            'text-gray-500'
        );

    });

    const activeBtn = event.currentTarget;

    if(tab === 'grooming')
    {
        document.getElementById('groomingTab').classList.remove('hidden');
    }

    if(tab === 'hotel')
    {
        document.getElementById('hotelTab').classList.remove('hidden');
    }

    if(tab === 'petshop')
    {
        document.getElementById('petshopTab').classList.remove('hidden');
    }

    activeBtn.classList.add(
        'border-b-2',
        'border-[#6250B4]',
        'text-[#6250B4]'
    );

    activeBtn.classList.remove(
        'text-gray-500'
    );
}

</script>

</x-app-layout>