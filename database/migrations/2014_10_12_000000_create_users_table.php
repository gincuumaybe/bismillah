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
        Schema::create('users', function (Blueprint $table) {
            // ini awalannya - ini project aslinya(26 Juni 2025)
            // $table->id();
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->string('image')->nullable();
            // // $table->string('phone')->unique();
            // $table->string('phone')->nullable();
            // $table->string('role')->default('user');
            // // $table->string('lokasi_kost');
            // $table->string('lokasi_kost')->nullable();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
            // $table->softDeletes();
            // $table->string('status')->default('nonaktif');

            // ini buat jenkins
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('phone')->nullable();
            $table->string('lokasi_kost')->nullable();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->string('status')->default('aktif');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
