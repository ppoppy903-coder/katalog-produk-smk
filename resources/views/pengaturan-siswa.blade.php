@extends('layouts.siswa')

@section('title', 'Pengaturan Akun')

@section('content')
    <div class="max-w-2xl">
        <h2 class="text-3xl font-extrabold text-[#0A193F] mb-8">Pengaturan Akun</h2>
        
        <div class="bg-white p-10 rounded-3xl border border-slate-100 shadow-xl shadow-slate-200/50">
            {{-- Pesan Sukses --}}
            @if(session('success'))
                <div class="mb-8 p-4 bg-emerald-50 text-emerald-700 rounded-2xl border border-emerald-100 text-sm font-bold flex items-center">
                    <i class="fa-solid fa-check-circle mr-3"></i> {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('pengaturan.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Email</label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all">
                    </div>

                    <div class="pt-6 border-t border-slate-100">
                        <h4 class="font-bold text-[#0A193F] mb-1">Keamanan (Opsional)</h4>
                        <p class="text-xs text-slate-400 mb-6">Biarkan kosong jika tidak ingin mengubah password.</p>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Password Baru</label>
                                <input type="password" name="password" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="••••••••">
                            </div>
                            <div>
                                <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="••••••••">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-[#0A193F] text-white py-4 rounded-2xl font-bold hover:bg-blue-900 transition-all active:scale-[0.98] shadow-lg shadow-blue-900/10">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection