<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Sebagai Siswa - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="min-h-screen flex flex-col lg:flex-row bg-slate-50 text-slate-800 overflow-x-hidden">

    {{-- Sisi Kiri (Sticky / Menempel agar pas di layar desktop) --}}
    <div class="w-full lg:w-5/12 bg-[#0A193F] text-white flex flex-col justify-center p-8 lg:p-12 relative overflow-hidden lg:h-screen lg:sticky lg:top-0">
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-500 rounded-full opacity-10"></div>
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-6">
                <div class="w-9 h-9 bg-white/10 backdrop-blur rounded-xl flex items-center justify-center"><i class="fa-solid fa-graduation-cap"></i></div>
                <span class="font-bold tracking-widest uppercase text-xs opacity-70">PKK KEMENDIKDASMEN</span>
            </div>
            <h1 class="text-4xl lg:text-5xl font-extrabold leading-[1.1] mb-4">Meningkatkan<br><span class="text-blue-400">Ekselensi</span> SMK</h1>
            <p class="text-slate-400 max-w-sm text-xs lg:text-sm leading-relaxed">Platform inovatif untuk mendukung pengembangan kreativitas dan kewirausahaan murid SMK.</p>
        </div>
    </div>

    {{-- Sisi Kanan (Form dengan jarak yang dipadatkan agar pas satu layar) --}}
    <div class="w-full lg:w-7/12 flex flex-col justify-center py-8 px-4 sm:px-6 lg:px-16">
        <div class="max-w-lg w-full mx-auto bg-white p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50">
            <div class="mb-5">
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#0A193F] mb-1">Daftar Sebagai Siswa</h2>
                <p class="text-slate-500 text-xs sm:text-sm">Lengkapi data diri untuk memulai petualanganmu.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-100 text-red-600 rounded-xl text-xs font-bold">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('daftar.siswa.proses') }}" method="POST" class="space-y-3.5">
                @csrf
                
                {{-- Nama & Email (Dibikin 2 Kolom di Desktop agar lebih ringkas) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="Nama Anda" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="contoh@email.com" required>
                    </div>
                </div>

                {{-- Kata Sandi & Konfirmasi --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">Kata Sandi</label>
                        <input type="password" name="password" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="••••••••" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">Ulangi Sandi</label>
                        <input type="password" name="password_confirmation" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="••••••••" required>
                    </div>
                </div>

                {{-- NPSN & NISN (Dibikin 2 Kolom juga) --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">NPSN Sekolah</label>
                        <input type="text" name="npsn" value="{{ old('npsn') }}" placeholder="8 digit NPSN" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1 ml-1">NISN Siswa</label>
                        <input type="text" name="nisn" value="{{ old('nisn') }}" placeholder="10 digit NISN" class="w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs sm:text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                    </div>
                </div>

                <button type="submit" class="w-full py-3 bg-[#0A193F] text-white rounded-xl font-bold text-sm hover:bg-slate-800 transition-all active:scale-95 mt-3">
                    Buat Akun →
                </button>
            </form>

            <p class="text-center text-xs sm:text-sm text-slate-500 mt-5">
                Sudah punya akun? <a href="{{ route('login.siswa') }}" class="font-bold text-[#0A193F] hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</body>
</html>