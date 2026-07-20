@extends('layouts.app')

@section('title', 'Validasi Produk')

@section('content')
<div class="p-6 max-w-7xl mx-auto">
    <div class="mb-8 mt-4 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-extrabold text-[#0A193F] mb-2 tracking-tight">Validasi Produk Siswa</h1>
            <p class="text-slate-500 font-medium">Tinjau dan setujui karya produk kewirausahaan yang diajukan oleh siswa.</p>
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50/50 text-slate-400 text-[10px] uppercase font-bold tracking-widest border-b border-slate-50">
                    <tr>
                        <th class="p-6">Foto</th>
                        <th class="p-6">Nama Produk</th>
                        <th class="p-6">Nama Siswa</th>
                        <th class="p-6">Institusi</th> 
                        <th class="p-6">Status</th>
                        <th class="p-6 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($produk as $item)
                    <tr class="hover:bg-indigo-50/30 transition-colors">
                        <td class="p-6">
                            @php
                                $clean = fn($p) => str_replace(['[', ']', '"', '\\', '/'], ['', '', '', '', '/'], $p);
                                $fotos = json_decode($item->foto_produk, true) ?? [$item->foto_produk];
                            @endphp
                            <img src="{{ asset('storage/'.($clean($fotos[0] ?? ''))) }}" class="w-16 h-16 object-cover rounded-2xl shadow-sm border border-slate-100">
                        </td>
                        <td class="p-6 font-bold text-[#0A193F]">{{ $item->nama_produk }}</td>
                        <td class="p-6 text-slate-600 font-medium">{{ $item->user->name ?? 'Siswa' }}</td>
                        
                        <td class="p-6">
                            <div class="font-bold text-[#0A193F]">{{ $item->nama_sekolah ?? '-' }}</div>
                            <div class="text-xs text-slate-400 font-medium">{{ $item->jurusan ?? '-' }}</div>
                        </td>

                        <td class="p-6">
                            <span class="px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider
                                {{ $item->status == 'disetujui' || $item->status == 'diterbitkan' ? 'bg-emerald-50 text-emerald-600 border border-emerald-100' : ($item->status == 'ditolak' ? 'bg-rose-50 text-rose-600 border border-rose-100' : 'bg-amber-50 text-amber-600 border border-amber-100') }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="p-6 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ url('/validasi-produk/' . $item->id) }}" class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-600 px-4 py-2 rounded-xl text-xs font-bold hover:bg-indigo-600 hover:text-white transition-all shadow-sm">
                                    Detail <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>

                                @if($item->status == 'menunggu')
                                    <form action="{{ url('/validasi-produk/' . $item->id) }}" method="POST" class="inline-flex gap-1.5">
                                        @csrf
                                        <button type="submit" name="status" value="diterbitkan" 
                                            class="bg-emerald-600 text-white px-3.5 py-2 rounded-xl text-xs font-bold hover:bg-emerald-700 transition shadow-sm"
                                            onclick="return confirm('Setujui produk ini?')">
                                            Setuju
                                        </button>
                                        <button type="submit" name="status" value="ditolak" 
                                            class="bg-rose-600 text-white px-3.5 py-2 rounded-xl text-xs font-bold hover:bg-rose-700 transition shadow-sm"
                                            onclick="return confirm('Tolak produk ini?')">
                                            Tolak
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="p-20 text-center text-slate-400 font-medium">
                            <div class="w-16 h-16 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-3 text-slate-300">
                                <i class="fa-solid fa-check-double text-2xl"></i>
                            </div>
                            <p class="text-slate-600 font-bold">Tidak ada produk yang perlu divalidasi saat ini.</p>
                            <p class="text-xs text-slate-400 mt-1">Semua pengajuan produk siswa telah selesai ditinjau.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection