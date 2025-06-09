<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Penyewaan;
use App\Helpers\WaNotif; // Pastikan ini sesuai dengan namespace helper yang kamu buat
use App\Helpers\sendWhatsappNotification; // Pastikan ini sesuai dengan namespace helper yang kamu buat


class LaporanController extends Controller
{

    public function index()
    {
        if (auth()->user()->role == 'admin') {
            $laporans = Laporan::all(); // Admin melihat semua laporan
            return view('laporan.index', compact('laporans'));
        } elseif (auth()->user()->role == 'user') {
            $laporans = Laporan::where('user_id', auth()->user()->id)->get(); // User melihat laporannya sendiri
            return view('laporan.user_index', compact('laporans'));
        } else {
            // Jika role tidak dikenali, misalnya untuk keamanan bisa redirect atau abort
            abort(403, 'Unauthorized action.');
        }
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

        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil data penyewaan jika ada relasi (pastikan kamu punya relasi ini di model User)
        $nomorKamar = $user->penyewaanKost?->nomor_kamar; // safe access

        // Menyimpan laporan
        Laporan::create([
            'user_id' => auth()->id(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarUrl,  // Menyimpan URL gambar
            'name' => $user->name,
            'lokasi_kost' => $user->lokasi_kost,
            'nomor_kamar' => $nomorKamar,
        ]);

        // Kirim notifikasi WA ke admin (misal nomornya disimpan di config/env)
        $adminWaNumber = env('ADMIN_WA_NUMBER'); // contoh: '6281234567890'
        if ($adminWaNumber) {
            $message = "Laporan baru dari {$user->name}:\n";
            $message .= "Judul: {$request->judul}\n";
            $message .= "Deskripsi: {$request->deskripsi}\n";
            $message .= "Lokasi Kost: {$user->lokasi_kost}\n";
            $message .= "Nomor Kamar: {$nomorKamar}\n";
            if ($gambarUrl) {
                $message .= "Ada gambar yang dilampirkan.\n";
            }

            // Panggil helper WA notification
            try {
                WaNotif::send($adminWaNumber, $message);
            } catch (\Exception $e) {
                // Log error, tapi jangan ganggu flow
                \Log::error('Gagal kirim notifikasi WA: ' . $e->getMessage());
            }
        }

        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dibuat!');
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

        // Optional: Hanya admin atau pemilik laporan yang bisa hapus
        if (auth()->user()->role != 'admin' && auth()->id() != $laporan->user_id) {
            return response()->json(['message' => 'Tidak diizinkan'], 403);
        }

        // Hapus file gambar jika ada
        if ($laporan->gambar) {
            Storage::disk('public')->delete($laporan->gambar);
        }

        $laporan->delete();

        return response()->json(['message' => 'Laporan berhasil dihapus']);
    }

    public function setSelesai($id)
    {
        $laporan = Laporan::findOrFail($id);
        $laporan->status = true; // selesai
        $laporan->save();

        return redirect()->route('laporan.index')->with('status', 'Laporan ditandai sebagai selesai.');
    }
}
