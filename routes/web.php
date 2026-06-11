<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/katalog', function () {
    return view('katalog');
});

Route::get('/daftar', function () {
    return view('daftar');
});

Route::get('/daftar/detail-profil', function () {
    return view('detail-profil-siswa');
});

Route::get('/detail-produk', function () {
    return view('detail-produk');
});