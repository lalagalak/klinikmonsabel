<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [

        'user_id',

        'kode_booking',

        'nama_pemilik',

        'nama_hewan',

        'jenis_hewan',

        'berat',

        'kamar',

        'tipe_kamar',

        'nomor_hp',

        'checkin',

        'checkout',

        'lama_menginap',

        'harga_kamar',

        'antar_jemput',

        'alamat_jemput',

        'biaya_jemput',

        'total_bayar',

        'pembayaran',

        'catatan',

        'status',

    ];
}