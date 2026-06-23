<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil - PKK SMK Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="flex h-screen overflow-hidden bg-slate-50">

    <div class="hidden lg:flex w-5/12 bg-[#0A193F] text-white p-12 flex-col justify-center relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="relative z-10">
            <h1 class="text-4xl font-extrabold mb-6">Meningkatkan Ekselensi Vokasi</h1>
            <p class="text-slate-300 mb-8">Berdayakan kreativitas dan keterampilan wirausaha siswa SMK melalui platform kolaborasi digital terdepan.</p>
            <div class="space-y-4">
                <div class="flex items-center gap-3 text-emerald-400 font-bold">
                    <i class="fa-solid fa-check-circle"></i> Sertifikasi Kompetensi Industri
                </div>
                <div class="flex items-center gap-3 text-emerald-400 font-bold">
                    <i class="fa-solid fa-check-circle"></i> Kemitraan Perusahaan Global
                </div>
            </div>
        </div>
    </div>

    <div class="flex-1 flex items-center justify-center p-8">
        <div class="text-center max-w-md">
            <div class="w-24 h-24 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-8 shadow-inner">
                <i class="fa-solid fa-check text-4xl text-emerald-600"></i>
            </div>
            
            <h2 class="text-3xl font-bold text-[#0A193F] mb-4">Pendaftaran Berhasil!</h2>
            <p class="text-slate-500 mb-10 leading-relaxed">
                Akun <b>Guru Pembimbing</b> Anda telah berhasil dibuat. Anda sekarang dapat mulai mendampingi dan memvalidasi produk inovasi siswa SMK dalam ekosistem PKK.
            </p>
            
            <a href="{{ route('login.guru') }}" class="block w-full bg-[#0A193F] text-white py-4 rounded-xl font-bold hover:bg-blue-900 transition shadow-lg">
                Masuk ke Dashboard <i class="fa-solid fa-arrow-right ml-2"></i>
            </a>
            
            <p class="mt-8 text-sm text-slate-500">
                Ada masalah? <a href="#" class="text-[#0A193F] font-bold underline">Hubungi Tim Dukungan</a>
            </p>
        </div>
    </div>
</body>
</html>