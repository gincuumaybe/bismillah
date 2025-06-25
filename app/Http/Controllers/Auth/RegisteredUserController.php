<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'phone' => ['required', 'string', 'regex:/^08[0-9]{8,11}$/'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'lokasi_kost' => ['required', 'string', 'in:Berbek,Gunung_Anyar,Rungkut'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'status' => ['nullable', 'string', 'in:aktif,nonaktif'], // Tambahkan validasi untuk status
        ]);

        // Menyimpan gambar jika ada
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Simpan gambar ke direktori public/images
            // $imagePath = $request->file('image')->store('public/images');
            $imagePath = $request->file('image')->store('images', 'public');  // store in public/images
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'lokasi_kost' => $request->lokasi_kost,
            'image' => $imagePath,  // Menyimpan path gambar jika ada
            'status' => 'nonaktif', // Status default
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->role === 'user') {
            if (!$user->penyewaanKost()->exists()) {
                return redirect()->route('penyewaan.create');
            }
        } elseif ($user->role === 'admin') {
            return redirect()->route('views.dashboard');
        }

        return redirect(RouteServiceProvider::HOME);

        // return redirect()->route('login')->with('status', 'Pendaftaran berhasil! Silakan login terlebih dahulu.');
    }
}
