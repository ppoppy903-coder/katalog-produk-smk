<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnggotaTim extends Model
{
    // Pastikan nama tabel di database sesuai dengan yang Anda buat
    protected $table = 'anggota_tim'; 
    
    // Izinkan kolom-kolom ini diisi (mass assignment)
    protected $fillable = ['produk_id', 'nama_siswa', 'nis'];
    
    // Relasi balik ke Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}