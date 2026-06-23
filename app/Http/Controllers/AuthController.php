<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // --- PROSES PENDAFTARAN ---
    public function registerSiswa(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'npsn' => 'required|string|max:20', 
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
            'npsn' => $request->npsn,
        ]);

        return redirect()->route('login.siswa')->with('success', 'Akun siswa berhasil dibuat!');
    }

    public function registerGuru(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:6',
            'nama_sekolah' => 'required|string|max:255',
            'npsn' => 'required|string|max:20',
        ]);

        User::create([
            'name' => $request->name,
            'email' => 'guru-' . time() . '@pkk-smk.id',
            'password' => Hash::make($request->password),
            'role' => 'guru',
            'nama_sekolah' => $request->nama_sekolah,
            'npsn' => $request->npsn,
        ]);

        return redirect()->route('login.guru')->with('success', 'Akun guru berhasil dibuat!');
    }

    // --- PROSES LOGIN ---
    public function loginSiswa(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->role === 'siswa') {
                $request->session()->regenerate();
                return redirect()->route('dashboard.siswa');
            } else {
                Auth::logout();
                return back()->withErrors(['email' => 'Anda bukan siswa, silakan masuk melalui portal guru.']);
            }
        }

        return back()->withErrors(['email' => 'Login gagal. Pastikan email dan password benar.']);
    }

    public function loginGuru(Request $request)
    {
        // 1. Validasi input
        $request->validate([
            'npsn' => 'required',
            'password' => 'required',
        ]);

        // DEBUG: Cek apakah user dengan NPSN ini ada di database
        $user = User::where('npsn', $request->npsn)->where('role', 'guru')->first();
        
        if (!$user) {
            dd('DEBUG: User dengan NPSN ' . $request->npsn . ' tidak ditemukan di database! Periksa tabel users.');
        }

        // 2. Coba login menggunakan 'npsn', 'password', dan filter 'role' => 'guru'
        if (Auth::attempt(['npsn' => $request->npsn, 'password' => $request->password, 'role' => 'guru'])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.guru');
        }

        // 3. Jika user ketemu tapi login gagal, berarti password salah
        dd('DEBUG: NPSN ditemukan (' . $user->name . '), tapi password salah atau hashing tidak cocok!');
    }

    // --- PROSES LOGOUT ---
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda telah berhasil keluar.');
    }
}