<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Laporan;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil jumlah penghuni per lokasi
        $dataUsers = User::select('lokasi_kost')
            ->selectRaw('COUNT(*) as total_users')
            ->groupBy('lokasi_kost')
            ->get();

        $locations = $dataUsers->pluck('lokasi_kost')->toArray();
        $userCounts = $dataUsers->pluck('total_users')->toArray();

        // Mengambil jumlah penghuni yang aktif per lokasi
        $dataActiveUsers = User::select('lokasi_kost')
            ->selectRaw('COUNT(*) as total_active_users')
            ->where('status', 'aktif')  // Pastikan hanya yang aktif
            ->groupBy('lokasi_kost')
            ->get();

        $totalActiveUsers = $dataActiveUsers->pluck('total_active_users')->first(); // Mengambil angka pertama

        // Mengambil total pemasukan per lokasi
        $dataPemasukan = DB::table('transaksis')
            ->leftJoin('users', 'transaksis.user_id', '=', 'users.id')
            ->select('users.lokasi_kost', DB::raw('SUM(transaksis.jumlah) as total_pemasukan'))
            ->groupBy('users.lokasi_kost')
            ->get();

        $totalPemasukan = $dataPemasukan->pluck('total_pemasukan')->toArray();
        $totalPemasukanSum = array_sum($totalPemasukan);

        // Mengambil jumlah laporan per lokasi
        $dataLaporan = Laporan::select('lokasi_kost')
            ->selectRaw('COUNT(*) as total_laporan')
            ->groupBy('lokasi_kost')
            ->get();

        $laporanCounts = $dataLaporan->pluck('total_laporan')->toArray();

        return view('dashboard', compact('locations', 'userCounts', 'totalPemasukan', 'totalPemasukanSum', 'laporanCounts', 'totalActiveUsers'));
    }
}
