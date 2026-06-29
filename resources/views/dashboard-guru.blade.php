@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
    <div class="mb-10 mt-6">
        <h1 class="text-3xl font-extrabold text-[#0A193F] mb-2">
            Halo, {{ auth()->user()->name ?? 'Pengguna' }}
        </h1>
        <p class="text-slate-500 font-medium">Berikut adalah ringkasan produk yang sedang diajukan siswa.</p>
    </div>

    {{-- Kartu Ringkasan Modern --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-white p-8 rounded-3xl border border-slate-100 shadow-sm hover:shadow-md transition-all">
            <h3 class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Produk Menunggu</h3>
            <p class="text-4xl font-extrabold text-[#0A193F] mt-3">{{ $jumlahPengajuan ?? 0 }}</p>
        </div>
    </div>

    {{-- Tabel Ringkasan Produk Modern --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50 font-extrabold text-[#0A193F] text-lg">Daftar Pengajuan Terbaru</div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead class="bg-slate-50/50 text-slate-400 text-[10px] uppercase font-bold tracking-widest">
                    <tr>
                        <th class="p-6">Nama Produk</th>
                        <th class="p-6">Merek</th>
                        <th class="p-6">Status</th>
                        <th class="p-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($produkDiajukan as $produk)
                    <tr class="hover:bg-slate-50/50 transition-colors">
                        <td class="p-6 font-bold text-[#0A193F]">{{ $produk->nama_produk }}</td>
                        <td class="p-6 text-slate-600 font-medium">{{ $produk->nama_merek }}</td>
                        <td class="p-6">
                            <span class="px-3 py-1 bg-amber-50 text-amber-700 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                {{ $produk->status }}
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <a href="{{ route('validasi.show', $produk->id) }}" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:text-blue-800 transition">
                                Detail <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-16 text-center text-slate-400 font-medium">
                            <i class="fa-solid fa-box-open text-3xl mb-3 block opacity-50"></i>
                            Tidak ada produk yang menunggu validasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection