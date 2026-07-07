<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Sertifikat; // Pastikan model ini di-import
use Illuminate\Support\Facades\Auth;

class SertifikatController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $nisAlya = \DB::table('anggota_tim')
                        ->where('nama_siswa', $user->name)
                        ->value('nis');
        
        $produk = \App\Models\Produk::where('status', 'disetujui')
            ->where(function ($query) use ($user, $nisAlya) {
                $query->where('user_id', $user->id)
                    ->orWhereHas('anggotaTim', function ($q) use ($nisAlya) {
                        $q->where('nis', (string)$nisAlya);
                    });
            })->get();

        return view('sertifikat.index', compact('produk'));
    }

    public function download($id)
    {
        // Logika download sertifikat bisa dikembangkan di sini
        return "Berhasil mengakses unduhan untuk produk ID: " . $id;
    }

    public function importSertifikatJson(Request $request)
    {
        $request->validate([
            'data' => 'required|array',
        ]);

        foreach ($request->data as $item) {
            // Memastikan data yang diimport benar-benar ada
            if (isset($item['nisn']) && isset($item['link_sertifikat'])) {
                Sertifikat::updateOrCreate(
                    ['nisn' => $item['nisn']],
                    ['link_sertifikat' => $item['link_sertifikat']]
                );
            }
        }

        return response()->json(['message' => 'Sertifikat berhasil diupdate!'], 200);
    }
}