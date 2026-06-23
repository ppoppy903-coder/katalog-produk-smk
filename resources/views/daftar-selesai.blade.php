<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Berhasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }</style>
</head>
<body class="h-screen flex items-center justify-center p-6">

    <div class="max-w-md w-full bg-white p-10 rounded-3xl shadow-sm border border-slate-100 text-center">
        <div class="w-20 h-20 bg-green-50 text-green-500 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
        </div>

        <h1 class="text-2xl font-extrabold text-[#0A193F] mb-3">Profil Selesai Diperbarui!</h1>
        <p class="text-slate-500 text-sm mb-8 leading-relaxed">
            Data profil Anda telah berhasil disimpan. Sekarang Anda dapat mulai mengelola produk kreatif dan memantau performa wirausaha Anda di dashboard.
        </p>

        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 mb-8 text-left">
            <div class="flex items-center gap-3">
                <div class="bg-white p-2 rounded-lg border text-[#0A193F]">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <div>
                    <p class="text-xs font-bold text-slate-800">Akun Terverifikasi</p>
                    <p class="text-[10px] text-slate-400">Identitas Anda telah divalidasi oleh sistem secara otomatis.</p>
                </div>
            </div>
        </div>

        <div class="space-y-3">
            <a href="{{ route('dashboard.siswa') }}" class="block w-full py-3 bg-[#0A193F] text-white rounded-xl font-bold hover:bg-slate-800 transition">
                Masuk ke Dashboard →
            </a>
            <a href="{{ route('katalog') }}" class="block w-full py-3 bg-emerald-50 text-emerald-700 rounded-xl font-bold hover:bg-emerald-100 transition">
                Lihat Katalog Produk
            </a>
        </div>
    </div>

</body>
</html>