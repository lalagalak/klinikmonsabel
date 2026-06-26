<section>

    <form id="send-verification"
          method="POST"
          action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST"
          action="{{ route('profile.update') }}"
          class="space-y-8">

        @csrf
        @method('PATCH')

        <!-- NAMA -->
        <div>

            <label
                for="name"
                class="block text-sm font-bold text-[#1B2559] mb-3">

                Nama Lengkap

            </label>

            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"

                class="w-full h-14 px-5 rounded-2xl
                       border border-gray-200
                       focus:border-[#6250B4]
                       focus:ring-4
                       focus:ring-purple-100
                       transition duration-300">

            @error('name')

                <p class="mt-2 text-red-500 text-sm">

                    {{ $message }}

                </p>

            @enderror

        </div>

        <!-- EMAIL -->
        <div>

            <label
                for="email"
                class="block text-sm font-bold text-[#1B2559] mb-3">

                Email

            </label>

            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"

                class="w-full h-14 px-5 rounded-2xl
                       border border-gray-200
                       focus:border-[#6250B4]
                       focus:ring-4
                       focus:ring-purple-100
                       transition duration-300">

            @error('email')

                <p class="mt-2 text-red-500 text-sm">

                    {{ $message }}

                </p>

            @enderror

        </div>

        <!-- VERIFIKASI EMAIL -->
        @if (
            $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail
            && ! $user->hasVerifiedEmail()
        )

            <div
                class="bg-yellow-50 border border-yellow-200
                       rounded-2xl p-5">

                <p class="text-yellow-700 font-semibold">

                    Email belum diverifikasi.

                </p>

                <button
                    form="send-verification"
                    class="mt-3 text-[#6250B4]
                           font-bold hover:underline">

                    Kirim ulang email verifikasi

                </button>

                @if (session('status') === 'verification-link-sent')

                    <p
                        class="mt-3 text-green-600 font-semibold">

                        Link verifikasi berhasil dikirim.

                    </p>

                @endif

            </div>

        @endif

        <!-- BUTTON -->
        <div
            class="flex flex-col sm:flex-row
                   items-start sm:items-center
                   gap-4">

            <button
                type="submit"

                class="bg-[#6250B4]
                       hover:bg-[#5240a6]
                       text-white
                       px-8 py-4
                       rounded-2xl
                       font-bold
                       shadow-lg
                       transition">

                Simpan Perubahan

            </button>

            @if (session('status') === 'profile-updated')

                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 3000)"

                    class="bg-green-100
                           text-green-700
                           px-5 py-3
                           rounded-xl
                           font-semibold">

                    ✓ Profil berhasil diperbarui

                </div>

            @endif

        </div>

    </form>

</section>