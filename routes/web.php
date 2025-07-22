<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PenyewaanKostController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\DashboardController;



// Route::get('/', function () {
//     return view('welcome1');
// });

// Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

// Route::resource('/laporan', LaporanController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);



// Route::middleware(['auth', 'role:admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('dashboard');
//     })->name('views.dashboard');

//     Route::get('/transaksi/riwayat', [PembayaranController::class, 'riwayatAdmin'])->name('admin.transaksi.riwayat');
//     Route::resource('penghuni', PenghuniController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
// });

// Route::middleware(['auth', 'role:user'])->group(function () {
//     Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
// });

// // Grup route yang membutuhkan login
// Route::middleware(['auth'])->group(function () {

//     // Dashboard
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->middleware(['verified'])->name('dashboard');

//     Route::get('/admin/dashboard', function () {
//         return view('dashboard');
//     })->name('views.dashboard');

//     Route::get('/user/dashboard', function () {
//         return view('user.dashboard');
//     })->name('user.dashboard');

//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//     Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

//     Route::get('/transaksi/riwayat', [PembayaranController::class, 'riwayatAdmin'])->name('admin.transaksi.riwayat');
//     Route::put('/transaksi/{transaksi}/update-status', [PembayaranController::class, 'updateStatus'])->name('admin.transaksi.update-status');

//     // Resource Penyewaan Kost
//     Route::resource('penyewaan', PenyewaanKostController::class);


//     // Laporan (Admin dan User)
//     Route::patch('/laporan/{id}/selesai', [LaporanController::class, 'setSelesai'])->name('laporan.setSelesai');


//     // Pembayaran
//     Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
//     Route::post('/pembayaran/bayar', [PembayaranController::class, 'bayar'])->name('pembayaran.bayar');
//     Route::get('/riwayat', [PembayaranController::class, 'riwayat'])->name('pembayaran.riwayat');
//     Route::post('/midtrans/callback', [PembayaranController::class, 'callback']);
//     Route::post('/pembayaran/bayar', [PembayaranController::class, 'bayar'])->name('pembayaran.bayar');
//     Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
//     Route::get('/pembayaran/riwayat', [PembayaranController::class, 'riwayat'])->name('pembayaran.riwayat');





//     // CRUD Laporan
//     Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
//     Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');
//     Route::get('/laporan/{id}/delete', [LaporanController::class, 'destroy'])->name('laporan.delete');
//     Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');
//     Route::delete('/laporan/admin/{laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

//     // Profile
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function () {
    return view('welcome1');
});
// Login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
// Route::get('/penyewaan/createlama', function () {
//     return view('penyewaan.createlama'); // Pastikan view ini ada di folder resources/views/penyewaan/createlama.blade.php
// })->name('penyewaan.createlama');
// Route::post('/penyewaan/store', [PenyewaanKostController::class, 'storeCreate'])->name('penyewaan.store');
// Route::post('/penyewaan/storelama', [PenyewaanKostController::class, 'storeCreateLama'])->name('penyewaan.storelama');
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');




// ADMIN
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/transaksi/riwayat', [PembayaranController::class, 'riwayatAdmin'])->name('admin.transaksi.riwayat');
    Route::resource('penghuni', PenghuniController::class)->except(['show']);
    Route::patch('/laporan/{id}/selesai', [LaporanController::class, 'setSelesai'])->name('laporan.setSelesai');
    Route::delete('/laporan/admin/{laporan}', [LaporanController::class, 'destroy'])->name('laporan.destroy');
    Route::get('/laporan/{id}/delete', [LaporanController::class, 'destroy'])->name('laporan.delete');
    Route::delete('penghuni/{id}', [PenghuniController::class, 'destroy'])->name('penghuni.destroy');
    Route::get('pembayaran/download-pdf', [PembayaranController::class, 'downloadPdf'])->name('pembayaran.downloadPdf');
    Route::get('pembayaran/export-excel', [PembayaranController::class, 'downloadExcel'])->name('pembayaran.exportExcel');
});

// USER
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran.index');
    Route::post('/pembayaran/bayar', [PembayaranController::class, 'bayar'])->name('pembayaran.bayar');
    Route::get('/riwayat', [PembayaranController::class, 'riwayat'])->name('pembayaran.riwayat');
    Route::post('/midtrans/callback', [PembayaranController::class, 'callback']);
    Route::post('/pembayaran/bayar', [PembayaranController::class, 'bayar'])->name('pembayaran.bayar');
    Route::post('/pembayaran/store', [PembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/riwayat', [PembayaranController::class, 'riwayat'])->name('pembayaran.riwayat');
    // Route::post('/penyewaan/store', [PenyewaanKostController::class, 'store'])->name('penyewaan.store');
    Route::get('/penyewaan/create', [PenyewaanKostController::class, 'create'])->name('penyewaan.create');
    Route::get('/penyewaan/createlama', [PenyewaanKostController::class, 'createLama'])->name('penyewaan.createlama');  // Route untuk form penyewaan lama
    Route::post('/penyewaan/store', [PenyewaanKostController::class, 'storeCreate'])->name('penyewaan.store');
    Route::post('/penyewaan/storelama', [PenyewaanKostController::class, 'storeCreateLama'])->name('penyewaan.storelama');
});

// UMUM (login user/admin)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route::resource('penyewaan', PenyewaanKostController::class)->except(['show']);
    Route::resource('laporan', LaporanController::class)->only(['index', 'store', 'update', 'edit', 'destroy', 'create']);
    
});

// Route auth default dari Laravel Breeze / Fortify
require __DIR__ . '/auth.php';
