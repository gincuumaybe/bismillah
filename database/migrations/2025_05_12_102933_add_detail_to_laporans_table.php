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
        Schema::table('laporans', function (Blueprint $table) {
            $table->string('name')->nullable()->after('user_id');
            $table->string('lokasi_kost')->nullable()->after('name');
            $table->string('nomor_kamar')->nullable()->after('lokasi_kost');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('laporans', function (Blueprint $table) {
            $table->dropColumn(['name', 'lokasi_kost', 'nomor_kamar']);
        });
    }
};
