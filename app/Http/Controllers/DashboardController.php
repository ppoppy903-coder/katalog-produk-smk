<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    // --- 1. DASHBOARD GURU ---
    public function dashboardGuru()
    {
        if (Auth::user()->role !== 'guru') return redirect()->route('dashboard.siswa');

        $produkDiajukan = Produk::where('status', 'menunggu')
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })->get();
            
        return view('dashboard-guru', [
            'produkDiajukan' => $produkDiajukan,
            'jumlahPengajuan' => $produkDiajukan->count()
        ]);
    }

    public function notifikasiGuru()
    {
        if (Auth::user()->role !== 'guru') return redirect()->route('dashboard.siswa');
        
        $notifikasiProduk = Produk::where('status', 'menunggu')
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })
            ->latest()
            ->get();
            
        return view('notifikasi-guru', compact('notifikasiProduk'));
    }

    // --- FUNGSI HAPUS NOTIFIKASI (Debugging) ---
    public function hapusNotifikasi($id)
    {
        $produk = Produk::where('id', $id)
            ->where('status', 'menunggu')
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })
            ->first();

        if ($produk) {
            $produk->status = 'diabaikan';
            $produk->save();
            return back()->with('success', 'Notifikasi berhasil dihilangkan.');
        }

        return back()->withErrors(['error' => 'Data tidak ditemukan!']);
    }

    // --- 2. DASHBOARD SISWA ---
    public function dashboardSiswa()
    {
        if (Auth::user()->role !== 'siswa') return redirect()->route('dashboard.guru');

        $produks = Produk::where('user_id', Auth::id())->latest()->get();
        
        $ulasanPending = DB::table('komentars')
            ->join('produks', 'komentars.produk_id', '=', 'produks.id')
            ->where('produks.user_id', Auth::id())
            ->where('komentars.status', 'pending')
            ->select('komentars.*', 'produks.nama_produk')
            ->get();
        
        return view('dashboard-siswa', compact('produks', 'ulasanPending'));
    }

    // --- 3. NOTIFIKASI SISWA (DIPERBAIKI) ---
    public function notifikasi()
    {
        if (Auth::user()->role !== 'siswa') return redirect()->route('dashboard.guru');

        // 1. Ambil Notifikasi Produk
        $notifikasiProduk = Produk::where('user_id', Auth::id())
                                    ->where('status', '!=', 'menunggu')
                                    ->latest()
                                    ->get();

        // 2. Ambil Notifikasi Ulasan (yang perlu dimoderasi/perhatian)
        $notifikasiUlasan = DB::table('komentars')
                                ->join('produks', 'komentars.produk_id', '=', 'produks.id')
                                ->where('produks.user_id', Auth::id())
                                ->where('komentars.status', 'pending')
                                ->select('komentars.*', 'produks.nama_produk')
                                ->latest()
                                ->get();

        return view('notifikasi', compact('notifikasiProduk', 'notifikasiUlasan'));
    }
        // --- 4. PENGATURAN ---
    public function pengaturan()
    {
        $user = Auth::user();
        return ($user->role === 'siswa') 
            ? view('pengaturan-siswa', compact('user')) 
            : view('pengaturan', compact('user'));
    }
    
    public function updatePengaturan(Request $request)
    {
        $user = Auth::user();
        
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