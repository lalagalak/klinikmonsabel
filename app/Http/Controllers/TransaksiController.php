<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * =========================================
     * HALAMAN ADMIN TRANSAKSI
     * =========================================
     */
    public function admin(Request $request)
    {
        // FILTER STATUS
        $filter = $request->status;

        // QUERY
        $query = Transaksi::with(
            'detailTransaksis.produk'
         )->latest();

        // FILTER
        if ($filter) {

            $query->where('status', $filter);
        }

        // DATA
        $transaksis = $query->get();

        // RETURN VIEW
        return view('admin.transaksi', [

            'transaksis' => $transaksis,

            // CARD DASHBOARD
            'totalPesanan' => Transaksi::count(),

            'pending' => Transaksi::where('status', 'Pending')->count(),

            'diproses' => Transaksi::where('status', 'Diproses')->count(),

            'selesai' => Transaksi::where('status', 'Selesai')->count(),

            'ditolak' => Transaksi::where('status', 'Ditolak')->count(),

            // TOTAL PENDAPATAN
            'pendapatan' => Transaksi::where('status', 'selesai')->sum('total'),

        ]);
    }



    /**
     * =========================================
     * VERIFIKASI PEMBAYARAN
     * =========================================
     */
    public function verifikasi($id)
    {
        $trx = Transaksi::findOrFail($id);

        // UBAH STATUS
        $trx->status = 'Diproses';

        $trx->save();

        return back()->with(
            'success',
            'Pembayaran berhasil diverifikasi ✅'
        );
    }



    /**
     * =========================================
     * TOLAK PEMBAYARAN
     * =========================================
     */
    public function tolak($id)
    {
        $trx = Transaksi::findOrFail($id);

        // STATUS
        $trx->status = 'Ditolak';

        $trx->save();

        return back()->with(
            'success',
            'Pesanan berhasil ditolak ❌'
        );
    }



    /**
     * =========================================
     * PESANAN SELESAI
     * =========================================
     */
    public function selesai($id)
    {
        $trx = Transaksi::findOrFail($id);

        // STATUS
        $trx->status = 'Selesai';

        $trx->save();

        return back()->with(
            'success',
            'Pesanan telah selesai 🎉'
        );
    }
}