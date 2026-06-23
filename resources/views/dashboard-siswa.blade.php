@extends('layouts.app')

@section('title', 'Dashboard Siswa')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-2xl font-bold text-[#0F2857]">Produk Saya yang Diajukan</h2>
        
        @if(session('success'))
            <div class="text-sm font-medium text-green-600 bg-green-50 px-4 py-2 rounded-lg border border-green-200">
                <i class="fa-solid fa-check-circle mr-1"></i> {{ session('success') }}
            </div>
        @endif
    </div>

    {{-- NOTIFIKASI --}}
    @if(auth()->check() && auth()->user()->unreadNotifications->count() > 0)
        <div class="bg-emerald-50 border border-emerald-200 p-4 rounded-xl mb-8 text-emerald-800 flex flex-col gap-2">
            @foreach(auth()->user()->unreadNotifications as $notification)
                <div class="flex items-center gap-3 text-sm font-medium">
                    <i class="fa-solid fa-bell text-emerald-600"></i>
                    {{ $notification->data['pesan'] }}
                </div>
                @php $notification->markAsRead(); @endphp
            @endforeach
        </div>
    @endif
    
    {{-- Grid Produk --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($produks ?? [] as $produk)
            <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex flex-col hover:shadow-md transition">
                <img src="{{ asset('storage/'.$produk->foto_produk) }}" class="w-full h-40 object-cover rounded-xl mb-4 bg-slate-100">
                <h3 class="font-bold text-[#0F2857] text-lg">{{ $produk->nama_produk }}</h3>
                <p class="text-sm text-slate-500 mb-4">Merek: {{ $produk->nama_merek }}</p>
                
                {{-- Bagian Tombol yang diperbarui --}}
                <div class="mt-auto pt-4 border-t border-slate-100 flex items-center gap-2">
                    <a href="{{ route('produk.edit', $produk->id) }}" class="flex-1 text-center py-2 px-3 border border-slate-200 rounded-lg text-xs font-bold text-slate-600 hover:bg-slate-50 transition">
                        <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                    </a>
                    
                    {{-- Tombol Ajukan hanya muncul jika status bukan menunggu, diterbitkan, atau disetujui --}}
                    @if($produk->status !== 'menunggu' && $produk->status !== 'diterbitkan' && $produk->status !== 'disetujui')
                        <form action="{{ route('produk.ajukan', $produk->id) }}" method="POST" class="flex-1">
                            @csrf
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg text-xs font-bold hover:bg-blue-700 transition">
                                <i class="fa-solid fa-paper-plane mr-1"></i> Ajukan
                            </button>
                        </form>
                    @endif
                </div>

                {{-- Status Label --}}
                <div class="mt-4">
                    <span class="inline-block px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider 
                        {{ $produk->status == 'diterbitkan' ? 'text-emerald-600 bg-emerald-50' : '' }}
                        {{ $produk->status == 'disetujui' ? 'text-blue-600 bg-blue-50' : '' }}
                        {{ $produk->status == 'menunggu' ? 'text-amber-600 bg-amber-50' : '' }}
                        {{ $produk->status == 'draft' ? 'text-slate-600 bg-slate-100' : '' }}">
                        {{ $produk->status ?? 'Draft' }}
                    </span>
                </div>
            </div>
        @empty
            <div class="col-span-full py-20 text-center text-slate-400">
                <i class="fa-solid fa-box-open text-4xl mb-4 block"></i>
                <p>Belum ada produk yang dibuat.</p>
            </div>
        @endforelse
    </div>
@endsection