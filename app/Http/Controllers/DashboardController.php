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
        // // Mengambil jumlah penghuni per lokasi
        // $dataUsers = User::select('lokasi_kost')
        //     ->selectRaw('COUNT(*) as total_users')
        //     ->groupBy('lokasi_kost')
        //     ->get();

        // $locations = $dataUsers->pluck('lokasi_kost')->toArray();
        // $userCounts = $dataUsers->pluck('total_users')->toArray();

        // // Mengambil jumlah penghuni yang aktif per lokasi
        // $dataActiveUsers = User::select('lokasi_kost')
        //     ->selectRaw('COUNT(*) as total_active_users')
        //     ->where('status', 'aktif')  // Pastikan hanya yang aktif
        //     ->groupBy('lokasi_kost')
        //     ->get();

        // $totalActiveUsers = $dataActiveUsers->sum('total_active_users');

        // // Mengambil total pemasukan per lokasi
        // $dataPemasukan = DB::table('transaksis')
        //     ->leftJoin('users', 'transaksis.user_id', '=', 'users.id')
        //     ->select('users.lokasi_kost', DB::raw('SUM(transaksis.jumlah) as total_pemasukan'))
        //     ->groupBy('users.lokasi_kost')
        //     ->get();

        // $totalPemasukan = $dataPemasukan->pluck('total_pemasukan')->toArray();
        // $totalPemasukanSum = array_sum($totalPemasukan);

        // // Mengambil jumlah laporan per lokasi
        // $dataLaporan = Laporan::select('lokasi_kost')
        //     ->selectRaw('COUNT(*) as total_laporan')
        //     ->groupBy('lokasi_kost')
        //     ->get();

        // $laporanCounts = $dataLaporan->pluck('total_laporan')->toArray();

        // return view('dashboard', compact('locations', 'userCounts', 'totalPemasukan', 'totalPemasukanSum', 'laporanCounts', 'totalActiveUsers'));
        // Ambil semua lokasi yang pernah digunakan oleh user
        $locations = User::select('lokasi_kost')->distinct()->pluck('lokasi_kost')->toArray();

        // ------------------------------------
        // 1. Jumlah Penghuni per Lokasi
        $dataUsers = User::select('lokasi_kost')
            ->selectRaw('COUNT(*) as total_users')
            ->groupBy('lokasi_kost')
            ->pluck('total_users', 'lokasi_kost'); // hasil: ['Berbek' => 5, 'Gunung_Anyar' => 7]

        $userCounts = [];
        foreach ($locations as $lokasi) {
            $userCounts[] = $dataUsers[$lokasi] ?? 0;
        }

        // ------------------------------------
        // 2. Jumlah Penghuni Aktif Total
        $totalActiveUsers = User::where('status', 'aktif')->count();

        // ------------------------------------
        // 3. Total Pemasukan per Lokasi
        $dataPemasukan = DB::table('transaksis')
            ->leftJoin('users', 'transaksis.user_id', '=', 'users.id')
            ->select('users.lokasi_kost', DB::raw('SUM(transaksis.jumlah) as total_pemasukan'))
            ->groupBy('users.lokasi_kost')
            ->pluck('total_pemasukan', 'users.lokasi_kost'); // hasil: ['Rungkut' => 2000000, 'Berbek' => 1000000]

        $totalPemasukan = [];
        foreach ($locations as $lokasi) {
            $totalPemasukan[] = $dataPemasukan[$lokasi] ?? 0;
        }

        $totalPemasukanSum = array_sum($totalPemasukan);

        // ------------------------------------
        // 4. Total Laporan per Lokasi
        $dataLaporan = Laporan::select('lokasi_kost')
            ->selectRaw('COUNT(*) as total_laporan')
            ->groupBy('lokasi_kost')
            ->pluck('total_laporan', 'lokasi_kost'); // hasil: ['Gunung_Anyar' => 3, 'Berbek' => 1]

        $laporanCounts = [];
        foreach ($locations as $lokasi) {
            $laporanCounts[] = $dataLaporan[$lokasi] ?? 0;
        }

        return view('dashboard', compact(
            'locations',
            'userCounts',
            'totalPemasukan',
            'totalPemasukanSum',
            'laporanCounts',
            'totalActiveUsers'
        ));
    }
}
