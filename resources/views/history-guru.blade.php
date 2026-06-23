@extends('layouts.app')

@section('title', 'Histori Validasi Produk')

@section('content')
<div class="p-8">
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-2xl font-bold text-blue-900">Histori Validasi Produk</h2>
            <p class="text-slate-500 text-sm">Rekam jejak produk yang telah disetujui atau ditolak.</p>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('validasi.produk') }}" class="px-4 py-2 bg-white border border-slate-300 text-slate-700 rounded-lg hover:bg-slate-50 transition text-sm font-semibold">
                <i class="fa-solid fa-arrow-left mr-2"></i> Kembali ke Validasi
            </a>
        </div>
    </div>
    
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="bg-slate-50 border-b border-slate-200">
                    <tr>
                        <th class="p-5 font-bold text-slate-700">Nama Produk</th>
                        <th class="p-5 font-bold text-slate-700">Nama Merek</th>
                        <th class="p-5 font-bold text-slate-700">Siswa</th>
                        <th class="p-5 font-bold text-slate-700 text-center">Status Keputusan</th>
                        <th class="p-5 font-bold text-slate-700 text-right">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($histori as $p)
                    <tr class="hover:bg-slate-50 transition-colors duration-150">
                        <td class="p-5 font-bold text-blue-900">{{ $p->nama_produk }}</td>
                        <td class="p-5 text-slate-600">{{ $p->nama_merek }}</td>
                        <td class="p-5 text-slate-600">{{ $p->user->name ?? 'Siswa Tidak Diketahui' }}</td>
                        <td class="p-5 text-center">
                            @if($p->status == 'disetujui')
                                <span class="px-3 py-1 bg-green-100 text-green-700 rounded-full text-[10px] font-bold uppercase tracking-wider flex items-center justify-center w-max mx-auto">
                                    <i class="fa-solid fa-check mr-1.5"></i> Disetujui
                                </span>
                            @else
                                <span class="px-3 py-1 bg-red-100 text-red-700 rounded-full text-[10px] font-bold uppercase tracking-wider flex items-center justify-center w-max mx-auto">
                                    <i class="fa-solid fa-xmark mr-1.5"></i> Ditolak
                                </span>
                            @endif
                        </td>
                        <td class="p-5 text-slate-500 text-right text-xs">
                            {{ $p->updated_at->format('d M Y') }}<br>
                            <span class="text-slate-400">{{ $p->updated_at->format('H:i') }}</span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center text-slate-400">
                            <div class="flex flex-col items-center">
                                <i class="fa-solid fa-folder-open text-4xl mb-4 text-slate-300"></i>
                                <p>Belum ada data histori validasi yang tersedia.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection