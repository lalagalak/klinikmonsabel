<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [

        'user_id',
        'nama_customer',
        'no_hp',

        'alamat',
        'catatan',

        'pengiriman',

        'metode_pembayaran',
        'bank',

        'bukti_transfer',

        'subtotal',
        'ongkir',
        'total',

        'status'
    ];

    public function detailTransaksis()
    {
        return $this->hasMany(
            DetailTransaksi::class,
            'transaksi_id'
        );
    }
}