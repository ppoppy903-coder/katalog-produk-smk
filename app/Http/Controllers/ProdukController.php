<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Produk;

class ProdukController extends Controller
{
    // MENYIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama_merek'     => 'required',
            'nama_produk'    => 'required',
            'logo'           => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_produk'    => 'required',
            'foto_produk.*'  => 'image|mimes:jpeg,png,jpg|max:2048',
            'foto_tim'       => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lokasi'         => 'required',
            'link_maps'      => 'required|url',
            'sosmed'         => 'required',
            'kategori'       => 'required',
            'nib'            => 'required_if:tampilkan_nib,1',         
            'tahun_nib'      => 'required|integer',
            'nama_sekolah'   => 'required',
            'jurusan'        => 'required',
        ]);

        // 1. Proses Upload Logo
        $logoPath = $request->file('logo')->store('logos', 'public');

        // 2. Proses Multi-upload Foto Produk (Looping Array)
        $fotoPaths = [];
        if ($request->hasFile('foto_produk')) {
            foreach ($request->file('foto_produk') as $file) {
                $fotoPaths[] = $file->store('produk_images', 'public');
            }
        }

        // 3. Proses Upload Foto Tim Bersama
        $fotoTimPath = $request->file('foto_tim')->store('tim_images', 'public');

        // 4. Insert ke Database
        DB::table('produks')->insert([
            'user_id'        => Auth::id(),
            'nama_merek'     => $request->nama_merek,
            'kategori'       => $request->kategori,
            'logo'           => $logoPath,
            'filosofi'       => $request->filosofi,
            'nib'            => $request->nib,
            'tahun_nib'      => $request->tahun_nib,
            'tampilkan_nib'  => $request->has('tampilkan_nib') ? 1 : 0,
            'nama_produk'    => $request->nama_produk,
            'foto_produk'    => json_encode($fotoPaths), // Disimpan sebagai JSON
            'latar_belakang' => $request->latar_belakang,
            'deskripsi'      => $request->deskripsi,
            'harga'          => $request->harga,
            'lokasi'         => $request->lokasi,
            'link_maps'      => $request->link_maps,
            'sosmed'         => $request->sosmed,
            'nama_sekolah'   => $request->nama_sekolah,
            'jurusan'        => $request->jurusan,
            'foto_tim'       => $fotoTimPath,
            'status'         => 'draft', 
            'created_at'     => now(),
            'updated_at'     => now(),
        ]);

        return redirect()->route('dashboard.siswa')->with('success', 'Produk berhasil disimpan sebagai draft!');
    }

    public function showKatalog(Request $request) 
    {
        $kategori_filter = $request->query('kategori');
        $search = $request->query('search');
        
        // Gunakan query builder dasar
        $query = Produk::where('status', 'disetujui');
        
        // Filter Kategori
        if ($kategori_filter) {
            $query->where('kategori', $kategori_filter);
        }

        // Filter Pencarian
        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('nama_produk', 'LIKE', '%' . $search . '%')
                ->orWhere('nama_merek', 'LIKE', '%' . $search . '%')
                ->orWhere('deskripsi', 'LIKE', '%' . $search . '%')
                ->orWhere('nama_sekolah', 'LIKE', '%' . $search . '%');
            });
        }
        
        $produk_kelompok = $query->get()->groupBy('kategori');

        return view('katalog', compact('produk_kelompok'));
    }

    // MENAMPILKAN PRODUK TERBARU
    public function showTerbaru()
    {
        $produk_terbaru = Produk::where('status', 'disetujui')
                                ->orderBy('created_at', 'desc')
                                ->paginate(8); 

        return view('produk-terbaru', compact('produk_terbaru'));
    }

    // MENAMPILKAN DETAIL PUBLIK
    public function showPublic($id)
    {
        $produk = Produk::where('id', $id)->where('status', 'disetujui')->firstOrFail();
        return view('detail-produk-publik', compact('produk'));
    }

    // MENYIMPAN KOMENTAR & RATING DENGAN MODERASI
    public function storeKomentar(Request $request, $id) 
    {
        $request->validate([
            'nama' => 'required|string',
            'komentar' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $produk = Produk::findOrFail($id);
        $rating = $request->rating;
        
        $status = ($rating >= 3) ? 'disetujui' : 'pending';
        
        DB::table('komentars')->insert([
            'produk_id' => $id,
            'nama_pengunjung' => $request->nama,
            'komentar' => $request->komentar,
            'rating' => $rating,
            'status' => $status,
            'created_at' => now(),
        ]);

        if ($status == 'pending') {
            DB::table('notifications')->insert([
                'id' => Str::uuid(), 
                'type' => 'App\Notifications\ModerasiUlasan', 
                'notifiable_type' => 'App\Models\User', 
                'notifiable_id' => $produk->user_id, 
                'data' => json_encode([
                    'pesan' => "Ada ulasan baru untuk produk '{$produk->nama_produk}' dengan rating rendah ({$rating} bintang). Perlu moderasi."
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return back()->with('success', 'Ulasan berhasil dikirim!');
    }

    public function edit($id)
    {
        // Menggunakan Model \App\Models\Produk, BUKAN DB::table
        $produk = \App\Models\Produk::with('anggotaTim')->where('id', $id)->where('user_id', Auth::id())->first();
        
        if (!$produk) return redirect()->route('dashboard.siswa')->withErrors('Produk tidak ditemukan!');
        
        return view('edit-produk', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = DB::table('produks')->where('id', $id)->where('user_id', Auth::id())->first();
        if (!$produk) return redirect()->route('dashboard.siswa')->withErrors('Akses ditolak!');

        $data = [
            'nama_merek'     => $request->nama_merek,
            'kategori'       => $request->kategori,
            'filosofi'       => $request->filosofi,
            'nib'            => $request->nib,
            'tahun_nib'      => $request->tahun_nib,
            'tampilkan_nib'  => $request->has('tampilkan_nib') ? 1 : 0,
            'nama_produk'    => $request->nama_produk,
            'latar_belakang' => $request->latar_belakang,
            'deskripsi'      => $request->deskripsi,
            'harga'          => $request->harga,
            'lokasi'         => $request->lokasi,
            'link_maps'      => $request->link_maps,
            'sosmed'         => $request->sosmed,
            'no_wa'          => $request->no_wa, // TAMBAHKAN BARIS INI
            'updated_at'     => now(),
        ];

        if ($request->hasFile('logo')) {
            if ($produk->logo) Storage::disk('public')->delete($produk->logo);
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        
        // Catatan: Jika update foto produk, logic-nya harus disesuaikan dengan json_decode/encode juga.
        if ($request->hasFile('foto_produk')) {
            if ($produk->foto_produk) {
                $oldPhotos = json_decode($produk->foto_produk);
                foreach ($oldPhotos as $oldPhoto) Storage::disk('public')->delete($oldPhoto);
            }
            $newPhotos = [];
            foreach ($request->file('foto_produk') as $file) $newPhotos[] = $file->store('produk_images', 'public');
            $data['foto_produk'] = json_encode($newPhotos);
        }

        DB::table('produks')->where('id', $id)->update($data);

        return redirect()->route('dashboard.siswa')->with('success', 'Perubahan produk berhasil disimpan!');
    }

    public function ajukan($id)
    {
        $produk = DB::table('produks')->where('id', $id)->where('user_id', Auth::id())->first();
        if (!$produk) return redirect()->route('dashboard.siswa')->withErrors('Akses ditolak!');

        DB::table('produks')->where('id', $id)->update([
            'status' => 'menunggu',
            'updated_at' => now(),
        ]);
        
        return redirect()->route('dashboard.siswa')->with('success', 'Produk berhasil diajukan ke Guru Pembimbing!');
    }

    public function approveKomentar($id) {
        DB::table('komentars')->where('id', $id)->update(['status' => 'disetujui']);
        return back()->with('success', 'Ulasan berhasil dipublikasikan!');
    }

    public function deleteKomentar($id) {
        DB::table('komentars')->where('id', $id)->delete();
        return back()->with('success', 'Ulasan berhasil dihapus.');
    }

    public function searchAutocomplete(Request $request)
    {
    $search = $request->get('term'); // 'term' adalah keyword yang diketik user
    $result = Produk::where('status', 'disetujui')
                ->where(function($q) use ($search) {
                    $q->where('nama_produk', 'LIKE', '%' . $search . '%')
                      ->orWhere('nama_merek', 'LIKE', '%' . $search . '%');
                })
                ->limit(5) // Batasi hanya 5 hasil agar tidak terlalu panjang ke bawah
                ->get();
                
    return response()->json($result);
    }
}