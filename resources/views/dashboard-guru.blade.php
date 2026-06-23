@extends('layouts.app')

@section('title', 'Dashboard Guru')

@section('content')
    <div class="mb-8 mt-6">
        <h1 class="text-2xl font-bold text-[#0A193F] mb-1">
            Halo, {{ auth()->user()->name ?? 'Pengguna' }}
        </h1>
        <p class="text-sm text-slate-500">Berikut adalah ringkasan produk yang sedang diajukan siswa.</p>
    </div>

    {{-- Kartu Ringkasan --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
            <h3 class="text-slate-500 text-sm font-bold uppercase">Produk Menunggu</h3>
            <p class="text-3xl font-bold text-[#0F2857] mt-2">{{ $jumlahPengajuan ?? 0 }}</p>
        </div>
    </div>

    {{-- Tabel Ringkasan Produk --}}
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="p-6 border-b border-slate-100 font-bold text-[#0F2857]">Daftar Pengajuan Terbaru</div>
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500">
                <tr>
                    <th class="p-4">Nama Produk</th>
                    <th class="p-4">Merek</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($produkDiajukan as $produk)
                <tr>
                    <td class="p-4 font-bold text-[#0F2857]">{{ $produk->nama_produk }}</td>
                    <td class="p-4">{{ $produk->nama_merek }}</td>
                    <td class="p-4">
                        <span class="px-2 py-1 bg-amber-50 text-amber-600 rounded text-xs font-bold uppercase">
                            {{ $produk->status }}
                        </span>
                    </td>
                    <td class="p-4">
                        {{-- Rute sudah otomatis menyesuaikan dengan prefix guru --}}
                        <a href="{{ route('validasi.show', $produk->id) }}" class="text-blue-600 font-bold hover:underline">
                            Detail
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-10 text-center text-slate-400">Tidak ada produk yang menunggu validasi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection