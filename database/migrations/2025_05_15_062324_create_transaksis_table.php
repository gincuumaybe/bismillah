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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('penyewaan_id')->nullable()->constrained('penyewaan_kosts')->onDelete('set null');
            $table->string('kode_transaksi')->unique();
            $table->integer('jumlah');
            $table->string('status')->default('pending');
            $table->timestamps();
            // $table->string('kode_transaksi')->unique();
            // $table->integer('jumlah');
            // $table->string('status')->default('pending');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
