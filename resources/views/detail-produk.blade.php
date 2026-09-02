@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<div class="max-w-6xl mx-auto px-4 py-8 pb-20">
    <!-- Tombol Kembali -->
    <div class="mb-6">
        <a href="{{ url('/validasi-produk') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-indigo-600 hover:underline">
            <span class="w-8 h-8 rounded-full bg-white border border-indigo-100 flex items-center justify-center shadow-sm">
                <i class="fa-solid fa-arrow-left text-xs"></i>
            </span>
            Kembali ke Daftar Validasi
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- KOLOM KIRI (Konten Detail Produk) -->
        <div class="lg:col-span-8 space-y-6">
            <!-- Swiper Foto Produk -->
            <div class="bg-white p-3 rounded-3xl shadow-sm border border-slate-200">
                <div class="swiper mySwiper w-full h-72 sm:h-96 rounded-2xl overflow-hidden">
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

            <!-- Detail Teks -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <div>
                    <p class="text-xs font-bold text-indigo-600 uppercase tracking-widest mb-1">Merek &mdash; {{ $produk->nama_merek }}</p>
                    <h1 class="text-2xl sm:text-4xl font-extrabold text-slate-900 leading-tight">{{ $produk->nama_produk }}</h1>
                </div>
                
                <div class="space-y-6 text-slate-600 text-justify border-t pt-6">
                    <div>
                        <h3 class="font-bold text-slate-900 mb-2">Filosofi</h3>
                        <p class="bg-slate-50 p-4 rounded-2xl italic border-l-4 border-indigo-600">"{{ $produk->filosofi }}"</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 mb-2">Latar Belakang</h3>
                        <p>{{ $produk->latar_belakang }}</p>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 mb-2">Deskripsi</h3>
                        <p>{{ $produk->deskripsi }}</p>
                    </div>
                </div>
            </div>

            <!-- Tim Pengembang, Institusi, & Foto Tim -->
            <div class="bg-indigo-50/60 p-6 sm:p-8 rounded-3xl border border-indigo-100 space-y-6">
                <h3 class="font-bold text-indigo-900 uppercase text-xs tracking-widest">Tim Pengembang & Institusi</h3>
                
                <!-- Kotak Sekolah (Jurusan dihapus, sekarang full width) -->
                <div>
                    <div class="bg-white p-4 rounded-2xl border border-indigo-100 shadow-sm">
                        <p class="text-[10px] uppercase font-bold text-slate-400">Sekolah</p>
                        <p class="font-bold text-slate-800">{{ $produk->nama_sekolah ?? '-' }}</p>
                    </div>
                </div>
                
                <div>
                    <p class="text-[10px] uppercase font-bold text-slate-400 mb-3">Anggota Tim</p>
                    <div class="flex flex-wrap gap-2">
                        @forelse(\App\Models\AnggotaTim::where('produk_id', $produk->id)->get() as $anggota)
                            <span class="bg-white border border-indigo-100 text-indigo-700 px-4 py-2 rounded-full text-xs font-bold shadow-sm flex items-center gap-2">
                                <i class="fa-solid fa-user text-[10px] opacity-50"></i> {{ $anggota->nama_siswa }}
                            </span>
                        @empty
                            <p class="text-xs text-slate-400 italic">Data anggota tim belum tersedia.</p>
                        @endforelse
                    </div>
                </div>

                @if(!empty($produk->foto_tim))
                <div>
                    <p class="text-[10px] uppercase font-bold text-slate-400 mb-2">Foto Tim / Grup</p>
                    <img src="{{ asset('storage/'.$clean($produk->foto_tim)) }}" class="w-full h-64 object-cover rounded-2xl border-4 border-white shadow-md">
                </div>
                @endif
            </div>
        </div>

        <!-- KOLOM KANAN (Sidebar & Panel Validasi) -->
        <div class="lg:col-span-4 space-y-6">
            
            <!-- PANEL VALIDASI (Khusus Guru) -->
            @if(Auth::user() && Auth::user()->role === 'guru')
            <div class="bg-indigo-600 p-6 rounded-3xl shadow-lg text-white">
                <p class="text-xs font-bold uppercase tracking-widest mb-3">Panel Validasi</p>
                <form action="{{ url('/validasi-produk/' . $produk->id) }}" method="POST" class="space-y-3">
                    @csrf
                    <select name="status" class="w-full p-3 border rounded-xl text-slate-900 font-bold bg-white outline-none">
                        <option value="diterbitkan">Setujui</option>
                        <option value="ditolak">Tolak</option>
                    </select>
                    <button type="submit" class="w-full bg-white text-indigo-700 py-3 rounded-xl font-bold hover:bg-indigo-50 transition shadow-sm">Proses Validasi</button>
                </form>
            </div>
            @endif

            <!-- SIDEBAR UTAMA -->
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm space-y-6">
                <!-- Logo -->
                <img src="{{ asset('storage/'.$clean($produk->logo)) }}" class="w-24 h-24 sm:w-28 sm:h-28 rounded-3xl object-cover shadow-md border-4 border-slate-100">

                <!-- Harga -->
                <div class="bg-[#FDF8F5] p-4 rounded-2xl flex flex-col gap-1 border border-orange-100">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Harga</p>
                    <p class="font-bold text-slate-900 text-lg">{{ $produk->harga }}</p>
                </div>

                <!-- Lokasi -->
                <div class="bg-[#F0F6FC] p-4 rounded-2xl flex flex-col gap-1 border border-blue-100">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Lokasi</p>
                    <p class="font-bold text-slate-900 text-sm">{{ $produk->lokasi }}</p>
                </div>

                <!-- Informasi Tambahan (Sosmed & Maps) -->
                <div class="bg-white border border-slate-200 rounded-2xl p-5 shadow-sm space-y-3">
                    <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-2">Informasi Tambahan</p>
                    
                    @if(!empty($produk->sosmed))
                        <a href="{{ (strpos($produk->sosmed, 'http') === 0) ? $produk->sosmed : 'https://' . ltrim($produk->sosmed, '@') }}" target="_blank" class="flex items-center text-sm font-semibold text-blue-600 hover:text-blue-800 transition">
                            <i class="fab fa-instagram mr-3 text-lg"></i> Kunjungi Sosial Media
                        </a>
                    @endif

                    @if(!empty($produk->link_maps || $produk->gmaps))
                        <a href="{{ $produk->link_maps ?? $produk->gmaps }}" target="_blank" class="flex items-center text-sm font-semibold text-red-500 hover:text-red-700 transition">
                            <i class="fas fa-map-marked-alt mr-3 text-lg"></i> Lihat Google Maps
                        </a>
                    @endif
                </div>

                <!-- Tombol Hubungi Penjual (Hijau) -->
                <a href="https://wa.me/{{ $produk->user->no_hp ?? '' }}" target="_blank" class="block w-full text-center bg-[#00A859] hover:bg-[#008F4C] text-white font-bold py-4 rounded-2xl transition shadow-md">
                    <i class="fa-brands fa-whatsapp text-lg mr-2"></i> Hubungi Penjual
                </a>
            </div>

        </div>

    </div>
</div>

<script>
    new Swiper(".mySwiper", { navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }, loop: true });
</script>
@endsection