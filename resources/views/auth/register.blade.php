<x-guest-layout>

<div class="min-h-screen bg-[#F6F4FF] flex items-center justify-center px-4 py-6">

    <div class="w-full max-w-4xl bg-white rounded-[20px]
                shadow-[0_15px_40px_rgba(98,80,180,0.15)]
                overflow-hidden">

        <div class="grid lg:grid-cols-2 min-h-[550px]">

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
                        Daftarkan akun Anda untuk menikmati layanan
                        Pet Grooming, Pet Hotel, dan Pet Shop secara online.
                    </p>

                </div>

            </div>

            <!-- RIGHT PANEL -->
            <div class="flex items-center justify-center px-8 py-8">

                <div class="w-full max-w-sm">

                    <!-- Mobile -->
                    <div class="lg:hidden text-center mb-6">

                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="Monsabel"
                            class="w-20 h-20 mx-auto mb-3"
                        >

                        <h2 class="text-2xl font-bold text-[#6250B4]">
                            Klinik Hewan Monsabel
                        </h2>

                    </div>

                    <!-- Heading -->
                    <div class="mb-6">

                        <div class="text-[#6250B4] text-xl font-bold">
                            ✦
                        </div>

                        <h2 class="text-2xl font-bold text-gray-900">
                            Buat Akun
                        </h2>

                        <p class="text-gray-500 text-sm mt-1">
                            Lengkapi data berikut untuk membuat akun pelanggan.
                        </p>

                    </div>

                    <form method="POST" action="{{ route('register') }}">

                        @csrf

                        <!-- Nama -->
                        <div class="mb-4">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Lengkap
                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                required
                                autofocus
                                placeholder="Masukkan Nama Anda"
                                class="w-full h-11 px-4 rounded-xl border border-gray-300
                                       focus:border-[#6250B4]
                                       focus:ring-2 focus:ring-purple-100
                                       outline-none transition"
                            >

                            <x-input-error
                                :messages="$errors->get('name')"
                                class="mt-2"
                            />

                        </div>

                        <!-- Email -->
                        <div class="mb-4">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                required
                                placeholder="Masukkan Email Anda"
                                class="w-full h-11 px-4 rounded-xl border border-gray-300
                                       focus:border-[#6250B4]
                                       focus:ring-2 focus:ring-purple-100
                                       outline-none transition"
                            >

                            <x-input-error
                                :messages="$errors->get('email')"
                                class="mt-2"
                            />

                        </div>

                        <!-- Password -->
                        <div class="mb-4">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>

                            <div class="relative">

                                <input
                                    id="password"
                                    type="password"
                                    name="password"
                                    required
                                    placeholder="Minimal 8 karakter"
                                    class="w-full h-11 px-4 pr-12 rounded-xl border border-gray-300
                                           focus:border-[#6250B4]
                                           focus:ring-2 focus:ring-purple-100
                                           outline-none transition"
                                >

                                <button
                                    type="button"
                                    onclick="togglePassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2
                                           text-gray-500 hover:text-[#6250B4]"
                                >
                                    👁
                                </button>

                            </div>

                            <x-input-error
                                :messages="$errors->get('password')"
                                class="mt-2"
                            />

                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="mb-6">

                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Konfirmasi Password
                            </label>

                            <div class="relative">

                                <input
                                    id="password_confirmation"
                                    type="password"
                                    name="password_confirmation"
                                    required
                                    placeholder="Masukkan ulang password"
                                    class="w-full h-11 px-4 pr-12 rounded-xl border border-gray-300
                                           focus:border-[#6250B4]
                                           focus:ring-2 focus:ring-purple-100
                                           outline-none transition"
                                >

                                <button
                                    type="button"
                                    onclick="toggleConfirmPassword()"
                                    class="absolute right-4 top-1/2 -translate-y-1/2
                                           text-gray-500 hover:text-[#6250B4]"
                                >
                                    👁
                                </button>

                            </div>

                            <x-input-error
                                :messages="$errors->get('password_confirmation')"
                                class="mt-2"
                            />

                        </div>

                        <!-- Button -->
                        <button
                            type="submit"
                            class="w-full h-12 rounded-xl bg-[#6250B4]
                                   hover:bg-[#5644A6]
                                   text-white font-semibold
                                   shadow-lg transition duration-300"
                        >
                            Daftar Sekarang
                        </button>

                        <div class="mt-5 text-center text-sm text-gray-500">

                            Sudah memiliki akun?

                            <a
                                href="{{ route('login') }}"
                                class="font-semibold text-[#6250B4]
                                       hover:text-[#5644A6]"
                            >
                                Masuk
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

    if (password.type === 'password') {
        password.type = 'text';
    } else {
        password.type = 'password';
    }

}

function toggleConfirmPassword() {

    const confirmPassword = document.getElementById('password_confirmation');

    if (confirmPassword.type === 'password') {
        confirmPassword.type = 'text';
    } else {
        confirmPassword.type = 'password';
    }

}

</script>

</x-guest-layout>