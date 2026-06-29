<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notifications\ProdukDisetujui;

class ValidasiController extends Controller
{
    /**
     * Menampilkan daftar produk yang menunggu validasi.
     */
    public function index()
    {
        if (Auth::user()->role !== 'guru') {
            return redirect()->route('dashboard.siswa')->with('error', 'Akses ditolak!');
        }

        $produk = Produk::where('status', 'menunggu')
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })
            ->get();

        return view('validasi-produk', compact('produk'));
    }

    /**
     * Menampilkan detail produk untuk divalidasi.
     */
    public function show($id)
    {
        if (Auth::user()->role !== 'guru') {
            return redirect()->route('dashboard.siswa')->with('error', 'Akses ditolak!');
        }

        $produk = Produk::where('id', $id)
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })
            ->firstOrFail();

        return view('detail-produk', compact('produk'));
    }

    /**
     * Memperbarui status produk (Disetujui/Ditolak).
     */
    public function updateStatus(Request $request, $id)
    {
        if (Auth::user()->role !== 'guru') {
            return redirect()->route('dashboard.siswa')->with('error', 'Akses ditolak!');
        }

        $request->validate([
            'status' => 'required|in:diterbitkan,ditolak'
        ]);

        $produk = Produk::where('id', $id)
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })
            ->firstOrFail();
        
        $produk->status = ($request->status === 'diterbitkan') ? 'disetujui' : 'ditolak';
        $produk->save();
        
        // Kirim notifikasi jika disetujui
        if ($produk->status === 'disetujui') {
            $siswa = $produk->user; 
            if ($siswa) {
                $siswa->notify(new ProdukDisetujui($produk));
            }
        }
        
        return redirect()->route('validasi.produk')
                         ->with('success', 'Status produk "' . $produk->nama_produk . '" telah diperbarui menjadi ' . $produk->status . '.');
    }

    /**
     * Menampilkan histori produk yang sudah divalidasi.
     */
    public function histori()
    {
        if (Auth::user()->role !== 'guru') {
            return redirect()->route('dashboard.siswa')->with('error', 'Akses ditolak!');
        }

        // Mengambil produk yang sudah diputuskan berdasarkan NPSN sekolah
        $histori = Produk::whereIn('status', ['disetujui', 'ditolak'])
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })
            ->latest()
            ->get();
            
        return view('history-guru', compact('histori'));
    }
}