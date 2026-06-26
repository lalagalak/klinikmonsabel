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
        Schema::table('groomings', function (Blueprint $table) {

            $table->foreignId('user_id')
                  ->nullable()
                  ->after('id');

            $table->string('jenis_hewan')
                  ->after('nama_hewan');

            $table->string('metode')
                  ->after('layanan');

            $table->date('tanggal')
                  ->after('metode');

            $table->time('jam')
                  ->after('tanggal');

            $table->text('catatan')
                  ->nullable()
                  ->after('jam');

            $table->string('status')
                  ->default('Pending')
                  ->after('catatan');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groomings', function (Blueprint $table) {

            $table->dropColumn([
                'user_id',
                'jenis_hewan',
                'metode',
                'tanggal',
                'jam',
                'catatan',
                'status'
            ]);

        });
    }
};