@extends('layouts.app')

@section('title', 'Pengaturan Akun')

@section('content')
<div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-extrabold text-[#0A193F] mb-2">Pengaturan Akun</h1>
    <p class="text-slate-500 mb-8">Kelola informasi profil dan keamanan akun Anda.</p>
    
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-100 text-green-700 rounded-xl text-sm font-bold border border-green-200">
            <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi Error (Validasi) --}}
    @if($errors->any())
        <div class="mb-6 p-4 bg-red-100 text-red-700 rounded-xl text-sm font-bold border border-red-200">
            <ul class="list-disc list-inside">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('pengaturan.update') }}" method="POST" class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
        @csrf
        @method('PUT')

        {{-- Nama & NPSN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#80F2D6] outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">NPSN Sekolah</label>
                <input type="text" value="{{ $user->npsn }}" disabled class="w-full p-3 bg-slate-100 border border-slate-200 rounded-xl text-slate-500 cursor-not-allowed">
                <p class="text-[10px] text-slate-400 mt-1 italic">NPSN tidak dapat diubah.</p>
            </div>
        </div>

        <hr class="border-slate-100">

        {{-- Ganti Password --}}
        <h3 class="font-bold text-[#0A193F]">Keamanan (Opsional)</h3>
        <p class="text-xs text-slate-400 -mt-4">Biarkan kosong jika tidak ingin mengubah password.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Password Baru</label>
                <input type="password" name="password" placeholder="••••••••" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#80F2D6] outline-none transition">
            </div>
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full p-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-[#80F2D6] outline-none transition">
            </div>
        </div>

        <div class="pt-4">
            <button type="submit" class="w-full md:w-auto bg-[#0A193F] text-white px-8 py-3 rounded-xl font-bold hover:bg-slate-800 transition shadow-lg hover:shadow-xl">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection