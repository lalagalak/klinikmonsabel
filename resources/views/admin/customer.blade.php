@extends('layouts.admin')

@section('title', 'Customer')

@section('content')

<!-- HEADER -->
<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-5xl font-black text-[#14213d]">
            Data Customer 👤
        </h1>

        <p class="text-gray-500 mt-2 text-lg">
            Kelola seluruh customer Monsabel Clinic
        </p>

    </div>



    <!-- ADMIN CARD -->
    <div class="bg-white rounded-3xl px-6 py-4 shadow-lg flex items-center gap-4">

        <div class="w-14 h-14 rounded-full
                    bg-gradient-to-r from-purple-500 to-pink-500
                    flex items-center justify-center
                    text-white font-bold text-2xl">

            A

        </div>

        <div>

            <h3 class="font-bold text-xl text-[#14213d]">
                Admin Monsabel
            </h3>

            <p class="text-gray-500">
                Customer Management
            </p>

        </div>

    </div>

</div>





<!-- STATISTIK -->
<div class="grid grid-cols-4 gap-6 mb-8">

    <!-- TOTAL -->
    <div class="bg-gradient-to-r from-cyan-500 to-blue-500
                rounded-3xl p-6 text-white shadow-lg">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-lg">
                    Total Customer
                </p>

                <h1 class="text-5xl font-black mt-2">
                    {{ $totalCustomer }}
                </h1>

            </div>

            <span class="text-6xl">
                👤
            </span>

        </div>

    </div>



    <!-- ACTIVE -->
    <div class="bg-gradient-to-r from-purple-500 to-pink-500
                rounded-3xl p-6 text-white shadow-lg">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-lg">
                    Customer Aktif
                </p>

                <h1 class="text-5xl font-black mt-2">
                    {{ $totalCustomer }}
                </h1>

            </div>

            <span class="text-6xl">
                ✅
            </span>

        </div>

    </div>



    <!-- MEMBER -->
    <div class="bg-gradient-to-r from-orange-400 to-pink-500
                rounded-3xl p-6 text-white shadow-lg">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-lg">
                    Member
                </p>

                <h1 class="text-5xl font-black mt-2">
                    {{ $totalCustomer }}
                </h1>

            </div>

            <span class="text-6xl">
                ⭐
            </span>

        </div>

    </div>



    <!-- NEW -->
    <div class="bg-gradient-to-r from-green-400 to-emerald-500
                rounded-3xl p-6 text-white shadow-lg">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-lg">
                    Customer Baru
                </p>

                <h1 class="text-5xl font-black mt-2">
                    {{ $customers->take(5)->count() }}
                </h1>

            </div>

            <span class="text-6xl">
                🎉
            </span>

        </div>

    </div>

</div>





<!-- TABLE -->
<div class="bg-white rounded-[35px] shadow-xl overflow-hidden">

    <!-- TOP -->
    <div class="flex justify-between items-center px-8 py-6 border-b">

        <div>

            <h2 class="text-4xl font-black text-[#14213d]">
                Customer Monsabel
            </h2>

            <p class="text-gray-500 mt-1">
                Data seluruh customer yang terdaftar
            </p>

        </div>



        <!-- SEARCH -->
        <input
            type="text"
            placeholder="Cari customer..."
            class="px-5 py-3 rounded-2xl border border-gray-200
                   focus:outline-none focus:ring-2
                   focus:ring-purple-400 w-[300px]"
        >

    </div>





    <!-- TABLE -->
    <div class="overflow-x-auto">

        <table class="w-full">

            <!-- HEAD -->
            <thead class="bg-gradient-to-r from-purple-600 to-pink-500 text-white">

                <tr>

                    <th class="px-6 py-5 text-left">
                        Customer
                    </th>

                    <th class="px-6 py-5 text-left">
                        Email
                    </th>

                    <th class="px-6 py-5 text-left">
                        Bergabung
                    </th>

                    <th class="px-6 py-5 text-left">
                        Status
                    </th>

                    <th class="px-6 py-5 text-center">
                        Aksi
                    </th>

                </tr>

            </thead>





            <!-- BODY -->
            <tbody>

                @forelse($customers as $customer)

                <tr class="border-b hover:bg-purple-50 transition">

                    <!-- CUSTOMER -->
                    <td class="px-6 py-5">

                        <div class="flex items-center gap-4">

                            <!-- FOTO -->
                            <div class="w-14 h-14 rounded-2xl
                                        bg-gradient-to-r
                                        from-purple-500
                                        to-pink-500
                                        flex items-center
                                        justify-center
                                        text-white
                                        font-bold
                                        text-xl">

                                {{ strtoupper(substr($customer->name,0,1)) }}

                            </div>



                            <!-- NAMA -->
                            <div>

                                <h3 class="font-bold text-gray-800 text-lg">

                                    {{ $customer->name }}

                                </h3>

                                <p class="text-sm text-gray-500">
                                    Monsabel Customer
                                </p>

                            </div>

                        </div>

                    </td>



                    <!-- EMAIL -->
                    <td class="px-6 py-5 text-gray-700 font-semibold">

                        {{ $customer->email }}

                    </td>



                    <!-- JOIN -->
                    <td class="px-6 py-5 text-gray-600">

                        {{ date('d M Y', strtotime($customer->created_at)) }}

                    </td>



                    <!-- STATUS -->
                    <td class="px-6 py-5">

                        <span class="bg-green-100 text-green-700
                                     px-4 py-2 rounded-xl
                                     text-sm font-bold">

                            Aktif

                        </span>

                    </td>



                    <!-- AKSI -->
                    <td class="px-6 py-5">

                        <div class="flex justify-center gap-2">

                            <button
                                class="bg-blue-500 hover:bg-blue-600
                                       text-white px-4 py-2
                                       rounded-xl font-semibold transition">

                                Detail

                            </button>

                            <button
                                class="bg-red-500 hover:bg-red-600
                                       text-white px-4 py-2
                                       rounded-xl font-semibold transition">

                                Hapus

                            </button>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="5" class="text-center py-20">

                        <div class="text-6xl mb-4">
                            👤
                        </div>

                        <h2 class="text-2xl font-black text-gray-700">
                            Belum Ada Customer
                        </h2>

                        <p class="text-gray-500 mt-2">
                            Data customer akan muncul di sini
                        </p>

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection