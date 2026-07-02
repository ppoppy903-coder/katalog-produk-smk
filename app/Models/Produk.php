<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AnggotaTim;

class Produk extends Model
{
    // Pastikan tabel di database bernama 'produks'
    protected $table = 'produks';
    protected $guarded = [];

    // Izinkan kolom-kolom ini untuk diisi (Mass Assignment)
    protected $fillable = [
        'user_id',
        'npsn',
        'nama_merek',
        'kategori', 
        'logo',
        'filosofi',
        'nib',
        'tahun_nib',
        'nama_produk',
        'foto_produk',
        'latar_belakang',
        'deskripsi',
        'harga',
        'lokasi',
        'link_maps',
        'sosmed',
        'status'
    ];

    /**
     * Relasi ke User (Satu produk dimiliki oleh satu siswa)
     * Digunakan untuk mengambil data pemilik produk (termasuk nomor HP)
     */
    public function user() 
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    /**
     * Relasi ke Komentar (Satu produk bisa memiliki banyak komentar)
     * Digunakan untuk menampilkan daftar ulasan pada detail produk
     */
    public function komentars()
    {
        return $this->hasMany(Komentar::class, 'produk_id');
    }

    // Relasi ke tabel anggota_tim
    public function anggotaTim()
    {
        return $this->hasMany(AnggotaTim::class, 'produk_id', 'id');
    }
}