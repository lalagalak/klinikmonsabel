<!-- ================= NAVBAR ================= -->
<nav class="sticky top-0 z-50 bg-white border-b border-gray-100">

    <div class="max-w-7xl mx-auto px-8 py-4 flex justify-between items-center">

        <!-- LOGO -->
        <a href="/" class="flex items-center gap-3">

            <img src="{{ asset('images/logo.png') }}"
                 class="w-12 h-12 rounded-full shadow-lg border bg-white p-1">

            <div>
                <h1 class="logo-title text-3xl text-[#6250B4]">
                    Monsabel Clinic
                </h1>

            <p class="text-xs tracking-[3px] text-gray-500 uppercase mt-1">
                     Veterinary Clinic
                </p>
            </div>

        </a>

        <!-- MENU -->
        <div class="hidden md:flex items-center gap-12 navbar-menu">

            <a href="/"
            class="hover:text-purple-600 transition">
                Home
            </a>

            <a href="/#about"
            class="hover:text-purple-600 transition">
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

            <a href="/#dokter"
            class="hover:text-purple-600 transition">
                Doctors
            </a>

            <a href="/#contact"
            class="hover:text-purple-600 transition">
                Contact
            </a>

        </div>

        <!-- RIGHT SIDE -->
        <div class="flex items-center gap-4">

            {{-- ================= CART ================= --}}
            <a href="/keranjang"
               class="relative flex items-center justify-center
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

            <div class="relative group">

                <!-- BUTTON USER -->
                <button
                    class="navbar-menu
                        flex items-center gap-3
                        px-5 py-3
                        rounded-2xl
                        bg-[#F7F3FF]
                        text-[#6250B4]
                        hover:bg-[#EEE8FF]
                        transition-all duration-300">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5"
                        fill="currentColor"
                        viewBox="0 0 20 20">

                        <path d="M10 10a4 4 0 100-8 4 4 0 000 8zm0 2c-3.314 0-6 2.239-6 5v1h12v-1c0-2.761-2.686-5-6-5z"/>

                    </svg>

                    {{ auth()->user()->name }}

                    <svg
                        class="w-4 h-4 group-hover:rotate-180 transition duration-300"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24">

                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"/>

                    </svg>

                </button>

                <!-- DROPDOWN -->
                <div
                    class="absolute right-0 mt-4
                        w-72 bg-white
                        rounded-3xl
                        shadow-[0_20px_60px_rgba(98,80,180,0.15)]
                        border border-[#EFEAFD]
                        opacity-0 invisible
                        group-hover:opacity-100
                        group-hover:visible
                        translate-y-4
                        group-hover:translate-y-0
                        transition-all duration-300
                        overflow-hidden z-50">

                    <!-- USER INFO -->
                    <div class="px-6 py-5 bg-[#F7F3FF] border-b border-[#EFEAFD]">

                        <div class="navbar-dropdown text-[#6250B4] text-base">

                            {{ auth()->user()->name }}

                        </div>

                        <div class="text-sm text-gray-500 normal-case tracking-normal mt-1 font-sans">

                            {{ auth()->user()->email }}

                        </div>

                    </div>

                    <!-- MENU -->
                    <a href="/profile"
                    class="navbar-dropdown
                            block px-6 py-4
                            hover:bg-[#F7F3FF]
                            transition">

                        Profil Saya

                    </a>

                    <a href="/history"
                    class="navbar-dropdown
                            block px-6 py-4
                            hover:bg-[#F7F3FF]
                            transition">

                        Riwayat Booking

                    </a>

                    @if(auth()->user()->role == 'admin')

                    <a href="/admin/dashboard"
                    class="navbar-dropdown
                            block px-6 py-4
                            hover:bg-[#F7F3FF]
                            transition">

                        Dashboard Admin

                    </a>

                    @endif

                    <div class="border-t border-[#EFEAFD]"></div>

                    <!-- LOGOUT -->
                    <form method="POST"
                        action="{{ route('logout') }}">

                        @csrf

                        <button
                            type="submit"
                            class="navbar-dropdown
                                w-full text-left
                                px-6 py-4
                                text-red-500
                                hover:bg-red-50
                                transition">

                            Logout

                        </button>

                    </form>

                </div>

            </div>

            @else

            <a href="/login"
            class="navbar-menu
                    bg-[#6250B4]
                    text-white
                    px-6 py-3
                    rounded-xl
                    hover:bg-[#5645A8]
                    transition">

                LOGIN

            </a>

            <a href="/register"
            class="navbar-menu
                    border border-gray-300
                    px-6 py-3
                    rounded-xl
                    hover:bg-gray-50
                    transition">

                REGISTER

            </a>

            @endauth
        </div>

    </div>

</nav>