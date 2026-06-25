<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk sebagai Guru - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="flex h-screen bg-white">

    <div class="hidden lg:flex lg:w-1/2 bg-[#0A193F] text-white flex-col justify-center p-16 relative">
        <div class="z-10">
            <h1 class="text-5xl font-extrabold leading-tight mb-6">Meningkatkan<br>Ekselensi Vokasi</h1>
            <p class="text-blue-200 text-lg max-w-md">
                Pemberdayaan kreativitas siswa melalui sistem manajemen proyek terpadu untuk menciptakan generasi vokasi yang unggul dan berdaya saing global.
            </p>
        </div>
        <div class="absolute bottom-16 left-16 opacity-20">
            <i class="fa-solid fa-graduation-cap text-9xl"></i>
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