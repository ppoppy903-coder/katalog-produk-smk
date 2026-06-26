@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    {{-- Header --}}
    <div class="bg-blue-900 text-white p-8 rounded-2xl mb-8 shadow-lg">
        <h1 class="text-3xl font-bold">Detail Produk</h1>
    </div>

    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- Bagian Kiri --}}
            <div class="md:col-span-1 space-y-6">
                <div class="bg-slate-50 p-6 rounded-xl text-center border border-slate-100">
                    <img src="{{ asset('storage/'.$produk->logo) }}" class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-white shadow-sm">
                    <h3 class="font-bold text-lg text-slate-800">{{ $produk->nama_merek }}</h3>
                </div>
                
                {{-- Informasi Legalitas --}}
                <div class="bg-slate-50 p-6 rounded-xl border border-slate-100">
                    <h4 class="font-bold text-slate-800 mb-3 border-b pb-2">Informasi Legalitas</h4>
                    <p class="text-xs text-slate-500 font-bold uppercase">NIB</p>
                    <p class="text-sm text-slate-700 mb-2">{{ $produk->nib ?? '-' }}</p>
                    
                    <p class="text-xs text-slate-500 font-bold uppercase">Tahun NIB</p>
                    <p class="text-sm text-slate-700">{{ $produk->tahun_nib ?? '-' }}</p>
                </div>

                <div class="bg-slate-50 p-6 rounded-xl border border-slate-100">
                    <h4 class="font-bold text-slate-800 mb-2">Filosofi</h4>
                    <p class="text-sm text-slate-600 italic">"{{ $produk->filosofi }}"</p>
                </div>
            </div>

            {{-- Bagian Kanan --}}
            <div class="md:col-span-2 space-y-6">
                <div>
                    <span class="text-emerald-600 font-bold text-xs uppercase">{{ $produk->kategori }}</span>
                    <h2 class="text-3xl font-extrabold text-[#0A193F]">{{ $produk->nama_produk }}</h2>
                </div>

                <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-inner">
                    <img src="{{ asset('storage/'.$produk->foto_produk) }}" class="w-full h-64 object-cover" alt="Foto Produk">
                </div>

                <div>
                    <h4 class="font-bold text-slate-800">Latar Belakang</h4>
                    <p class="text-slate-600">{{ $produk->latar_belakang }}</p>
                </div>

                <div>
                    <h4 class="font-bold text-slate-800">Deskripsi</h4>
                    <p class="text-slate-600">{{ $produk->deskripsi }}</p>
                </div>

                {{-- Grid Informasi --}}
                <div class="bg-blue-50 p-6 rounded-xl grid grid-cols-2 gap-6">
                    <div>
                        <h5 class="text-[10px] uppercase font-bold text-blue-800">Harga</h5>
                        <p class="text-blue-900 font-bold">{{ $produk->harga }}</p>
                    </div>
                    <div>
                        <h5 class="text-[10px] uppercase font-bold text-blue-800">Lokasi</h5>
                        <p class="text-blue-900 font-bold">{{ $produk->lokasi }}</p>
                    </div>
                    <div>
                        <h5 class="text-[10px] uppercase font-bold text-blue-800">Maps</h5>
                        <a href="{{ $produk->link_maps }}" target="_blank" class="text-blue-600 font-bold underline">Lihat Lokasi</a>
                    </div>
                    <div>
                        <h5 class="text-[10px] uppercase font-bold text-blue-800">Sosmed</h5>
                        <p class="text-blue-900 font-bold">{{ $produk->sosmed }}</p>
                    </div>
                </div>

                <a href="https://wa.me/{{ $produk->user->no_hp ?? '' }}" target="_blank" 
                class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Hubungi Penjual via WhatsApp →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection