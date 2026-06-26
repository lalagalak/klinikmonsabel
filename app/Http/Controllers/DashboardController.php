<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Grooming;
use App\Models\Hotel;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD USER
    |--------------------------------------------------------------------------
    */
    public function user()
    {
        $totalProduk = Produk::count();

        return view('dashboard_user', compact('totalProduk'));
    }



    /*
    |--------------------------------------------------------------------------
    | DASHBOARD ADMIN
    |--------------------------------------------------------------------------
    */
public function admin()
{
    /*
    |--------------------------------------------------------------------------
    | STATISTIK
    |--------------------------------------------------------------------------
    */

    $totalProduk = Produk::count();

    $totalTransaksi = Transaksi::count();

    $totalPemasukan = Transaksi::whereIn('status', [
    'Diproses',
    'Selesai'
])->sum('total');

    $totalGrooming = Grooming::count();

    $totalHotel = Hotel::count();

    $totalCustomer = User::where('role', 'customer')->count();

    $pendingTransaksi = Transaksi::where('status', 'Pending')->count();

    $diprosesTransaksi = Transaksi::where('status', 'Diproses')->count();

    $selesaiTransaksi = Transaksi::where('status', 'Selesai')->count();

    $pendingGrooming = Grooming::where('status', 'Pending')->count();

    $hotelAktif = Hotel::whereDate('checkout', '>=', today())->count();

    $groomingHariIni = Grooming::whereDate('tanggal', today())->count();



    /*
    |--------------------------------------------------------------------------
    | GRAFIK PENJUALAN
    |--------------------------------------------------------------------------
    */

    $grafik = Transaksi::select(
            DB::raw('DATE(created_at) as tanggal'),
            DB::raw('SUM(total) as total')
        )
        ->groupBy('tanggal')
        ->orderBy('tanggal')
        ->get();



    /*
    |--------------------------------------------------------------------------
    | DATA TERBARU
    |--------------------------------------------------------------------------
    */

    $recentTransaksi = Transaksi::latest()
        ->take(5)
        ->get();

    $groomingTerbaru = Grooming::latest()
        ->take(5)
        ->get();

    $hotelTerbaru = Hotel::latest()
        ->take(5)
        ->get();



    /*
    |--------------------------------------------------------------------------
    | NOTIFIKASI ADMIN
    |--------------------------------------------------------------------------
    */

    $notifikasi = collect();



    /*
    |--------------------------------------------------------------------------
    | GROOMING BARU
    |--------------------------------------------------------------------------
    */

    foreach (
        Grooming::latest()
            ->take(10)
            ->get()
        as $item
    ) {

        $notifikasi->push([

            'icon' => '✂️',

            'warna' => 'purple',

            'judul' => 'Booking Grooming Baru',

            'pesan' =>
                $item->nama_hewan .
                ' - ' .
                $item->nama_pemilik,

            'waktu' =>
                $item->created_at
                    ->diffForHumans(),

            'created_at' =>
                $item->created_at

        ]);
    }



    /*
    |--------------------------------------------------------------------------
    | HOTEL BARU
    |--------------------------------------------------------------------------
    */

    foreach (
        Hotel::latest()
            ->take(10)
            ->get()
        as $item
    ) {

        $notifikasi->push([

            'icon' => '🏨',

            'warna' => 'blue',

            'judul' => 'Booking Hotel Baru',

            'pesan' =>
                $item->nama_hewan .
                ' - ' .
                $item->nama_pemilik,

            'waktu' =>
                $item->created_at
                    ->diffForHumans(),

            'created_at' =>
                $item->created_at

        ]);
    }



    /*
    |--------------------------------------------------------------------------
    | TRANSAKSI BARU
    |--------------------------------------------------------------------------
    */

    foreach (
        Transaksi::latest()
            ->take(10)
            ->get()
        as $item
    ) {

        $notifikasi->push([

            'icon' => '🛒',

            'warna' => 'green',

            'judul' => 'Transaksi Baru',

            'pesan' =>
                'Order #' .
                $item->id,

            'waktu' =>
                $item->created_at
                    ->diffForHumans(),

            'created_at' =>
                $item->created_at

        ]);
    }



    /*
    |--------------------------------------------------------------------------
    | CHECK IN HARI INI
    |--------------------------------------------------------------------------
    */

    foreach (
        Hotel::whereDate('checkin', today())
            ->get()
        as $item
    ) {

        $notifikasi->push([

            'icon' => '📥',

            'warna' => 'indigo',

            'judul' => 'Check In Hari Ini',

            'pesan' =>
                $item->nama_hewan,

            'waktu' => 'Hari Ini',

            'created_at' => now()

        ]);
    }



    /*
    |--------------------------------------------------------------------------
    | CHECK OUT HARI INI
    |--------------------------------------------------------------------------
    */

    foreach (
        Hotel::whereDate('checkout', today())
            ->get()
        as $item
    ) {

        $notifikasi->push([

            'icon' => '📤',

            'warna' => 'orange',

            'judul' => 'Check Out Hari Ini',

            'pesan' =>
                $item->nama_hewan,

            'waktu' => 'Hari Ini',

            'created_at' => now()

        ]);
    }



    /*
    |--------------------------------------------------------------------------
    | SORT NOTIFIKASI TERBARU
    |--------------------------------------------------------------------------
    */

    $notifikasi = $notifikasi
        ->sortByDesc('created_at')
        ->take(20);



    /*
    |--------------------------------------------------------------------------
    | TOTAL NOTIFIKASI
    |--------------------------------------------------------------------------
    */

    $totalNotifikasi =
        $notifikasi->count();



    /*
    |--------------------------------------------------------------------------
    | VIEW
    |--------------------------------------------------------------------------
    */

    return view('admin.dashboard', compact(

        'totalProduk',
        'totalTransaksi',
        'totalPemasukan',
        'totalGrooming',
        'totalHotel',
        'totalCustomer',
        'pendingTransaksi',
        'diprosesTransaksi',
        'selesaiTransaksi',
        'pendingGrooming',
        'hotelAktif',
        'groomingHariIni',

        'grafik',

        'recentTransaksi',

        'groomingTerbaru',

        'hotelTerbaru',

        'notifikasi',

        'totalNotifikasi'
    ));
}

}