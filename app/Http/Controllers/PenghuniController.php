<?php

namespace App\Http\Controllers;
use App\Models\Penghuni;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        'email' => 'required|email|max:255|unique:users,email',
        'no_telp' => 'required|numeric|unique:users,phone',
        'lokasi_kost' => ['required', 'string', 'in:Gunung_Anyar,Berbek,Rungkut'],
        'password' => 'required|string|min:6',
    ]);

        // Simpan ke tabel users
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'phone' => $request->no_telp,
            'lokasi_kost' => $request->lokasi_kost,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);


        // Simpan ke DB (nanti kita buat model dan tabelnya)
        Penghuni::create([
        'user_id' => $user->id,
        'name' => $request->nama,
        'email' => $request->email,
        'phone' => $request->no_telp,
        'lokasi_kost' => $request->lokasi_kost,
        'password' => Hash::make($request->password),
        'role' => 'user',
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
            'email' => 'nullable|email|max:255',
            'no_telp'=> 'required|string|max:20',
            'lokasi_kost' => 'required|string|in:Berbek,Gunung Anyar,Rungkut',
        ]);

        $penghuni = User::findOrFail($id);
        $penghuni->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->no_telp,
            'lokasi' => $request->lokasi_kost,
        ]);

        // Cari data di tabel penghunis berdasarkan user_id
        $penghuni = Penghuni::where('user_id', $user->id)->first();
        if ($penghuni) {
            $penghuni->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->no_telp,
                'lokasi_kost' => $request->lokasi_kost,
            ]);
        }

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
