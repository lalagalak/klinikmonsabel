<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('hotels', function (Blueprint $table) {

            $table->string('kode_booking')->nullable();

            $table->integer('harga_kamar')->nullable();

            $table->integer('lama_menginap')->nullable();

            $table->string('antar_jemput')->nullable();

            $table->text('alamat_jemput')->nullable();

            $table->integer('biaya_jemput')
                  ->default(0);

            $table->integer('total_bayar')
                  ->nullable();

            $table->string('pembayaran')
                  ->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('hotels', function (Blueprint $table) {

            $table->dropColumn([
                'kode_booking',
                'harga_kamar',
                'lama_menginap',
                'antar_jemput',
                'alamat_jemput',
                'biaya_jemput',
                'total_bayar',
                'pembayaran'
            ]);

        });
    }
};