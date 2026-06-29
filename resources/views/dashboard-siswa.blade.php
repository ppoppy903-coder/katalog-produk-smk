@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-extrabold text-[#0F2857] tracking-tight">Produk Saya yang Diajukan</h2>
        
        @if(session('success'))
            <div class="text-xs font-bold text-emerald-700 bg-emerald-50 px-4 py-2 rounded-xl border border-emerald-200">
                <i class="fa-solid fa-check-circle mr-1"></i> {{ session('success') }}
            </div>
        @endif
    </div>

    {{-- NOTIFIKASI --}}
    @if(auth()->check() && auth()->user()->unreadNotifications->count() > 0)
        <div class="bg-white border border-emerald-100 p-5 rounded-3xl mb-8 text-emerald-800 shadow-sm">
            @foreach(auth()->user()->unreadNotifications as $notification)
                <div class="flex items-center gap-3 text-sm font-semibold">
                    <i class="fa-solid fa-bell text-emerald-500"></i>
                    {{ $notification->data['pesan'] }}
                </div>
                @php $notification->markAsRead(); @endphp
            @endforeach
        </div>
    @endif
    
    {{-- Grid Produk --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($produks ?? [] as $produk)
            <div class="bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2 flex flex-col">
                <img src="{{ asset('storage/'.$produk->foto_produk) }}" class="w-full h-48 object-cover rounded-2xl mb-5 shadow-inner">
                
                <div class="flex-grow">
                    <h3 class="font-extrabold text-[#0F2857] text-lg mb-1">{{ $produk->nama_produk }}</h3>
                    <p class="text-[10px] font-bold text-blue-600 uppercase tracking-widest mb-4">Merek: {{ $produk->nama_merek }}</p>
                </div>
                
                {{-- Bagian Tombol --}}
                <div class="mt-4 pt-4 border-t border-slate-100 flex items-center gap-3">
                    <a href="{{ route('produk.edit', $produk->id) }}" class="flex-1 text-center py-3 bg-slate-50 rounded-xl text-[11px] font-bold text-slate-700 hover:bg-slate-100 transition">
                        <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                    </a>
                    
                    @if($produk->status !== 'menunggu' && $produk->status !== 'diterbitkan' && $produk->status !== 'disetujui')
                        <form action="{{ route('produk.ajukan', $produk->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full bg-[#0F2857] text-white py-3 rounded-xl text-[11px] font-bold hover:bg-blue-900 transition">
                                <i class="fa-solid fa-paper-plane mr-1"></i> Ajukan
                            </button>
                        </form>
                    @endif
                </div>

                {{-- Status Label --}}
                <div class="mt-4">
                    <span class="inline-block px-4 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider 
                        {{ $produk->status == 'diterbitkan' ? 'text-emerald-700 bg-emerald-50' : '' }}
                        {{ $produk->status == 'disetujui' ? 'text-blue-700 bg-blue-50' : '' }}
                        {{ $produk->status == 'menunggu' ? 'text-amber-700 bg-amber-50' : '' }}
                        {{ $produk->status == 'draft' ? 'text-slate-600 bg-slate-100' : '' }}">
                        {{ $produk->status ?? 'Draft' }}
                    </span>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center text-slate-400">
                <i class="fa-solid fa-box-open text-4xl mb-4 block"></i>
                <p class="font-medium">Belum ada produk yang dibuat.</p>
            </div>
        @endforelse
    </div>

    {{-- MODERASI ULASAN --}}
    <div class="mt-12">
        <h3 class="text-xl font-bold text-[#0A193F] mb-6">Moderasi Ulasan Negatif</h3>
        <div class="space-y-4">
            @forelse($ulasanPending ?? [] as $ulasan)
                <div class="bg-white p-6 rounded-2xl border border-red-100 shadow-sm flex justify-between items-center">
                    <div>
                        <p class="font-bold text-slate-800">{{ $ulasan->nama_pengunjung }} <span class="text-amber-500 text-xs">({{ $ulasan->rating }} Bintang)</span></p>
                        <p class="text-slate-600 text-sm mt-1">{{ $ulasan->komentar }}</p>
                    </div>
                    <div class="flex gap-2">
                        <form action="{{ route('ulasan.approve', $ulasan->id) }}" method="POST">
                            @csrf
                            <button class="bg-emerald-500 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-emerald-600 transition">Publish</button>
                        </form>
                        <form action="{{ route('ulasan.delete', $ulasan->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="bg-red-500 text-white px-4 py-2 rounded-xl text-sm font-bold hover:bg-red-600 transition">Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="text-slate-400 text-sm italic">Tidak ada ulasan yang perlu dimoderasi.</p>
            @endforelse
        </div>
    </div>
@endsection