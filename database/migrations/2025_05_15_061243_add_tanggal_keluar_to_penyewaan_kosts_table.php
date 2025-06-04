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
        Schema::table('penyewaan_kosts', function (Blueprint $table) {
            $table->date('tanggal_keluar')->nullable();
            $table->integer('durasi_bulan')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyewaan_kosts', function (Blueprint $table) {
            $table->dropColumn(['tanggal_keluar', 'durasi_bulan']);
        });
    }
};
