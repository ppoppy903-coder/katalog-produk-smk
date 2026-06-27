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
<body class="bg-white text-slate-800">

    {{-- NAVBAR --}}
    <nav class="bg-white px-8 py-6 flex justify-between items-center sticky top-0 z-50">
        <div class="font-bold text-xl text-blue-900">Proyek Kreatif dan Kewirausahaan Murid SMK</div>
        <div class="space-x-8 text-sm font-medium text-slate-600">
            <a href="/" class="text-blue-900 border-b-2 border-blue-900 pb-1">Beranda</a>
            <a href="{{ route('katalog') }}" class="hover:text-blue-900 transition">Katalog</a>
            <a href="{{ route('produk.terbaru') }}" class="hover:text-blue-900 transition">Terbaru</a>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section class="max-w-7xl mx-auto px-8 py-16 grid md:grid-cols-2 gap-12 items-center">
        <div>
            <span class="text-blue-600 font-bold text-sm uppercase tracking-widest">Masa Depan SMK</span>
            <h1 class="text-5xl md:text-6xl font-extrabold mt-4 leading-[1.1] text-[#0F2857]">
                Wujudkan Ide Kreatif & Jiwa Wirausaha
            </h1>
            <p class="mt-6 text-lg text-slate-500 leading-relaxed max-w-md">
                Proyek Kreatif dan Kewirausahaan (PKK) adalah wadah bagi murid SMK untuk mengembangkan kompetensi melalui praktik nyata pembuatan produk unggulan berbasis industri.
            </p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="{{ route('katalog') }}" class="bg-[#0F2857] text-white px-8 py-4 rounded-full font-semibold hover:bg-blue-900 transition">Lihat Katalog →</a>
                <a href="{{ route('daftar') }}" class="bg-emerald-500 text-white px-8 py-4 rounded-full font-semibold hover:bg-emerald-600 transition">Daftar Sekarang</a>
            </div>
        </div>
        <div class="bg-slate-100 rounded-3xl h-96 flex items-center justify-center">
            <img src="{{ asset('images/Background PKK.png') }}" class="w-full h-full object-cover rounded-3xl">
        </div>
    </section>

    {{-- SECTION TENTANG PKK (Modern Minimalist) --}}
    <section class="max-w-7xl mx-auto px-8 py-20">
        <div class="grid md:grid-cols-2 gap-20 items-center">
            <div class="bg-slate-100 rounded-3xl h-80 flex items-center justify-center">
                <img src="{{ asset('images/pkk-about-illustration.png') }}" alt="Ilustrasi PKK" class="w-full h-full object-cover rounded-3xl">            </div>
            <div>
                <h2 class="text-blue-600 font-bold text-sm uppercase tracking-widest mb-2">Tentang PKK</h2>
                <h3 class="text-4xl font-extrabold text-[#0F2857] mb-6 leading-tight">Apa itu Proyek Kreatif dan Kewirausahaan?</h3>
                <p class="text-lg text-slate-600 leading-relaxed">
                    Proyek Kreatif dan Kewirausahaan (PKK) merupakan program pengembangan usaha bagi murid SMK yang telah memiliki usaha. 
                    Program ini memberikan dukungan berupa bantuan dana pengembangan, pendampingan intensif, serta pelatihan 
                    <em>(coaching)</em> usaha guna meningkatkan kompetensi dan kemandirian murid.
                </p>
            </div>
        </div>
    </section>

    {{-- BIDANG KEAHLIAN DENGAN WARNA DINAMIS --}}
    <section class="max-w-7xl mx-auto px-8 py-20">
        <div class="mb-16 text-center max-w-2xl mx-auto">
            <h2 class="text-4xl font-extrabold text-[#0F2857] mb-4">Kategori Produk</h2>
            <p class="text-slate-500 text-lg">Pilih salah satu kategori untuk melihat produk unggulan kami.</p>
        </div>
        
        @php
            $kategori_data = [
                'Makanan dan Minuman' => ['icon' => 'fas fa-utensils', 'bg' => 'bg-orange-50', 'text' => 'text-orange-600', 'border' => 'hover:border-orange-200'],
                'Budidaya' => ['icon' => 'fas fa-seedling', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600', 'border' => 'hover:border-emerald-200'],
                'Industri Kreatif, Seni, dan Budaya' => ['icon' => 'fas fa-palette', 'bg' => 'bg-purple-50', 'text' => 'text-purple-600', 'border' => 'hover:border-purple-200'],
                'Jasa, Pariwisata, dan Perdagangan' => ['icon' => 'fas fa-briefcase', 'bg' => 'bg-sky-50', 'text' => 'text-sky-600', 'border' => 'hover:border-sky-200'],
                'Manufaktur dan Teknologi Terapan' => ['icon' => 'fas fa-industry', 'bg' => 'bg-slate-100', 'text' => 'text-slate-700', 'border' => 'hover:border-slate-300'],
                'Bisnis Digital' => ['icon' => 'fas fa-chart-line', 'bg' => 'bg-indigo-50', 'text' => 'text-indigo-600', 'border' => 'hover:border-indigo-200'],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($kategori_data as $nama => $data)
                <a href="{{ route('katalog') }}?kategori={{ urlencode($nama) }}" 
                {{-- Perhatikan class di bawah, kita tambahkan {{ $data['bg'] }} --}}
                class="group {{ $data['bg'] }} border border-transparent p-10 rounded-3xl hover:shadow-xl transition-all duration-500 hover:-translate-y-2 {{ $data['border'] }}">
                    
                    {{-- Ikon --}}
                    <div class="w-16 h-16 bg-white/50 rounded-2xl flex items-center justify-center text-2xl {{ $data['text'] }} mb-8 group-hover:scale-110 transition-transform duration-300">
                        <i class="{{ $data['icon'] }}"></i>
                    </div>
                    
                    {{-- Nama Kategori --}}
                    <h3 class="text-xl font-bold text-[#0F2857] mb-2">{{ $nama }}</h3>
                    <p class="text-slate-500 text-sm opacity-80"></p>
                </a>
            @endforeach
        </div>
        </section>

    {{-- FOOTER --}}
    <footer class="bg-white border-t border-slate-100 py-12 px-8 text-center text-slate-500">
        © 2026 Kemendikdasmen. All rights reserved.
    </footer>

</body>
</html>