<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $laporans = Laporan::all();
        return view('laporan.index', compact('laporans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('laporan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // Validasi input
    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi gambar
    ]);

    // Menyimpan gambar jika ada
    $path = null;
    if ($request->hasFile('gambar')) {
        // Simpan gambar dan ambil path-nya
        $path = $request->file('gambar')->store('gambar_laporan', 'public');
    }

    // Simpan laporan ke database
    Laporan::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'gambar' => $path, // Pastikan ini menggunakan $path
        // 'user_id' => auth()->id(), // Menyimpan user_id yang sedang login
    ]);

    // Redirect kembali ke halaman laporan dengan pesan sukses
    return redirect()->route('laporan.index')->with('success', 'Laporan berhasil ditambahkan!');
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
        $laporan = Laporan::findOrFail($id);
        return view('laporan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|url',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->nama = $request->nama;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->gambar = $request->gambar;

        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('laporan_images', 'public');
            $laporan->gambar = asset('storage/' . $gambarPath);
        }

        $laporan->save();

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $laporan = Laporan::findOrFail($id);

        // Hapus laporan dari database
        $laporan->delete();

        return redirect()->route('laporan.index');
    }
}
