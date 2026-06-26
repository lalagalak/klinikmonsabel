<x-guest-layout>

@if(session('success'))
<div class="fixed top-5 right-5 z-50 bg-green-500 text-white px-6 py-4 rounded-xl shadow-lg">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="fixed top-5 right-5 z-50 bg-red-500 text-white px-6 py-4 rounded-xl shadow-lg">
    Email atau Password salah!
</div>
@endif

<div class="min-h-screen bg-[#F6F4FF] flex items-center justify-center px-4 py-6">

    <div class="w-full max-w-4xl bg-white rounded-[18px] shadow-[0_15px_40px_rgba(98,80,180,0.15)] overflow-hidden">

        <div class="grid lg:grid-cols-2 min-h-[460px]">

            <!-- PANEL KIRI -->
            <div class="hidden lg:flex flex-col justify-between p-8 bg-white border-r-4 border-[#6250B4]">

                <div>
                    <div class="text-[#6250B4] text-xl font-bold">
                        ✦
                    </div>
                </div>

                <div>

                    <img
                        src="{{ asset('images/logo.png') }}"
                        alt="Monsabel"
                        class="w-28 mb-5"
                    >

                    <p class="text-[#6250B4] text-sm mb-2 font-medium">
                        Selamat Datang di
                    </p>

                    <h2 class="text-3xl font-black text-[#6250B4] leading-tight">
                        Klinik Hewan
                        Monsabel
                    </h2>

                    <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                        Akses layanan Pet Grooming,
                        Pet Hotel, dan Pet Shop
                        dengan mudah dalam satu sistem.
                    </p>

                </div>

            </div>
            <!-- PANEL KANAN -->
            <div class="flex items-center justify-center px-8 py-12">

                <div class="w-full max-w-md">

                    <!-- MOBILE -->
                    <div class="lg:hidden text-center mb-8">

                        <img
                            src="{{ asset('images/logo.png') }}"
                            class="w-32 mx-auto mb-4"
                        >

                        <h2 class="text-2xl font-bold text-[#6250B4]">
                            Klinik Hewan Monsabel
                        </h2>

                    </div>

                    <div class="mb-8">

                        <div class="text-[#6250B4] text-xl font-bold">
                            ✦
                        </div>

                        <h1 class="text-2xl font-bold text-gray-900 mt-2">
                            Login Account
                        </h1>

                        <p class="text-gray-500 mt-2 text-sm">
                            Masukkan email dan password Anda untuk melanjutkan.
                        </p>

                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- EMAIL -->
                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-semibold text-gray-700">
                                Email
                            </label>

                            <input
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                class="w-full h-11 rounded-xl border border-gray-300 px-5 focus:ring-4 focus:ring-purple-100 focus:border-[#6250B4]"
                                placeholder="nama@email.com"
                            >

                        </div>

                        <!-- PASSWORD -->
                        <div class="mb-6">

                            <label class="block mb-2 text-sm font-semibold text-gray-700">
                                Password
                            </label>

                            <div class="relative">

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    class="w-full h-11 rounded-xl border border-gray-300 px-5 pr-14 focus:ring-4 focus:ring-purple-100 focus:border-[#6250B4]"
                                    placeholder="Masukkan password"
                                >

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2 text-gray-500"
                                >
                                    👁
                                </button>

                            </div>

                        </div>

                        <!-- REMEMBER -->
                        <div class="flex justify-between items-center mb-8">

                            <label class="flex items-center gap-2">

                                <input
                                    type="checkbox"
                                    name="remember"
                                    class="rounded border-gray-300 text-[#6250B4]"
                                >

                                <span class="text-gray-600 text-sm">
                                    Ingat Saya
                                </span>

                            </label>

                            @if(Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="text-[#6250B4] text-sm font-semibold"
                            >
                                Lupa Password?
                            </a>

                            @endif

                        </div>

                        <!-- BUTTON -->
                        <button
                            type="submit"
                            class="w-full h-11 rounded-xl bg-[#6250B4] hover:bg-[#5645A8] text-white font-bold shadow-lg transition"
                        >
                            Masuk
                        </button>

                        <div class="text-center mt-8 text-gray-500">

                            Belum punya akun?

                            <a
                                href="{{ route('register') }}"
                                class="text-[#6250B4] font-bold"
                            >
                                Daftar Sekarang
                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

function togglePassword() {

    const password = document.getElementById('password');

    if(password.type === 'password'){
        password.type = 'text';
    } else {
        password.type = 'password';
    }

}

setTimeout(() => {

    const alerts = document.querySelectorAll('.fixed');

    alerts.forEach(alert => {
        alert.style.display = 'none';
    });

}, 3000);

</script>

</x-guest-layout>