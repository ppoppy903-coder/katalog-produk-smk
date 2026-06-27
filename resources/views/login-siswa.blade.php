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
        /* INPUT MODERN DENGAN PADDING BESAR */
        .input-modern { 
            width: 100%; 
            padding: 16px 20px; /* PADDING LEGA */
            background-color: #f8fafc; 
            border: 1px solid #e2e8f0; 
            border-radius: 16px; 
            font-size: 14px;
            outline: none;
            transition: all 0.3s;
        }
        .input-modern:focus { border-color: #0A193F; ring: 1px #0A193F; }
    </style>
</head>
<body class="flex h-screen overflow-hidden bg-slate-50 text-slate-800">

    {{-- Sisi Kiri (Branding) --}}
    <div class="hidden lg:flex lg:w-5/12 bg-[#0A193F] text-white flex-col justify-center p-16 relative overflow-hidden">
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-500 rounded-full opacity-10"></div>
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-12">
                <div class="w-10 h-10 bg-white/10 backdrop-blur rounded-xl flex items-center justify-center"><i class="fa-solid fa-graduation-cap"></i></div>
                <span class="font-bold tracking-widest uppercase text-xs opacity-70">PKK KEMENDIKDASMEN</span>
            </div>
            <h1 class="text-6xl font-extrabold leading-[1.1] mb-6">Meningkatkan<br><span class="text-blue-400">Ekselensi</span> SMK</h1>
            <p class="text-slate-400 max-w-sm leading-relaxed">Platform inovatif untuk mendukung pengembangan kreativitas dan kewirausahaan murid SMK.</p>
        </div>
    </div>

    {{-- Sisi Kanan (Form) --}}
    <div class="flex-1 flex flex-col justify-center p-8 lg:p-24 overflow-y-auto">
        <div class="max-w-md w-full mx-auto bg-white p-10 rounded-3xl shadow-xl shadow-slate-200/50">
            <div class="mb-10">
                <h2 class="text-2xl font-extrabold text-[#0A193F] mb-2">Masuk Akun Siswa</h2>
                <p class="text-slate-500 text-sm">Masukkan email dan kata sandi untuk masuk ke sistem.</p>
            </div>

            {{-- Pesan Error --}}
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-2xl text-xs font-bold flex items-center">
                    <i class="fa-solid fa-circle-exclamation mr-3"></i> {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.siswa.proses') }}" method="POST" class="space-y-6">
                @csrf 
                
                {{-- Input Email --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1.5 ml-1">Email</label>
                    <input type="email" name="email" class="input-modern" placeholder="contoh@email.com" required value="{{ old('email') }}" autocomplete="email">
                </div>

                {{-- Input Password --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-1.5 ml-1">Kata Sandi</label>
                    <input type="password" name="password" class="input-modern" placeholder="••••••••" required autocomplete="current-password">
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="w-full py-4 bg-[#0A193F] text-white rounded-2xl font-bold transition hover:bg-slate-800 hover:shadow-lg active:scale-95 flex items-center justify-center gap-2">
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