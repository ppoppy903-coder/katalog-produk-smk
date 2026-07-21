<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Guru - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col lg:flex-row bg-slate-50 text-slate-800 overflow-x-hidden">

    {{-- Sisi Kiri (Sticky Branding) --}}
    <div class="w-full lg:w-5/12 bg-[#0A193F] text-white flex flex-col justify-center p-8 lg:p-12 relative overflow-hidden lg:h-screen lg:sticky lg:top-0">
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-500 rounded-full opacity-10"></div>
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-indigo-500 rounded-full opacity-10"></div>
        
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-9 h-9 bg-white/10 backdrop-blur rounded-xl flex items-center justify-center text-white"><i class="fa-solid fa-graduation-cap"></i></div>
                <span class="font-bold tracking-widest uppercase text-xs opacity-80">PKK Kemendikdasmen</span>
            </div>
            <h1 class="text-4xl lg:text-5xl font-extrabold leading-[1.1] mb-4">Meningkatkan<br><span class="text-blue-400">Ekselensi</span> SMK</h1>
            <p class="text-slate-400 max-w-sm text-xs lg:text-sm leading-relaxed">Platform inovatif untuk mendukung pengembangan kreativitas dan kewirausahaan murid SMK.</p>
        </div>
    </div>

    {{-- Sisi Kanan (Form Profil Guru) --}}
    <div class="w-full lg:w-7/12 flex flex-col justify-center py-8 px-4 sm:px-6 lg:px-16 min-h-screen">
        <div class="max-w-lg w-full mx-auto bg-white p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50">
            <div class="mb-6">
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#0A193F] mb-1">Daftar Sebagai Guru</h2>
                <p class="text-slate-500 text-xs sm:text-sm">Lengkapi data diri dan sekolah Anda untuk mendaftar.</p>
            </div>

            @if ($errors->any())
                <div class="mb-5 p-3 bg-red-50 border border-red-100 text-red-600 rounded-xl text-xs font-bold">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('daftar.guru.proses') }}" method="POST" class="space-y-3.5">
                @csrf

                {{-- Nama & Sekolah (2 Kolom) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukan nama lengkap Anda" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">Nama Sekolah</label>
                        <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah') }}" placeholder="Contoh: SMK Negeri 1 Jakarta" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                    </div>
                </div>

                {{-- Password & Confirm (2 Kolom) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">Kata Sandi</label>
                        <input type="password" name="password" placeholder="Min. 8 karakter" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">Ulangi Kata Sandi</label>
                        <input type="password" name="password_confirmation" placeholder="Sesuai kata sandi" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                    </div>
                </div>

                {{-- NPSN --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">NPSN Sekolah</label>
                    <input type="text" name="npsn" value="{{ old('npsn') }}" placeholder="Masukkan 8 digit NPSN" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                </div>
                
                <button type="submit" class="w-full py-3 bg-[#0A193F] text-white rounded-xl text-sm font-bold hover:bg-slate-800 transition-all active:scale-95 flex items-center justify-center gap-2 mt-2">
                    Buat Akun <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <div class="mt-6 text-center space-y-3">
                <p class="text-xs sm:text-sm text-slate-500">
                    Sudah punya akun? <a href="{{ route('login.guru') }}" class="font-bold text-[#0A193F] hover:underline">Masuk</a>
                </p>
                <div>
                    <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 text-[10px] font-bold text-slate-400 hover:text-[#0A193F] transition uppercase tracking-widest">
                        <i class="fa-solid fa-arrow-left"></i> Kembali Pilih Peran
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>