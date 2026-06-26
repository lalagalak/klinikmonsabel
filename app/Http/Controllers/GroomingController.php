<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grooming;

class GroomingController extends Controller
{
    /**
     * =========================
     * HALAMAN GROOMING
     * =========================
     */
    public function index()
    {
        return view('grooming.index');
    }

    /**
     * =========================
     * HALAMAN INVOICE
     * =========================
     */
    public function invoice()
    {
        $data = session('booking');

        if (!$data) {

            return redirect('/grooming');

        }

        return view(
            'grooming.invoice',
            compact('data')
        );
    }

    /**
     * =========================
     * SIMPAN DATA KE SESSION
     * =========================
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama_hewan'      => 'required',
            'jenis_hewan'     => 'required',
            'layanan'         => 'required',
            'metode'          => 'required',
            'tanggal'         => 'required',
            'antar_jemput'    => 'required',

        ]);

        /**
         * =========================
         * HARGA GROOMING
         * =========================
         */
        $harga = 0;

        switch ($request->layanan) {

            case 'Mandi Biasa Kucing':
                $harga = 85000;
                break;

            case 'Anjing < 5kg':
                $harga = 100000;
                break;

            case 'Anjing 5-10kg':
                $harga = 125000;
                break;

            case 'Anjing 10-20kg':
                $harga = 150000;
                break;

            case 'Anjing > 20kg':
                $harga = 175000;
                break;
        }

        /**
         * =========================
         * BIAYA JEMPUT
         * =========================
         */
        $biayaJemput = 0;

        if ($request->antar_jemput == 'Ya') {

            $biayaJemput = 15000;
        }

        /**
         * =========================
         * TOTAL
         * =========================
         */
        $total = $harga + $biayaJemput;

        /**
         * =========================
         * KODE BOOKING
         * =========================
         */
        $kodeBooking =
            'GRM-' .
            date('Ymd') .
            '-' .
            str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

        /**
         * =========================
         * SIMPAN KE SESSION
         * =========================
         */
        session([
            'booking' => [

                'kode_booking' => $kodeBooking,

                'user_id' => auth()->id() ?? null,

                'nama_hewan' => $request->nama_hewan,

                'jenis_hewan' => $request->jenis_hewan,

                'layanan' => $request->layanan,

                'harga' => $harga,

                'metode' => $request->metode,

                'antar_jemput' => $request->antar_jemput,

                'alamat_jemput' => $request->alamat_jemput,

                'biaya_jemput' => $biayaJemput,

                'tanggal' => $request->tanggal,

                'catatan' => $request->catatan,

                'total' => $total

            ]
        ]);

        return redirect()->route('grooming.invoice');
    }

    /**
     * =========================
     * KONFIRMASI BOOKING
     * =========================
     */
    public function confirmBooking(Request $request)
    {
        if (!auth()->check()) {

            return redirect()->route('login');

        }

        $data = session('booking');

        if (!$data) {

            return redirect('/grooming');

        }

        $booking = Grooming::create([

            'kode_booking'  => $data['kode_booking'],

            'user_id'       => auth()->id(),

            'nama_hewan'    => $data['nama_hewan'],

            'jenis_hewan'   => $data['jenis_hewan'],

            'layanan'       => $data['layanan'],

            'harga_layanan' => $data['harga'],

            'metode'        => $data['metode'],

            'antar_jemput'  => $data['antar_jemput'],

            'alamat_jemput' => $data['alamat_jemput'],

            'biaya_jemput'  => $data['biaya_jemput'],

            'tanggal'       => $data['tanggal'],

            'catatan'       => $data['catatan'],

            'total_bayar'   => $data['total'],

            'status'        => 'Pending'

        ]);

        $pesan =
        "🐾 BOOKING GROOMING MONSABEL CLINIC\n\n".

        "Kode Booking : ".$booking->kode_booking."\n".
        "Nama Hewan : ".$booking->nama_hewan."\n".
        "Jenis Hewan : ".$booking->jenis_hewan."\n".
        "Layanan : ".$booking->layanan."\n".
        "Metode Grooming : ".$booking->metode."\n".
        "Tanggal Booking : ".$booking->tanggal."\n".
        "Antar Jemput : ".$booking->antar_jemput."\n".
        "Total : Rp ".number_format($booking->total_bayar,0,',','.')."\n\n".

        "Mohon konfirmasi booking saya.";

        session()->forget('booking');

        return redirect(
            'https://wa.me/6281260282335?text='
            . urlencode($pesan)
        );
    }

    /**
     * =========================
     * DATA GROOMING ADMIN
     * =========================
     */
public function data(Request $request)
{
    $query = Grooming::query();

    // Search
    if ($request->filled('search')) {

        $query->where(
            'nama_hewan',
            'like',
            '%' . $request->search . '%'
        );
    }

    // Filter Status
    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );
    }

    // Filter Tanggal (opsional)
    if ($request->filled('tanggal')) {

        $query->whereDate(
            'tanggal',
            $request->tanggal
        );
    }

    // Tabel booking
    $data = $query
        ->orderBy('tanggal', 'asc')
        ->get();

    // Dashboard
    $hariIni = now()->toDateString();
    $besok   = now()->addDay()->toDateString();

    $todayCount = Grooming::whereDate('tanggal', $hariIni)->count();

    $tomorrowCount = Grooming::whereDate('tanggal', $besok)->count();

    $pendingCount = Grooming::where('status', 'Pending')->count();

    $diprosesCount = Grooming::where('status', 'Diproses')->count();

    $selesaiCount = Grooming::where('status', 'Selesai')->count();

    $selectedBooking = $request->booking;

    return view(
        'admin.grooming',
        compact(
            'data',
            'todayCount',
            'tomorrowCount',
            'pendingCount',
            'diprosesCount',
            'selesaiCount',
            'selectedBooking'
        )
    );
}
    /**
     * =========================
     * HAPUS DATA
     * =========================
     */
    public function destroy($id)
    {
        $grooming = Grooming::findOrFail($id);

        $grooming->delete();

        return back()->with(
            'success',
            'Data grooming berhasil dihapus'
        );
    }

    public function success($id)
    {
        $booking = Grooming::findOrFail($id);

        return view(
            'grooming.success',
            compact('booking')
        );
    }

    public function proses($id)
{
    $grooming = Grooming::findOrFail($id);

    $grooming->update([
        'status' => 'Diproses'
    ]);

    return back();
}

public function selesai($id)
{
    $grooming = Grooming::findOrFail($id);

    $grooming->update([
        'status' => 'Selesai'
    ]);

    return back();
}

public function batal($id)
{
    $grooming = Grooming::findOrFail($id);

    $grooming->update([
        'status' => 'Dibatalkan'
    ]);

    return back();
}

}
