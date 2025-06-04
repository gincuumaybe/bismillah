<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PenyewaanKost;


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
        // return view('penyewaan.create');
        $user = auth()->user();

        if ($user->penyewaanKost()->exists()) {
            return redirect()->route('user.dashboard')->with('error', 'Kamu sudah mengisi data penyewaan.');
        }

        return view('penyewaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = auth()->user();

        if ($user->penyewaanKost()->exists()) {
            return redirect()->route('user.dashboard')->with('error', 'Data penyewaan sudah ada.');
        }

        $request->validate([
            'nomor_kamar' => 'required|string',
            'tanggal_masuk' => 'required|date|after_or_equal:today',
            'durasi_bulan' => 'required|integer|min:1',
        ]);

        $tanggalMasuk = \Carbon\Carbon::parse($request->tanggal_masuk);
        $tanggalKeluar = $tanggalMasuk->copy()->addMonths($request->durasi_bulan);

        $user->penyewaanKost()->create([
            'user_id' => $user->id,
            'nomor_kamar' => $request->nomor_kamar,
            'tanggal_masuk' => $request->tanggal_masuk,
            'tanggal_keluar' => $tanggalKeluar->toDateString(),
            'durasi_bulan' => $request->durasi_bulan,
            'status' => 'aktif', // atau status default yang kamu gunakan
        ]);

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
}
