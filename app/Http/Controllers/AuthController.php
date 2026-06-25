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
            'nip' => $request->npsn, // Simpan input npsn ke kolom nip
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
        $request->validate([
            'npsn' => 'required',
            'password' => 'required',
        ]);

        // Mengambil user berdasarkan 'npsn' yang sudah kita perbaiki tadi
        $user = \App\Models\User::where('npsn', $request->npsn)
                                ->where('role', 'guru')
                                ->first();

        // Verifikasi password
        if ($user && \Illuminate\Support\Facades\Hash::check($request->password, $user->password)) {
            \Illuminate\Support\Facades\Auth::login($user);
            $request->session()->regenerate();
            return redirect()->route('dashboard.guru');
        }

        return back()->withErrors(['npsn' => 'NPSN atau password salah!']);
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