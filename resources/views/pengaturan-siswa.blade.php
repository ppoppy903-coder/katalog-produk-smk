@extends('layouts.siswa')

@section('title', 'Pengaturan Akun')

@section('content')
    <h2 class="text-2xl font-bold text-[#0F2857] mb-8">Pengaturan Akun</h2>
    
    <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm max-w-2xl">
        {{-- Pesan Sukses --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 text-green-700 rounded-lg border border-green-200">
                <i class="fa-solid fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pengaturan.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <div>
                    <label class="block text-sm font-bold text-[#0F2857] mb-2">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full p-3 bg-slate-50 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-bold text-[#0F2857] mb-2">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full p-3 bg-slate-50 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                </div>

                <div class="border-t pt-6">
                    <h4 class="font-bold text-[#0F2857] mb-4">Keamanan (Opsional)</h4>
                    <p class="text-xs text-slate-400 mb-4">Biarkan kosong jika tidak ingin mengubah password.</p>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-[#0F2857] mb-2">Password Baru</label>
                            <input type="password" name="password" class="w-full p-3 bg-slate-50 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-[#0F2857] mb-2">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="w-full p-3 bg-slate-50 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                    </div>
                </div>

                <button type="submit" class="bg-[#0F2857] text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-900 transition">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection