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

                {{-- Tampilan Multi-Foto Produk (Diperbarui) --}}
                @php $fotos = json_decode($produk->foto_produk); @endphp
                <div class="grid grid-cols-1 gap-4">
                    <img src="{{ asset('storage/'.($fotos[0] ?? '')) }}" class="w-full h-64 object-cover rounded-2xl border border-slate-200" alt="Foto Utama">
                    @if(is_array($fotos) && count($fotos) > 1)
                        <div class="grid grid-cols-5 gap-2">
                            @foreach(array_slice($fotos, 1) as $foto)
                                <img src="{{ asset('storage/'.$foto) }}" class="h-20 w-full object-cover rounded-lg">
                            @endforeach
                        </div>
                    @endif
                </div>

                <div>
                    <h4 class="font-bold text-slate-800 mb-2">Latar Belakang</h4>
                    <p class="text-slate-600 leading-relaxed">{{ $produk->latar_belakang }}</p>
                </div>

                <div>
                    <h4 class="font-bold text-slate-800 mb-2">Deskripsi Produk/Jasa</h4>
                    <p class="text-slate-600 leading-relaxed">{{ $produk->deskripsi }}</p>
                </div>

                {{-- SECTION BARU: Tim Pengembang & Institusi --}}
                <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100">
                    <h4 class="font-bold text-indigo-900 mb-4 uppercase text-xs">Identitas Tim & Institusi</h4>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-[10px] text-indigo-700 font-bold uppercase">Sekolah</p>
                            <p class="text-indigo-900 font-bold">{{ $produk->nama_sekolah ?? '-' }}</p>
                        </div>
                        <div>
                            <p class="text-[10px] text-indigo-700 font-bold uppercase">Jurusan</p>
                            <p class="text-indigo-900 font-bold">{{ $produk->jurusan ?? '-' }}</p>
                        </div>
                    </div>
                    @if($produk->foto_tim)
                        <div class="mt-2">
                            <p class="text-[10px] text-indigo-700 font-bold uppercase mb-2">Foto Tim Bersama</p>
                            <img src="{{ asset('storage/'.$produk->foto_tim) }}" class="w-full h-48 object-cover rounded-xl shadow-md" alt="Foto Tim">
                        </div>
                    @endif
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
                    <div class="col-span-2">
                        <h5 class="text-[10px] uppercase font-bold text-blue-800 mb-1">Lokasi</h5>
                        <p class="text-blue-900 font-medium">{{ $produk->lokasi }}</p>
                    </div>
                    <div>
                        <a href="{{ $produk->sosmed }}" target="_blank" class="text-blue-600 underline font-medium">Sosial Media</a>
                    </div>
                    <div>
                        <a href="{{ $produk->link_maps }}" target="_blank" class="text-blue-600 underline font-medium">Buka di Maps</a>
                    </div>
                </div>

                {{-- Tombol WhatsApp --}}
                <a href="https://wa.me/{{ $produk->user->no_hp ?? '' }}" target="_blank" 
                class="inline-block bg-green-500 hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg transition duration-300">
                Hubungi Penjual via WhatsApp →
                </a>
            </div>
        </div>
    </div>
</div>
@endsection