<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    // Pastikan tabel di database bernama 'produks'
    protected $table = 'produks';

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
     * Kita menggunakan App\Models\User untuk memastikan namespace benar
     */
    public function user() 
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}