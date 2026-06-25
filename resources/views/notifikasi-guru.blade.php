@extends('layouts.app')

@section('title', 'Notifikasi')

@section('content')
    <div class="max-w-4xl">
        <h1 class="text-3xl font-extrabold text-[#0A193F] mb-6">Notifikasi</h1>
        
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            @forelse($notifikasiProduk as $notif)
                <div class="p-6 border-b border-slate-100 flex items-center justify-between hover:bg-slate-50 transition">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid fa-box-open"></i>
                        </div>
                        <div>
                            <p class="text-sm text-slate-800">
                                Produk <strong>{{ $notif->nama_produk }}</strong> menunggu validasi Anda.
                            </p>
                            <p class="text-xs text-slate-400 mt-1">{{ $notif->created_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    {{-- Tombol Hapus --}}
                    <form action="{{ route('notifikasi.hapus', $notif->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus notifikasi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-slate-400 hover:text-red-600 transition">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </div>
            @empty
                <div class="p-10 text-center text-slate-400">Tidak ada notifikasi baru.</div>
            @endforelse
        </div>
    </div>
@endsection