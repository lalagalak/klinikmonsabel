<section>

    <form method="POST"
          action="{{ route('password.update') }}"
          class="space-y-8">

        @csrf
        @method('PUT')

        <!-- CURRENT PASSWORD -->
        <div>

            <label
                for="update_password_current_password"
                class="block text-sm font-bold text-[#1B2559] mb-3">

                Password Saat Ini

            </label>

            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"

                placeholder="Masukkan password saat ini"

                class="w-full h-14 px-5 rounded-2xl
                       border border-gray-200
                       focus:border-[#6250B4]
                       focus:ring-4
                       focus:ring-purple-100
                       transition duration-300">

            @if($errors->updatePassword->get('current_password'))

                <p class="mt-2 text-red-500 text-sm">

                    {{ $errors->updatePassword->first('current_password') }}

                </p>

            @endif

        </div>

        <!-- NEW PASSWORD -->
        <div>

            <label
                for="update_password_password"
                class="block text-sm font-bold text-[#1B2559] mb-3">

                Password Baru

            </label>

            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"

                placeholder="Minimal 8 karakter"

                class="w-full h-14 px-5 rounded-2xl
                       border border-gray-200
                       focus:border-[#6250B4]
                       focus:ring-4
                       focus:ring-purple-100
                       transition duration-300">

            @if($errors->updatePassword->get('password'))

                <p class="mt-2 text-red-500 text-sm">

                    {{ $errors->updatePassword->first('password') }}

                </p>

            @endif

        </div>

        <!-- CONFIRM PASSWORD -->
        <div>

            <label
                for="update_password_password_confirmation"
                class="block text-sm font-bold text-[#1B2559] mb-3">

                Konfirmasi Password Baru

            </label>

            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"

                placeholder="Ulangi password baru"

                class="w-full h-14 px-5 rounded-2xl
                       border border-gray-200
                       focus:border-[#6250B4]
                       focus:ring-4
                       focus:ring-purple-100
                       transition duration-300">

            @if($errors->updatePassword->get('password_confirmation'))

                <p class="mt-2 text-red-500 text-sm">

                    {{ $errors->updatePassword->first('password_confirmation') }}

                </p>

            @endif

        </div>

        <!-- SECURITY INFO -->
        <div
            class="bg-blue-50 border border-blue-100
                   rounded-2xl p-5">

            <h4
                class="font-bold text-blue-700 mb-2">

                Tips Keamanan 🔒

            </h4>

            <ul
                class="text-sm text-blue-600 space-y-1">

                <li>• Gunakan minimal 8 karakter</li>

                <li>• Kombinasikan huruf besar dan kecil</li>

                <li>• Tambahkan angka dan simbol</li>

                <li>• Jangan gunakan tanggal lahir</li>

            </ul>

        </div>

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

                Update Password

            </button>

            @if (session('status') === 'password-updated')

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

                    ✓ Password berhasil diperbarui

                </div>

            @endif

        </div>

    </form>

</section>