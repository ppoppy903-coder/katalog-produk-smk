<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="flex min-h-screen bg-white text-slate-800">

    <div class="hidden lg:flex w-5/12 bg-[#0A193F] relative flex-col justify-between overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1573164713988-8665fc963095?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80')] bg-cover bg-center opacity-20 mix-blend-overlay"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-[#0A193F] via-transparent to-[#0A193F]/50"></div>
        <div class="relative z-10 p-12 flex flex-col h-full justify-between">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-white rounded-xl flex items-center justify-center shadow-md"><i class="fa-solid fa-graduation-cap text-[#0A193F] text-xl"></i></div>
                <span class="font-bold text-white text-xl tracking-tight">PKK Kemendikdasmen</span>
            </div>
            <div class="mt-auto mb-20">
                <h1 class="text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-4">Selamat Datang <br><span class="text-[#40E0D0]">Kembali!</span></h1>
                <p class="text-blue-100 text-sm leading-relaxed max-w-sm">Masuk ke portal vokasi untuk mengelola karya, memvalidasi produk siswa, dan mengembangkan ekosistem industri kreatif.</p>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex -space-x-3">
                    <img class="w-10 h-10 rounded-full border-2 border-[#0A193F] object-cover" src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80">
                    <img class="w-10 h-10 rounded-full border-2 border-[#0A193F] object-cover" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&auto=format&fit=crop&w=100&q=80">
                </div>
                <div><p class="text-[10px] font-bold text-blue-200 uppercase tracking-wider">Dipercayai oleh</p><p class="text-sm font-bold text-white">5,000+ Guru & Siswa</p></div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-7/12 bg-white flex flex-col justify-center items-center p-8 lg:p-12 overflow-y-auto">
        <div class="w-full max-w-md">

            <div class="mb-10">
                <h2 class="text-3xl font-bold text-[#0A193F] mb-3">Masuk ke Akun Anda</h2>
                <p class="text-sm text-slate-500">Silakan masukkan email dan kata sandi Anda untuk melanjutkan.</p>
            </div>

            <form action="/validasi-produk" method="GET" class="space-y-6">
                
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Email</label>
                    <input type="email" placeholder="contoh@email.com" class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-[#0A193F] focus:bg-white transition text-slate-800 placeholder:text-slate-400">
                </div>

                <div>
                    <div class="flex justify-between items-center mb-2">
                        <label class="block text-sm font-bold text-slate-700">Kata Sandi</label>
                        <a href="#" class="text-xs font-bold text-[#0A193F] hover:underline">Lupa kata sandi?</a>
                    </div>
                    <div class="relative">
                        <input type="password" placeholder="••••••••" class="w-full px-4 py-3.5 bg-slate-50 border border-slate-200 rounded-lg text-sm focus:outline-none focus:border-[#0A193F] focus:bg-white transition text-slate-800 placeholder:text-slate-400">
                        <i class="fa-regular fa-eye absolute right-4 top-1/2 -translate-y-1/2 text-slate-400 cursor-pointer hover:text-[#0A193F] transition"></i>
                    </div>
                </div>

                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="w-4 h-4 text-[#0A193F] border-slate-300 rounded focus:ring-[#0A193F] cursor-pointer">
                    <label for="remember" class="ml-2 text-sm text-slate-600 cursor-pointer">Ingat saya di perangkat ini</label>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-[#0A193F] text-white py-4 rounded-xl text-sm font-bold hover:bg-[#071330] transition shadow-md flex items-center justify-center gap-2">
                        Masuk <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    </button>
                </div>

            </form>

            <p class="text-center mt-6 text-sm text-slate-500">
                Belum punya akun? 
                <!-- Ubah href menjadi /daftar-guru?role=guru -->
                <a href="/daftar-guru?role=guru" class="font-bold text-[#0A193F] hover:underline">
                    Daftar Sekarang
                </a>
            </p>

        </div>
    </div>

</body>
</html>