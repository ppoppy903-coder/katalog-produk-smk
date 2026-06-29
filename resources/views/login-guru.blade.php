<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk sebagai Guru - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Efek transisi halus pada card */
        .role-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
    </style>
</head>
<body class="flex h-screen overflow-hidden bg-slate-50 text-slate-800">

    {{-- Sisi Kiri (Modern Branding) --}}
    <div class="hidden lg:flex lg:w-5/12 bg-[#0A193F] text-white flex-col justify-center p-16 relative overflow-hidden">
        {{-- Aksen Dekoratif --}}
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-500 rounded-full opacity-10"></div>
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-indigo-500 rounded-full opacity-10"></div>
        
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-12">
                <div class="w-10 h-10 bg-white/10 backdrop-blur rounded-xl flex items-center justify-center text-white"><i class="fa-solid fa-graduation-cap"></i></div>
                <span class="font-bold tracking-widest uppercase text-xs opacity-80">PKK Kemendikdasmen</span>
            </div>
            <h1 class="text-6xl font-extrabold leading-[1.1] mb-6">Meningkatkan<br><span class="text-blue-400">Ekselensi</span> SMK</h1>
            <p class="text-slate-400 max-w-sm leading-relaxed">Platform inovatif untuk mendukung pengembangan kreativitas dan kewirausahaan murid SMK.</p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex flex-col justify-center p-8 lg:p-24">
        <div class="max-w-md w-full mx-auto">
            <h2 class="text-2xl font-bold text-slate-900 mb-2">Masuk sebagai Guru</h2>
            <p class="text-slate-500 mb-8">Silakan masukkan NPSN dan kata sandi Anda untuk mengakses dashboard guru pembimbing.</p>

            <form action="{{ route('login.guru.proses') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">NPSN</label>
                    <div class="relative">
                        <input type="text" name="npsn" placeholder="Masukkan 8 digit NPSN sekolah" required 
                               class="w-full p-4 border border-slate-300 rounded-lg outline-none focus:border-blue-600 transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">KATA SANDI</label>
                    <input type="password" name="password" placeholder="Masukkan kata sandi" required 
                           class="w-full p-4 border border-slate-300 rounded-lg outline-none focus:border-blue-600 transition">
                </div>

                <button type="submit" class="w-full bg-[#0A193F] text-white py-4 rounded-lg font-bold hover:bg-slate-900 transition flex items-center justify-center gap-2">
                    Masuk Sekarang <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <p class="mt-8 text-center text-sm text-slate-600">
                Belum punya akun? <a href="{{ route('daftar') }}" class="text-green-700 font-bold hover:underline">Daftar Sekarang</a>
            </p>
        </div>
    </div>

</body>
</html>