<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hotels', function (Blueprint $table) {

            $table->id();

            // USER
            $table->foreignId('user_id')
                  ->nullable()
                  ->constrained()
                  ->onDelete('cascade');

            // DATA PEMILIK
            $table->string('nama_pemilik');

            // DATA HEWAN
            $table->string('nama_hewan');
            $table->string('jenis_hewan');

            // BOOKING
            $table->date('checkin');
            $table->date('checkout');

            // KAMAR
            $table->string('kamar');

            // CATATAN
            $table->text('catatan')->nullable();

            // STATUS
            $table->string('status')->default('Menunggu');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};