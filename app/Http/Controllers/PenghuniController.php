<?php

namespace App\Http\Controllers;
use App\Models\Penghuni;


use Illuminate\Http\Request;

class PenghuniController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data penghuni dari database (nanti kita buat modelnya)
        $penghunis = Penghuni::all();
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
    ]);

        // Simpan ke DB (nanti kita buat model dan tabelnya)
        \App\Models\Penghuni::create([
        'nama' => $request->nama,
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
