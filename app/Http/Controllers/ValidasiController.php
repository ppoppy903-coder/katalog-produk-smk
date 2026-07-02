<?php

namespace App\Http\Controllers;

use App\Models\Sertifikat;
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
/**
     * Menampilkan detail produk untuk divalidasi.
     */
    public function show($id)
    {
        if (Auth::user()->role !== 'guru') {
            return redirect()->route('dashboard.siswa')->with('error', 'Akses ditolak!');
        }

        // PERBAIKAN: Menambahkan ->with('anggotaTim') agar data anggota tim ikut terambil
        $produk = Produk::where('id', $id)
            ->whereHas('user', function($query) {
                $query->where('npsn', Auth::user()->npsn);
            })
            ->with('anggotaTim') // <--- Tambahkan baris ini
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
        
        // Kirim notifikasi dan Generate Sertifikat jika disetujui
        if ($produk->status === 'disetujui') {
            // 1. Generate Nomor Sertifikat Otomatis
            // Format: CERT/SMK-DEL/TAHUN/BULAN/ID
            $nomorSertifikat = 'CERT/SMK-DEL/' . date('Y/m') . '/' . str_pad($produk->id, 3, '0', STR_PAD_LEFT);
            
            // 2. Update data sertifikat di database
            $produk->update([
                'no_sertifikat' => $nomorSertifikat,
                'tanggal_validasi' => now()
            ]);

            // 3. Kirim notifikasi ke siswa
            $siswa = $produk->user; 
            if ($siswa) {
                $siswa->notify(new ProdukDisetujui($produk));
            }
        }
        
        return redirect()->route('validasi.produk')
                         ->with('success', 'Status produk "' . $produk->nama_produk . '" telah disetujui. Sertifikat bernomor ' . ($produk->no_sertifikat ?? '-') . ' telah dibuat.');
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

    
        public function setujuiProduk($id)
        {
            // 1. Cari produknya
            $produk = Produk::findOrFail($id);
            
            // 2. Update status produk menjadi disetujui
            $produk->update(['status' => 'disetujui']);
            
            // 3. Otomatis buat sertifikat untuk siswa pemilik produk
            // Pastikan tabel produk punya kolom 'user_id' yang merujuk ke siswa
            Sertifikat::create([
                'produk_id'        => $produk->id,
                'user_id'          => $produk->user_id, // Siswa pemilik produk
                'nomor_sertifikat' => 'PKK-' . date('Y') . '-' . $produk->id, // Format nomor sertifikat
                'status'           => 'pending', // Menunggu proses kirim ke Credly
            ]);

            return back()->with('success', 'Produk disetujui dan sertifikat sedang diproses!');
        }
}
