@extends('layouts.admin')

@section('title','Laporan Bulanan')

@section('content')

<div class="max-w-7xl mx-auto">

<!-- HEADER -->
<div class="mb-6">

    <h1 class="text-4xl font-black text-[#14213D]">
        Laporan Bulanan
    </h1>

    <p class="text-sm text-gray-500 mt-2">
        Rekap laporan transaksi, grooming dan pet hotel Klinik Hewan Monsabel
    </p>

</div>

<!-- FILTER -->
<form
    id="formLaporan"
    method="GET"
    class="bg-white rounded-3xl shadow-md p-6 mb-6">

<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

    <!-- BULAN -->
    <div>

        <label class="block text-xs font-semibold text-gray-600 mb-2">
            Bulan
        </label>

        <select
            name="bulan"
            required
            class="w-full h-12 border border-gray-200 rounded-xl px-4 text-sm bg-white focus:ring-2 focus:ring-[#6250B4] focus:border-transparent">

            <option value="">
                Pilih Bulan
            </option>

            @php
                $namaBulan = [
                    1=>'Januari',
                    2=>'Februari',
                    3=>'Maret',
                    4=>'April',
                    5=>'Mei',
                    6=>'Juni',
                    7=>'Juli',
                    8=>'Agustus',
                    9=>'September',
                    10=>'Oktober',
                    11=>'November',
                    12=>'Desember'
                ];
            @endphp

            @foreach($namaBulan as $key => $value)

                <option
                    value="{{ $key }}"
                    {{ request('bulan') == $key ? 'selected' : '' }}>

                    {{ $value }}

                </option>

            @endforeach

        </select>

    </div>

    <!-- TAHUN -->
    <div>

        <label class="block text-xs font-semibold text-gray-600 mb-2">
            Tahun
        </label>

        <select
            name="tahun"
            required
            class="w-full h-12 border border-gray-200 rounded-xl px-4 text-sm bg-white focus:ring-2 focus:ring-[#6250B4] focus:border-transparent">

            <option value="">
                Pilih Tahun
            </option>

            @for($i = date('Y') + 2; $i >= 2024; $i--)

                <option
                    value="{{ $i }}"
                    {{ request('tahun') == $i ? 'selected' : '' }}>

                    {{ $i }}

                </option>

            @endfor

        </select>

    </div>

    <!-- KATEGORI -->
    <div>

        <label class="block text-xs font-semibold text-gray-600 mb-2">
            Kategori Laporan
        </label>

        <select
            name="kategori"
            required
            class="w-full h-12 border border-gray-200 rounded-xl px-4 text-sm bg-white focus:ring-2 focus:ring-[#6250B4] focus:border-transparent">

            <option value="">
                Pilih Kategori Laporan
            </option>

            <option value="grooming"
                {{ request('kategori') == 'grooming' ? 'selected' : '' }}>
                Data Grooming
            </option>

            <option value="hotel"
                {{ request('kategori') == 'hotel' ? 'selected' : '' }}>
                Data Pet Hotel
            </option>

            <option value="transaksi"
                {{ request('kategori') == 'transaksi' ? 'selected' : '' }}>
                Data Transaksi
            </option>

        </select>

    </div>

    <!-- BUTTON -->
    <div class="flex items-end">

        <button
            id="btnLaporan"
            type="submit"
            class="w-full h-12 bg-[#6250B4]
                hover:bg-[#5645A8]
                text-white
                text-sm
                font-semibold
                rounded-xl
                transition-all
                duration-300">

            Tampilkan Laporan

        </button>

    </div>

</div>

</form>

<!-- HASIL LAPORAN -->
<div class="bg-white rounded-3xl shadow-md overflow-hidden">

    <iframe
        src="{{ route('laporan.preview',[
            'bulan'=>$bulan,
            'tahun'=>$tahun,
            'kategori'=>$kategori
        ]) }}"
        class="w-full border-0"
        style="height:750px;">
    </iframe>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.getElementById('formLaporan').addEventListener('submit', function(e){

    e.preventDefault();

    Swal.fire({

        icon:'success',

        title:'Laporan Ditampilkan',

        text:'Laporan berhasil ditampilkan.',

        showConfirmButton:false,

        timer:1500,

        timerProgressBar:true

    }).then(()=>{

        e.target.submit();

    });

});

</script>

@endsection