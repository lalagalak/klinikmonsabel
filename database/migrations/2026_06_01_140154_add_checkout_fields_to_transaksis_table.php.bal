<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {

            $table->string('no_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->text('catatan')->nullable();

            $table->string('pengiriman')->nullable();

            $table->string('metode_pembayaran')->nullable();

            $table->integer('ongkir')->default(0);

            $table->string('bukti_transfer')->nullable();

            $table->string('status')->default('Menunggu Verifikasi');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            //
        });
    }
};
