<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Bulanan Klinik Monsabel</title>
    <style>
        /* Pengaturan Dasar Cetak PDF */
        @page {
            margin: 20mm 15mm;
        }
        
        body {
            font-family: 'DejaVu Sans', sans-serif;
            font-size: 11px;
            color: #333333;
            line-height: 1.4;
            margin: 0;
            padding: 0;
        }

        /* Bagian Kop / Header Dokumen */
        .header {
            border-bottom: 3px solid #6250B4;
            padding-bottom: 12px;
            margin-bottom: 25px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table td {
            border: none;
            padding: 0;
            vertical-align: bottom;
        }

        .judul {
            font-size: 24px;
            font-weight: bold;
            color: #6250B4;
            letter-spacing: 0.5px;
        }

        .subjudul {
            font-size: 15px;
            font-weight: bold;
            color: #444444;
            margin-top: 6px;
            margin-bottom: 4px;
        }

        .info {
            color: #666666;
            font-size: 11px;
            margin-top: 2px;
        }

        /* Judul Seksi / Bagian */
        .section-title {
            color: #6250B4;
            font-size: 13px;
            font-weight: bold;
            margin-top: 25px;
            margin-bottom: 12px;
            text-transform: uppercase;
            border-left: 3px solid #6250B4;
            padding-left: 6px;
        }

        /* Grid Ringkasan Informasi Utama */
        .card-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 10px 0;
            margin-left: -10px;
            margin-right: -10px;
            margin-bottom: 25px;
        }

        .card-table td {
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background: #fafafa;
            padding: 12px 8px;
            text-align: center;
            width: 25%;
            vertical-align: middle;
        }

        .card-title {
            font-size: 9px;
            color: #718096;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 6px;
        }

        .card-value {
            font-size: 18px;
            font-weight: bold;
            color: #2d3748;
        }

        .card-value.highlight {
            color: #6250B4;
        }

        /* Desain Standar Tabel Data */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 5px;
        }

        .data-table th {
            background: #6250B4;
            color: #ffffff;
            font-weight: bold;
            text-align: left;
            padding: 8px 10px;
            border: 1px solid #6250B4;
            font-size: 11px;
        }

        .data-table td {
            border: 1px solid #e2e8f0;
            padding: 8px 10px;
            font-size: 11px;
            vertical-align: middle;
        }

        .data-table tr:nth-child(even) {
            background: #fcfcfc;
        }

        /* Helper Utility Layout */
        .text-center {
            text-align: center !important;
        }

        .text-right {
            text-align: right !important;
        }

        /* Komponen Tag / Badge Status */
        .badge {
            padding: 3px 6px;
            border-radius: 4px;
            font-size: 9px;
            font-weight: bold;
            display: inline-block;
        }

        .badge-success {
            background: #d4edda;
            color: #155724;
        }

        .badge-pending {
            background: #fff3cd;
            color: #856404;
        }

        .badge-danger {
            background: #f8d7da;
            color: #721c24;
        }

        /* Penutup / Kaki Halaman */
        .footer {
            margin-top: 35px;
            text-align: right;
            font-size: 10px;
            color: #999999;
            border-top: 1px solid #eeeeee;
            padding-top: 10px;
        }
    </style>
</head>
<body>

@php
    // Total seluruh data reservasi yang masuk
    $totalBooking = $preview->count();

    // Kalkulasi nominal omset riil berdasarkan kategori operasional klinik
    switch($kategori) {
        case 'grooming':
            $totalPendapatan = $preview->where('status', 'Selesai')->sum('harga_layanan');
            break;
        case 'hotel':
            $totalPendapatan = $preview->where('status', 'Selesai')->sum('total_bayar');
            break;
        default:
            $totalPendapatan = $preview->where('status', 'Selesai')->sum('total');
            break;
    }

    // Rekapitulasi jumlah penggunaan jasa akomodasi antar jemput armada hewan
    $totalAntarJemput = $preview->where('antar_jemput', 'Ya')->count();

    // Rekapitulasi target orderan yang telah diselesaikan penuh
    $totalSelesai = $preview->where('status', 'Selesai')->count();
@endphp

<div class="header">
    <table class="header-table">
        <tr>
            <td>
                <div class="judul">KLINIK HEWAN MONSABEL</div>
                <div class="subjudul">
                    @if($kategori == 'grooming')
                        Laporan Bulanan Aktivitas Grooming
                    @elseif($kategori == 'hotel')
                        Laporan Bulanan Aktivitas Pet Hotel
                    @else
                        Laporan Bulanan Transaksi Petshop
                    @endif
                </div>
                <div class="info">Periode: Bulan {{ $bulan }} Tahun {{ $tahun }}</div>
            </td>
            <td class="text-right">
                <div class="info" style="margin-bottom: 2px;">Tanggal Cetak:</div>
                <div class="info" style="font-weight: bold; color: #333333;">{{ date('d F Y') }}</div>
            </td>
        </tr>
    </table>
</div>

<div class="section-title">Ringkasan Eksekutif</div>

<table class="card-table">

<tr>

<td>
    <div class="card-title">

        @if($kategori == 'grooming')
            Total Booking
        @elseif($kategori == 'hotel')
            Total Booking
        @else
            Total Transaksi
        @endif

    </div>

    <div class="card-value">
        {{ $totalBooking }}
    </div>
</td>

<td>
    <div class="card-title">
        Pendapatan Realisasi
    </div>

    <div class="card-value highlight">
        Rp {{ number_format($totalPendapatan,0,',','.') }}
    </div>
</td>

<td>

    <div class="card-title">

        @if($kategori == 'grooming')
            Antar Jemput
        @elseif($kategori == 'hotel')
            Kamar Terpakai
        @else
            Metode Transfer
        @endif

    </div>

    <div class="card-value">

        @if($kategori == 'grooming')
            {{ $totalAntarJemput }}
        @elseif($kategori == 'hotel')
            {{ $totalBooking }}
        @else
            {{ $preview->where('metode_pembayaran','Transfer Bank')->count() }}
        @endif

    </div>

</td>

<td>

    <div class="card-title">

        @if($kategori == 'grooming')
            Grooming Selesai
        @elseif($kategori == 'hotel')
            Booking Selesai
        @else
            Transaksi Selesai
        @endif

    </div>

    <div class="card-value">
        {{ $totalSelesai }}
    </div>

</td>

</tr>

</table>

@if($kategori == 'grooming')
<div class="section-title">Lampiran Detail Grooming</div>
<table class="data-table">
    <thead>
        <tr>
            <th class="text-center" style="width: 5%;">No</th>
            <th style="width: 14%;">Kode Booking</th>
            <th style="width: 15%;">Nama Hewan</th>
            <th style="width: 14%;">Jenis Hewan</th>
            <th>Paket Grooming</th>
            <th class="text-right" style="width: 14%;">Harga</th>
            <th class="text-center" style="width: 12%;">Tanggal</th>
            <th class="text-center" style="width: 12%;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($preview as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td><strong>{{ $item->kode_booking }}</strong></td>
            <td>{{ $item->nama_hewan }}</td>
            <td>{{ $item->jenis_hewan }}</td>
            <td>{{ $item->layanan }}</td>
            <td class="text-right">Rp {{ number_format($item->harga_layanan, 0, ',', '.') }}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
            <td class="text-center">
                @if($item->status == 'Selesai')
                    <span class="badge badge-success">{{ $item->status }}</span>
                @elseif($item->status == 'Pending' || $item->status == 'Proses')
                    <span class="badge badge-pending">{{ $item->status }}</span>
                @else
                    <span class="badge badge-danger">{{ $item->status }}</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if($kategori == 'hotel')
<div class="section-title">Lampiran Detail Pet Hotel</div>
<table class="data-table">
    <thead>
        <tr>
            <th class="text-center" style="width: 4%;">No</th>
            <th style="width: 12%;">No Order</th>
            <th style="width: 15%;">Nama Pemilik</th>
            <th style="width: 13%;">Nama Hewan</th>
            <th class="text-center" style="width: 11%;">Check In</th>
            <th class="text-center" style="width: 11%;">Check Out</th>
            <th style="width: 11%;">Kamar</th>
            <th class="text-right" style="width: 13%;">Total Bayar</th>
            <th class="text-center" style="width: 10%;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($preview as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td><strong>{{ $item->kode_booking }}</strong></td>
            <td>{{ $item->nama_pemilik }}</td>
            <td>{{ $item->nama_hewan }}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($item->checkin)->format('d-m-Y') }}</td>
            <td class="text-center">{{ \Carbon\Carbon::parse($item->checkout)->format('d-m-Y') }}</td>
            <td>{{ $item->tipe_kamar ?? $item->kamar }}</td>
            <td class="text-right">Rp {{ number_format($item->total_bayar, 0, ',', '.') }}</td>
            <td class="text-center">
                @if($item->status == 'Selesai')
                    <span class="badge badge-success">{{ $item->status }}</span>
                @elseif($item->status == 'Pending' || $item->status == 'Proses')
                    <span class="badge badge-pending">{{ $item->status }}</span>
                @else
                    <span class="badge badge-danger">{{ $item->status }}</span>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@if($kategori == 'transaksi')

<div class="section-title">
    Lampiran Detail Transaksi Petshop
</div>

<table class="data-table">

    <thead>

        <tr>

            <th class="text-center" style="width:5%;">
                No
            </th>

            <th style="width:12%;">
                Order ID
            </th>

            <th style="width:18%;">
                Customer
            </th>

            <th style="width:15%;">
                Pengiriman
            </th>

            <th style="width:18%;">
                Pembayaran
            </th>

            <th class="text-right" style="width:15%;">
                Total
            </th>

            <th class="text-center" style="width:12%;">
                Status
            </th>

        </tr>

    </thead>

    <tbody>

        @forelse($preview as $item)

        <tr>

            <td class="text-center">
                {{ $loop->iteration }}
            </td>

            <td>
                <strong>
                    #ORD-{{ $item->id }}
                </strong>
            </td>

            <td>

                <strong>
                    {{ $item->nama_customer }}
                </strong>

                <br>

                {{ $item->no_hp }}

            </td>

            <td>
                {{ $item->pengiriman }}
            </td>

            <td>
                {{ $item->metode_pembayaran }}
            </td>

            <td class="text-right">

                Rp {{ number_format($item->total,0,',','.') }}

            </td>

            <td class="text-center">

                @if($item->status == 'Selesai')

                    <span class="badge badge-success">
                        {{ $item->status }}
                    </span>

                @elseif($item->status == 'Pending')

                    <span class="badge badge-pending">
                        {{ $item->status }}
                    </span>

                @else

                    <span class="badge badge-danger">
                        {{ $item->status }}
                    </span>

                @endif

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="7" class="text-center">

                Tidak ada data transaksi.

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

@endif

<div class="footer">
    Dicetak otomatis melalui Sistem Informasi Manajemen Klinik Hewan Monsabel
</div>

</body>
</html>