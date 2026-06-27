<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemendikdasmen PKK - Katalog Produk SMK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased">

    {{-- NAVBAR --}}
    <nav class="bg-white/90 backdrop-blur-md px-8 py-5 flex justify-between items-center sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="font-extrabold text-xl text-[#0A2540] tracking-tight flex items-center gap-2">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-tr from-blue-600 to-indigo-700 flex items-center justify-center text-white text-sm">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <span>PKK <span class="text-blue-600 font-medium text-sm block md:inline md:ml-1">Murid SMK</span></span>
        </div>
        <div class="flex items-center space-x-6 text-sm font-semibold text-slate-600">
            <a href="/" class="text-blue-600 border-b-2 border-blue-600 pb-1">Beranda</a>
            <a href="{{ route('katalog') }}" class="hover:text-blue-600 transition-colors">Katalog</a>
            <a href="{{ route('produk.terbaru') }}" class="hover:text-blue-600 transition-colors">Terbaru</a>
        </div>
    </nav>

    {{-- HERO SECTION --}}
    <section class="max-w-7xl mx-auto px-8 py-20 grid md:grid-cols-2 gap-12 items-center">
        <div class="space-y-6">
            <span class="inline-flex items-center gap-1.5 text-blue-700 bg-blue-50 border border-blue-100 px-3 py-1.5 rounded-full font-bold text-xs uppercase tracking-wider">
                <span class="w-1.5 h-1.5 rounded-full bg-blue-600 animate-pulse"></span> Kreativitas Vokasi
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-[#0A2540] leading-[1.1] tracking-tight">
                Wujudkan Ide Kreatif & Jiwa Wirausaha
            </h1>
            <p class="text-base md:text-lg text-slate-500 leading-relaxed max-w-lg">
                Proyek Kreatif dan Kewirausahaan (PKK) adalah wadah bagi murid SMK untuk mengembangkan kompetensi melalui praktik nyata pembuatan produk unggulan berbasis industri.
            </p>
            <div class="pt-4 flex flex-wrap gap-4">
                <a href="{{ route('katalog') }}" class="bg-blue-600 text-white px-7 py-3.5 rounded-xl font-bold hover:bg-blue-700 shadow-lg shadow-blue-600/20 hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                    Lihat Katalog →
                </a>
                <a href="{{ route('daftar') }}" class="bg-[#059669] text-white px-7 py-3.5 rounded-xl font-bold hover:bg-[#047857] shadow-lg shadow-emerald-600/20 hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                    Daftar Sekarang
                </a>
            </div>
        </div>
        <div class="relative group">
            <div class="absolute inset-0 bg-gradient-to-tr from-blue-600 to-emerald-500 rounded-3xl opacity-20 blur-2xl group-hover:opacity-25 transition-opacity"></div>
            <div class="bg-slate-200 rounded-3xl h-[400px] overflow-hidden shadow-md border border-slate-100 flex items-center justify-center">
                <img src="{{ asset('images/Background PKK.png') }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 rounded-3xl">
            </div>
        </div>
    </section>

    {{-- SECTION TENTANG PKK --}}
    <section class="max-w-7xl mx-auto px-8 py-16">
        <div class="grid md:grid-cols-2 gap-16 items-center bg-white p-8 md:p-12 rounded-3xl border border-slate-100 shadow-sm">
            <div class="bg-slate-100 rounded-2xl h-72 overflow-hidden flex items-center justify-center">
                <img src="{{ asset('images/pkk-about-illustration.png') }}" alt="Ilustrasi PKK" class="w-full h-full object-cover rounded-2xl">
            </div>
            <div class="space-y-4">
                <span class="text-blue-600 font-bold text-xs uppercase tracking-widest block">Tentang PKK</span>
                <h3 class="text-3xl font-extrabold text-[#0A2540] leading-tight">Apa itu Proyek Kreatif dan Kewirausahaan?</h3>
                <p class="text-slate-600 leading-relaxed text-sm md:text-base">
                    Proyek Kreatif dan Kewirausahaan (PKK) merupakan program pengembangan usaha bagi murid SMK yang telah memiliki usaha. 
                    Program ini memberikan dukungan berupa bantuan dana pengembangan, pendampingan intensif, serta pelatihan 
                    <em class="text-blue-600 font-semibold not-italic">(coaching)</em> usaha guna meningkatkan kompetensi dan kemandirian murid.
                </p>
            </div>
        </div>
    </section>

    {{-- BIDANG KEAHLIAN - WARNA PREMIUM & HIDUP --}}
    <section class="max-w-7xl mx-auto px-8 py-20 space-y-12">
        <div class="text-center max-w-xl mx-auto space-y-2">
            <h2 class="text-3xl font-extrabold text-[#0A2540] tracking-tight">Kategori Produk</h2>
            <p class="text-slate-500 text-sm md:text-base">Pilih salah satu kategori untuk melihat koleksi produk unggulan kami.</p>
        </div>
        
        @php
            $kategori_data = [
                'Makanan dan Minuman' => [
                    'icon' => 'fas fa-utensils', 
                    'gradient' => 'from-orange-500/10 to-amber-500/5 hover:from-orange-500 hover:to-amber-500', 
                    'text' => 'text-orange-600', 
                    'border' => 'border-orange-100 hover:border-transparent'
                ],
                'Budidaya' => [
                    'icon' => 'fas fa-seedling', 
                    'gradient' => 'from-emerald-500/10 to-teal-500/5 hover:from-emerald-500 hover:to-teal-500', 
                    'text' => 'text-emerald-600', 
                    'border' => 'border-emerald-100 hover:border-transparent'
                ],
                'Industri Kreatif, Seni, dan Budaya' => [
                    'icon' => 'fas fa-palette', 
                    'gradient' => 'from-purple-500/10 to-pink-500/5 hover:from-purple-500 hover:to-pink-500', 
                    'text' => 'text-purple-600', 
                    'border' => 'border-purple-100 hover:border-transparent'
                ],
                'Jasa, Pariwisata, dan Perdagangan' => [
                    'icon' => 'fas fa-briefcase', 
                    'gradient' => 'from-sky-500/10 to-blue-500/5 hover:from-sky-500 hover:to-blue-500', 
                    'text' => 'text-sky-600', 
                    'border' => 'border-sky-100 hover:border-transparent'
                ],
                'Manufaktur dan Teknologi Terapan' => [
                    'icon' => 'fas fa-industry', 
                    'gradient' => 'from-slate-600/10 to-slate-500/5 hover:from-slate-700 hover:to-slate-600', 
                    'text' => 'text-slate-700', 
                    'border' => 'border-slate-200/60 hover:border-transparent'
                ],
                'Bisnis Digital' => [
                    'icon' => 'fas fa-chart-line', 
                    'gradient' => 'from-indigo-500/10 to-blue-500/5 hover:from-indigo-500 hover:to-blue-500', 
                    'text' => 'text-indigo-600', 
                    'border' => 'border-indigo-100 hover:border-transparent'
                ],
            ];
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kategori_data as $nama => $data)
                <a href="{{ route('katalog') }}?kategori={{ urlencode($nama) }}" 
                   class="group bg-gradient-to-br {{ $data['gradient'] }} p-6 rounded-2xl border {{ $data['border'] }} shadow-sm hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between min-h-[145px]">
                    
                    <div class="space-y-4">
                        {{-- Icon Badge --}}
                        <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center text-base {{ $data['text'] }} shadow-sm group-hover:bg-white/20 group-hover:text-white transition-all duration-300">
                            <i class="{{ $data['icon'] }}"></i>
                        </div>
                        
                        {{-- Kategori Title --}}
                        <h3 class="text-base font-bold text-[#0A2540] leading-snug group-hover:text-white transition-colors duration-300">
                            {{ $nama }}
                        </h3>
                    </div>
                    
                    {{-- Interactive Label --}}
                    <div class="pt-2 flex items-center gap-1 text-[11px] font-bold text-blue-600 group-hover:text-white/90 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
                        Jelajahi Produk <i class="fas fa-arrow-right text-[9px]"></i>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-white border-t border-slate-100 py-10 px-8 text-center text-slate-400 text-xs font-medium tracking-wide">
        &copy; 2026 Kemendikdasmen. All rights reserved.
    </footer>

</body>
</html>