<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun Siswa - PKK Kemendikdasmen</title>
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

    {{-- Sisi Kanan (Form Login yang Ringkas dan Pas di Satu Layar) --}}
    <div class="w-full lg:w-7/12 flex flex-col justify-center py-12 px-4 sm:px-6 lg:px-20">
        <div class="max-w-md w-full mx-auto bg-white p-8 sm:p-10 rounded-3xl shadow-xl shadow-slate-200/50">
            <div class="mb-8">
                <h2 class="text-2xl font-extrabold text-[#0A193F] mb-2">Masuk Sebagai Siswa</h2>
                <p class="text-slate-500 text-sm">Masukkan email dan kata sandi untuk masuk ke sistem.</p>
            </div>

            {{-- Pesan Error --}}
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-2xl text-xs font-bold flex items-center">
                    <i class="fa-solid fa-circle-exclamation mr-3"></i> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.siswa.proses') }}" method="POST" class="space-y-5">
                @csrf 
                
                {{-- Input Email --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1.5 ml-1">Email</label>
                    <input type="email" name="email" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="contoh@email.com" required value="{{ old('email') }}" autocomplete="email">
                </div>

                {{-- Input Password --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1.5 ml-1">Kata Sandi</label>
                    <input type="password" name="password" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="••••••••" required autocomplete="current-password">
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="w-full py-4 bg-[#0A193F] text-white rounded-2xl font-bold transition hover:bg-slate-800 hover:shadow-lg active:scale-95 flex items-center justify-center gap-2 mt-2">
                    Masuk Sekarang <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>

            <p class="text-center text-sm text-slate-500 mt-8">
                Belum punya akun? <a href="{{ route('daftar.siswa') }}" class="font-bold text-[#0A193F] hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>