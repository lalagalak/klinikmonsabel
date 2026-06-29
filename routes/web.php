<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroomingController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TestimonialController;
use App\Models\Testimonial;


Route::get('/', function () {

    $testimonials = Testimonial::latest()->get();

    $avgRating = $testimonials->count()
        ? round($testimonials->avg('rating'), 1)
        : 0;

    $totalReview = $testimonials->count();

    return view(
        'landing',
        compact(
            'testimonials',
            'avgRating',
            'totalReview'
        )
    );
});

// 👨‍💼 admin saja
Route::get('/admin/dashboard', [DashboardController::class, 'admin'])
    ->middleware(['auth', 'admin'])
    ->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// PETSHOP
Route::get('/petshop', [ProdukController::class, 'index']);
Route::get('/petshop/create', [ProdukController::class, 'create']);
Route::post('/petshop', [ProdukController::class, 'store']);
Route::get('/petshop/{id}/edit', [ProdukController::class, 'edit']);
Route::put('/petshop/{id}', [ProdukController::class, 'update']);
Route::post('/petshop/{id}/restock', [ProdukController::class, 'restock']);

// KERANJANG
Route::get('/keranjang', [KeranjangController::class, 'index']);
Route::post('/keranjang/tambah', [KeranjangController::class,'tambah'])->name('keranjang.tambah');
Route::get('/keranjang/hapus/{id}', [KeranjangController::class, 'hapus']);
Route::get('/checkout', [KeranjangController::class, 'checkout']);
Route::post('/checkout/proses', [KeranjangController::class, 'prosesCheckout']);
Route::get('/keranjang/tambahqty/{id}', [KeranjangController::class, 'tambahQty']);
Route::get('/keranjang/kurangqty/{id}', [KeranjangController::class, 'kurangQty']);
Route::get('/keranjang/tambahqty/{id}', [KeranjangController::class,'tambahQty']);
Route::get('/keranjang/kurangqty/{id}', [KeranjangController::class,'kurangQty']);
Route::get('/keranjang/kosongkan', [KeranjangController::class,'kosongkan']);

// TESTIMONIALS
Route::post(
    '/testimonial/store',
    [TestimonialController::class, 'store']
)->middleware('auth')
 ->name('testimonial.store');

Route::get('/checkout/success/{id}', function ($id) {
    return view('checkout.success', compact('id'));
})->middleware('auth');

// TRANSAKSI (ADMIN ONLY)
Route::get('/transaksi', [TransaksiController::class, 'index'])
    ->middleware(['auth', 'admin']);

// GROOMING
Route::get('/grooming', [GroomingController::class, 'index']);

Route::post('/grooming', [GroomingController::class, 'store'])
->middleware('auth');

Route::get('/admin/grooming', [GroomingController::class, 'data']);

Route::get('/grooming/invoice', [GroomingController::class, 'invoice'])
    ->name('grooming.invoice');

Route::post('/grooming/confirm', [GroomingController::class, 'confirmBooking'])
    ->middleware('auth')
    ->name('grooming.confirm');

Route::get('/grooming/success/{id}', [GroomingController::class, 'success'])
    ->name('grooming.success');

//HISTORY
Route::middleware('auth')->group(function () {

    Route::get(
        '/history',
        [HistoryController::class, 'index']
    )->name('history');

});

// PETHOTEL
Route::get('/hotel', [HotelController::class, 'index']);

Route::post('/hotel', [HotelController::class, 'store'])
->middleware('auth');

Route::get('/admin/hotel', [HotelController::class, 'data']);

Route::get('/hotel/invoice', [HotelController::class, 'invoice'])
    ->name('hotel.invoice');

Route::post('/hotel/confirm', [HotelController::class, 'confirmBooking'])
    ->middleware('auth')
    ->name('hotel.confirm');

Route::get('/hotel/success/{id}', [HotelController::class, 'success'])
    ->name('hotel.success');

// ADMIN
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    // LIST PRODUK
    Route::get('/produk', [AdminProdukController::class, 'index']);

    // TAMBAH PRODUK
    Route::get('/produk/create', [AdminProdukController::class, 'create']);

    // SIMPAN PRODUK
    Route::post('/produk/store', [AdminProdukController::class, 'store']);

    // FORM EDIT
    Route::get('/produk/edit/{id}', [AdminProdukController::class, 'edit']);

    // UPDATE PRODUK
    Route::post('/produk/update/{id}', [AdminProdukController::class, 'update']);

    // HAPUS PRODUK
    Route::delete('/produk/delete/{id}', [AdminProdukController::class, 'destroy'])
    ->name('admin.produk.destroy');

    //TRANSAKSI
    Route::get('/transaksi', [TransaksiController::class, 'admin']);

    //CUSTOMER
    Route::get('/customer', [App\Http\Controllers\AdminCustomerController::class, 'index']);

    // FORM TAMBAH PRODUK
    Route::get('/produk/create', [AdminProdukController::class, 'create']);

    // VERIFIKASI
    Route::get('/transaksi/verifikasi/{id}', [TransaksiController::class, 'verifikasi']);

    // TOLAK
    Route::get('/transaksi/tolak/{id}', [TransaksiController::class, 'tolak']);

    // SELESAI
    Route::get('/transaksi/selesai/{id}', [TransaksiController::class, 'selesai']);

Route::post(
    '/grooming/{id}/proses',
    [GroomingController::class,'proses']
)->name('admin.grooming.proses');

Route::post(
    '/grooming/{id}/selesai',
    [GroomingController::class,'selesai']
)->name('admin.grooming.selesai');

Route::post(
    '/grooming/{id}/batal',
    [GroomingController::class,'batal']
)->name('admin.grooming.batal');

Route::post(
    '/admin/hotel/checkin/{id}',
    [HotelController::class,'checkin']
)->name('admin.hotel.checkin');

Route::post(
    '/admin/hotel/checkout/{id}',
    [HotelController::class,'checkout']
)->name('admin.hotel.checkout');

Route::post(
    '/admin/hotel/batal/{id}',
    [HotelController::class,'batal']
)->name('admin.hotel.batal');

// LAPORAN
Route::get(
    '/laporan',
    [LaporanController::class,'index']
)->name('admin.laporan');

Route::get(
    '/laporan/preview',
    [LaporanController::class,'preview']
)->name('laporan.preview');

Route::get(
    '/laporan/pdf',
    [LaporanController::class,'pdf']
)->name('laporan.pdf');

});