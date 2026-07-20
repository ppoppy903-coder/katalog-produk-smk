@extends('layouts.app')

@section('title', 'Histori Validasi Produk')

@section('content')
<div class="p-6 max-w-7xl mx-auto">
    {{-- Header Section --}}
    <div class="mb-8 mt-4 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-[#0A193F] mb-2 tracking-tight">Histori Validasi Produk</h1>
            <p class="text-slate-500 font-medium">Rekam jejak dan arsip produk yang telah disetujui atau ditolak.</p>
        </div>
        <div>
            <a href="{{ route('validasi.produk') }}" class="inline-flex items-center gap-2 bg-white border border-slate-200 text-slate-700 px-5 py-2.5 rounded-2xl hover:bg-slate-50 transition-all text-xs font-bold shadow-sm">
                <i class="fa-solid fa-arrow-left"></i> Kembali ke Validasi
            </a>
        </div>
    </div>
    
    {{-- Tabel Histori Modern --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50/50 border-b border-slate-50 text-slate-400 text-[10px] uppercase font-bold tracking-widest">
                    <tr>
                        <th class="p-6">Nama Produk</th>
                        <th class="p-6">Nama Merek</th>
                        <th class="p-6">Siswa</th>
                        <th class="p-6 text-center">Status Keputusan</th>
                        <th class="p-6 text-right">Tanggal & Waktu</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($histori as $p)
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="p-6 font-bold text-[#0A193F]">{{ $p->nama_produk }}</td>
                        <td class="p-6 text-slate-600 font-medium">{{ $p->nama_merek }}</td>
                        <td class="p-6 text-slate-600 font-medium">{{ $p->user->name ?? 'Siswa Tidak Diketahui' }}</td>
                        <td class="p-6 text-center">
                            @if($p->status == 'disetujui' || $p->status == 'diterbitkan')
                                <span class="px-3.5 py-1.5 bg-emerald-50 text-emerald-600 border border-emerald-100 rounded-full text-[10px] font-bold uppercase tracking-wider inline-flex items-center gap-1.5">
                                    <i class="fa-solid fa-check text-[10px]"></i> Disetujui
                                </span>
                            @else
                                <span class="px-3.5 py-1.5 bg-rose-50 text-rose-600 border border-rose-100 rounded-full text-[10px] font-bold uppercase tracking-wider inline-flex items-center gap-1.5">
                                    <i class="fa-solid fa-xmark text-[10px]"></i> Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="p-6 text-slate-500 text-right text-xs font-medium">
                            <span class="text-slate-700 font-semibold">{{ $p->updated_at->format('d M Y') }}</span><br>
                            <span class="text-slate-400 text-[11px]">{{ $p->updated_at->format('H:i') }} WIB</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-20 text-center text-slate-400">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 text-slate-300">
                                <i class="fa-solid fa-folder-open text-2xl"></i>
                            </div>
                            <p class="text-slate-600 font-bold">Belum ada data histori validasi yang tersedia.</p>
                            <p class="text-xs text-slate-400 mt-1">Keputusan produk yang telah diproses akan muncul di sini.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection