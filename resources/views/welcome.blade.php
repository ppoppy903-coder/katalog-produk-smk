<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemendikdasmen PKK - Katalog Produk SMK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style> 
        body { font-family: 'Inter', sans-serif; } 
    </style>
</head>
<body class="bg-slate-50 text-slate-800">

    {{-- NAVBAR --}}
    <nav class="bg-white px-8 py-4 flex justify-between items-center shadow-sm sticky top-0 z-50">
        <div class="font-bold text-xl text-blue-900">Proyek Kreatif dan Kewirausahaan Murid SMK</div>
        <div class="space-x-6 text-sm font-medium text-slate-600">
            <a href="/" class="text-blue-900 border-b-2 border-blue-900 pb-1">Beranda</a>
            <a href="{{ route('katalog') }}" class="hover:text-blue-900 transition">Katalog</a>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section class="max-w-7xl mx-auto px-8 py-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="bg-teal-100 text-teal-800 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wide">Masa Depan SMK</span>
            <h1 class="text-4xl md:text-5xl font-bold mt-6 leading-tight text-blue-900">
                Wujudkan Ide Kreatif & Jiwa Wirausaha
            </h1>
            <p class="mt-4 text-slate-600 leading-relaxed max-w-md">
                Proyek Kreatif dan Kewirausahaan (PKK) adalah wadah bagi siswa SMK untuk mengembangkan kompetensi melalui praktik nyata pembuatan produk unggulan berbasis industri.
            </p>
            <div class="mt-8 flex space-x-4">
                <a href="{{ route('katalog') }}" class="bg-blue-900 text-white px-6 py-3 rounded-md font-semibold hover:bg-blue-800 transition">Lihat Katalog Produk →</a>
                <a href="{{ route('daftar') }}" class="bg-emerald-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-emerald-600 transition">Daftar Sekarang</a>
            </div>
        </div>
        <img src="{{ asset('images/Background PKK.png') }}" class="rounded-3xl shadow-2xl w-full max-w-lg h-auto mx-auto transform hover:scale-105 transition-transform duration-500">
    </section>

    {{-- BIDANG KEAHLIAN --}}
    <section class="max-w-7xl mx-auto px-8 py-12">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-blue-900 mb-2">Kategori Produk Kewirausahaan Murid SMK</h2>
            <p class="text-slate-500">Pilih salah satu produk kewirausahaan kami.</p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-5 gap-6">
            {{-- Menggunakan $ikon_bidang dari ViewServiceProvider yang sudah kita buat --}}
            @foreach($ikon_bidang as $nama => $icon)
                <a href="{{ route('katalog') }}?kategori={{ urlencode($nama) }}" 
                   class="group bg-white p-5 rounded-2xl border border-slate-200 text-center shadow-sm hover:shadow-lg hover:border-blue-300 transition-all duration-200">
                    <div class="text-2xl text-blue-900 mb-3 group-hover:text-blue-600 transition">
                        <i class="{{ $icon }}"></i>
                    </div>
                    <h3 class="font-bold text-sm text-blue-900 group-hover:text-blue-700 transition">
                        {{ $nama }}
                    </h3>
                </a>
            @endforeach
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-slate-800 text-slate-300 py-8 px-8 text-sm text-center mt-12">
        © 2026 Kemendikdasmen. All rights reserved.
    </footer>

</body>
</html>