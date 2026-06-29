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
@endsection