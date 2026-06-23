<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;

class ProdukController extends Controller
{
    // MENYIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $request->validate([
            'nama_merek'   => 'required',
            'nama_produk'  => 'required',
            'logo'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'foto_produk'  => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'lokasi'       => 'required',
            'link_maps'    => 'required|url',
            'sosmed'       => 'required',
            'kategori'     => 'required',
            'nib'          => 'required',
            'tahun_nib'    => 'required|integer', // Validasi tahun_nib
        ]);

        $logoPath = $request->file('logo')->store('logos', 'public');
        $fotoPath = $request->file('foto_produk')->store('produk_images', 'public');

        DB::table('produks')->insert([
            'user_id'      => Auth::id(),
            'npsn'         => Auth::user()->npsn,
            'nama_merek'   => $request->nama_merek,
            'kategori'     => $request->kategori,
            'logo'         => $logoPath,
            'filosofi'     => $request->filosofi,
            'nib'          => $request->nib,
            'tahun_nib'    => $request->tahun_nib, // Ditambahkan
            'nama_produk'  => $request->nama_produk,
            'foto_produk'  => $fotoPath,
            'latar_belakang' => $request->latar_belakang,
            'deskripsi'    => $request->deskripsi,
            'harga'        => $request->harga,
            'lokasi'       => $request->lokasi,
            'link_maps'    => $request->link_maps,
            'sosmed'       => $request->sosmed,
            'status'       => 'draft', 
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->route('dashboard.siswa')->with('success', 'Produk berhasil disimpan sebagai draft!');
    }

    // MENAMPILKAN KATALOG PUBLIK
    public function showKatalog(Request $request) 
    {
        $kategori_filter = $request->query('kategori');
        
        $query = Produk::where('status', 'disetujui');
        
        if ($kategori_filter) {
            $query->where('kategori', 'LIKE', '%' . $kategori_filter . '%');
        }
        
        $produk_kelompok = $query->get()->groupBy('kategori');

        $kategori_list = [
            'Teknologi Konstruksi dan Properti', 'Teknologi Manufaktur dan Rekayasa', 'Energi dan Pertambangan', 
            'Teknologi Informasi', 'Kesehatan dan Pekerjaan Sosial', 'Agribisnis dan Agriteknologi', 
            'Kemaritiman', 'Bisnis dan Manajemen', 'Pariwisata', 'Seni dan Ekonomi Kreatif'
        ];
        
        return view('katalog', compact('produk_kelompok', 'kategori_filter', 'kategori_list'));
    }

    // MENAMPILKAN DETAIL PUBLIK
    public function showPublic($id)
    {
        $produk = Produk::where('id', $id)->where('status', 'disetujui')->firstOrFail();
        return view('detail-produk-publik', compact('produk'));
    }

    // MENAMPILKAN FORM EDIT
    public function edit($id)
    {
        $produk = DB::table('produks')->where('id', $id)->where('user_id', Auth::id())->first();
        if (!$produk) return redirect()->route('dashboard.siswa')->withErrors('Produk tidak ditemukan!');
        return view('edit-produk', compact('produk'));
    }

    // MEMPERBARUI PRODUK
    public function update(Request $request, $id)
    {
        $produk = DB::table('produks')->where('id', $id)->where('user_id', Auth::id())->first();
        if (!$produk) return redirect()->route('dashboard.siswa')->withErrors('Akses ditolak!');

        $data = [
            'nama_merek'     => $request->nama_merek,
            'kategori'       => $request->kategori,
            'filosofi'       => $request->filosofi,
            'nib'            => $request->nib,
            'tahun_nib'      => $request->tahun_nib, // Ditambahkan
            'nama_produk'    => $request->nama_produk,
            'latar_belakang' => $request->latar_belakang,
            'deskripsi'      => $request->deskripsi,
            'harga'          => $request->harga,
            'lokasi'         => $request->lokasi,
            'link_maps'      => $request->link_maps,
            'sosmed'         => $request->sosmed,
            'updated_at'     => now(),
        ];

        if ($request->hasFile('logo')) {
            if ($produk->logo) Storage::disk('public')->delete($produk->logo);
            $data['logo'] = $request->file('logo')->store('logos', 'public');
        }
        
        if ($request->hasFile('foto_produk')) {
            if ($produk->foto_produk) Storage::disk('public')->delete($produk->foto_produk);
            $data['foto_produk'] = $request->file('foto_produk')->store('produk_images', 'public');
        }

        DB::table('produks')->where('id', $id)->update($data);

        return redirect()->route('dashboard.siswa')->with('success', 'Perubahan produk berhasil disimpan!');
    }

    // MENGAJUKAN PRODUK KE GURU
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
}