<!-- ================= NAVBAR ================= -->
<nav class="fixed top-0 left-0 right-0 z-50 bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-8 py-3 md:py-4 flex justify-between items-center">

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
                <span class="absolute -top-1 -right-1
                            w-5 h-5
                            rounded-full
                            bg-red-500
                            text-white
                            text-[10px] md:text-xs
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
