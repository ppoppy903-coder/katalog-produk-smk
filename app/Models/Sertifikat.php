<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sertifikat extends Model
{
    use HasFactory;

    // Menentukan nama tabel jika nama model tidak persis sama dengan tabel
    protected $table = 'sertifikat';

    // Kolom apa saja yang boleh diisi (mass assignment)
    protected $fillable = [
        'produk_id',
        'user_id',
        'credly_badge_id',
        'nomor_sertifikat',
        'status',
        'diterbitkan_pada',
        'nisn',             
        'link_sertifikat', 
    ];

    // Relasi ke Produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // Relasi ke User (Siswa)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}