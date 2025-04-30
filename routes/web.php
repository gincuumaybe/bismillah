<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenghuniController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return redirect()->route('login');
    return view('welcome1');
});

Route::resource('penghuni', PenghuniController::class);

Route::get('/penghuni', [PenghuniController::class, 'index'])->name('penghuni.index');

Route::resource('laporan', LaporanController::class);

Route::get('/laporan/create', [LaporanController::class, 'create'])->name('laporan.create');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');

Route::get('/laporan/{id}/edit', [LaporanController::class, 'edit'])->name('laporan.edit');

Route::put('/laporan/{id}', [LaporanController::class, 'update'])->name('laporan.update');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/admin/dashboard', function () {
        return view('dashboard');
    })->name('views.dashboard');

    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});


require __DIR__.'/auth.php';
