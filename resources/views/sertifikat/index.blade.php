@extends('layouts.app')

@section('content')
<div class="p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-[#0A193F]">Sertifikat Produk</h1>
        <p class="text-slate-500 mt-2">Daftar produk yang telah divalidasi dan memiliki sertifikat resmi.</p>
    </div>

    @if($produk->isEmpty())
        <!-- Tampilan Kosong -->
        <div class="bg-white p-12 rounded-3xl border border-dashed border-slate-200 text-center">
            <i class="fa-solid fa-certificate text-slate-300 text-4xl mb-4"></i>
            <p class="text-slate-500 font-medium">Belum ada sertifikat yang diterbitkan saat ini.</p>
        </div>
    @else
        <!-- Grid Kartu Sertifikat -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($produk as $item)
            <div class="group bg-white p-6 rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between">
                <div>
                    <!-- Badge Status -->
                    <div class="flex justify-between items-start mb-4">
                        <span class="px-3 py-1 bg-emerald-50 text-emerald-600 text-[10px] font-bold rounded-full uppercase border border-emerald-100">
                            Disetujui
                        </span>
                        <i class="fa-solid fa-certificate text-slate-200 group-hover:text-emerald-500 transition-colors"></i>
                    </div>

                    <h3 class="font-bold text-lg text-[#0A193F] leading-tight mb-2 group-hover:text-blue-900 transition-colors">
                        {{ $item->nama_produk }}
                    </h3>
                    <p class="text-xs text-slate-400 font-medium mb-6">
                        <i class="fa-solid fa-user mr-1"></i> {{ $item->user->name ?? 'User' }}
                    </p>

                    <!-- Kode Baru untuk Daftar Anggota Tim -->
                    <div class="mt-4 pt-4 border-t border-slate-50 mb-6">
                        <p class="text-[10px] text-slate-400 font-bold uppercase mb-2">Tim Pengembang:</p>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-[10px] bg-blue-50 text-blue-600 px-2 py-1 rounded-md font-semibold border border-blue-100">
                                {{ $item->user->name }} (Ketua)
                            </span>
                            @foreach($item->anggotaTim as $anggota)
                                <span class="text-[10px] bg-slate-100 text-slate-600 px-2 py-1 rounded-md font-semibold border border-slate-200">
                                    {{ $anggota->nama_siswa }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tombol Action -->
                <a href="{{ route('sertifikat.download', $item->id) }}" 
                   class="flex items-center justify-center gap-2 w-full bg-slate-50 text-[#0A193F] py-3 rounded-2xl text-xs font-bold hover:bg-[#0A193F] hover:text-white transition-all duration-300">
                    <i class="fa-solid fa-download"></i> Unduh Sertifikat
                </a>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection