@extends('layouts.app')

@section('content')

<h3>Detail Transaksi #{{ $transaksi->id }}</h3>

<p><b>Nama:</b> {{ $transaksi->nama_pembeli }}</p>
<p><b>Total:</b> Rp {{ number_format($transaksi->total) }}</p>

<table class="table">
    <tr>
        <th>Produk</th>
        <th>Qty</th>
        <th>Subtotal</th>
    </tr>

    @foreach($detail as $d)
    <tr>
        <td>{{ $d->produk_id }}</td>
        <td>{{ $d->qty }}</td>
        <td>Rp {{ number_format($d->subtotal) }}</td>
    </tr>
    @endforeach
</table>

@endsection