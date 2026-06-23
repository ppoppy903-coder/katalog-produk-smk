<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // --- 1. DASHBOARD GURU ---
    public function dashboardGuru()
    {
        if (Auth::user()->role !== 'guru') {
            return redirect()->route('dashboard.siswa');
        }

        // Filter produk "menunggu" berdasarkan NPSN sekolah guru yang login
        $produkDiajukan = Produk::where('status', 'menunggu')
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })->get();
            
        $jumlahPengajuan = $produkDiajukan->count();

        return view('dashboard-guru', compact('produkDiajukan', 'jumlahPengajuan'));
    }

    public function notifikasiGuru()
    {
        if (Auth::user()->role !== 'guru') {
            return redirect()->route('dashboard.siswa');
        }
        
        // Filter notifikasi berdasarkan NPSN sekolah guru yang login
        $notifikasiProduk = Produk::where('status', 'menunggu')
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })
            ->latest()
            ->get();
            
        return view('notifikasi-guru', compact('notifikasiProduk'));
    }

    // --- 2. DASHBOARD SISWA ---
    public function dashboardSiswa()
    {
        if (Auth::user()->role !== 'siswa') {
            return redirect()->route('dashboard.guru');
        }

        $user = Auth::user();
        $produks = Produk::where('user_id', $user->id)->latest()->get();
        
        return view('dashboard-siswa', compact('produks'));
    }

    // --- 3. NOTIFIKASI SISWA ---
    public function notifikasi()
    {
        if (Auth::user()->role !== 'siswa') {
            return redirect()->route('dashboard.guru');
        }

        $user = Auth::user();
        $notifikasiProduk = Produk::where('user_id', $user->id)
                                    ->whereIn('status', ['disetujui', 'ditolak', 'diterbitkan'])
                                    ->latest()
                                    ->get();

        return view('notifikasi', compact('notifikasiProduk'));
    }

    // --- 4. PENGATURAN ---
    public function pengaturan()
    {
        $user = Auth::user();
        if ($user->role === 'siswa') {
            return view('pengaturan-siswa', compact('user'));
        } 
        return view('pengaturan', compact('user'));
    }
    
    public function updatePengaturan(Request $request)
    {
        $user = Auth::user();
        
        // Validasi: Hapus email, ganti dengan name & password saja
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        
        $user->save();
        
        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}