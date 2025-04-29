<?php

namespace App\Http\Controllers;
use App\Models\Penghuni;
use App\Models\User;

use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penghunis = User::where('role', 'user')->get(); // ambil semua user dengan role user
        return view('penghuni.index', compact('penghunis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('penghuni.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        // Validasi data
        $request->validate([
        'nama' => 'required|string|max:255',
        'no_telp' => 'required|numeric|unique:penghunis,no_telp',
        // 'email' => 'required|email|max:255',
        // 'password' => 'required|string|min:6',
        'lokasi' => 'required|string|max:100',
    ]);

        // Simpan ke DB (nanti kita buat model dan tabelnya)
        Penghuni::create([
        'nama' => $request->nama,
        'no_telp' => $request->no_telp,
        // 'email' => $request->email,
        // 'password' => bcrypt($request->password),
        'lokasi' => $request->lokasi,
    ]);

        return redirect()->route('penghuni.index')->with('success', 'Penghuni berhasil ditambahkan!');
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
        $penghuni = User::findOrFail($id);
        return view('penghuni.edit', compact('penghuni'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $penghuni = User::findOrFail($id);
        $penghuni->update([
            'name' => $request->name,
            'lokasi' => $request->lokasi,
        ]);

        return redirect()->route('penghuni.index')->with('success', 'Data penghuni berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $penghuni = User::findOrFail($id);

        // Optional: Cek role dulu agar yang dihapus memang role user
        if ($penghuni->role !== 'user') {
            return redirect()->route('penghuni.index')->with('error', 'Data yang dihapus bukan penghuni.');
        }

        $penghuni->delete();
        return redirect()->route('penghuni.index')->with('success', 'Data penghuni berhasil dihapus.');
    }
}
