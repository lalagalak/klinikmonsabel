<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Klinik Monsabel</title>

        <script src="https://cdn.tailwindcss.com"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

        <link href="https://fonts.googleapis.com/css2?family=Tai+Heritage+Pro:wght@400;700&family=Text+Me+One&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>

        html{
            scroll-behavior:smooth;
        }

        body{
            background:#ffffff;
            overflow-x:hidden;
            font-family:'Plus Jakarta Sans',sans-serif;
        }

        .logo-title{
            font-family:'Tai Heritage Pro',serif;
            font-weight:700;
        }

        .navbar-menu{
            font-family:'Text Me One',sans-serif;
            text-transform:uppercase;
            letter-spacing:2px;
            font-size:14px;
            font-weight:700;
        }

        .navbar-dropdown{
            font-family:'Text Me One',sans-serif;
            text-transform:uppercase;
            letter-spacing:1.5px;
            font-size:13px;
            font-weight:700;
        }

        .hero-title{
            font-family:'Tai Heritage Pro',serif;
            font-weight:700;
        }

        .hero-slide{
            display:none;
        }

        .hero-slide.active{
            display:grid;
            animation:fade .8s ease;
        }

        .hero-title{
            font-family:'Tai Heritage Pro', serif;
            font-weight:700;
            line-height:1.1;
        }

        .heroSwiper{
            width:100%;
            padding:20px 0 50px;
        }

        .heroSwiper .swiper-slide{
            width:78%;
            transition:.4s;
            opacity:.45;
            transform:scale(.85);
        }

        .heroSwiper .swiper-slide-active{
            opacity:1;
            transform:scale(1);
        }

        .heroSwiper .swiper-slide-prev,
        .heroSwiper .swiper-slide-next{
            opacity:.85;
        }

        @keyframes fade{
            from{
                opacity:0;
                transform:translateY(20px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .floating{
            animation:float 4s ease-in-out infinite;
        }

        @keyframes float{
            0%,100%{
                transform:translateY(0px);
            }
            50%{
                transform:translateY(-15px);
            }
        }

        .reveal{
            opacity:0;
            transform:translateY(50px);
            transition:all 1s ease;
        }

        .reveal.active{
            opacity:1;
            transform:translateY(0);
        }
        
    </style>

</head>

<body class="text-gray-800">

<!-- ================= NAVBAR ================= -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">

        <!-- LOGO -->
        <a href="/" class="flex items-center gap-3">

            <img src="{{ asset('images/logo.png') }}"
                 class="w-10 h-10 md:w-12 md:h-12 rounded-full shadow-lg border bg-white p-1">

            <div>
                <h1 class="logo-title text-xl md:text-3xl text-[#6250B4]">
                    Monsabel Clinic
                </h1>

            <p class="block text-[9px] tracking-[2px] text-gray-500 uppercase">
                Veterinary Clinic
            </p>
            </div>

        </a>

        <!-- MENU -->
            <div class="hidden md:flex items-center gap-12 navbar-menu">

            <a href="/" class="hover:text-purple-600 transition">
                Home
            </a>

            <a href="#about" class="hover:text-purple-600 transition">
                About
            </a>

            <!-- DROPDOWN -->
            <div class="relative group">

                <button class="flex items-center gap-1 hover:text-purple-600 transition">
                    SERVICES

                    <svg class="w-4 h-4 group-hover:rotate-180 transition"
                         fill="none"
                         stroke="currentColor"
                         viewBox="0 0 24 24">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M19 9l-7 7-7-7"/>
                    </svg>

                </button>

                <div class="absolute left-0 mt-4 w-56 bg-white rounded-3xl shadow-2xl border opacity-0 invisible group-hover:opacity-100 group-hover:visible translate-y-4 group-hover:translate-y-0 transition-all duration-300 overflow-hidden">

                    <a href="/petshop"
                       class="block px-6 py-4 hover:bg-purple-50 transition">
                        Petshop
                    </a>

                    <a href="/grooming"
                       class="block px-6 py-4 hover:bg-purple-50 transition">
                        Grooming
                    </a>

                    <a href="/hotel"
                       class="block px-6 py-4 hover:bg-purple-50 transition">
                        Pet Hotel
                    </a>

                </div>

            </div>

            <a href="#dokter" class="hover:text-purple-600 transition">
                Doctors
            </a>

            <a href="#contact" class="hover:text-purple-600 transition">
                Contact
            </a>

        </div>

        <!-- RIGHT SIDE -->
        <div class="flex items-center gap-4">

        @php
            $cart = session('cart', []);
            $totalCart = count($cart);
        @endphp

        <a href="/keranjang"
        class="relative flex items-center justify-center
            w-10 h-10 md:w-12 md:h-12
            rounded-full
            bg-white
            shadow-lg
            border
            hover:scale-110
            transition">

            🛒

            @if($totalCart > 0)

            <span
                class="absolute -top-1 -right-1
                    bg-red-500
                    text-white
                    text-[10px] md:text-xs
                    w-5 h-5
                    rounded-full
                    flex items-center justify-center">

                {{ $totalCart }}

            </span>

            @endif

        </a>

        <!-- MOBILE HAMBURGER -->
        <button
            id="menuBtn"
            class="md:hidden w-10 h-10 flex items-center justify-center rounded-xl border shadow">

            <svg xmlns="http://www.w3.org/2000/svg"
                class="w-6 h-6"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24">

                <path stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>

            </svg>

        </button>

            {{-- ================= CART ================= --}}
            <a href="/keranjang"
            class="hidden md:flex relative items-center justify-center
                w-12 h-12 rounded-full
                bg-white shadow-lg border
                hover:scale-110 transition">

                🛒

                @php
                    $cart = session('cart', []);
                    $totalCart = count($cart);
                @endphp

                @if($totalCart > 0)

                    <span class="absolute -top-1 -right-1
                        bg-red-500 text-white text-xs
                        w-5 h-5 rounded-full
                        flex items-center justify-center">

                        {{ $totalCart }}

                    </span>

                @endif

            </a>

           <!-- AUTH -->
            @auth

            <div class="hidden md:block relative group">

            <button
                class="navbar-menu
                    flex items-center gap-2
                    px-5 py-3
                    rounded-2xl
                    bg-[#F7F3FF]
                    text-[#6250B4]
                    hover:bg-[#EEE8FF]
                    transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5"
                    fill="currentColor"
                    viewBox="0 0 20 20">

                    <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm0 2c-3.314 0-6 2.239-6 5v1h12v-1c0-2.761-2.686-5-6-5z"/>

                </svg>

                {{ auth()->user()->name }}

                <svg
                    class="w-4 h-4 group-hover:rotate-180 transition"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"/>

                </svg>

            </button>
                <div
                    class="absolute right-0 mt-3
                        w-64 bg-white
                        rounded-2xl shadow-2xl border
                        opacity-0 invisible
                        group-hover:opacity-100
                        group-hover:visible
                        transition-all duration-300
                        overflow-hidden">

                    <div class="px-5 py-4 bg-purple-50 border-b">

                        <div class="font-bold text-purple-700">
                            {{ auth()->user()->name }}
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ auth()->user()->email }}
                        </div>

                    </div>

                    <a href="/profile" 
                    class="navbar-dropdown block px-5 py-4 hover:bg-[#F4F0FF]">
                        Profil Saya
                    </a>

                    <a href="/history"
                    class="navbar-dropdown block px-5 py-4 hover:bg-[#F4F0FF]">
                        Riwayat Booking
                    </a>

                    @if(auth()->user()->role == 'admin')

                    <a href="/admin/dashboard"
                    class="navbar-dropdown block px-5 py-4 hover:bg-[#F4F0FF]">
                        Dashboard Admin
                    </a>

                    @endif

                    <div class="border-t"></div>

                    <form method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="w-full text-left
                                px-5 py-4
                                text-red-600
                                hover:bg-red-50">

                            Logout

                        </button>

                    </form>

                </div>

            </div>

            @else

            <a href="/login"
            class="hidden md:block navbar-menu bg-[#6250B4] text-white px-6 py-3 rounded-xl">
                LOGIN
            </a>

            <a href="/register"
            class="hidden md:block navbar-menu border border-gray-300 px-6 py-3 rounded-xl">
                REGISTER
            </a>

            @endauth

        </div>

    </div>

</nav>

<div
    id="mobileMenu"
    class="hidden fixed top-[72px] left-0 right-0 z-40 md:hidden bg-white shadow-xl border-b">

    <a href="/" class="block px-6 py-4 border-b">Home</a>

    <a href="#about" class="block px-6 py-4 border-b">About</a>

    <details>

        <summary class="px-6 py-4 cursor-pointer border-b">
            Services
        </summary>

        <a href="/petshop" class="block px-10 py-3">
            Petshop
        </a>

        <a href="/grooming" class="block px-10 py-3">
            Grooming
        </a>

        <a href="/hotel" class="block px-10 py-3">
            Pet Hotel
        </a>

    </details>

    <a href="#dokter" class="block px-6 py-4 border-b">
        Doctors
    </a>

    <a href="#contact" class="block px-6 py-4 border-b">
        Contact
    </a>

    <hr>
    
    @guest

    <a href="/login" class="block px-6 py-4 border-b">
        Login
    </a>

    <a href="/register" class="block px-6 py-4">
        Register
    </a>

    @else

    <a href="/profile" class="block px-6 py-4 border-b">
        Profil Saya
    </a>

    <a href="/history" class="block px-6 py-4 border-b">
        Riwayat Booking
    </a>

    <form method="POST"
        action="{{ route('logout') }}">

        @csrf

        <button
            class="w-full text-left px-6 py-4 text-red-600">

            Logout

        </button>

    </form>

    @endguest

</div>


<!-- ================= PREMIUM HERO SECTION ================= -->
<section class="bg-white pt-20">

    <div class="max-w-5xl mx-auto px-5 lg:px-8 py-10">

        <div class="grid lg:grid-cols-2 gap-10 items-center">

            <div>

                <span class="inline-block text-[#6250B4] uppercase tracking-[3px] text-xs font-semibold mb-3">
                    Monsabel Pet Clinic
                </span>

                <h1 class="hero-title text-4xl md:text-5xl lg:text-6xl text-gray-900 leading-[1.1]">
                    Professional Care
                    <br>
                    For Your
                    <br>
                    Beloved Pets
                </h1>

                <p class="mt-5 text-base text-gray-600 leading-relaxed max-w-lg">
                    Klinik hewan terpercaya yang menyediakan layanan
                    kesehatan, grooming, pet hotel, dan pet shop
                    dengan pelayanan profesional untuk hewan
                    kesayangan Anda.
                </p>

            </div>

            <div class="hidden lg:flex justify-center items-center gap-3 h-[480px]">

                <a href="/grooming" class="group relative flex-1 hover:flex-[3] transition-all duration-500 ease-in-out h-full rounded-2xl overflow-hidden">

                    <img src="{{ asset('images/grooming.jpg') }}" alt="Grooming" class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#6250B4]/95 via-[#6250B4]/40 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">

                        <div class="absolute bottom-5 left-4 text-white">

                            <p class="uppercase tracking-[2px] text-xs opacity-80">
                                Monsabel Service
                            </p>

                            <h3 class="text-xl font-bold mt-1">
                                Pet Grooming
                            </h3>

                            <p class="mt-2 text-xs max-w-[180px] text-white/90">
                                Mandi, haircut, nail care dan perawatan bulu profesional.
                            </p>

                            <span class="inline-block mt-3 text-xs font-semibold">
                                Explore Service →
                            </span>

                        </div>

                    </div>

                </a>

                <a href="/hotel" class="group relative flex-1 hover:flex-[3] transition-all duration-500 ease-in-out h-full rounded-2xl overflow-hidden">

                    <img src="{{ asset('images/hotel.jpg') }}" alt="Pet Hotel" class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#6250B4]/95 via-[#6250B4]/40 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">

                        <div class="absolute bottom-5 left-4 text-white">

                            <p class="uppercase tracking-[2px] text-xs opacity-80">
                                Monsabel Service
                            </p>

                            <h3 class="text-xl font-bold mt-1">
                                Pet Hotel
                            </h3>

                            <p class="mt-2 text-xs max-w-[180px] text-white/90">
                                Penitipan nyaman dengan pemantauan harian dan fasilitas lengkap.
                            </p>

                            <span class="inline-block mt-3 text-xs font-semibold">
                                Explore Service →
                            </span>

                        </div>

                    </div>

                </a>

                <a href="/petshop" class="group relative flex-1 hover:flex-[3] transition-all duration-500 ease-in-out h-full rounded-2xl overflow-hidden">

                    <img src="{{ asset('images/petshop.jpg') }}" alt="Pet Shop" class="w-full h-full object-cover">

                    <div class="absolute inset-0 bg-gradient-to-t from-[#6250B4]/95 via-[#6250B4]/40 to-transparent opacity-0 group-hover:opacity-100 transition duration-500">

                        <div class="absolute bottom-5 left-4 text-white">

                            <p class="uppercase tracking-[2px] text-xs opacity-80">
                                Monsabel Service
                            </p>

                            <h3 class="text-xl font-bold mt-1">
                                Pet Shop
                            </h3>

                            <p class="mt-2 text-xs max-w-[180px] text-white/90">
                                Makanan, vitamin, aksesoris dan kebutuhan hewan premium.
                            </p>

                            <span class="inline-block mt-3 text-xs font-semibold">
                                Explore Service →
                            </span>

                        </div>

                    </div>

                </a>

            </div>

        <div class="lg:hidden">

            <div class="swiper heroSwiper">

                <div class="swiper-wrapper">

                    <!-- Grooming -->
                    <div class="swiper-slide">

                        <a href="/grooming"
                        class="block relative h-[320px] rounded-[35px] overflow-hidden">

                            <img
                                src="{{ asset('images/grooming.jpg') }}"
                                class="w-full h-full object-cover">

                            <div class="absolute inset-0 bg-gradient-to-t from-[#6250B4]/90 via-[#6250B4]/30 to-transparent"></div>

                            <div class="absolute bottom-7 left-6 text-white">

                                <p class="uppercase tracking-[2px] text-xs">
                                    Monsabel Service
                                </p>

                                <h3 class="text-2xl font-bold mt-2">
                                    Pet Grooming
                                </h3>

                                <p class="mt-2 text-sm">
                                    Mandi, haircut dan nail care profesional.
                                </p>

                            </div>

                        </a>

                    </div>

                    <!-- Hotel -->
                    <div class="swiper-slide">

                        <a href="/hotel"
                        class="block relative h-[320px] rounded-[35px] overflow-hidden">

                            <img
                                src="{{ asset('images/hotel.jpg') }}"
                                class="w-full h-full object-cover">

                            <div class="absolute inset-0 bg-gradient-to-t from-[#6250B4]/90 via-[#6250B4]/30 to-transparent"></div>

                            <div class="absolute bottom-7 left-6 text-white">

                                <p class="uppercase tracking-[2px] text-xs">
                                    Monsabel Service
                                </p>

                                <h3 class="text-2xl font-bold mt-2">
                                    Pet Hotel
                                </h3>

                                <p class="mt-2 text-sm">
                                    Penitipan nyaman dan aman.
                                </p>

                            </div>

                        </a>

                    </div>

                    <!-- Petshop -->
                    <div class="swiper-slide">

                        <a href="/petshop"
                        class="block relative h-[320px] rounded-[35px] overflow-hidden">

                            <img
                                src="{{ asset('images/petshop.jpg') }}"
                                class="w-full h-full object-cover">

                            <div class="absolute inset-0 bg-gradient-to-t from-[#6250B4]/90 via-[#6250B4]/30 to-transparent"></div>

                            <div class="absolute bottom-7 left-6 text-white">

                                <p class="uppercase tracking-[2px] text-xs">
                                    Monsabel Service
                                </p>

                                <h3 class="text-2xl font-bold mt-2">
                                    Pet Shop
                                </h3>

                                <p class="mt-2 text-sm">
                                    Produk premium untuk hewan kesayangan.
                                </p>

                            </div>

                        </a>

                    </div>

                </div>

                <div class="swiper-pagination mt-5"></div>

            </div>

        </div>
            
        </div>
        
    </div>

</section>

<!-- ================= SERVICES ================= -->
<section id="services" class="py-20 bg-[#FDFBF7]">
    <div class="max-w-6xl mx-auto px-6">
        
        <!-- TITLE -->
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold text-[#1A2B49]">Layanan Klinik Kami</h2>
            <div class="h-1 w-20 bg-[#6250B4] mx-auto mt-6 rounded-full"></div>
        </div>

        <!-- SERVICES GRID -->
        <div class="grid md:grid-cols-3 gap-8">
            
            <!-- PETSHOP -->
            <a href="/petshop" class="group relative block h-96 rounded-[32px] overflow-hidden bg-[#F4F0DD] transition-all duration-500 hover:shadow-2xl flex flex-col">
                <!-- Teks di Atas -->
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-[#1A2B49]">Petshop</h3>
                </div>
                <!-- Gambar di Bawah -->
                <div class="flex-grow relative">
                    <img src="{{ asset('images/petshop.png') }}" alt="Petshop" class="w-full h-full object-cover">
                    <!-- Overlay Hover -->
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 backdrop-blur-sm transition-all duration-300">
                        <span class="text-white font-bold text-xl uppercase tracking-widest">Learn More</span>
                    </div>
                </div>
            </a>

            <!-- GROOMING -->
            <a href="/grooming" class="group relative block h-96 rounded-[32px] overflow-hidden bg-[#F3CCDE] transition-all duration-500 hover:shadow-2xl flex flex-col">
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-[#1A2B49]">Pet Grooming</h3>
                </div>
                <div class="flex-grow relative">
                    <img src="{{ asset('images/grooming.png') }}" alt="Grooming" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 backdrop-blur-sm transition-all duration-300">
                        <span class="text-white font-bold text-xl uppercase tracking-widest">Learn More</span>
                    </div>
                </div>
            </a>

            <!-- PET HOTEL -->
            <a href="/hotel" class="group relative block h-96 rounded-[32px] overflow-hidden bg-[#DDE8C8] transition-all duration-500 hover:shadow-2xl flex flex-col">
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-[#1A2B49]">Pet Hotel</h3>
                </div>
                <div class="flex-grow relative">
                    <img src="{{ asset('images/hotel.png') }}" alt="Pet Hotel" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 group-hover:opacity-100 backdrop-blur-sm transition-all duration-300">
                        <span class="text-white font-bold text-xl uppercase tracking-widest">Learn More</span>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section>

<!-- ================= ABOUT ================= -->
<section id="about" class="py-20 bg-[#FDFBF7]">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
            
            <!-- SEBELAH KIRI: LOGO & LOKASI -->
            <div class="bg-white p-10 rounded-[32px] border border-gray-100 shadow-sm text-center">
                <div class="flex justify-center mb-8">
                    <img src="{{ asset('images/logomonsabel.png') }}" class="w-40 h-40 object-contain" alt="Logo Monsabel">
                </div>
                
                <h3 class="text-2xl font-bold text-[#1A2B49] mb-6">Lokasi Klinik Kami</h3>
                
                <div class="space-y-4">
                    <div class="p-6 bg-[#FDF1E2] rounded-[24px] text-left">
                        <h4 class="font-bold text-gray-900">Main Clinic</h4>
                        <p class="text-sm text-gray-600 mt-1">Jl. Karya Rakyat No.46, Sei Agul, Medan Barat</p>
                    </div>
                    <div class="p-6 bg-[#F3CCDE] rounded-[24px] text-left">
                        <h4 class="font-bold text-gray-900">Cabang Marelan</h4>
                        <p class="text-sm text-gray-600 mt-1">Jl. Marelan VII Pasar I Tengah No.75</p>
                    </div>
                </div>
            </div>

            <!-- SEBELAH KANAN: TEKS & DRH DEWI -->
            <div>
                <div class="mb-8">
                    <h2 class="text-4xl font-bold text-[#1A2B49]">About Us</h2>
                    <div class="h-1 w-20 bg-[#6250B4] mt-6 rounded-full"></div>
                </div>

                <h2 class="text-4xl md:text-5xl font-bold text-[#1A2B49] mt-6 leading-tight">
                    Trusted Veterinary Care <br> For Every Pet
                </h2>

                <p class="mt-6 text-gray-600 leading-relaxed text-lg">
                    Monsabel Pet Clinic hadir memberikan pelayanan kesehatan dan perawatan terbaik untuk hewan kesayangan Anda. Didukung oleh dokter profesional dan fasilitas modern, kami berkomitmen menjaga kesehatan anabul kesayangan Anda dengan sepenuh hati.
                </p>

                <!-- PROFIL DRH DEWI -->
                <div class="mt-10 bg-white rounded-[24px] p-6 border border-gray-100 shadow-sm flex items-center gap-6">
                    <img src="{{ asset('images/founder.jpg') }}" class="w-20 h-20 rounded-full object-cover border-2 border-[#6250B4]" alt="drh. Dewi">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">drh. Dewi Naike Nainggolan, M.Si</h3>
                        <p class="text-sm text-[#6250B4] font-semibold">Founder & Veterinarian</p>
                        <p class="text-sm text-gray-500 mt-1">Dokter hewan profesional dengan pengalaman luas dalam menangani kesehatan hewan.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ================= MEET OUR TEAM ================= -->
<section id="dokter" class="py-32 bg-[#F7F5F1] overflow-hidden">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-20 items-center">

            <!-- LEFT CONTENT -->
            <div>

                <h2 class="hero-title text-7xl leading-none text-[#0F2341]">

                    Meet
                    <br>

                    <span class="italic font-light text-gray-400">
                        our
                    </span>

                    <br>

                    Team

                </h2>

                <p class="mt-8 text-lg text-gray-500 max-w-md leading-8">

                    Tim dokter profesional Monsabel Pet Clinic
                    yang siap memberikan pelayanan kesehatan,
                    konsultasi dan perawatan terbaik untuk
                    hewan kesayangan Anda.

                </p>

            </div>

            <!-- RIGHT -->
            <div>

                <div class="flex gap-4 h-[520px]">

                    <!-- DOKTER 1 -->
                    <div class="group flex-[3] hover:flex-[6] transition-all duration-700 relative rounded-[35px] overflow-hidden">

                        <img src="{{ asset('images/dokter1.jpg') }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-8 left-6 text-white">

                            <h3 class="text-3xl font-bold">
                                drh. Dewi Naike Nainggolan
                            </h3>

                            <p class="text-white/80">
                                Founder & Veterinarian
                            </p>

                        </div>

                    </div>

                    <!-- DOKTER 2 -->
                    <div class="group flex-1 hover:flex-[6] transition-all duration-700 relative rounded-[35px] overflow-hidden">

                        <img src="{{ asset('images/dokter2.jpg') }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-6 left-4 text-white">

                            <h3 class="font-bold text-xl">
                                drh. Sarah Minarni
                            </h3>

                        </div>

                    </div>

                    <!-- DOKTER 3 -->
                    <div class="group flex-1 hover:flex-[6] transition-all duration-700 relative rounded-[35px] overflow-hidden">

                        <img src="{{ asset('images/dokter3.jpg') }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-6 left-4 text-white">

                            <h3 class="font-bold text-xl">
                                drh. Bella Angela
                            </h3>

                        </div>

                    </div>

                    <!-- DOKTER 4 -->
                    <div class="group flex-1 hover:flex-[6] transition-all duration-700 relative rounded-[35px] overflow-hidden">

                        <img src="{{ asset('images/dokter4.jpg') }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-6 left-4 text-white">

                            <h3 class="font-bold text-xl">
                                drh. Oktryna Sibarani
                            </h3>

                        </div>

                    </div>

                    <!-- DOKTER 5 -->
                    <div class="group flex-1 hover:flex-[6] transition-all duration-700 relative rounded-[35px] overflow-hidden">

                        <img src="{{ asset('images/dokter5.jpg') }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-6 left-4 text-white">

                            <h3 class="font-bold text-xl">
                                drh. Suriate Cibro
                            </h3>

                        </div>

                    </div>

                    <!-- DOKTER 6 -->
                    <div class="group flex-1 hover:flex-[6] transition-all duration-700 relative rounded-[35px] overflow-hidden">

                        <img src="{{ asset('images/dokter6.jpg') }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-6 left-4 text-white">

                            <h3 class="font-bold text-xl">
                                drh. Putrina Siregar
                            </h3>

                        </div>

                    </div>

                    <!-- DOKTER 7 -->
                    <div class="group flex-1 hover:flex-[6] transition-all duration-700 relative rounded-[35px] overflow-hidden">

                        <img src="{{ asset('images/dokter7.jpg') }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-6 left-4 text-white">

                            <h3 class="font-bold text-xl">
                                drh. Uswatun Hasanah
                            </h3>

                        </div>

                    </div>

                    <!-- DOKTER 8 -->
                    <div class="group flex-1 hover:flex-[6] transition-all duration-700 relative rounded-[35px] overflow-hidden">

                        <img src="{{ asset('images/dokter8.jpg') }}"
                             class="w-full h-full object-cover">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/20 to-transparent"></div>

                        <div class="absolute bottom-6 left-4 text-white">

                            <h3 class="font-bold text-xl">
                                drh. Tengku Dinda
                            </h3>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<section class="py-32 bg-white">

    <div class="max-w-7xl mx-auto px-8">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- LEFT -->
            <div>

                <h2
                    class="text-[110px] font-extrabold text-gray-100 leading-none mb-10">

                    STAFF

                </h2>

                <div class="flex flex-wrap justify-between gap-16 mt-10">

                    <!-- ADMIN -->
                    <div>

                        <h3 class="font-bold text-2xl text-[#6250B4] uppercase tracking-wide mb-10">

                            ADMIN

                        </h3>

                        <div class="space-y-6">

                            <div class="flex items-center gap-4 mb-6">

                                <img
                                    src="{{ asset('images/admin1.jpg') }}"
                                    class="w-14 h-14 rounded-full object-cover">

                                <div>

                                    <p class="font-semibold">
                                        Fitri Tanjung
                                    </p>

                                    <span class="text-sm text-gray-500">
                                        Administrator
                                    </span>

                                </div>

                            </div>

                            <div class="flex items-center gap-4 mb-6">

                                <img
                                    src="{{ asset('images/admin2.jpg') }}"
                                    class="w-14 h-14 rounded-full object-cover">

                                <div>

                                    <p class="font-semibold">
                                        Khoirunisa
                                    </p>

                                    <span class="text-sm text-gray-500">
                                        Administrator
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- PARAMEDIS -->
                    <div>

                        <h3 class="font-bold text-2xl text-[#6250B4] uppercase tracking-wide mb-10">

                            PARAMEDIS

                        </h3>

                        <div class="space-y-6">

                            <div class="flex items-center gap-4 mb-6">

                                <img
                                    src="{{ asset('images/paramedis1.jpg') }}"
                                    class="w-14 h-14 rounded-full object-cover">

                                <div>

                                    <p class="font-semibold">
                                        Bernardus Buulolo
                                    </p>

                                    <span class="text-sm text-gray-500">
                                        Paramedis
                                    </span>

                                </div>

                            </div>

                            <div class="flex items-center gap-4 mb-6">

                                <img
                                    src="{{ asset('images/paramedis2.jpg') }}"
                                    class="w-14 h-14 rounded-full object-cover">

                                <div>

                                    <p class="font-semibold">
                                        Suma
                                    </p>

                                    <span class="text-sm text-gray-500">
                                        Paramedis
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- KEBERSIHAN -->
                    <div>

                        <h3 class="font-bold text-2xl text-[#6250B4] uppercase tracking-wide mb-10">

                            KEBERSIHAN

                        </h3>

                        <div class="flex items-center gap-4 mb-6">

                            <img
                                src="{{ asset('images/kebersihan1.jpg') }}"
                                class="w-14 h-14 rounded-full object-cover">

                            <div>

                                <p class="font-semibold">
                                    Reza Juliyanto
                                </p>

                                <span class="text-sm text-gray-500">
                                    Cleaning Staff
                                </span>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- RIGHT -->
            <div class="flex justify-center">

                <img
                    src="{{ asset('images/kucing.png') }}"
                    class="w-[480px] object-contain">

            </div>

        </div>

    </div>

</section>


<!-- ================= BENEFIT ================= -->
<section class="bg-[#F7F5F1]">

    <div class="max-w-6xl mx-auto px-6 lg:px-12 py-16">
    <div class="text-center mb-16">

        <span class="bg-white text-purple-600 px-5 py-2 rounded-full text-sm font-semibold shadow">
            WHY CHOOSE US
        </span>

        <h2 class="text-5xl font-bold mt-6">
            Benefit Monsabel Clinic 
        </h2>

    </div>

    <div class="max-w-6xl mx-auto grid md:grid-cols-3 gap-8 px-8">

        <div class="bg-white p-8 rounded-[35px] shadow-xl text-center hover:-translate-y-3 transition">
            <div class="text-6xl mb-5">🐾</div>
            <h3 class="text-2xl font-bold mb-3">Professional Care</h3>
            <p class="text-gray-500">Pelayanan profesional dan ramah hewan.</p>
        </div>

        <div class="bg-white p-8 rounded-[35px] shadow-xl text-center hover:-translate-y-3 transition">
            <div class="text-6xl mb-5">💜</div>
            <h3 class="text-2xl font-bold mb-3">Best Treatment</h3>
            <p class="text-gray-500">Perawatan nyaman dan berkualitas tinggi.</p>
        </div>

        <div class="bg-white p-8 rounded-[35px] shadow-xl text-center hover:-translate-y-3 transition">
            <div class="text-6xl mb-5">⚡</div>
            <h3 class="text-2xl font-bold mb-3">Fast Service</h3>
            <p class="text-gray-500">Pelayanan cepat dan terpercaya.</p>
        </div>

    </div>

</section>


<!-- ================= TESTIMONIALS ================= -->
<style>
    .hide-scrollbar::-webkit-scrollbar{
        display:none;
    }

    .hide-scrollbar{
        -ms-overflow-style:none;
        scrollbar-width:none;
    }
</style>

<section id="testimonials" class="py-20 bg-[#FCFBFF]">

    <div class="max-w-7xl mx-auto px-6">

        <!-- HEADER -->
        <div class="text-center mb-14">

            <span class="inline-flex items-center px-4 py-2 rounded-full bg-[#6250B4]/10 text-[#6250B4] text-sm font-semibold">
                TESTIMONIALS
            </span>

            <h2 class="text-4xl lg:text-5xl font-black text-gray-900 mt-5">
                Real Success Stories
            </h2>

            <div class="flex justify-center items-center gap-3 mt-5">

                <span class="text-xl font-bold text-gray-800">
                    {{ $avgRating ?? 0 }}/5
                </span>

                <span class="text-yellow-400 text-lg">
                    ⭐⭐⭐⭐⭐
                </span>

                <span class="text-gray-500">
                    Based on {{ $totalReview ?? 0 }} Reviews
                </span>

            </div>

        </div>

        <div class="grid lg:grid-cols-[220px,1fr] gap-6 items-center">

            <!-- LEFT -->
            <div>

                <div class="text-[60px] leading-none text-[#6250B4]/15 font-black">
                    “
                </div>

                <h3 class="text-3xl font-black text-gray-900 leading-tight">
                    What Our Customers Are Saying
                </h3>

                <p class="mt-4 text-gray-500">
                    Ulasan asli dari pelanggan Monsabel Clinic.
                </p>

            </div>

            <!-- REVIEW SLIDER -->
            <div class="overflow-hidden">

                <div
                    id="reviewSlider"
                    class="flex gap-4 overflow-x-auto scroll-smooth hide-scrollbar py-2">

                    @forelse($testimonials as $review)

                    <div class="min-w-[260px] max-w-[260px] bg-white rounded-[24px] p-5 shadow-md border border-gray-100 hover:-translate-y-1 transition">

                        <div class="text-yellow-400 text-sm mb-3">

                            @for($i=1; $i<=5; $i++)

                                @if($i <= $review->rating)
                                    ⭐
                                @else
                                    ☆
                                @endif

                            @endfor

                        </div>

                        <p class="text-gray-600 text-sm leading-relaxed min-h-[70px]">
                            "{{ $review->ulasan }}"
                        </p>

                        <div class="flex items-center gap-4 mt-8">

                            <div
                                class="w-10 h-10 rounded-full
                                       bg-[#6250B4] text-white
                                       flex items-center justify-center
                                       font-bold">

                                {{ strtoupper(substr($review->user->name ?? 'U',0,1)) }}

                            </div>

                            <div>

                                <div class="font-semibold text-sm text-gray-800">
                                    {{ $review->user->name ?? 'Customer' }}
                                </div>

                                <div class="text-xs text-gray-400">
                                    {{ $review->created_at->diffForHumans() }}
                                </div>

                            </div>

                        </div>

                    </div>

                    @empty

                    <div
                        class="bg-white rounded-[30px]
                               p-10 shadow-lg border
                               w-full text-center">

                        <h4 class="font-bold text-xl mb-3">
                            Belum Ada Ulasan
                        </h4>

                        <p class="text-gray-500">
                            Jadilah pelanggan pertama yang memberikan ulasan.
                        </p>

                    </div>

                    @endforelse

                </div>

            </div>

        </div>

        <!-- FORM ULASAN -->
        <div
            class="mt-12 bg-white rounded-[28px]
                shadow-lg border border-gray-100
                p-8 max-w-3xl mx-auto">

            <h3 class="text-3xl font-bold text-gray-900">
                Bagikan Pengalaman Anda
            </h3>

            <p class="text-gray-500 mt-2">
                Ceritakan pengalaman Anda menggunakan layanan Monsabel Clinic.
            </p>

            <form
                action="{{ route('testimonial.store') }}"
                method="POST"
                class="mt-8">

                @csrf

                <!-- RATING -->
                <div class="mb-6">

                    <label class="font-semibold text-gray-700 block mb-3">
                        Berikan Rating
                    </label>

                    <select
                        name="rating"
                        class="w-full h-12 rounded-xl border border-gray-300 px-4">

                        <option value="5">⭐⭐⭐⭐⭐ Sangat Puas</option>
                        <option value="4">⭐⭐⭐⭐ Puas</option>
                        <option value="3">⭐⭐⭐ Cukup</option>
                        <option value="2">⭐⭐ Kurang</option>
                        <option value="1">⭐ Tidak Puas</option>

                    </select>

                </div>

                <!-- ULASAN -->
                <div>

                    <label class="font-semibold text-gray-700 block mb-3">
                        Ulasan
                    </label>

                    <textarea
                        name="ulasan"
                        rows="5"
                        placeholder="Tulis pengalaman Anda..."
                        class="w-full rounded-xl border border-gray-300 px-4 py-4 resize-none"></textarea>

                </div>

                <button
                    type="submit"
                    class="mt-6 bg-[#6250B4]
                           hover:bg-[#5543A6]
                           text-white
                           px-10 py-3
                           rounded-xl
                           font-semibold">

                    Kirim Ulasan

                </button>

            </form>

        </div>

    </div>

</section>

<!-- ================= FOOTER ================= -->
<footer id="contact" class="bg-[#F7F5F1] text-[#11141a] pt-16 relative overflow-hidden font-sans border-t border-gray-100">

    <div class="max-w-7xl mx-auto px-8">

        <!-- MAIN FOOTER CONTENT -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-10 items-start pb-12">

            <!-- BRAND SECTION (Lebar 2 Kolom) -->
            <div class="lg:col-span-2 space-y-4">
                <div class="flex items-center gap-4">
                    <img src="{{ asset('images/logo.png') }}" class="w-14 h-14 rounded-full p-1 shadow-md border border-gray-100">
                    <div>
                        <h3 class="text-2xl font-black tracking-tight uppercase leading-none">
                            Monsabel Clinic
                        </h3>
                        <p class="uppercase tracking-[3px] text-[10px] text-red-600 font-bold mt-1">
                            Veterinary Clinic
                        </p>
                    </div>
                </div>
                
                <hr class="w-40 border-t border-[#11141a] my-2">
                
                <p class="text-sm text-gray-600 leading-relaxed max-w-xs">
                    Klinik hewan terpercaya dengan layanan kesehatan, grooming, pet hotel dan petshop untuk hewan kesayangan Anda.
                </p>

                <!-- SOCIAL MEDIA CIRCLES -->
                <div class="flex gap-2 pt-2">
                    <a href="https://www.instagram.com/monsabelpetsclinic?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="w-8 h-8 rounded-full bg-red-600 text-white flex items-center justify-center text-xs font-bold hover:bg-red-700 transition">
                        IG
                    </a>
                    <a href="https://www.facebook.com/monsabel.petsclinic.5?locale=id_ID" target="_blank" class="w-8 h-8 rounded-full bg-[#1877F2] text-white flex items-center justify-center text-xs font-bold hover:bg-[#166FE5] transition">                        FB
                    </a>
                    <a href="#" class="w-8 h-8 rounded-full bg-gray-200 text-[#11141a] flex items-center justify-center text-xs font-bold hover:bg-gray-300 transition">
                        TT
                    </a>
                </div>
            </div>

            <!-- LINKS SECTION -->
            <div>
                <h4 class="font-bold text-sm uppercase tracking-wider mb-5 text-[#11141a]">
                    Useful Links
                </h4>
                <ul class="space-y-3 text-sm text-gray-600">
                    <li><a href="/" class="hover:text-red-600 transition">Home</a></li>
                    <li><a href="#about" class="hover:text-red-600 transition">About Us</a></li>
                    <li><a href="/petshop" class="hover:text-red-600 transition">Petshop</a></li>
                    <li><a href="/grooming" class="hover:text-red-600 transition">Pet Grooming</a></li>
                    <li><a href="/hotel" class="hover:text-red-600 transition">Pet Hotel</a></li>
                </ul>
            </div>

            <!-- CONTACT INFO SECTION -->
            <div class="lg:col-span-1">
                <h4 class="font-bold text-sm uppercase tracking-wider mb-5 text-[#11141a]">
                    Contact Info
                </h4>
                <div class="space-y-4 text-sm text-gray-600">
                    <div>
                        <span class="block font-bold text-[#11141a]">Call:</span>
                        <a href="https://wa.me/6281361175932" class="hover:text-red-600 transition">0813-6117-5932</a>
                    </div>
                    <div>
                        <span class="block font-bold text-[#11141a]">Instagram:</span>
                        <a href="https://www.instagram.com/monsabelpetsclinic?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="hover:text-red-600 transition">@monsabelpetsclinic</a>
                    </div>
                    <div>
                        <span class="block font-bold text-[#11141a]">Address:</span>
                        <p class="leading-relaxed">Jl. Karya Rakyat No.46, Sei Agul, Medan Barat, Kota Medan</p>
                    </div>
                </div>
            </div>

            <!-- OPENING HOURS SECTION -->
            <div>
                <h4 class="font-bold text-sm uppercase tracking-wider mb-5 text-[#11141a]">
                    Opening Hours
                </h4>
                <ul class="space-y-2 text-xs text-gray-600">
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Senin</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Selasa</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Rabu</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Kamis</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Jumat</span><span class="font-semibold text-[#11141a]">09.00 - 20.00</span></li>
                    <li class="flex justify-between border-b border-gray-100 pb-1"><span>Sabtu</span><span class="font-semibold text-[#11141a]">09.00 - 19.00</span></li>
                    <li class="flex justify-between text-red-600 font-bold"><span>Minggu</span><span>Tutup</span></li>
                </ul>
            </div>

            <!-- GOOGLE MAPS EMBED SECTION -->
            <div class="w-full h-44 rounded-2xl overflow-hidden shadow-sm border border-gray-200">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.9613149959683!2d98.6601449!3d3.6077395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x303131ec5aa263ad%3A0xb304b4df9d0fa422!2sJl.%20Karya%20Rakyat%20No.46%2C%20Sei%20Agul%2C%20Kec.%20Medan%20Barat%2C%20Kota%20Medan%2C%20Sumatera%20Utara%2020114!5e0!3m2!1sid!2sid!4v1710000000000!5m2!1sid!2sid" 
                    class="w-full h-full border-0" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>

        </div>

    </div>

    <!-- SUB-FOOTER / BOTTOM BAR -->
    <div class="bg-[#6250B4] text-white py-5 text-xs mt-8">
        <div class="max-w-7xl mx-auto px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            
            <div class="flex gap-6">
                <a href="#" class="hover:text-white transition">Privacy Policy</a>
                <span class="text-white">|</span>
                <a href="#about" class="hover:text-white transition">Our History</a>
                <span class="text-white">|</span>
                <a href="https://maps.app.goo.gl/gJ88k5BFiGQ2Ehh88" target="_blank" class="hover:text-white transition">Find Us On Map</a>
            </div>

            <div>
                &copy; 2026 Monsabel Pet Clinic. All images are for demo purposes only.
            </div>

        </div>
    </div>

</footer>

<script>

    const menuBtn = document.getElementById('menuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    menuBtn.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // =========================
    // REVEAL ANIMATION
    // =========================

    const reveals = document.querySelectorAll('.reveal');

    window.addEventListener('scroll', () => {

        reveals.forEach(reveal => {

            const windowHeight = window.innerHeight;
            const revealTop = reveal.getBoundingClientRect().top;

            if(revealTop < windowHeight - 100){
                reveal.classList.add('active');
            }

        });

    });

</script>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
new Swiper(".heroSwiper",{

    effect:"coverflow",

    grabCursor:true,

    centeredSlides:true,

    slidesPerView:"auto",

    loop:true,

    coverflowEffect:{

        rotate:0,

        stretch:0,

        depth:180,

        modifier:1,

        scale:0.88,

        slideShadows:false,

    },

    autoplay:{

        delay:3500,

        disableOnInteraction:false,

    },

    pagination:{

        el:".swiper-pagination",

        clickable:true,

    }

});
</script>

</body>
</html>