@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    <div class="bg-blue-900 text-white p-8 rounded-2xl mb-8 shadow-lg">
        <h1 class="text-3xl font-bold">Detail Produk Kreatif</h1>
    </div>

    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
            {{-- Sisi Kiri: Logo --}}
            <div class="md:col-span-1 space-y-6">
                <div class="bg-slate-50 p-6 rounded-xl text-center border border-slate-100">
                    <img src="{{ asset('storage/'.$produk->logo) }}" class="w-32 h-32 mx-auto rounded-full object-cover mb-4 border-4 border-white shadow-sm">
                    <h3 class="font-bold text-lg text-slate-800">{{ $produk->nama_merek }}</h3>
                </div>
                <div class="bg-slate-50 p-6 rounded-xl border border-slate-100">
                    <h4 class="font-bold text-slate-800 mb-2">Filosofi Logo</h4>
                    <p class="text-sm text-slate-600 italic">"{{ $produk->filosofi }}"</p>
                </div>
            </div>

            {{-- Sisi Kanan: Detail --}}
            <div class="md:col-span-2 space-y-6">
                <div>
                    <span class="text-emerald-600 font-bold text-xs uppercase tracking-widest">{{ $produk->kategori }}</span>
                    <h2 class="text-3xl font-extrabold text-[#0A193F] mt-1">{{ $produk->nama_produk }}</h2>
                </div>

                <div class="rounded-2xl overflow-hidden border border-slate-200 shadow-inner">
                    <img src="{{ asset('storage/'.$produk->foto_produk) }}" class="w-full h-64 object-cover" alt="Foto Produk">
                </div>

                <div>
                    <h4 class="font-bold text-slate-800 mb-2">Latar Belakang</h4>
                    <p class="text-slate-600 leading-relaxed">{{ $produk->latar_belakang }}</p>
                </div>

                <div>
                    <h4 class="font-bold text-slate-800 mb-2">Deskripsi Produk/Jasa</h4>
                    <p class="text-slate-600 leading-relaxed">{{ $produk->deskripsi }}</p>
                </div>

                {{-- Kotak Informasi Lengkap --}}
                <div class="bg-blue-50 p-6 rounded-xl border border-blue-100 grid grid-cols-2 gap-6">
                    <div>
                        <h5 class="text-[10px] uppercase font-bold text-blue-800 mb-1">Harga</h5>
                        <p class="text-blue-900 font-bold"> {{ $produk->harga }}</p>
                    </div>
                    <div>
                        <h5 class="text-[10px] uppercase font-bold text-blue-800 mb-1">Kontak Siswa</h5>
                        <p class="text-blue-900 font-bold">{{ $produk->user->no_telp ?? 'Tidak tersedia' }}</p>
                    </div>
                    <div>
                        <h5 class="text-[10px] uppercase font-bold text-blue-800 mb-1">Lokasi</h5>
                        <p class="text-blue-900 font-medium">{{ $produk->lokasi }}</p>
                    </div>
                    <div>
                        <h5 class="text-[10px] uppercase font-bold text-blue-800 mb-1">Sosial Media</h5>
                        <a href="{{ $produk->sosmed }}" target="_blank" class="text-blue-600 underline font-medium">Klik untuk lihat</a>
                    </div>
                    <div class="col-span-2">
                        <h5 class="text-[10px] uppercase font-bold text-blue-800 mb-1">Link Maps</h5>
                        <a href="{{ $produk->link_maps }}" target="_blank" class="text-blue-600 underline font-medium">Buka di Maps</a>
                    </div>
                </div>

                {{-- Tombol WhatsApp --}}
                <a href="https://wa.me/{{ preg_replace('/^0/', '62', $produk->user->no_telp ?? '') }}?text=Halo%20saya%20tertarik%20dengan%20produk%20{{ $produk->nama_produk }}" 
                   target="_blank" 
                   class="block w-full text-center bg-emerald-500 hover:bg-emerald-600 text-white font-bold py-4 rounded-xl transition shadow-lg">
                   Hubungi Penjual via WhatsApp →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection