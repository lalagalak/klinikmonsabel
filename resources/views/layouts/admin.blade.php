<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-[#f7f5ff] overflow-x-hidden">

<div class="flex h-screen">

    <!-- SIDEBAR -->
    <aside id="sidebar" class="fixed xl:static top-0 left-0 z-50 w-64 h-screen bg-[#0f172a] text-white flex flex-col transform
    -transition-x-full -translate-x-full xl:translate-x-0 transition-transform duration-300">

    <div class="h-20 flex items-center px-6 border-b border-white/10">
        <img src="{{ asset('images/logomonsabel.png') }}" class="w-10 h-10 rounded-full bg-white p-0.5">
        <div class="ml-3">
            <h1 class="font-bold text-lg leading-tight">Monsabel</h1>
            <p class="text-[10px] text-purple-300 uppercase tracking-widest">Smart System</p>
        </div>
    </div>

    <nav class="flex-1 p-4 space-y-6 overflow-y-auto">
        
        <div class="space-y-1">
            <h2 class="px-4 text-[10px] font-bold text-purple-400 uppercase tracking-wider mb-2">Menu Utama</h2>
            <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->is('admin/dashboard') ? 'bg-[#6250B4] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                Dashboard
            </a>
            <a href="/admin/produk" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->is('admin/produk*') ? 'bg-[#6250B4] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                Produk Petshop
            </a>
        </div>

        <div class="space-y-1">
            <h2 class="px-4 text-[10px] font-bold text-purple-400 uppercase tracking-wider mb-2">Pengelolaan</h2>
            <a href="/admin/grooming" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->is('admin/grooming*') ? 'bg-[#6250B4] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                Data Grooming
            </a>
            <a href="/admin/hotel" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->is('admin/hotel*') ? 'bg-[#6250B4] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                Data Pet Hotel
            </a>
            <a href="/admin/transaksi" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->is('admin/transaksi*') ? 'bg-[#6250B4] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                Transaksi
            </a>
        </div>

        <div class="space-y-1">
            <h2 class="px-4 text-[10px] font-bold text-purple-400 uppercase tracking-wider mb-2">Laporan</h2>
            <a href="/admin/laporan" class="flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition {{ request()->is('admin/laporan*') ? 'bg-[#6250B4] text-white' : 'text-gray-400 hover:bg-white/5 hover:text-white' }}">
                Laporan
            </a>
        </div>
    </nav>

    <div class="p-4 border-t border-white/10 mt-auto">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex w-full items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium text-gray-400 hover:bg-red-500/10 hover:text-red-400 transition-all duration-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                <span>Logout</span>
            </button>
        </form>
    </div>
</aside>

<!-- Overlay Mobile -->
<div id="overlay"
     class="fixed inset-0 bg-black/40 hidden z-40 xl:hidden"></div>

<!-- Hamburger -->
<button id="menuBtn"
        class="fixed top-5 left-5 z-50 xl:hidden bg-[#6250B4] text-white w-11 h-11 rounded-xl shadow-lg flex items-center justify-center">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-6 h-6"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>

    </svg>

</button>

    <!-- CONTENT -->
    <main class="flex-1 overflow-y-auto pt-20 xl:pt-0">

        <div class="p-6 lg:p-8">

            @yield('content')

        </div>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))

<script>

document.addEventListener('DOMContentLoaded', function () {

    Swal.fire({

        icon: 'success',

        title: '{{ session("success") }}',

        showConfirmButton: false,

        timer: 2000,

        timerProgressBar: true,

        width: 450

    });

});

</script>

@endif


@if(session('error'))

<script>

document.addEventListener('DOMContentLoaded', function () {

    Swal.fire({

        icon: 'error',

        title: '{{ session("error") }}',

        showConfirmButton: false,

        timer: 2500,

        timerProgressBar: true,

        width: 450

    });

});

</script>

@endif


@if(session('warning'))

<script>

document.addEventListener('DOMContentLoaded', function () {

    Swal.fire({

        icon: 'warning',

        title: '{{ session("warning") }}',

        showConfirmButton: false,

        timer: 2500,

        timerProgressBar: true,

        width: 450

    });

});

</script>

@endif

<script>

const sidebar = document.getElementById('sidebar');
const menuBtn = document.getElementById('menuBtn');
const overlay = document.getElementById('overlay');

menuBtn.addEventListener('click', function(){

    sidebar.classList.toggle('-translate-x-full');
    overlay.classList.toggle('hidden');

});

overlay.addEventListener('click', function(){

    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');

});

</script>

</body>
</html>