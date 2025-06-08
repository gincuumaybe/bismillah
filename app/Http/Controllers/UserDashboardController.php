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
        $laporans = Laporan::where('user_id', $user->id)->latest()->take(5)->get(); // hanya ambil 5 terbaru
        $jumlahLaporan = Laporan::where('user_id', $user->id)->count();

        // Ambil data penyewaan terkait user
        $penyewaan = PenyewaanKost::where('user_id', $user->id)->latest()->first(); // ambil yang paling baru

        return view('user.dashboard', compact('laporans', 'jumlahLaporan', 'penyewaan'));
    }
}
