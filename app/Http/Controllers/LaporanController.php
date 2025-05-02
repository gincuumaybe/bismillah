<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class LaporanController extends Controller
{

    public function indexAdmin()
    {
        $laporans = Laporan::all(); // semua laporan
        return view('laporan.index', compact('laporans'));
    }

    public function indexUser()
    {

        $laporans = Laporan::where('user_id', auth()->user()->id)->get();
        $penghunis = User::where('role', 'user')->get(); // ambil semua user dengan role user
        return view('laporan.user_index', compact('laporans'));
    }

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
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',  // Validasi gambar
        ]);

        // Menangani upload gambar
        $gambarUrl = null;
        if ($request->hasFile('gambar')) {
            // Upload gambar ke storage (misalnya public disk)
            $gambarUrl = $request->file('gambar')->store('laporan_gambar', 'public');
        }

        // Menyimpan laporan
        Laporan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarUrl,  // Menyimpan URL gambar
        ]);

        return redirect()->route('laporan.indexUser')->with('success', 'Laporan berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',  // Validasi gambar
        ]);

        // Menangani upload gambar
        $gambarUrl = $laporan->gambar; // Gambar lama jika tidak ada yang baru
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($laporan->gambar) {
                Storage::disk('public')->delete($laporan->gambar);
            }
            // Upload gambar baru
            $gambarUrl = $request->file('gambar')->store('laporan_gambar', 'public');
        }

        // Update data laporan
        $laporan->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarUrl,  // Menyimpan URL gambar
        ]);

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        // Cek apakah yang menghapus adalah admin atau user
        if (auth()->user()->role == 'admin' || auth()->user()->id == $laporan->user_id) {
            $laporan->delete();
            return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus');
        } else {
            return redirect()->route('laporan.index')->with('error', 'Tidak memiliki akses untuk menghapus laporan ini');
        }
    }
}
