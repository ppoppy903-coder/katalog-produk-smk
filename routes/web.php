<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', fn () => view('welcome'))->name('home');

// Katalog & Produk (Diperbarui agar mendukung Query String bawaan)
Route::get('/katalog', fn () => view('katalog'))->name('katalog');

// Detail Produk
Route::get('/detail-produk', fn () => view('detail-produk'))->name('produk.detail');

// Pendaftaran
Route::prefix('daftar')->group(function () {
    Route::get('/', fn () => view('daftar'))->name('daftar');
    Route::get('/detail-profil', fn () => view('detail-profil-siswa'))->name('daftar.profil');
});

// Fallback
Route::fallback(fn () => redirect('/'));