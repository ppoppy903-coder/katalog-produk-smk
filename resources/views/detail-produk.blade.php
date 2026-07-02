@extends('layouts.app')

@section('title', 'Validasi Produk')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<div class="max-w-6xl mx-auto py-10 px-4">
    <div class="bg-gradient-to-br from-blue-900 to-indigo-800 text-white px-8 py-7 rounded-3xl mb-8 shadow-lg flex items-center justify-between">
        <h1 class="font-bold text-2xl">Detail Produk untuk Validasi</h1>
        <span class="px-4 py-1.5 bg-white/20 rounded-full text-[11px] font-bold uppercase">{{ $produk->kategori }}</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        {{-- Kiri --}}
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-3 rounded-3xl shadow-sm border border-slate-200">
                <div class="swiper mySwiper w-full h-96 rounded-2xl overflow-hidden">
                    <div class="swiper-wrapper">
                        @php
                            $clean = fn($p) => str_replace(['[', ']', '"', '\\', '/'], ['', '', '', '', '/'], $p);
                            $fotos = json_decode($produk->foto_produk, true) ?? [$produk->foto_produk];
                        @endphp
                        @foreach($fotos as $foto)
                            <div class="swiper-slide"><img src="{{ asset('storage/'.$clean($foto)) }}" class="w-full h-full object-cover"></div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next"></div><div class="swiper-button-prev"></div>
                </div>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <h1 class="text-4xl font-extrabold text-slate-900">{{ $produk->nama_produk }}</h1>
                <p class="text-blue-600 font-medium italic">Merek: {{ $produk->nama_merek }}</p>
                <div class="space-y-6 text-slate-600 text-justify border-t pt-6">
                    <div><h3 class="font-bold text-slate-900">Filosofi</h3><p>"{{ $produk->filosofi }}"</p></div>
                    <div><h3 class="font-bold text-slate-900">Latar Belakang</h3><p>{{ $produk->latar_belakang }}</p></div>
                    <div><h3 class="font-bold text-slate-900">Deskripsi</h3><p>{{ $produk->deskripsi }}</p></div>
                </div>
            </div>

            {{-- Tim Pengembang & Institusi --}}
            <div class="bg-indigo-50 p-8 rounded-3xl border border-indigo-100">
                <h3 class="font-bold text-indigo-900 mb-6 uppercase text-xs tracking-widest">Tim Pengembang & Institusi</h3>
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-white p-4 rounded-xl border"><p class="text-[10px] uppercase font-bold text-slate-400">Sekolah</p><p class="font-bold">{{ $produk->nama_sekolah ?? '-' }}</p></div>
                    <div class="bg-white p-4 rounded-xl border"><p class="text-[10px] uppercase font-bold text-slate-400">Jurusan</p><p class="font-bold">{{ $produk->jurusan ?? '-' }}</p></div>
                </div>
                <p class="text-[10px] uppercase font-bold text-slate-400 mb-3">Anggota Tim</p>
                <div class="flex flex-wrap gap-2 mb-6">
                    @forelse($produk->anggotaTim ?? [] as $anggota)
                        <span class="bg-white border border-indigo/10 text-indigo px-4 py-2 rounded-full text-xs font-bold shadow-sm flex items-center gap-2">
                            <i class="fa-solid fa-user text-[10px] opacity-50"></i> 
                            {{ $anggota->nama_siswa ?? $anggota->nama }}
                        </span>
                    @empty
                        <p class="text-xs text-slate-400 italic">Data anggota tim belum tersedia.</p>
                    @endforelse
                </div>
            </div>

        {{-- Kanan --}}
        <div class="lg:col-span-4 space-y-6">
            {{-- Panel Validasi Guru --}}
            @if(Auth::user() && Auth::user()->role === 'guru')
            <div class="bg-indigo-600 p-8 rounded-3xl shadow-lg text-white">
                <p class="text-xs font-bold text-indigo-200 mb-4 uppercase tracking-widest">Panel Validasi</p>
                <form action="{{ url('/validasi-produk/' . $produk->id) }}" method="POST" class="space-y-4">
                    @csrf
                    <select name="status" class="w-full p-3 border rounded-2xl font-bold text-slate-900">
                        <option value="diterbitkan">Setujui</option>
                        <option value="ditolak">Tolak</option>
                    </select>
                    <button type="submit" class="w-full bg-white text-indigo-700 py-3 rounded-2xl font-bold hover:bg-indigo-50 transition">Proses Validasi</button>
                </form>
            </div>
            @endif

            {{-- Sidebar Info & Kontak --}}
            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <img src="{{ asset('storage/'.$clean($produk->logo)) }}" class="w-24 h-24 rounded-3xl object-cover border">
                <div class="space-y-3">
                    <div class="bg-slate-50 p-4 rounded-2xl"><p class="text-[9px] uppercase font-bold text-slate-400">Harga</p><p class="font-bold">{{ $produk->harga }}</p></div>
                    <div class="bg-slate-50 p-4 rounded-2xl"><p class="text-[9px] uppercase font-bold text-slate-400">Lokasi</p><p class="font-bold">{{ $produk->lokasi }}</p></div>
                </div>

                {{-- Kontak Media --}}
                <div class="bg-slate-900 rounded-2xl p-5 text-center">
                    <p class="text-[9px] font-bold text-slate-400 uppercase mb-3">Kontak Media</p>
                    <div class="flex justify-center gap-3">
                        <a href="{{ $produk->sosmed ?? '#' }}" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-pink-600"><i class="fa-brands fa-instagram"></i></a>
                        <a href="{{ $produk->tiktok ?? '#' }}" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-black"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="{{ $produk->gmaps ?? '#' }}" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-red-600"><i class="fa-solid fa-location-dot"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    new Swiper(".mySwiper", { navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }, loop: true });
</script>
@endsection