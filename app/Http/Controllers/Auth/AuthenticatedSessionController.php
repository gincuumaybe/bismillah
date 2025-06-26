<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;
use App\Models\PenyewaanKost;
use App\Models\Transaksi;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return back()->withErrors([
                'email' => __('auth.failed'),
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        $user = Auth::user();

        // Cek status pengguna
        if ($user->status == 'nonaktif') {
            // Jika status Nonaktif, arahkan ke halaman penyewaan/createlama.blade.php
            return redirect()->route('penyewaan.createlama');
        }

        // Jika pengguna adalah admin
        if ($user->role === 'admin') {
            return redirect()->route('dashboard'); // Pastikan route 'dashboard' ada
        }

        // Jika pengguna adalah user
        elseif ($user->role === 'user') {
            // Cek apakah user sudah memiliki penyewaan
            $penyewaan = PenyewaanKost::where('user_id', $user->id)
                ->where('status', 'aktif') // Hanya ambil penyewaan yang aktif
                ->first();

            if (!$penyewaan) {
                return redirect()->route('penyewaan.create');
            } else {
                // Ambil transaksi terakhir yang terkait dengan penyewaan ini
                $transaksi = Transaksi::where('penyewaan_id', $penyewaan->id)
                    ->latest()
                    ->first();

                // Jika status transaksi sudah 'success', set session untuk pembayaran sukses
                if ($transaksi && $transaksi->status === 'success') {
                    session(['pembayaran_sukses' => true]);
                }

                // Jika sudah bayar, arahkan ke dashboard user
                return redirect()->route('user.dashboard');
            }
        }

        // Default jika role tidak dikenali
        Auth::logout();
        return redirect('/login')->withErrors(['email' => 'Role tidak dikenali']);
    }
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
