<x-app-layout>

<div class="bg-[#FAF8FF] min-h-screen font-sans text-gray-800">

@if(session('cart_success'))

<div id="cart-toast-overlay"
     class="fixed inset-0 z-[99999]
            flex items-center justify-center">

    <div id="cart-toast"
         class="bg-black/80
                backdrop-blur-sm
                rounded-3xl
                px-12 py-10
                text-white
                text-center
                shadow-2xl
                opacity-0 scale-90
                transition-all duration-300">

        <div class="flex justify-center mb-5">

            <div class="w-20 h-20 bg-white rounded-full
                        flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="3"
                     stroke="currentColor"
                     class="w-10 h-10 text-green-600">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M4.5 12.75l6 6 9-13.5"/>

                </svg>

            </div>

        </div>

        <h2 class="text-3xl font-bold">
            Ditambahkan ke keranjang
        </h2>

    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function(){

    const toast =
        document.getElementById('cart-toast');

    setTimeout(() => {

        toast.classList.remove(
            'opacity-0',
            'scale-90'
        );

        toast.classList.add(
            'opacity-100',
            'scale-100'
        );

    },100);

    setTimeout(() => {

        document
            .getElementById(
                'cart-toast-overlay'
            )
            .remove();

    },2000);

});

</script>

@endif

@if(session('success') && str_contains(session('success'), 'keranjang'))

<div id="cart-toast-container"
     class="fixed inset-0 z-[9999]
            flex items-center justify-center">

    <div id="cart-toast"
         class="bg-black/80 backdrop-blur-md
                text-white
                rounded-3xl
                px-12 py-10
                text-center
                shadow-2xl
                scale-90 opacity-0
                transition-all duration-300">

        <div class="flex justify-center mb-4">

            <div class="w-20 h-20 rounded-full
                        bg-white
                        flex items-center justify-center">

                <svg xmlns="http://www.w3.org/2000/svg"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke-width="3"
                     stroke="currentColor"
                     class="w-10 h-10 text-green-600">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          d="M4.5 12.75l6 6 9-13.5" />

                </svg>

            </div>

        </div>

        <h2 class="text-3xl font-bold">
            Ditambahkan ke keranjang
        </h2>

    </div>

</div>

<script>

setTimeout(() => {

    const toast =
        document.getElementById(
            'cart-toast'
        );

    toast.classList.remove(
        'opacity-0',
        'scale-90'
    );

    toast.classList.add(
        'opacity-100',
        'scale-100'
    );

},100);

setTimeout(() => {

    const toast =
        document.getElementById(
            'cart-toast'
        );

    const container =
        document.getElementById(
            'cart-toast-container'
        );

    toast.classList.remove(
        'opacity-100',
        'scale-100'
    );

    toast.classList.add(
        'opacity-0',
        'scale-90'
    );

    setTimeout(() => {

        container.remove();

    },300);

},2000);

</script>

@endif

{{-- TOAST FILTER --}}
@if(request()->hasAny(['search','kategori','brand','min','max']))

<div id="toast-filter"
     class="fixed top-6 left-1/2 -translate-x-1/2 z-[9999]">

    <div class="bg-white shadow-xl rounded-full px-6 py-3 flex items-center gap-4 border">

        @if($produk->count() > 0)

            <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center">
                ✓
            </div>

            <div>
                <h4 class="font-bold">
                    Produk Ditemukan
                </h4>

                <p class="text-sm text-gray-500">
                    Ditemukan {{ $produk->total() }} produk.
                </p>
            </div>

        @else

            <div class="w-10 h-10 rounded-full bg-red-500 text-white flex items-center justify-center">
                ✕
            </div>

            <div>
                <h4 class="font-bold">
                    Produk Tidak Ditemukan
                </h4>

                <p class="text-sm text-gray-500">
                    Tidak ada produk yang sesuai.
                </p>
            </div>

        @endif

    </div>

</div>

@endif

@if(session('success'))

<script>

setTimeout(() => {

    const toast =
        document.getElementById(
            'filter-toast'
        );

    if(toast){

        toast.classList.remove(
            '-translate-y-24',
            'opacity-0'
        );

        toast.classList.add(
            'translate-y-0',
            'opacity-100'
        );

    }

},100);

setTimeout(() => {

    const toast =
        document.getElementById(
            'filter-toast'
        );

    const container =
        document.getElementById(
            'filter-toast-container'
        );

    if(toast){

        toast.classList.remove(
            'translate-y-0',
            'opacity-100'
        );

        toast.classList.add(
            '-translate-y-24',
            'opacity-0'
        );

        setTimeout(() => {

            if(container)
                container.remove();

        },500);

    }

},3000);

</script>

@endif

{{-- ================= SECTION 1: HERO (MEET OUR TEAM) ================= --}}
    <section class="bg-[#FDF1E2] border-b border-[#E8E2FF] relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-4 py-10 lg:py-6">
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                
                <!-- Left Column: Heading & Text -->
                <div class="space-y-4">
                    <p class="italic text-xs text-amber-700 font-semibold tracking-wide">One Stop Pet Care</p>
                    
                    <!-- Ukuran Judul Sudah Dikecilkan -->
                    <h2 class="hero-title text-4xl lg:text-5xl font-extrabold leading-none text-[#0F2341]">
                        Everything Your
                        <br>
                        <span class="italic font-light text-gray-400">
                            Pet Needs
                        </span>
                        <br>
                        In One Place
                    </h2>

                    <p class="mt-2 text-xs text-[#6B7280] max-w-lg leading-relaxed">
                        Memberikan layanan kesehatan hewan, konsultasi dokter, produk berkualitas, serta perlengkapan lengkap untuk mendukung kehidupan yang sehat dan nyaman bagi hewan peliharaan Anda.                    
                    </p>

                    <div class="pt-1">
                        <a href="#produk-section" class="inline-flex items-center gap-2 bg-[#0A2D73] text-white px-5 py-2.5 rounded-full text-xs font-bold hover:bg-opacity-90 transition shadow-lg">
                            Lihat Semua Produk
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                        </a>
                    </div>
                </div>

                <!-- Right Column: Image -->
                <div class="relative flex justify-center lg:justify-end">
                    <img src="{{ asset('images/pet-hero.png') }}" class="w-full max-w-[380px] object-contain drop-shadow-2xl" alt="Our Team Hero">
                </div>

            </div>
        </div>
    </section>

{{-- ================= SECTION 2: LAYANAN & TRENDING WEEKS ================= --}}
<section class="max-w-6xl mx-auto px-6 py-12">
    {{-- LAYANAN PETSHOP (3 KOLOM MINI) --}}
    <div class="grid md:grid-cols-3 gap-4 mb-16">
        <div class="bg-amber-50 p-4 rounded-2xl flex items-center gap-4 border border-amber-100">
            <div class="bg-amber-100 p-2.5 rounded-xl text-amber-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 18.75a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h6m-9 0H3.375a1.125 1.125 0 01-1.125-1.125V14.25m17.25 4.5a1.5 1.5 0 01-3 0m3 0a1.5 1.5 0 00-3 0m3 0h1.125a1.125 1.125 0 001.125-1.125V9.75M8.25 18.75a1.5 1.5 0 01-3 0M15.75 18.75a1.5 1.5 0 01-3 0m3 0h1.125a1.125 1.125 0 001.125-1.125V14.25m0 0A2.25 2.25 0 0018 12V6.75a2.25 2.25 0 00-2.25-2.25H6.108m11.892 9.75H1.5F" /></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm text-gray-800">Antar Jemput Klinik</h4>
                <p class="text-xs text-gray-500">Mobil khusus jemput peliharaanmu</p>
            </div>
        </div>
        <div class="bg-purple-50 p-4 rounded-2xl flex items-center gap-4 border border-purple-100">
            <div class="bg-purple-100 p-2.5 rounded-xl text-purple-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z" /></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm text-gray-800">Konsultasi Dokter</h4>
                <p class="text-xs text-gray-500">Dukungan medis terpercaya</p>
            </div>
        </div>
        <div class="bg-blue-50 p-4 rounded-2xl flex items-center gap-4 border border-blue-100">
            <div class="bg-blue-100 p-2.5 rounded-xl text-blue-700">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499c.172-.436.784-.436.956 0l2.192 5.56 5.916.42c.473.033.662.614.316.94l-4.42 4.184 1.3 5.897c.104.47-.394.832-.811.594l-5.112-2.92-5.112 2.92c-.417.238-.915-.125-.811-.594l1.3-5.897-4.42-4.184c-.346-.327-.156-.907.316-.94l5.916-.42 2.192-5.56z" /></svg>
            </div>
            <div>
                <h4 class="font-bold text-sm text-gray-800">Top Rate Products</h4>
                <p class="text-xs text-gray-500">Kualitas produk terjamin premium</p>
            </div>
        </div>
    </div>

    {{-- TRENDING HEADER --}}
    <div class="text-center mb-8">
        <span class="text-[#6250B4] text-xs font-bold uppercase tracking-widest">🔥 Paling Banyak Dicari</span>
        <h2 class="text-2xl font-black text-gray-900 mt-1">Trending This Week</h2>
        <div class="w-12 h-1 bg-amber-500 mx-auto mt-2 rounded-full"></div>
    </div>

    {{-- GRID TRENDING (Disamakan 100% dengan Layout Utama Anda) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($trendingProduk as $trending)
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
            
            <div class="h-44 flex items-center justify-center p-4 bg-white border-b border-gray-50 relative">
                <span class="absolute top-2 left-2 bg-red-500 text-white text-[10px] font-bold px-2 py-0.5 rounded-md shadow-sm">
                    Hot Item
                </span>
                <img src="{{ asset('produk/'.$trending->gambar) }}" alt="{{ $trending->nama_produk }}" class="max-h-full max-w-full object-contain">
            </div>

            <div class="p-4 flex flex-col flex-1 justify-between">
                <div>
                    <h3 class="font-bold text-gray-900 text-sm leading-tight line-clamp-2 min-h-[40px]">
                        {{ $trending->nama_produk }}
                    </h3>
                    <p class="text-base font-black text-[#0A2D73] mt-2">
                        Rp {{ number_format($trending->harga,0,',','.') }}
                    </p>
                </div>

                <form action="{{ route('keranjang.tambah') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $trending->id }}">
                    
                    <div class="flex items-center justify-between gap-2">
                        <div class="flex border border-gray-300 rounded-xl overflow-hidden bg-gray-50">
                            <button type="button" onclick="kurang('trending_{{ $trending->id }}')" class="w-8 h-8 flex items-center justify-center text-sm font-bold hover:bg-gray-200">-</button>
                            <input type="text" id="qtytrending_{{ $trending->id }}" name="qty" value="1" readonly class="w-8 h-8 text-center bg-transparent border-0 text-xs font-bold focus:ring-0 p-0">
                            <button type="button" onclick="tambah('trending_{{ $trending->id }}', {{ $trending->stok }})" class="w-8 h-8 flex items-center justify-center text-sm font-bold hover:bg-gray-200">+</button>                        </div>
                        
                        <button type="submit" class="w-9 h-9 rounded-xl bg-[#0A2D73] text-white flex items-center justify-center hover:scale-105 transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386a1.5 1.5 0 01-1.415 1.03L5.76 6.75m0 0h12.99m-12.99 0l1.5 7.5h9.99l1.5-7.5M9 19.5a.75.75 0 100 1.5.75.75 0 000-1.5zm9 0a.75.75 0 100 1.5.75.75 0 000-1.5z"/>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</section>

{{-- ================= SECTION 3: UTAMA (PRODUK & FILTER) ================= --}}
    <div id="produk-section" class="max-w-6xl mx-auto px-6 py-8">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">

            <div class="bg-white rounded-2xl border border-[#E8E2FF] p-5 lg:sticky lg:top-28 h-fit shadow-sm">
                <h2 class="text-lg font-bold text-[#6250B4] mb-4 pb-2 border-b">Filter Produk</h2>

                <form method="GET" id="filter-form" class="space-y-5">
                    <div>
                        <label class="font-bold text-xs text-gray-700 block mb-1.5">Cari Produk</label>
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Ketik nama produk..." class="w-full border border-gray-300 rounded-xl px-3 py-2 text-xs focus:outline-none focus:border-purple-500">
                    </div>

                    <div>
                        <h3 class="font-bold text-xs text-gray-700 mb-2">Kategori</h3>
                        <div class="space-y-2 text-xs text-gray-600">
                            @foreach(['Makanan Kucing', 'Makanan Anjing', 'Obat & Vitamin', 'Grooming', 'Aksesoris'] as $kat)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="radio" name="kategori" value="{{ $kat }}" class="text-purple-600 focus:ring-purple-500 w-3.5 h-3.5" {{ request('kategori') == $kat ? 'checked' : '' }}>
                                {{ $kat }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="font-bold text-xs text-gray-700 mb-2">Brand</h3>
                        <div class="space-y-2 text-xs text-gray-600 max-h-32 overflow-y-auto pr-1">
                            @foreach(['Royal Canin', 'Whiskas', 'Me-O', 'Bravecto', 'Pedigree', 'Bolt'] as $brnd)
                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="brand[]" value="{{ $brnd }}" class="rounded text-purple-600 focus:ring-purple-500 w-3.5 h-3.5" {{ is_array(request('brand')) && in_array($brnd, request('brand')) ? 'checked' : '' }}>
                                {{ $brnd }}
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <div>
                        <h3 class="font-bold text-xs text-gray-700 mb-2">Harga</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <input type="number" name="min" value="{{ request('min') }}" placeholder="Min" class="w-full border border-gray-300 rounded-xl px-2 py-1.5 text-xs">
                            <input type="number" name="max" value="{{ request('max') }}" placeholder="Max" class="w-full border border-gray-300 rounded-xl px-2 py-1.5 text-xs">
                        </div>
                    </div>

                    <div class="flex gap-2 pt-2">
                        @if(request('search') || request('kategori') || request('brand') || request('min') || request('max'))
                            <a href="{{ url()->current() }}" class="w-1/3 flex items-center justify-center bg-gray-100 text-gray-600 rounded-xl text-xs font-bold hover:bg-gray-200 transition">
                                Reset
                            </a>
                            <button type="submit" class="w-2/3 bg-[#6250B4] text-white py-2.5 rounded-xl text-xs font-bold hover:opacity-90 transition">
                                Terapkan
                            </button>
                        @else
                            <button type="submit" class="w-full bg-[#6250B4] text-white py-2.5 rounded-xl text-xs font-bold hover:opacity-90 transition">
                                Terapkan Filter
                            </button>
                        @endif
                    </div>
                </form>
            </div>

            <div class="lg:col-span-3">
                <div class="flex justify-between items-center mb-6 flex-wrap gap-2">
                    <div>
                        <h2 class="text-xl font-black text-gray-800">Semua Produk</h2>
                        <p class="text-xs text-gray-500">{{ $produk->total() }} produk tersedia</p>
                    </div>
                    <div>
                    <select
                        name="sort"
                        form="filter-form"
                        onchange="document.getElementById('filter-form').submit()"
                        class="bg-white border border-gray-200 rounded-full
                            px-4 py-2 text-sm text-gray-700
                            shadow-sm hover:border-[#6250B4]
                            focus:border-[#6250B4]
                            focus:ring-2 focus:ring-[#6250B4]/20
                            transition">

                        <option value="">
                            Urutkan: Terbaru
                        </option>

                        <option value="murah"
                            {{ request('sort') == 'murah' ? 'selected' : '' }}>
                            Harga Termurah
                        </option>

                        <option value="mahal"
                            {{ request('sort') == 'mahal' ? 'selected' : '' }}>
                            Harga Termahal
                        </option>

                    </select>                   
                    </div>
                </div>

                @if(request('search') || request('kategori') || request('brand') || request('min') || request('max'))
                <div class="mb-6 p-4 bg-[#F8F6FF] border border-[#E8E2FF] rounded-2xl flex flex-wrap items-center justify-between gap-4 shadow-sm">
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-[#6250B4] rounded-lg text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Filter sedang aktif</p>
                            <p class="text-xs text-gray-500">Menampilkan produk berdasarkan kriteria Anda.</p>
                        </div>
                    </div>
                    <a href="{{ url()->current() }}" class="text-xs font-bold text-[#6250B4] bg-white border border-[#E8E2FF] px-4 py-2 rounded-xl hover:bg-purple-50 transition shadow-sm">
                        Hapus Semua Filter
                    </a>
                </div>
                @endif

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse ($produk as $item)
                    <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden hover:shadow-lg transition-all duration-300 flex flex-col justify-between">
                        <div class="h-44 flex items-center justify-center p-4 bg-white border-b border-gray-50">
                            <img src="{{ asset('produk/'.$item->gambar) }}" alt="{{ $item->nama_produk }}" class="max-h-full max-w-full object-contain">
                        </div>

                        <div class="p-4 flex flex-col flex-1 justify-between">
                            <div>
                                <h3 class="font-bold text-gray-900 text-sm leading-tight line-clamp-2 min-h-[40px]">
                                    {{ $item->nama_produk }}
                                </h3>
                                <p class="text-base font-black text-[#0A2D73] mt-2">
                                    Rp {{ number_format($item->harga,0,',','.') }}
                                </p>
                            </div>

                            <form action="{{ route('keranjang.tambah') }}" method="POST" class="mt-4">
                                @csrf
                                <input type="hidden" name="produk_id" value="{{ $item->id }}">
                                <div class="flex items-center justify-between gap-2">
                                    <div class="flex border border-gray-300 rounded-xl overflow-hidden bg-gray-50">
                                        <button type="button" onclick="kurang({{ $item->id }})" class="w-8 h-8 flex items-center justify-center text-sm font-bold hover:bg-gray-200">-</button>
                                        <input type="text" id="qty{{ $item->id }}" name="qty" value="1" readonly class="w-8 h-8 text-center bg-transparent border-0 text-xs font-bold focus:ring-0 p-0">
                                        <button type="button" onclick="tambah({{ $item->id }}, {{ $item->stok }})" class="w-8 h-8 flex items-center justify-center text-sm font-bold hover:bg-gray-200">+</button>                                    </div>
                                    <button type="submit" class="w-9 h-9 rounded-xl bg-[#0A2D73] text-white flex items-center justify-center hover:scale-105 transition shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386a1.5 1.5 0 011.415 1.03L5.76 6.75m0 0h12.99m-12.99 0l1.5 7.5h9.99l1.5-7.5M9 19.5a.75.75 0 100 1.5.75.75 0 000-1.5zm9 0a.75.75 0 100 1.5.75.75 0 000-1.5z"/>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-1 sm:col-span-2 lg:col-span-3 flex flex-col items-center justify-center p-12 bg-white rounded-2xl border border-dashed border-gray-300 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-16 h-16 text-gray-300 mb-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 15.75l-2.489-2.489m0 0a3.375 3.375 0 10-4.773-4.773 3.375 3.375 0 004.774 4.774zM21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="text-lg font-bold text-gray-900">Produk Tidak Ditemukan</h3>
                        <p class="text-sm text-gray-500 mt-2 max-w-sm">
                            Maaf, kami tidak menemukan produk yang sesuai dengan pencarian atau filtermu. Coba ubah kata kunci atau hapus filter.
                        </p>
                        <a href="{{ url()->current() }}" class="mt-5 px-5 py-2.5 bg-purple-50 text-[#6250B4] rounded-full text-xs font-bold hover:bg-purple-100 transition">
                            Reset Semua Filter
                        </a>
                    </div>
                    @endforelse
                </div>

                @if($produk->count() > 0)
                <div class="mt-12 flex justify-center">
                    <div class="bg-white border border-gray-200
                                rounded-2xl shadow-sm
                                px-3 py-2">
                        {{ $produk->links() }}
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>

</div>

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
function tambah(id, stokMaksimal) {
    let qty = document.getElementById('qty' + id);
    let nilaiSekarang = parseInt(qty.value);
    
    // Cek apakah aksi tambah akan melebihi stok yang ada
    if (nilaiSekarang >= stokMaksimal) {
        showToastWarning("Ups! Stok produk ini hanya tersisa " + stokMaksimal + " item.");
        return; // Hentikan fungsi agar tidak bertambah ke angka berikutnya
    }
    
    qty.value = nilaiSekarang + 1;
}

function kurang(id) {
    let qty = document.getElementById('qty' + id);
    if (parseInt(qty.value) > 1) {
        qty.value = parseInt(qty.value) - 1;
    }
}

// Fungsi untuk memunculkan dan menganimasikan Toast Warning secara dinamis via JS
function showToastWarning(pesan) {
    // Hapus toast lama jika masih menggantung di layar
    const oldToast = document.getElementById('toast-warning-container');
    if(oldToast) oldToast.remove();

    // Buat element container baru
    const container = document.createElement('div');
    container.id = 'toast-warning-container';
    container.className = 'fixed top-6 left-1/2 -translate-x-1/2 z-[100] flex justify-center pointer-events-none w-full max-w-md px-4';
    
    // Isikan struktur HTML Toast dengan UI Sleek berwarna Amber/Kuning Peringatan
    container.innerHTML = `
        <div id="toast-warning" class="bg-white/95 backdrop-blur-md border border-amber-100 shadow-[0_8px_30px_rgb(0,0,0,0.1)] rounded-full px-6 py-3.5 flex items-center gap-4 transform -translate-y-24 opacity-0 transition-all duration-500 ease-out pointer-events-auto">
            <div class="bg-gradient-to-br from-amber-400 to-amber-500 text-white w-10 h-10 rounded-full flex shrink-0 items-center justify-center shadow-inner">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
            </div>
            <div class="flex flex-col pr-4">
                <h4 class="font-extrabold text-gray-900 text-base leading-tight">Stok Terbatas</h4>
                <p class="text-sm font-medium text-gray-600 mt-0.5">${pesan}</p>
            </div>
            <button onclick="this.closest('#toast-warning-container').remove()" class="ml-auto pl-2 text-gray-400 hover:text-gray-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    `;
    
    document.body.appendChild(container);
    
    // Animasi Masuk (Slide Down)
    setTimeout(() => {
        const toast = document.getElementById('toast-warning');
        if(toast) {
            toast.classList.remove('-translate-y-24', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
        }
    }, 50);

    // Otomatis hilang dalam 3.5 detik dengan animasi slide up
    setTimeout(() => {
        const toast = document.getElementById('toast-warning');
        if(toast) {
            toast.classList.remove('translate-y-0', 'opacity-100');
            toast.classList.add('-translate-y-24', 'opacity-0');
            setTimeout(() => { container.remove(); }, 500);
        }
    }, 3500);
}
</script>

<script>

window.addEventListener('beforeunload', function () {

    localStorage.setItem(
        'petshopScroll',
        window.scrollY
    );

});

window.addEventListener('load', function () {

    const posisi =
        localStorage.getItem(
            'petshopScroll'
        );

    if(posisi){

        window.scrollTo(
            0,
            parseInt(posisi)
        );

    }

});

</script>

</x-app-layout>