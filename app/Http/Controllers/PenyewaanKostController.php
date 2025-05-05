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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penyewaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nomor_kamar' => 'required|string|max:255',
            'tanggal_masuk' => 'required|date',
        ]);

        // Simpan data
        PenyewaanKost::create([
            'user_id' => auth()->id(),
            'nomor_kamar' => $request->nomor_kamar,
            'tanggal_masuk' => $request->tanggal_masuk,
        ]);

        // Redirect setelah data berhasil disimpan
        return redirect()->route('dashboard')->with('success', 'Data penyewaan berhasil disimpan!');
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
