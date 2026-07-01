<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ValidasiController;
use Illuminate\Http\Request;

// --- RUTE CADANGAN ---
Route::get('/login', fn () => redirect()->route('login.guru'))->name('login');

// --- RUTE PUBLIK ---
Route::get('/', fn () => view('welcome'))->name('home');
Route::get('/katalog', [ProdukController::class, 'showKatalog'])->name('katalog');
Route::get('/produk-terbaru', [ProdukController::class, 'showTerbaru'])->name('produk.terbaru');
Route::get('/about', fn () => view('about'))->name('about');
Route::get('/detail-produk/{id}', [ProdukController::class, 'showPublic'])->name('produk.detail.publik');

// --- RUTE KOMENTAR (PUBLIK) ---
Route::post('/produk/{id}/komentar', [ProdukController::class, 'storeKomentar'])->name('produk.komentar');

// --- RUTE TAMU ---
Route::middleware(['guest'])->group(function () {
    Route::get('/daftar', fn () => view('daftar'))->name('daftar');
    
    // PERBAIKAN: Penulisan ->name('proses.pilih.peran') yang benar
    Route::post('/proses-pilih-peran', function (Request $request) {
        if ($request->role === 'siswa') return redirect()->route('daftar.siswa');
        if ($request->role === 'guru') return redirect()->route('daftar.guru');
        return back()->withErrors(['role' => 'Silakan pilih peran!']);
    })->name('proses.pilih.peran');

    Route::get('/daftar-siswa', fn () => view('daftar-siswa'))->name('daftar.siswa');
    Route::get('/daftar-guru', fn () => view('daftar-guru'))->name('daftar.guru');
    Route::get('/login-siswa', fn () => view('login-siswa'))->name('login.siswa');
    Route::get('/login-guru', fn () => view('login-guru'))->name('login.guru');

    Route::post('/daftar-siswa-proses', [AuthController::class, 'registerSiswa'])->name('daftar.siswa.proses');
    Route::post('/daftar-guru-proses', [AuthController::class, 'registerGuru'])->name('daftar.guru.proses');
    Route::post('/login-siswa-proses', [AuthController::class, 'loginSiswa'])->name('login.siswa.proses');
    Route::post('/login-guru-proses', [AuthController::class, 'loginGuru'])->name('login.guru.proses');
});

// --- RUTE TERPROTEKSI ---
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard-siswa', [DashboardController::class, 'dashboardSiswa'])->name('dashboard.siswa');
    Route::get('/dashboard-guru', [DashboardController::class, 'dashboardGuru'])->name('dashboard.guru');
    
    Route::get('/notifikasi', [DashboardController::class, 'notifikasi'])->name('notifikasi');
    Route::get('/notifikasi-guru', [DashboardController::class, 'notifikasiGuru'])->name('notifikasi.guru');
    Route::post('/notifikasi/{id}', [DashboardController::class, 'hapusNotifikasi'])->name('notifikasi.hapus');

    Route::get('/pengaturan', [DashboardController::class, 'pengaturan'])->name('pengaturan');
    Route::put('/update-pengaturan', [DashboardController::class, 'updatePengaturan'])->name('pengaturan.update');
    
    Route::get('/tambah-produk', fn () => view('tambah-produk'))->name('tambah.produk');
    Route::post('/simpan-produk', [ProdukController::class, 'store'])->name('simpan.produk');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}/update', [ProdukController::class, 'update'])->name('produk.update');
    Route::post('/produk/{id}/ajukan', [ProdukController::class, 'ajukan'])->name('produk.ajukan');
    
    Route::post('/ulasan/approve/{id}', [ProdukController::class, 'approveKomentar'])->name('ulasan.approve');
    Route::delete('/ulasan/delete/{id}', [ProdukController::class, 'deleteKomentar'])->name('ulasan.delete');
    
    Route::get('/validasi-produk', [ValidasiController::class, 'index'])->name('validasi.produk');
    Route::get('/validasi-produk/{id}', [ValidasiController::class, 'show'])->name('validasi.show');
    
    // Route ini yang tadi menyebabkan error
    Route::post('/validasi-produk/{id}/update', [ValidasiController::class, 'updateStatus'])->name('validasi.updateStatus');
    
    Route::get('/histori-produk', [ValidasiController::class, 'histori'])->name('guru.histori');
});