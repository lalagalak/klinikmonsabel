<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grooming extends Model
{
    protected $fillable = [

        'kode_booking',

        'user_id',

        'nama_hewan',

        'jenis_hewan',

        'layanan',

        'harga_layanan',

        'metode',

        'antar_jemput',

        'alamat_jemput',

        'biaya_jemput',

        'tanggal',

        'jam',

        'total_bayar',

        'catatan',

        'status'

    ];
}