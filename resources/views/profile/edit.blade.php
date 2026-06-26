<x-app-layout>

    <div class="min-h-screen bg-gradient-to-br from-[#f6f0ff] via-white to-[#fff6fd] py-10">

        <div class="max-w-6xl mx-auto px-4 lg:px-8">

            <!-- HEADER -->
            <div
                class="bg-white rounded-[32px] shadow-[0_15px_40px_rgba(98,80,180,0.15)]
                       overflow-hidden mb-8">

                <div
                    class="bg-gradient-to-r from-[#6250B4] to-[#8B7AE6]
                           px-8 py-10">

                    <div
                        class="flex flex-col md:flex-row items-center gap-6">

                        <!-- FOTO -->
                        <div
                            class="w-28 h-28 rounded-full bg-white
                                   flex items-center justify-center
                                   shadow-xl border-4 border-white">

                            <span class="text-5xl">
                                👤
                            </span>

                        </div>

                        <!-- INFO -->
                        <div class="text-center md:text-left">

                            <h1
                                class="text-4xl font-black text-white">

                                {{ Auth::user()->name }}

                            </h1>

                            <p
                                class="text-purple-100 mt-2">

                                {{ Auth::user()->email }}

                            </p>

                            <div
                                class="mt-4 inline-flex items-center
                                       px-4 py-2 rounded-full
                                       bg-white/20 text-white">

                                Customer Monsabel Clinic

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- CONTENT -->
            <div
                class="grid xl:grid-cols-3 gap-8">

                <!-- KIRI -->
                <div class="xl:col-span-2 space-y-8">

                    <!-- PROFILE -->
                    <div
                        class="bg-white rounded-[30px]
                               shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                               p-8">

                        <div class="mb-6">

                            <h2
                                class="text-3xl font-black text-[#1B2559]">

                                Informasi Profil

                            </h2>

                            <p
                                class="text-gray-500 mt-2">

                                Kelola informasi akun dan data profil Anda.

                            </p>

                        </div>

                        @include('profile.partials.update-profile-information-form')

                    </div>

                    <!-- PASSWORD -->
                    <div
                        class="bg-white rounded-[30px]
                               shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                               p-8">

                        <div class="mb-6">

                            <h2
                                class="text-3xl font-black text-[#1B2559]">

                                Ubah Password

                            </h2>

                            <p
                                class="text-gray-500 mt-2">

                                Gunakan password yang kuat untuk keamanan akun.

                            </p>

                        </div>

                        @include('profile.partials.update-password-form')

                    </div>

                </div>

                <!-- KANAN -->
                <div class="space-y-8">

                    <!-- ACCOUNT CARD -->
                    <div
                        class="bg-white rounded-[30px]
                               shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                               p-8">

                        <h3
                            class="text-xl font-black text-[#1B2559] mb-5">

                            Informasi Akun

                        </h3>

                        <div class="space-y-4">

                            <div>

                                <p
                                    class="text-sm text-gray-500">

                                    Nama Lengkap

                                </p>

                                <p
                                    class="font-bold text-gray-800">

                                    {{ Auth::user()->name }}

                                </p>

                            </div>

                            <div>

                                <p
                                    class="text-sm text-gray-500">

                                    Email

                                </p>

                                <p
                                    class="font-bold text-gray-800 break-all">

                                    {{ Auth::user()->email }}

                                </p>

                            </div>

                            <div>

                                <p
                                    class="text-sm text-gray-500">

                                    Status

                                </p>

                                <span
                                    class="inline-flex px-4 py-2 rounded-full
                                           bg-green-100 text-green-700
                                           font-semibold">

                                    Aktif

                                </span>

                            </div>

                        </div>

                    </div>

                    <!-- DANGER ZONE -->
                    <div
                        class="bg-white rounded-[30px]
                               shadow-[0_10px_30px_rgba(0,0,0,0.08)]
                               p-8 border border-red-100">

                        <h3
                            class="text-xl font-black text-red-600 mb-4">

                            Danger Zone

                        </h3>

                        <p
                            class="text-gray-500 mb-6">

                            Penghapusan akun akan menghapus seluruh data
                            yang terkait dengan akun ini.

                        </p>

                        @include('profile.partials.delete-user-form')

                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>