<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil jumlah data yang sebenarnya dari database
        $totalUser = \App\Models\User::count();
        $totalSertifikat = \App\Models\Sertifikat::count(); // Pastikan model Sertifikat sudah ada
        $dataPending = \App\Models\Produk::where('status', 'pending')->count(); // Contoh logika data pending

        return view('admin.dashboard', compact('totalUser', 'totalSertifikat', 'dataPending'));
    }

    public function dataUser()
    {
        $users = \App\Models\User::all(); // Mengambil semua user
        return view('admin.data-user', compact('users'));
    }
}