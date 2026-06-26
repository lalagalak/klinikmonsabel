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

            $table->string('nama_customer')->nullable();
            $table->string('no_hp')->nullable();

            $table->text('alamat')->nullable();
            $table->text('catatan')->nullable();

            $table->string('pengiriman')->default('ambil');

            $table->string('metode_pembayaran')->nullable();

            $table->string('bank')->nullable();

            $table->string('bukti_transfer')->nullable();

            $table->integer('subtotal')->default(0);

            $table->integer('ongkir')->default(0);

            $table->string('status')->default('pending');
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
