@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto py-10 px-4">
    {{-- Header --}}
    <div class="bg-blue-900 text-white px-8 py-6 rounded-3xl mb-8 shadow-lg flex items-center justify-between">
        <h1 class="text-xl font-bold">Detail Produk</h1>
        <span class="px-4 py-1 bg-white/20 rounded-full text-xs font-bold uppercase">{{ $produk->kategori }}</span>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        {{-- Kiri: Konten Utama --}}
        <div class="lg:col-span-8 space-y-6">
            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm">
                <h1 class="text-4xl font-extrabold text-slate-900">{{ $produk->nama_produk }}</h1>
                <p class="text-blue-600 font-medium italic mb-6">Merek: {{ $produk->nama_merek }}</p>
                
                @php $fotos = json_decode($produk->foto_produk); @endphp
                <img src="{{ asset('storage/'.($fotos[0] ?? '')) }}" class="w-full h-96 object-cover rounded-2xl mb-6" alt="Produk">
                
                <div class="space-y-6 text-slate-600 text-justify">
                    <div><h3 class="font-bold text-slate-900">Filosofi</h3><p>"{{ $produk->filosofi }}"</p></div>
                    <div><h3 class="font-bold text-slate-900">Latar Belakang</h3><p>{{ $produk->latar_belakang }}</p></div>
                    <div><h3 class="font-bold text-slate-900">Deskripsi</h3><p>{{ $produk->deskripsi }}</p></div>
                </div>

                {{-- Tim & Institusi --}}
                <div class="mt-8 bg-indigo-50 p-6 rounded-3xl border border-indigo-100">
                    <h3 class="font-bold text-indigo-900 mb-4 uppercase text-xs">Tim Pengembang & Institusi</h3>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div><p class="text-[10px] uppercase font-bold text-indigo-700">Sekolah</p><p class="font-bold">{{ $produk->nama_sekolah ?? '-' }}</p></div>
                        <div><p class="text-[10px] uppercase font-bold text-indigo-700">Jurusan</p><p class="font-bold">{{ $produk->jurusan ?? '-' }}</p></div>
                    </div>
                    @if($produk->foto_tim)
                        <img src="{{ asset('storage/'.$produk->foto_tim) }}" class="w-full h-48 object-cover rounded-2xl border-4 border-white shadow-md">
                    @endif
                </div>
            </div>
        </div>

        {{-- Kanan: Sidebar Detail --}}
        <div class="lg:col-span-4 space-y-6">
            <div class="bg-white p-8 rounded-3xl border border-slate-200 shadow-sm space-y-4">
                <img src="{{ asset('storage/'.$produk->logo) }}" class="w-32 h-32 rounded-3xl object-cover border">
                
                <div class="space-y-3">
                    <div class="bg-slate-50 p-4 rounded-2xl"><p class="text-[9px] uppercase font-bold text-slate-400">Harga</p><p class="font-bold">{{ $produk->harga }}</p></div>
                    <div class="bg-slate-50 p-4 rounded-2xl"><p class="text-[9px] uppercase font-bold text-slate-400">NIB & Tahun</p><p class="font-bold">{{ $produk->nib ?? '-' }} / {{ $produk->tahun_nib ?? '-' }}</p></div>
                    <div class="bg-slate-50 p-4 rounded-2xl"><p class="text-[9px] uppercase font-bold text-slate-400">Lokasi</p><p class="font-bold">{{ $produk->lokasi }}</p></div>
                </div>

                <div class="flex gap-2">
                    <a href="{{ $produk->sosmed ?? '#' }}" target="_blank" class="text-xs text-blue-600 font-bold underline">Sosial Media</a>
                    <a href="{{ $produk->link_maps ?? '#' }}" target="_blank" class="text-xs text-blue-600 font-bold underline">Buka di Maps</a>
                </div>

                {{-- Logic Tombol --}}
                @if(Auth::user() && Auth::user()->role === 'guru')
                    <div class="bg-slate-50 p-4 rounded-2xl border">
                        <p class="text-xs font-bold text-slate-500 mb-2">PANEL VALIDASI</p>
                        <form action="{{ route('validasi.updateStatus', $produk->id) }}" method="POST">
                            @csrf
                            <select name="status" class="w-full p-2 mb-2 border rounded-xl"><option value="diterbitkan">Setujui</option><option value="ditolak">Tolak</option></select>
                            <button class="w-full bg-blue-600 text-white py-2 rounded-xl font-bold">Proses Validasi</button>
                        </form>
                    </div>
                @else
                    <a href="https://wa.me/{{ $produk->user->no_hp ?? '' }}" target="_blank" class="w-full block text-center bg-green-500 text-white font-bold py-4 rounded-2xl">
                        Hubungi Penjual via WhatsApp →
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection