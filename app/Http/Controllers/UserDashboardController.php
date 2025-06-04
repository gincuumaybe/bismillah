<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\Penyewaan;
use Carbon\Carbon;
use App\Models\PenyewaanKost;


class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Ambil semua laporan user ini
        $laporans = Laporan::where('user_id', $user->id)->get();

        // Contoh data ringkasan: jumlah laporan
        $jumlahLaporan = $laporans->count();

        // Kirim ke view dashboard
        return view('user.dashboard', compact('laporans', 'jumlahLaporan'));
    }
}
