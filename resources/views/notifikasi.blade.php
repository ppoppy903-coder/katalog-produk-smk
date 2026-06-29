@extends('layouts.app')
@section('title', 'Pusat Notifikasi')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-3xl font-extrabold text-[#0A193F] mb-8">Pusat Notifikasi</h2>
    
    <div class="space-y-6">
        {{-- BAGIAN 1: NOTIFIKASI STATUS PRODUK --}}
        @forelse($notifikasiProduk as $produk)
            @php
                $isSuccess = in_array(strtolower($produk->status), ['diterbitkan', 'disetujui', 'diterima']);
                $isRejected = in_array(strtolower($produk->status), ['ditolak', 'dikembalikan']);
            @endphp
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-lg transition-all duration-300 flex items-start gap-5">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-2xl 
                    {{ $isSuccess ? 'bg-emerald-50 text-emerald-600' : ($isRejected ? 'bg-red-50 text-red-600' : 'bg-amber-50 text-amber-600') }}">
                    <i class="fa-solid {{ $isSuccess ? 'fa-circle-check' : ($isRejected ? 'fa-circle-xmark' : 'fa-circle-info') }} text-xl"></i>
                </div>
                <div class="flex-1">
                    <p class="text-slate-800 font-medium leading-relaxed">
                        Pengajuan produk <strong class="text-[#0A193F]">{{ $produk->nama_produk ?? 'Produk Tanpa Nama' }}</strong> Anda telah 
                        <span class="font-bold px-2 py-0.5 rounded-md 
                            {{ $isSuccess ? 'text-emerald-700 bg-emerald-50' : ($isRejected ? 'text-red-700 bg-red-50' : 'text-amber-700 bg-amber-50') }}">
                            {{ ucfirst($produk->status) }}
                        </span>.
                    </p>
                    <div class="mt-2 flex items-center text-xs font-bold text-slate-400 uppercase tracking-wider">
                        <i class="fa-regular fa-clock mr-1.5"></i> {{ $produk->updated_at ? $produk->updated_at->diffForHumans() : 'Baru saja' }}
                    </div>
                </div>
            </div>
        @empty
            {{-- Tidak ada notif produk --}}
        @endforelse

        {{-- BAGIAN 2: NOTIFIKASI ULASAN (MODERASI) --}}
        @foreach($notifikasiUlasan as $ulasan)
            <div class="bg-amber-50 p-6 rounded-3xl border border-amber-200 shadow-sm hover:shadow-md transition-all duration-300 flex items-start gap-5">
                <div class="w-12 h-12 flex-shrink-0 flex items-center justify-center rounded-2xl bg-amber-100 text-amber-600">
                    <i class="fa-solid fa-star text-xl"></i>
                </div>
                <div class="flex-1">
                    <p class="text-slate-800 font-medium leading-relaxed">
                        Ada ulasan baru untuk produk <strong>{{ $ulasan->nama_produk }}</strong> dengan rating rendah. Perlu moderasi.
                    </p>
                    <a href="{{ route('dashboard.siswa') }}" class="text-xs font-bold text-amber-700 underline mt-2 block hover:text-amber-900">
                        Lihat Ulasan di Dashboard
                    </a>
                </div>
            </div>
        @endforeach

        {{-- JIKA KEDUANYA KOSONG --}}
        @if($notifikasiProduk->isEmpty() && $notifikasiUlasan->isEmpty())
            <div class="text-center py-20 bg-white rounded-3xl border border-dashed border-slate-200">
                <i class="fa-solid fa-bell-slash text-4xl text-slate-300 mb-4 block"></i>
                <p class="font-semibold text-slate-400">Belum ada update status atau notifikasi baru.</p>
            </div>
        @endif
    </div>
</div>
@endsection