<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyewaanKost;
use PDF; // Pastikan Anda sudah menginstal package dompdf/dompdf


class PenyewaanKostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyewaans = PenyewaanKost::where('user_id', auth()->id())->latest()->get();
        return view('penyewaan.index', compact('penyewaans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();

        if ($user->penyewaanKost()->exists()) {
            return redirect()->route('user.dashboard')->with('error', 'Kamu sudah mengisi data penyewaan.');
        }

        return view('penyewaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    // Method untuk pengguna dengan status Nonaktif (penyewaan/createlama.blade.php)
    public function createLama()
    {
        return view('penyewaan.createlama');
    }

    public function storeCreate(Request $request)
    {

        $user = auth()->user(); // Mendapatkan user yang sedang login

        // Cek apakah pengguna sudah memiliki data penyewaan
        if ($user->penyewaanKost()->exists()) {
            return redirect()->route('user.dashboard')->with('error', 'Data penyewaan sudah ada.');
        }

        // Validasi input
        $request->validate([
            'nomor_kamar' => 'required|string',
            'tanggal_masuk' => 'required|date|after_or_equal:today',
            'durasi_bulan' => 'required|integer|min:1',
            // 'lokasi_kost' => 'required|string', // Validasi lokasi_kost
        ]);


        // Menghitung tanggal keluar berdasarkan durasi
        $tanggalMasuk = \Carbon\Carbon::parse($request->tanggal_masuk);
        $tanggalKeluar = $tanggalMasuk->copy()->addMonths($request->durasi_bulan);

        // Menyimpan data penyewaan
        $user->penyewaanKost()->create([
            'user_id' => $user->id,
            'nomor_kamar' => $request->nomor_kamar,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $tanggalKeluar->toDateString(),
            'durasi_bulan' => $request->durasi_bulan,
            'status' => 'aktif', // Status penyewaan yang di-set aktif
        ]);

        // Update status pengguna menjadi 'Aktif' dan lokasi_kost menjadi yang dipilih
        $user->status = 'aktif';  // Mengubah status pengguna menjadi aktif
        // $user->lokasi_kost = $request->lokasi_kost;  // Mengupdate lokasi_kost pengguna di tabel users
        $user->save();  // Menyimpan perubahan status dan lokasi_kost

        return redirect()->route('user.dashboard')->with('success', 'Data penyewaan berhasil disimpan.');
    }

    // Method untuk pengguna dengan status "Nonaktif" (penyewaan/createlama.blade.php)
    public function storeCreateLama(Request $request)
    {
        $user = auth()->user();

        // Validasi form
        $request->validate([
            'nomor_kamar' => 'required|string',
            'tanggal_masuk' => 'required|date|after_or_equal:today',
            'durasi_bulan' => 'required|integer|min:1',
            'lokasi_kost' => 'required|string', // Validasi lokasi_kost
        ]);

        // Menghitung tanggal keluar berdasarkan durasi
        $tanggalMasuk = \Carbon\Carbon::parse($request->tanggal_masuk);
        $tanggalKeluar = $tanggalMasuk->copy()->addMonths($request->durasi_bulan);

        // Menyimpan data penyewaan
        $user->penyewaanKost()->create([
            'user_id' => $user->id,
            'nomor_kamar' => $request->nomor_kamar,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $tanggalKeluar->toDateString(),
            'durasi_bulan' => $request->durasi_bulan,
            'status' => 'aktif', // Status penyewaan yang di-set aktif
        ]);

        // Update status pengguna menjadi 'Aktif' dan lokasi_kost menjadi yang dipilih
        $user->status = 'aktif';  // Mengubah status pengguna menjadi aktif
        $user->lokasi_kost = $request->lokasi_kost;  // Mengupdate lokasi_kost pengguna di tabel users
        $user->save();  // Menyimpan perubahan status dan lokasi_kost

        return redirect()->route('user.dashboard')->with('success', 'Data penyewaan berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function downloadPdf()
    {
        // Ambil data transaksi
        $transaksiData = PenyewaanKost::all();  // Anda bisa mengganti query ini sesuai kebutuhan

        // Generate PDF dari view 'penyewaan.pdf'
        $pdf = PDF::loadView('penyewaan.pdf', compact('transaksiData'));

        // Download PDF
        return $pdf->download('laporan_transaksi.pdf');
    }
}
