@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
    <div class="mb-8 mt-4">
        <h1 class="text-4xl font-extrabold text-[#0A193F] mb-2 tracking-tight">
            Halo, {{ auth()->user()->name ?? 'Pengguna' }} 👋
        </h1>
        <p class="text-slate-500 font-medium">Pantau dan kelola pengajuan produk siswa Anda di sini.</p>
    </div>

    {{-- Kartu Ringkasan Modern dengan Gradasi --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
        <div class="bg-gradient-to-br from-indigo-600 to-violet-600 p-8 rounded-3xl shadow-xl shadow-indigo-200 text-white transform hover:scale-[1.02] transition-transform">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-white/20 rounded-2xl flex items-center justify-center">
                    <i class="fa-solid fa-box-open text-xl"></i>
                </div>
                <div>
                    <h3 class="text-indigo-100 text-[10px] font-bold uppercase tracking-widest">Produk Menunggu</h3>
                    <p class="text-4xl font-extrabold">{{ $jumlahPengajuan ?? 0 }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Ringkasan Produk --}}
    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="p-8 border-b border-slate-50 flex items-center justify-between">
            <h2 class="font-extrabold text-[#0A193F] text-lg">Daftar Pengajuan Terbaru</h2>
            <span class="px-3 py-1 bg-indigo-50 text-indigo-600 rounded-full text-[10px] font-bold uppercase">Update Terbaru</span>
        </div>
        
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
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="p-6 font-bold text-[#0A193F]">{{ $produk->nama_produk }}</td>
                        <td class="p-6 text-slate-600 font-medium">{{ $produk->nama_merek }}</td>
                        <td class="p-6">
                            <span class="px-3 py-1 bg-amber-100 text-amber-700 rounded-lg text-[10px] font-bold uppercase tracking-wider">
                                {{ $produk->status }}
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <a href="{{ route('validasi.show', $produk->id) }}" class="inline-flex items-center gap-2 bg-indigo-100 text-indigo-600 px-4 py-2 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition-all">
                                Detail <i class="fa-solid fa-arrow-right text-[10px]"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-16 text-center text-slate-400 font-medium">
                            <div class="text-4xl mb-3 opacity-20">📦</div>
                            Tidak ada produk yang menunggu validasi.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection