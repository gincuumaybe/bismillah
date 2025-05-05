<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PenyewaanKostController;

// Halaman awal
Route::get('/', function () {
    return view('welcome1');
});

// Autentikasi (Login)
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Resource Penghuni
Route::resource('penghuni', PenghuniController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

// Grup route yang membutuhkan login
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('views.dashboard');

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');

    // Resource Penyewaan Kost
    Route::resource('penyewaan', PenyewaanKostController::class);


    // Laporan (Admin dan User)
    Route::get('/laporan/admin', [LaporanController::class, 'indexAdmin'])->name('laporan.indexAdmin');
    Route::get('/laporan/user', [LaporanController::class, 'indexUser'])->name('laporan.indexUser');
    Route::patch('/laporan/{id}/selesai', [LaporanController::class, 'setSelesai'])->name('laporan.setSelesai');





    // CRUD Laporan
    Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
    Route::get('/laporan/{id}/delete', [LaporanController::class, 'destroy'])->name('laporan.delete');
    Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route auth default dari Laravel Breeze / Fortify
require __DIR__.'/auth.php';
