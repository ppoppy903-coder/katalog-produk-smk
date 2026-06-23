@extends('layouts.app')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-slate-800">Monitoring Produk Terbit</h2>
            <p class="text-slate-500">Kelola dan pantau detail produk vokasi yang telah disetujui di seluruh Indonesia.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-emerald-400 text-white px-6 py-2 rounded-lg font-medium"> + Tambah Produk </button>
            <button class="border border-slate-200 bg-white px-6 py-2 rounded-lg font-medium"> Export Report </button>
        </div>
    </div>

    <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border shadow-sm">
            <p class="text-[10px] font-bold text-slate-400">TOTAL PRODUK DISETUJUI</p>
            <h2 class="text-2xl font-bold text-slate-800">2,482</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border shadow-sm">
            <p class="text-[10px] font-bold text-slate-400">SEKOLAH BERPARTISIPASI</p>
            <h2 class="text-2xl font-bold text-slate-800">1,120</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border shadow-sm">
            <p class="text-[10px] font-bold text-slate-400">KATEGORI AKTIF</p>
            <h2 class="text-2xl font-bold text-slate-800">24</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border shadow-sm">
            <p class="text-[10px] font-bold text-slate-400">DALAM PENINJAUAN</p>
            <h2 class="text-2xl font-bold text-slate-800">156</h2>
        </div>
    </div>

    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-400 text-xs uppercase">
                <tr>
                    <th class="p-6">Produk & ID</th>
                    <th class="p-6">Asal Sekolah</th>
                    <th class="p-6">Kategori</th>
                    <th class="p-6">Preview Deskripsi</th>
                    <th class="p-6">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr>
                    <td class="p-6">
                        <p class="font-bold">Smart IoT Controller V2</p>
                        <p class="text-xs text-slate-400">ID: PRD-9921-X</p>
                    </td>
                    <td class="p-6">
                        <p class="font-semibold">SMKN 1 Jakarta</p>
                    </td>
                    <td class="p-6">
                        <span class="bg-emerald-50 text-emerald-600 px-3 py-1 rounded-full text-xs">Elektronika</span>
                    </td>
                    <td class="p-6 text-sm text-slate-600">Sistem kontrol rumah pintar...</td>
                    <td class="p-6 text-blue-500 font-bold cursor-pointer">Edit</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection