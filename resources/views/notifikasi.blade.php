@extends('layouts.app')
@section('title', 'Pusat Notifikasi')

@section('content')
<div class="max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-[#0A193F] mb-6">Pusat Notifikasi Produk</h2>
    
    <div class="space-y-4">
        @forelse($notifikasiProduk as $produk)
            {{-- Kita atur warna berdasarkan status: Hijau untuk diterbitkan/disetujui, Merah untuk ditolak --}}
            <div class="bg-white p-5 rounded-2xl border-l-4 {{ in_array($produk->status, ['diterbitkan', 'disetujui']) ? 'border-emerald-500' : 'border-red-500' }} shadow-sm flex items-start gap-4">
                
                {{-- Ikon: Centang hijau untuk sukses, silang merah untuk ditolak --}}
                <i class="fa-solid {{ in_array($produk->status, ['diterbitkan', 'disetujui']) ? 'fa-circle-check text-emerald-500' : 'fa-circle-xmark text-red-500' }} text-xl mt-1"></i>
                
                <div class="flex-1">
                    <p class="text-slate-800 font-medium">
                        Pengajuan produk <strong>{{ $produk->nama_produk }}</strong> Anda telah 
                        <span class="font-bold {{ in_array($produk->status, ['diterbitkan', 'disetujui']) ? 'text-emerald-600' : 'text-red-600' }}">
                            {{ ucfirst($produk->status) }}
                        </span>.
                    </p>
                    <small class="text-slate-400">{{ $produk->updated_at->diffForHumans() }}</small>
                </div>
            </div>
        @empty
            <div class="text-center py-20 text-slate-400">
                <i class="fa-solid fa-bell-slash text-4xl mb-4 block"></i>
                <p>Belum ada update status produk.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection