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
<body class="bg-white text-slate-800 antialiased">

    <nav class="bg-white/90 backdrop-blur-md px-4 sm:px-8 py-3.5 flex flex-col sm:flex-row justify-between items-center gap-3 sticky top-0 z-50 border-b border-slate-100 shadow-sm">
        <div class="flex items-center gap-2.5">
            <img src="{{ asset('images/web-katalog-desain.png') }}" alt="Logo" class="h-8 sm:h-10 w-auto">
            <div class="font-extrabold text-sm sm:text-lg text-[#0A2540] tracking-tight"><span>Proyek Kreatif & Kewirausahaan Murid SMK</span></div>
        </div>
        <div class="flex items-center space-x-4 sm:space-x-6 text-xs sm:text-sm font-semibold text-slate-600">
            <a href="/" class="hover:text-blue-600 transition-colors">Beranda</a>
            <a href="{{ route('katalog') }}" class="hover:text-blue-600 transition-colors">Katalog</a>
            <a href="{{ route('produk.terbaru') }}" class="hover:text-blue-600 transition-colors">Terbaru</a>
        </div>
    </nav>

    {{-- WRAPPER TOTAL --}}
    <div class="relative overflow-hidden bg-white">
        
        {{-- Bola Cahaya Ambient (Mesh Glow) Dinamis --}}
        <div class="absolute top-[-5%] left-[-10%] w-[700px] h-[700px] bg-blue-600/15 rounded-full blur-[130px] pointer-events-none"></div>
        <div class="absolute top-[20%] right-[-10%] w-[650px] h-[650px] bg-orange-500/20 rounded-full blur-[130px] pointer-events-none"></div>
        <div class="absolute bottom-[15%] left-[-5%] w-[600px] h-[600px] bg-indigo-500/10 rounded-full blur-[120px] pointer-events-none"></div>

        {{-- HERO SECTION --}}
        <div class="relative pt-16 pb-36 bg-gradient-to-br from-blue-600/5 via-transparent to-orange-500/5">
            <section class="max-w-7xl mx-auto px-8 grid md:grid-cols-2 gap-12 items-center relative z-10">
                <div class="space-y-6">
                    <span class="inline-flex items-center gap-1.5 text-blue-700 bg-blue-100/70 border border-blue-200 px-3.5 py-1.5 rounded-full font-bold text-xs uppercase tracking-wider shadow-sm">
                        <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span> Masa Depan Murid SMK
                    </span>
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-[#0A2540] leading-[1.15] tracking-tight">
                        Wujudkan Ide Kreatif <br>
                        <span class="bg-gradient-to-r from-blue-600 via-indigo-600 to-orange-600 bg-clip-text text-transparent drop-shadow-sm">
                            & Jiwa Wirausaha
                        </span>
                    </h1>
                    <p class="text-base md:text-lg text-slate-500 font-medium leading-relaxed max-w-lg">
                        Proyek Kreatif dan Kewirausahaan (PKK) adalah wadah bagi murid SMK untuk mengembangkan kompetensi melalui praktik nyata pembuatan produk unggulan berbasis industri.
                    </p>
                    <div class="pt-4 flex flex-wrap gap-4">
                        <a href="{{ route('katalog') }}" class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-7 py-3.5 rounded-xl font-bold hover:from-blue-700 hover:to-indigo-700 shadow-lg shadow-blue-600/30 hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                            Lihat Katalog →
                        </a>
                        <a href="{{ route('daftar') }}" class="bg-gradient-to-r from-emerald-600 to-teal-600 text-white px-7 py-3.5 rounded-xl font-bold hover:from-emerald-700 hover:to-teal-700 shadow-lg shadow-emerald-600/30 hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
                
                {{-- FIX UKURAN GAMBAR: Dibuat w-full maksimal tanpa kompresi lebar --}}
                <div class="relative group w-full">
                    <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/20 to-orange-500/30 rounded-3xl blur-2xl opacity-90 group-hover:opacity-100 transition-opacity duration-500"></div>
                    <div class="bg-white p-3 rounded-3xl shadow-xl border border-slate-100 relative z-10 transition-transform duration-500 group-hover:-translate-y-1">
                        <div class="rounded-2xl h-[400px] overflow-hidden flex items-center justify-center bg-slate-50">
                            <img src="{{ asset('images/Background PKK.png') }}" class="w-full h-full object-cover rounded-2xl transition-transform duration-700 group-hover:scale-105">
                        </div>
                    </div>
                </div>
            </section>

            {{-- FIX GELOMBANG SEAMLESS DENGAN TINGGI PROPORSIAL --}}
            <div class="absolute bottom-0 left-0 w-full leading-[0] pointer-events-none z-20">
                <svg class="relative block w-full h-[80px]" viewBox="0 0 1440 120" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,32L120,42.7C240,53,480,75,720,74.7C960,75,1200,53,1320,42.7L1440,32L1440,120L1320,120C1200,120,960,120,720,120C480,120,240,120,120,120L0,120Z" fill="#ffffff"></path>
                </svg>
            </div>
        </div>

        {{-- SECTION TENTANG PKK --}}
        <div class="bg-white py-16 relative z-20">
            <section class="max-w-7xl mx-auto px-8">
                <div class="grid md:grid-cols-2 gap-16 items-center bg-slate-50 p-8 md:p-12 rounded-3xl border border-slate-100 shadow-sm">
                    <div class="bg-slate-200 rounded-2xl h-72 overflow-hidden flex items-center justify-center shadow-inner">
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
            
            {{-- Gelombang Keluar Menuju Area Kategori --}}
            <div class="absolute bottom-0 left-0 w-full leading-[0] pointer-events-none">
                <svg class="relative block w-full h-[60px]" viewBox="0 0 1440 120" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0,64L120,58.7C240,53,480,43,720,53C960,64,1200,96,1320,106.7L1440,117L1440,120L1320,120C1200,120,960,120,720,120C480,120,240,120,120,120L0,120Z" fill="#ffffff"></path>
                </svg>
            </div>
        </div>

        {{-- BIDANG KEAHLIAN (KATEGORI) --}}
        <div class="bg-white">
            <section class="max-w-7xl mx-auto px-8 py-20 space-y-12 relative z-20">
                <div class="text-center max-w-xl mx-auto space-y-2">
                    <h2 class="text-3xl font-extrabold text-[#0A2540] tracking-tight">Kategori Produk</h2>
                    <p class="text-slate-500 text-sm md:text-base">Pilih salah satu kategori untuk melihat koleksi produk unggulan kami.</p>
                </div>
                
                @php
                    $kategori_data = [
                        'Makanan dan Minuman' => [
                            'icon' => 'fas fa-utensils', 
                            'gradient' => 'from-orange-500/10 to-amber-500/5 hover:from-orange-600 hover:to-orange-500', 
                            'text' => 'text-orange-600 group-hover:text-white', 
                            'border' => 'border-orange-100 hover:border-transparent bg-slate-50 shadow-sm'
                        ],
                        'Budidaya' => [
                            'icon' => 'fas fa-seedling', 
                            'gradient' => 'from-emerald-500/10 to-teal-500/5 hover:from-emerald-600 hover:to-emerald-500', 
                            'text' => 'text-emerald-600 group-hover:text-white', 
                            'border' => 'border-emerald-100 hover:border-transparent bg-slate-50 shadow-sm'
                        ],
                        'Industri Kreatif, Seni, dan Budaya' => [
                            'icon' => 'fas fa-palette', 
                            'gradient' => 'from-purple-500/10 to-pink-500/5 hover:from-purple-600 hover:to-purple-500', 
                            'text' => 'text-purple-600 group-hover:text-white', 
                            'border' => 'border-purple-100 hover:border-transparent bg-slate-50 shadow-sm'
                        ],
                        'Jasa, Pariwisata, dan Perdagangan' => [
                            'icon' => 'fas fa-briefcase', 
                            'gradient' => 'from-sky-500/10 to-blue-500/5 hover:from-blue-600 hover:to-blue-500', 
                            'text' => 'text-sky-600 group-hover:text-white', 
                            'border' => 'border-sky-100 hover:border-transparent bg-slate-50 shadow-sm'
                        ],
                        'Manufaktur dan Teknologi Terapan' => [
                            'icon' => 'fas fa-industry', 
                            'gradient' => 'from-slate-500/10 to-slate-400/5 hover:from-slate-600 hover:to-slate-500', 
                            'text' => 'text-slate-700 group-hover:text-white', 
                            'border' => 'border-slate-200 hover:border-transparent bg-slate-50 shadow-sm'
                        ],
                        'Bisnis Digital' => [
                            'icon' => 'fas fa-chart-line', 
                            'gradient' => 'from-indigo-500/10 to-blue-500/5 hover:from-indigo-600 hover:to-indigo-500', 
                            'text' => 'text-indigo-600 group-hover:text-white', 
                            'border' => 'border-indigo-100 hover:border-transparent bg-slate-50 shadow-sm'
                        ],
                    ];
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($kategori_data as $nama => $data)
                        <a href="{{ route('katalog') }}?kategori={{ urlencode($nama) }}" 
                           class="group {{ $data['border'] }} p-6 rounded-2xl border bg-gradient-to-br {{ $data['gradient'] }} hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between min-h-[145px]">
                            
                            <div class="space-y-4">
                                <div class="w-11 h-11 bg-white border border-slate-100 rounded-xl flex items-center justify-center text-base {{ $data['text'] }} shadow-sm group-hover:bg-white/20 transition-all duration-300">
                                    <i class="{{ $data['icon'] }}"></i>
                                </div>
                                <h3 class="text-base font-bold text-[#0A2540] leading-snug group-hover:text-white transition-colors duration-300">
                                    {{ $nama }}
                                </h3>
                            </div>
                            
                            <div class="pt-2 flex items-center gap-1 text-[11px] font-bold text-blue-600 group-hover:text-white/90 opacity-0 group-hover:opacity-100 transform translate-x-2 group-hover:translate-x-0 transition-all duration-300">
                                Jelajahi Produk <i class="fas fa-arrow-right text-[9px]"></i>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        </div>

        {{-- FOOTER --}}
        <footer class="bg-white border-t border-slate-100 py-10 px-8 text-center text-slate-400 text-xs font-medium tracking-wide relative z-20">
            &copy; 2026 Kemendikdasmen. All rights reserved.
        </footer>
    </div>

</body>
</html>