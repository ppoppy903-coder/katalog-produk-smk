<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // 1. Cek apakah user sudah login
        if (!Auth::check()) {
            // Arahkan ke halaman login yang sesuai jika belum login
            // Gunakan route name agar lebih fleksibel
            return redirect()->route('login.siswa'); 
        }

        // 2. Cek apakah role user sesuai dengan role yang diminta di route
        if (Auth::user()->role !== $role) {
            // Jika role tidak sesuai, arahkan ke dashboard masing-masing
            if (Auth::user()->role === 'guru') {
                return redirect()->route('dashboard.guru');
            } elseif (Auth::user()->role === 'siswa') {
                return redirect()->route('dashboard.siswa');
            }
            
            // Jika role tidak dikenali, logout dan kembali ke home
            Auth::logout();
            return redirect('/');
        }

        return $next($request);
    }
}