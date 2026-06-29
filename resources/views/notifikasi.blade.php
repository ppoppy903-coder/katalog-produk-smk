@extends('layouts.app')
@section('title', 'Pusat Notifikasi')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-3xl font-extrabold text-[#0A193F] mb-8">Pusat Notifikasi Produk</h2>
    
    <div class="space-y-6">
        @forelse($notifikasiProduk as $produk)
            {{-- Kartu Notifikasi Modern --}}
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 flex items-start gap-5">
                
                {{-- Ikon Status --}}
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-2xl 
                    {{ in_array($produk->status, ['diterbitkan', 'disetujui']) ? 'bg-emerald-50 text-emerald-600' : 'bg-red-50 text-red-600' }}">
                    <i class="fa-solid {{ in_array($produk->status, ['diterbitkan', 'disetujui']) ? 'fa-circle-check' : 'fa-circle-xmark' }} text-xl"></i>
                </div>
                
                <div class="flex-1">
                    <p class="text-slate-800 font-medium leading-relaxed">
                        Pengajuan produk <strong class="text-[#0A193F]">{{ $produk->nama_produk }}</strong> Anda telah 
                        <span class="font-bold px-2 py-0.5 rounded-md {{ in_array($produk->status, ['diterbitkan', 'disetujui']) ? 'text-emerald-700 bg-emerald-50' : 'text-red-700 bg-red-50' }}">
                            {{ ucfirst($produk->status) }}
                        </span>.
                    </p>
                    <div class="mt-2 flex items-center text-xs font-bold text-slate-400 uppercase tracking-wider">
                        <i class="fa-regular fa-clock mr-1.5"></i> {{ $produk->updated_at->diffForHumans() }}
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-200">
                <i class="fa-solid fa-bell-slash text-4xl text-slate-300 mb-4 block"></i>
                <p class="font-semibold text-slate-400">Belum ada update status produk.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection