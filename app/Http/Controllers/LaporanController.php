<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Grooming;
use App\Models\Hotel;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');
        $kategori = $request->kategori ?? 'grooming';

        $preview = $this->getDataLaporan(
            $kategori,
            $bulan,
            $tahun
        );

        return view(
            'admin.laporan',
            compact(
                'bulan',
                'tahun',
                'kategori',
                'preview'
            )
        );
    }

    public function preview(Request $request)
    {
        $bulan = $request->bulan ?? date('m');
        $tahun = $request->tahun ?? date('Y');
        $kategori = $request->kategori ?? 'grooming';

        $preview = $this->getDataLaporan(
            $kategori,
            $bulan,
            $tahun
        );

        $pdf = Pdf::loadView(
            'admin.pdf.laporan',
            compact(
                'bulan',
                'tahun',
                'kategori',
                'preview'
            )
        );

        return $pdf->stream('laporan.pdf');
    }

    public function pdf(Request $request)
    {
        return $this->preview($request);
    }

    private function getDataLaporan(
        $kategori,
        $bulan,
        $tahun
    ) {
        if ($kategori == 'grooming') {

            return Grooming::whereMonth('tanggal', $bulan)
                ->whereYear('tanggal', $tahun)
                ->where('status', 'Selesai')
                ->latest()
                ->get();

        } elseif ($kategori == 'hotel') {

            return Hotel::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('status', 'Selesai')
                ->latest()
                ->get();

        } else {

            return Transaksi::whereMonth('created_at', $bulan)
                ->whereYear('created_at', $tahun)
                ->where('status', 'Selesai')
                ->latest()
                ->get();
        }
    }
}
