<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard - Klinik Monsabel</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(to bottom, #f8fbff, #ffffff);
        }
    </style>
</head>

<body>

<!-- NAVBAR SAMA SEPERTI LANDING -->
@include('layouts.navigation')

<!-- CONTENT -->
<div class="px-16 py-16">

    <h1 class="text-3xl font-bold mb-6">
        Selamat datang, {{ auth()->user()->name }} 🐾
    </h1>

    <p class="text-gray-500 mb-10">
        Silakan pilih layanan yang kamu butuhkan untuk hewan kesayanganmu 💖
    </p>

    <div class="grid grid-cols-3 gap-8">

        <a href="/petshop" class="group">
            <div class="bg-white p-8 rounded-2xl shadow hover:shadow-2xl transition text-center">

                <div class="text-4xl mb-3">🛒</div>
                <h3 class="font-bold text-lg">Petshop</h3>
                <p class="text-gray-500 text-sm">Beli kebutuhan hewan</p>

            </div>
        </a>

        <a href="/grooming" class="group">
            <div class="bg-white p-8 rounded-2xl shadow hover:shadow-2xl transition text-center">

                <div class="text-4xl mb-3">✂️</div>
                <h3 class="font-bold text-lg">Grooming</h3>
                <p class="text-gray-500 text-sm">Perawatan hewan</p>

            </div>
        </a>

        <a href="/hotel" class="group">
            <div class="bg-white p-8 rounded-2xl shadow hover:shadow-2xl transition text-center">

                <div class="text-4xl mb-3">🏨</div>
                <h3 class="font-bold text-lg">Pet Hotel</h3>
                <p class="text-gray-500 text-sm">Penitipan hewan</p>

            </div>
        </a>

    </div>

</div>

</body>
</html>