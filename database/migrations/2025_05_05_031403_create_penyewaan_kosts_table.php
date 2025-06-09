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
        Schema::create('penyewaan_kosts', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('user_id');
            $table->foreignId('user_id')->constrained('')->onDelete('cascade');
            $table->string('nomor_kamar');
            $table->date('tanggal_masuk');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->date('tanggal_keluar')->nullable();
            $table->integer('durasi_bulan')->default(1);
            $table->timestamps();
            // $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            // $table->timestamps();

            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan_kosts');
    }
};
