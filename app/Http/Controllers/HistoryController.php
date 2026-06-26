<?php

namespace App\Http\Controllers;

use App\Models\Grooming;
use App\Models\Hotel;
use App\Models\Transaksi;

class HistoryController extends Controller
{
    public function index()
    {
        $groomings = Grooming::where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->get();

        $hotels = Hotel::where(
            'user_id',
            auth()->id()
        )
        ->latest()
        ->get();

        $transaksis = Transaksi::where(
            'nama_customer',
            auth()->user()->name
        )
        ->latest()
        ->get();

        return view(
            'history.index',
            compact(
                'groomings',
                'hotels',
                'transaksis'
            )
        );
    }
}