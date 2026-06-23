@extends('layouts.app')

@section('title', 'Validasi Produk')

@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold text-[#0F2857] mb-6">Validasi Produk Siswa</h1>

    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-500 border-b">
                <tr>
                    <th class="p-4">Foto</th>
                    <th class="p-4">Nama Produk</th>
                    <th class="p-4">Nama Siswa</th>
                    <th class="p-4">Status</th>
                    <th class="p-4">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($produk as $item)
                <tr>
                    <td class="p-4">
                        <img src="{{ asset('storage/'.$item->foto_produk) }}" class="w-16 h-16 object-cover rounded-lg">
                    </td>
                    <td class="p-4 font-bold text-[#0F2857]">{{ $item->nama_produk }}</td>
                    <td class="p-4">{{ $item->user->name ?? 'Siswa' }}</td>
                    <td class="p-4">
                        {{-- Menyesuaikan warna berdasarkan status di controller/db --}}
                        <span class="px-2 py-1 {{ $item->status == 'diterbitkan' ? 'bg-green-50 text-green-600' : ($item->status == 'ditolak' ? 'bg-red-50 text-red-600' : 'bg-amber-50 text-amber-600') }} rounded text-xs font-bold uppercase">
                            {{ $item->status }}
                        </span>
                    </td>
                    <td class="p-4">
                        <div class="flex items-center gap-2">
                            {{-- Tombol Detail --}}
                            <a href="{{ route('validasi.show', $item->id) }}" class="bg-slate-200 text-slate-700 px-3 py-2 rounded-lg text-xs font-bold hover:bg-slate-300 transition">
                                Detail
                            </a>

                            {{-- Form Aksi Validasi --}}
                            {{-- Hanya tampilkan jika statusnya 'menunggu' (sesuai controller index) --}}
                            @if($item->status == 'menunggu')
                                <form action="{{ route('produk.validasi', $item->id) }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <button type="submit" name="status" value="diterbitkan" 
                                        class="bg-green-600 text-white px-3 py-2 rounded-lg text-xs font-bold hover:bg-green-700 transition"
                                        onclick="return confirm('Setujui produk ini?')">
                                        Setuju
                                    </button>
                                    <button type="submit" name="status" value="ditolak" 
                                        class="bg-red-600 text-white px-3 py-2 rounded-lg text-xs font-bold hover:bg-red-700 transition"
                                        onclick="return confirm('Tolak produk ini?')">
                                        Tolak
                                    </button>
                                </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="p-10 text-center text-slate-400">
                        <i class="fa-solid fa-check-double text-4xl mb-2"></i>
                        <p>Tidak ada produk yang perlu divalidasi saat ini.</p>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection