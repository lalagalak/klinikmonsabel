<section class="space-y-6">

    <!-- HEADER -->
    <div
        class="bg-red-50 border border-red-100
               rounded-3xl p-6">

        <div class="flex items-start gap-4">

            <div
                class="w-14 h-14 rounded-2xl
                       bg-red-100 flex items-center
                       justify-center text-2xl">

                ⚠️

            </div>

            <div>

                <h2
                    class="text-2xl font-black text-red-600">

                    Hapus Akun

                </h2>

                <p
                    class="mt-2 text-gray-600 leading-relaxed">

                    Setelah akun dihapus, seluruh data akun,
                    riwayat transaksi, booking grooming,
                    booking pet hotel, dan data lainnya
                    akan dihapus secara permanen dan
                    tidak dapat dikembalikan.

                </p>

            </div>

        </div>

    </div>

    <!-- BUTTON -->
    <button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"

        class="bg-red-500 hover:bg-red-600
               text-white font-bold
               px-8 py-4 rounded-2xl
               shadow-lg transition">

        Hapus Akun Permanen

    </button>

    <!-- MODAL -->
    <x-modal
        name="confirm-user-deletion"
        :show="$errors->userDeletion->isNotEmpty()"
        focusable>

        <form
            method="POST"
            action="{{ route('profile.destroy') }}"
            class="p-8">

            @csrf
            @method('DELETE')

            <!-- ICON -->
            <div
                class="w-20 h-20 mx-auto
                       rounded-full bg-red-100
                       flex items-center justify-center
                       text-4xl mb-6">

                🗑️

            </div>

            <!-- TITLE -->
            <h2
                class="text-center text-3xl
                       font-black text-red-600">

                Konfirmasi Hapus Akun

            </h2>

            <p
                class="text-center text-gray-500
                       mt-4 leading-relaxed">

                Tindakan ini tidak dapat dibatalkan.
                Seluruh data akun Anda akan dihapus
                secara permanen dari sistem Monsabel Clinic.

            </p>

            <!-- PASSWORD -->
            <div class="mt-8">

                <label
                    for="password"
                    class="block text-sm font-bold
                           text-[#1B2559] mb-3">

                    Password

                </label>

                <input
                    id="password"
                    name="password"
                    type="password"

                    placeholder="Masukkan password akun"

                    class="w-full h-14 px-5
                           rounded-2xl border
                           border-gray-200

                           focus:border-red-400
                           focus:ring-4
                           focus:ring-red-100">

                @if($errors->userDeletion->get('password'))

                    <p
                        class="text-red-500 text-sm
                               mt-2">

                        {{ $errors->userDeletion->first('password') }}

                    </p>

                @endif

            </div>

            <!-- BUTTON -->
            <div
                class="flex flex-col sm:flex-row
                       justify-end gap-3 mt-8">

                <button
                    type="button"

                    x-on:click="$dispatch('close')"

                    class="px-6 py-3 rounded-2xl
                           bg-gray-100
                           hover:bg-gray-200
                           font-semibold">

                    Batal

                </button>

                <button
                    type="submit"

                    class="px-6 py-3 rounded-2xl
                           bg-red-500
                           hover:bg-red-600
                           text-white
                           font-bold
                           shadow-lg">

                    Ya, Hapus Akun

                </button>

            </div>

        </form>

    </x-modal>

</section>