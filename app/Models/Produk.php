<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /**
     * Nama tabel
     */
    protected $table = 'produks';

    /**
     * Mass Assignment
     */
    protected $fillable = [

        'nama_produk',
        'harga',
        'stok',
        'deskripsi',
        'kategori',
        'brand',
        'gambar',

    ];

    /**
     * Casting data
     */
    protected $casts = [

        'harga' => 'integer',
        'stok' => 'integer',

    ];

    /**
     * Format harga rupiah
     */
    public function getHargaRupiahAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Status stok
     */
    public function getStatusStokAttribute()
    {
        if ($this->stok <= 0) {
            return 'Habis';
        }

        if ($this->stok <= 5) {
            return 'Menipis';
        }

        return 'Tersedia';
    }

    /**
     * Badge warna stok
     */
    public function getWarnaStokAttribute()
    {
        if ($this->stok <= 0) {
            return 'red';
        }

        if ($this->stok <= 5) {
            return 'yellow';
        }

        return 'green';
    }

    /**
     * Gambar produk default
     */
    public function getGambarProdukAttribute()
    {
        if ($this->gambar) {
            return asset('storage/' . $this->gambar);
        }

        return 'https://placehold.co/600x400?text=Produk+Monsabel';
    }
}