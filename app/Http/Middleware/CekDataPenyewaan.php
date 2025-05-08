<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PenyewaanKost;

class CekDataPenyewaan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Kalau dia bukan admin dan belum punya data penyewaan, redirect
        if ($user->role !== 'admin' && !$user->penyewaanKost()->exists()) {
            return redirect()->route('penyewaan.create');
        }

        return $next($request);
    }
}
