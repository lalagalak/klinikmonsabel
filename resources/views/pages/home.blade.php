@extends('layouts.app')

@section('content')

<!-- Hero -->
<div class="text-center p-5 bg-light rounded">
    <h1 class="fw-bold">Selamat Datang di Klinik Hewan Monsabel 🐾</h1>
    <p class="mt-3">Kami menyediakan layanan terbaik untuk hewan kesayangan Anda</p>
    <a href="#" class="btn btn-primary mt-2">Booking Sekarang</a>
</div>

<!-- Layanan -->
<div class="row mt-5">

    <div class="col-md-4">
        <div class="card shadow p-4 text-center">
            <h4>🛒 Petshop</h4>
            <p>Menyediakan makanan dan aksesoris hewan lengkap</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow p-4 text-center">
            <h4>🏨 Pet Hotel</h4>
            <p>Tempat penitipan nyaman (AC & Non-AC)</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow p-4 text-center">
            <h4>✂️ Grooming</h4>
            <p>Layanan perawatan dan kebersihan hewan</p>
        </div>
    </div>

</div>

@endsection