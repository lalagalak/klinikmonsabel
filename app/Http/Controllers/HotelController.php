<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelController extends Controller
{
    /**
     * =========================================
     * HALAMAN PET HOTEL
     * =========================================
     */
    public function index()
    {
        return view('hotel.index');
    }



/**
 * =========================================
 * SIMPAN KE SESSION (BELUM DATABASE)
 * =========================================
 */
public function store(Request $request)
{
    $request->validate([

        'nama_pemilik' => 'required',

        'nama_hewan' => 'required',

        'jenis_hewan' => 'required',

        'berat' => 'required',

        'kamar' => 'required',

        'nomor_hp' => 'required',

        'checkin' => 'required|date',

        'checkout' => 'required|date',

    ]);

    /**
     * =========================================
     * HITUNG LAMA MENGINAP
     * =========================================
     */
    $checkin = new \DateTime($request->checkin);

    $checkout = new \DateTime($request->checkout);

    $lamaMenginap =
        $checkin->diff($checkout)->days;

    if ($lamaMenginap < 1) {

        $lamaMenginap = 1;
    }

    /**
     * =========================================
     * HARGA KAMAR
     * =========================================
     */
    $hargaKamar = 0;

    switch ($request->kamar) {

        case 'Rawat Inap Non AC - Kucing':
            $hargaKamar = 70000;
            break;

        case 'Rawat Inap Non AC - Anjing <5kg':
            $hargaKamar = 75000;
            break;

        case 'Rawat Inap Non AC - Anjing 5-10kg':
            $hargaKamar = 85000;
            break;

        case 'Rawat Inap Non AC - Anjing 10-20kg':
            $hargaKamar = 100000;
            break;

        case 'Rawat Inap Non AC - Anjing >20kg':
            $hargaKamar = 110000;
            break;

        case 'Rawat Inap Full AC - Kucing':
            $hargaKamar = 85000;
            break;

        case 'Rawat Inap Full AC - Anjing <5kg':
            $hargaKamar = 100000;
            break;

        case 'Rawat Inap Full AC - Anjing 5-10kg':
            $hargaKamar = 115000;
            break;

        case 'Rawat Inap Full AC - Anjing 10-20kg':
            $hargaKamar = 125000;
            break;

        case 'Rawat Inap Full AC - Anjing >20kg':
            $hargaKamar = 150000;
            break;
    }

    /**
     * =========================================
     * BIAYA JEMPUT
     * =========================================
     */
    $biayaJemput = 0;

    if ($request->antar_jemput == 'Ya') {

        $biayaJemput = 15000;
    }

    /**
     * =========================================
     * TOTAL
     * =========================================
     */
    $total =
        ($hargaKamar * $lamaMenginap)
        + $biayaJemput;

    /**
     * =========================================
     * KODE BOOKING
     * =========================================
     */
    $kodeBooking =
        'HTL-' .
        date('Ymd') .
        '-' .
        str_pad(
            rand(1,999),
            3,
            '0',
            STR_PAD_LEFT
        );

    /**
     * =========================================
     * SIMPAN SESSION
     * =========================================
     */
    session([

        'hotel_booking' => [

            'kode_booking' => $kodeBooking,

            'user_id' => auth()->id() ?? null,

            'nama_pemilik' => $request->nama_pemilik,

            'nama_hewan' => $request->nama_hewan,

            'jenis_hewan' => $request->jenis_hewan,

            'berat' => $request->berat,

            'tipe_kamar' => $request->kamar,

            'nomor_hp' => $request->nomor_hp,

            'checkin' => $request->checkin,

            'checkout' => $request->checkout,

            'lama_menginap' => $lamaMenginap,

            'harga_kamar' => $hargaKamar,

            'antar_jemput' => $request->antar_jemput,

            'alamat_jemput' => $request->alamat_jemput,

            'biaya_jemput' => $biayaJemput,

            'total_bayar' => $total,

            'catatan' => $request->catatan

            ]

        ]);

        return redirect()->route('hotel.invoice');
    }



    /**
     * =========================================
     * ADMIN DATA PET HOTEL
     * =========================================
     */
public function data(Request $request)
{
    $query = Hotel::query();

    // SEARCH
    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('kode_booking', 'like', "%{$search}%")
              ->orWhere('nama_pemilik', 'like', "%{$search}%")
              ->orWhere('nama_hewan', 'like', "%{$search}%")
              ->orWhere('jenis_hewan', 'like', "%{$search}%")
              ->orWhere('nomor_hp', 'like', "%{$search}%");

        });
    }

    // FILTER
    if ($request->filter == 'checkin') {

        $query->whereDate('checkin', today());

    } elseif ($request->filter == 'checkout') {

        $query->whereDate('checkout', today());

    } elseif ($request->filter == 'menginap') {

        $query->where('status', 'Menginap');
    }

    $data = $query->latest()->get();

    return view('admin.hotel', compact('data'));
}

    /**
 * =========================================
 * STATUS DIPROSES
 * =========================================
 */
public function checkin($id)
{
    $hotel = Hotel::findOrFail($id);

    $hotel->update([
        'status' => 'Menginap'
    ]);

    return back()->with(
        'success',
        'Hewan berhasil Check In'
    );
}

/**
 * =========================================
 * STATUS SELESAI
 * =========================================
 */
public function checkout($id)
{
    $hotel = Hotel::findOrFail($id);

    $hotel->update([
        'status' => 'Selesai'
    ]);

    return back()->with(
        'success',
        'Hewan berhasil Check Out'
    );
}

/**
 * =========================================
 * STATUS DIBATALKAN
 * =========================================
 */
public function batal($id)
{
    $hotel = Hotel::findOrFail($id);

    $hotel->update([
        'status' => 'Dibatalkan'
    ]);

    return back()->with(
        'success',
        'Booking hotel dibatalkan'
    );
}



    /**
     * =========================================
     * UPDATE STATUS HOTEL
     * =========================================
     */
    public function updateStatus(Request $request, $id)
    {
        $hotel = Hotel::findOrFail($id);

        $hotel->status = $request->status;

        $hotel->save();

        return back()->with(
            'success',
            'Status booking berhasil diupdate ✨'
        );
    }

    /**
 * =========================================
 * HALAMAN INVOICE HOTEL
 * =========================================
 */
    public function invoice()
    {
        $data = session('hotel_booking');

        if (!$data) {

            return redirect('/hotel');
        }

        return view(
            'hotel.invoice',
            compact('data')
        );
    }

    /**
     * =========================================
     * KONFIRMASI BOOKING HOTEL
     * =========================================
     */
    public function confirmBooking(Request $request)
    {

        if (!auth()->check()) {

            return redirect()->route('login');

        }

        $data = session('hotel_booking');

        if (!$data) {

            return redirect('/hotel');
        }

        $status = 'Pending';

        $hotel = Hotel::create([

            'user_id' => auth()->id(),

            'kode_booking' => $data['kode_booking'],

            'nama_pemilik' => $data['nama_pemilik'],

            'nama_hewan' => $data['nama_hewan'],

            'jenis_hewan' => $data['jenis_hewan'],

            'berat' => $data['berat'],

            'kamar' => $data['tipe_kamar'],

            'tipe_kamar' => $data['tipe_kamar'],

            'nomor_hp' => $data['nomor_hp'],

            'checkin' => $data['checkin'],

            'checkout' => $data['checkout'],

            'lama_menginap' => $data['lama_menginap'],

            'harga_kamar' => $data['harga_kamar'],

            'antar_jemput' => $data['antar_jemput'],

            'alamat_jemput' => $data['alamat_jemput'],

            'biaya_jemput' => $data['biaya_jemput'],

            'total_bayar' => $data['total_bayar'],

            'pembayaran' => 'Bayar di Tempat',

            'catatan' => $data['catatan'],

            'status' => $status

        ]);

        $pesan =
        "🏨 BOOKING PET HOTEL MONSABEL CLINIC\n\n".

        "Kode Booking : ".$hotel->kode_booking."\n".
        "Nama Pemilik : ".$hotel->nama_pemilik."\n".
        "Nama Hewan : ".$hotel->nama_hewan."\n".
        "Jenis Hewan : ".$hotel->jenis_hewan."\n".
        "Berat : ".$hotel->berat." Kg\n".
        "Tipe Kamar : ".$hotel->tipe_kamar."\n".
        "Check In : ".$hotel->checkin."\n".
        "Check Out : ".$hotel->checkout."\n".
        "Lama Menginap : ".$hotel->lama_menginap." Hari\n".
        "Antar Jemput : ".$hotel->antar_jemput."\n".
        "Total Bayar : Rp ".number_format($hotel->total_bayar,0,',','.')."\n\n".

        "Mohon konfirmasi booking pet hotel saya.";

        session()->forget('hotel_booking');

        return redirect(
            'https://api.whatsapp.com/send?phone=6281260282335&text='
            . urlencode($pesan)
        );
    }

    /**
     * =========================================
     * HAPUS BOOKING
     * =========================================
     */
    public function destroy($id)
    {
        $hotel = Hotel::findOrFail($id);

        $hotel->delete();

        return back()->with(
            'success',
            'Booking berhasil dihapus 🗑️'
        );
    }

    /**
 * =========================================
 * HALAMAN SUCCESS HOTEL
 * =========================================
 */
    public function success($id)
    {
        $booking = Hotel::findOrFail($id);

        return view(
            'hotel.success',
            compact('booking')
        );
    }
}