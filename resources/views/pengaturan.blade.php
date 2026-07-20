@extends('layouts.app')

@section('title', 'Pengaturan Akun')

@section('content')
<div class="p-6 max-w-4xl mx-auto">
    <div class="mb-8 mt-4">
        <h1 class="text-3xl font-extrabold text-[#0A193F] mb-2 tracking-tight">Pengaturan Akun</h1>
        <p class="text-slate-500 font-medium">Perbarui informasi profil akun guru dan kelola keamanan sandi Anda.</p>
    </div>
    
    {{-- Notifikasi Sukses --}}
    @if(session('success'))
        <div class="mb-6 p-4 bg-emerald-50 text-emerald-700 rounded-2xl text-sm font-bold border border-emerald-100 flex items-center gap-3 shadow-sm">
            <i class="fa-solid fa-circle-check text-emerald-500 text-lg"></i> {{ session('success') }}
        </div>
    @endif

    {{-- Notifikasi Error (Validasi) --}}
    @if($errors->any())
        <div class="mb-6 p-4 bg-rose-50 text-rose-700 rounded-2xl text-sm font-bold border border-rose-100 shadow-sm">
            <div class="flex items-center gap-2 mb-1">
                <i class="fa-solid fa-triangle-exclamation text-rose-500"></i> Terjadi kesalahan input:
            </div>
            <ul class="list-disc list-inside space-y-1 text-xs font-medium text-rose-600">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('pengaturan.update') }}" method="POST" class="bg-white p-8 md:p-10 rounded-3xl border border-slate-100 shadow-sm space-y-8">
        @csrf
        @method('PUT')

        {{-- Informasi Profil --}}
        <div>
            <h3 class="font-extrabold text-[#0A193F] text-lg mb-1 flex items-center gap-2">
                <i class="fa-solid fa-user-pen text-indigo-600 text-base"></i> Informasi Profil
            </h3>
            <p class="text-xs text-slate-400 font-medium mb-6">Ubah nama lengkap Anda yang terdaftar pada sistem.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition font-medium text-slate-800">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">NPSN Sekolah</label>
                    <input type="text" value="{{ $user->npsn }}" disabled class="w-full p-4 bg-slate-100 border border-slate-200 rounded-2xl text-slate-400 cursor-not-allowed font-medium">
                    <p class="text-[10px] text-slate-400 mt-1.5 italic">NPSN bersifat unik dan tidak dapat diubah.</p>
                </div>
            </div>
        </div>

        <hr class="border-slate-100">

        {{-- Ganti Password --}}
        <div>
            <h3 class="font-extrabold text-[#0A193F] text-lg mb-1 flex items-center gap-2">
                <i class="fa-solid fa-lock text-indigo-600 text-base"></i> Keamanan Akun
            </h3>
            <p class="text-xs text-slate-400 font-medium mb-6">Biarkan kosong jika Anda tidak ingin mengubah password akun.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Password Baru</label>
                    <input type="password" name="password" placeholder="••••••••" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition font-medium text-slate-800">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-500 mb-2">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" placeholder="••••••••" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-500 focus:bg-white outline-none transition font-medium text-slate-800">
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-slate-100 flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 py-4 rounded-2xl font-bold transition-all shadow-md shadow-indigo-100 flex items-center gap-2">
                <i class="fa-solid fa-floppy-disk"></i> Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection