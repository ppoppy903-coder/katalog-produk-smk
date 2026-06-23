@extends('layouts.app')

@section('content')
<div class="p-8 bg-slate-50 min-h-screen">
    <div class="mb-8">
        <h2 class="text-2xl font-bold text-slate-800">Ringkasan Statistik Monitoring</h2>
        <p class="text-slate-500 text-sm">Pantau performa produk dan partisipasi sekolah secara real-time.</p>
    </div>
    
    <div class="grid grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 mb-2">TOTAL PRODUK DISETUJUI</p>
            <h2 class="text-2xl font-bold text-emerald-600">2,482</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 mb-2">SEKOLAH BERPARTISIPASI</p>
            <h2 class="text-2xl font-bold text-slate-800">1,120 SMK</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 mb-2">KATEGORI AKTIF</p>
            <h2 class="text-2xl font-bold text-slate-800">24</h2>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <p class="text-[10px] font-bold text-slate-400 mb-2">DALAM PENINJAUAN</p>
            <h2 class="text-2xl font-bold text-red-500">156</h2>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-6">
        <div class="col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 mb-4">Tren Pengajuan Produk</h3>
            <div class="h-64 border-2 border-dashed rounded-xl flex items-center justify-center text-slate-400">
                Visualisasi Grafik Interaktif
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
            <h3 class="font-bold text-slate-800 mb-4">Aktivitas Terbaru</h3>
            <div class="space-y-4">
                <div class="border-l-2 border-emerald-500 pl-4">
                    <p class="text-sm font-semibold">Admin menyetujui "Mesin CNC Mini"</p>
                    <p class="text-[10px] text-slate-400">2 menit lalu</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection