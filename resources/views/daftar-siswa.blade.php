<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun Siswa - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .input-modern { @apply w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all duration-300; }
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
            <div class="mb-8">
                <h2 class="text-2xl font-extrabold text-[#0A193F] mb-2">Buat Akun Siswa</h2>
                <p class="text-slate-500 text-sm">Lengkapi data diri untuk memulai petualanganmu.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-100 text-red-600 rounded-2xl text-xs font-bold">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('daftar.siswa.proses') }}" method="POST" class="space-y-6">
                @csrf
                
                {{-- Baris Nama & Email --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-2 ml-1">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="Nama Anda" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-2 ml-1">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="contoh@email.com" required>
                    </div>
                </div>

                {{-- Baris Password --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-2 ml-1">Kata Sandi</label>
                        <input type="password" name="password" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="••••••••" required>
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-2 ml-1">Ulangi Sandi</label>
                        <input type="password" name="password_confirmation" class="w-full px-5 py-4 bg-slate-200 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="••••••••" required>
                    </div>
                </div>

                {{-- NPSN --}}
                <div>
                    <label class="block text-[10px] font-bold text-[#0A193F] uppercase mb-2 ml-1">NPSN Sekolah</label>
                    <input type="text" name="npsn" value="{{ old('npsn') }}" placeholder="Masukkan 8 digit NPSN" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">NISN SISWA</label>
                    <input type="text" name="nisn" class="w-full mt-1 p-3 border rounded-xl" placeholder="Masukkan 10 digit NISN" required>
                </div>

                <button type="submit" class="w-full py-4 bg-[#0A193F] text-white rounded-2xl font-bold hover:bg-slate-800 transition-all active:scale-95">
                    Buat Akun →
                </button>
            </form>

            <p class="text-center text-sm text-slate-500 mt-8">
                Sudah punya akun? <a href="{{ route('login.siswa') }}" class="font-bold text-[#0A193F] hover:underline">Masuk di sini</a>
            </p>
        </div>
    </div>
</body>
</html>