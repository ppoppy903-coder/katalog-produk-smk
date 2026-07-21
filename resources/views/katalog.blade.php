<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk SMK - Kemendikdasmen PKK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-emerald-50 text-slate-800 antialiased flex flex-col min-h-screen">

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

    <section class="max-w-7xl mx-auto px-7 py-8 flex-grow w-full">
        <h1 class="text-3xl font-extrabold text-[#0F2857] mb-12">Katalog Produk</h1>

        {{-- 1. NAVIGASI KATEGORI (DIPINDAHKAN KE ATAS) --}}
        @php
            $kategori_data = [
                'Makanan dan Minuman' => ['icon' => 'fas fa-utensils', 'gradient' => 'from-orange-500/10 to-amber-500/5 hover:from-orange-500 hover:to-amber-500', 'text' => 'text-orange-600', 'border' => 'border-orange-100 hover:border-transparent'],
                'Budidaya' => ['icon' => 'fas fa-seedling', 'gradient' => 'from-emerald-500/10 to-teal-500/5 hover:from-emerald-500 hover:to-teal-500', 'text' => 'text-emerald-600', 'border' => 'border-emerald-100 hover:border-transparent'],
                'Industri Kreatif, Seni, dan Budaya' => ['icon' => 'fas fa-palette', 'gradient' => 'from-purple-500/10 to-pink-500/5 hover:from-purple-500 hover:to-pink-500', 'text' => 'text-purple-600', 'border' => 'border-purple-100 hover:border-transparent'],
                'Jasa, Pariwisata, dan Perdagangan' => ['icon' => 'fas fa-briefcase', 'gradient' => 'from-sky-500/10 to-blue-500/5 hover:from-sky-500 hover:to-blue-500', 'text' => 'text-sky-600', 'border' => 'border-sky-100 hover:border-transparent'],
                'Manufaktur dan Teknologi Terapan' => ['icon' => 'fas fa-industry', 'gradient' => 'from-slate-600/10 to-slate-500/5 hover:from-slate-700 hover:to-slate-600', 'text' => 'text-slate-700', 'border' => 'border-slate-200/60 hover:border-transparent'],
                'Bisnis Digital' => ['icon' => 'fas fa-chart-line', 'gradient' => 'from-indigo-500/10 to-blue-500/5 hover:from-indigo-500 hover:to-blue-500', 'text' => 'text-indigo-600', 'border' => 'border-indigo-100 hover:border-transparent'],
            ];
        @endphp

        <div class="mb-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($kategori_data as $nama => $data)
                <a href="{{ route('katalog') }}?kategori={{ urlencode($nama) }}" 
                class="group bg-gradient-to-br {{ $data['gradient'] }} p-6 rounded-2xl border {{ $data['border'] }} shadow-sm hover:shadow-xl hover:shadow-blue-900/5 transition-all duration-300 hover:-translate-y-1.5 flex flex-col justify-between min-h-[145px]">
                    <div class="space-y-4">
                        <div class="w-11 h-11 bg-white rounded-xl flex items-center justify-center text-base {{ $data['text'] }} shadow-sm group-hover:bg-white/20 group-hover:text-white transition-all duration-300">
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
        </div>

        {{-- 2. FORM PENCARIAN (POSISI BAWAH) --}}
        <div class="mb-10 text-center max-w-2xl mx-auto">
            <h1 class="text-2xl font-extrabold text-[#0A193F] mb-2">Cari Produk Kewirausahaan Murid SMK</h1>
            <p class="text-slate-500 text-sm mb-6">Temukan berbagai inovasi kreatif dari seluruh Indonesia</p>
            <form action="{{ route('katalog') }}" method="GET" class="relative group">
                {{-- Input tersembunyi ini memastikan kategori tetap terpilih saat mencari --}}
                @if(request('kategori'))
                    <input type="hidden" name="kategori" value="{{ request('kategori') }}">
                @endif
                
                <div class="flex items-center w-full bg-white border border-slate-200 rounded-full shadow-sm hover:shadow-md transition-all focus-within:ring-2 focus-within:ring-blue-900/10">
                    <i class="fas fa-search ml-5 text-slate-400 text-sm"></i>
                    <input type="text" name="search" placeholder="Ketik nama produk..." 
                        value="{{ request('search') }}"
                        class="w-full p-3.5 pl-3 bg-transparent outline-none text-sm placeholder:text-slate-400">
                    <button type="submit" 
                            class="mr-2 bg-[#0F2857] text-white px-6 py-2.5 rounded-full font-bold text-xs hover:bg-blue-900 transition-all active:scale-95">
                        Cari
                    </button>
                </div>
            </form>
        </div>

        {{-- Produk List --}}
        @if(isset($produk_kelompok) && $produk_kelompok->count() > 0)
            @foreach($produk_kelompok as $kategori => $items)
                <div class="mb-16">
                    <h2 class="text-2xl font-extrabold text-[#0F2857] mb-8">{{ $kategori }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($items as $produk)
                            @php
                                // LOGIKA BARU: Mengambil gambar dari array JSON secara aman
                                $foto_array = json_decode($produk->foto_produk, true);
                                $foto_pertama = (is_array($foto_array) && count($foto_array) > 0) ? $foto_array[0] : null;
                            @endphp
                            <div class="group bg-white rounded-3xl p-4 hover:shadow-2xl transition-all duration-300 border border-slate-100 flex flex-col justify-between">
                                <div>
                                    @if($foto_pertama)
                                        <img src="{{ asset('storage/'.$foto_pertama) }}" 
                                            alt="{{ $produk->nama_produk }}" 
                                            class="w-full h-48 object-cover rounded-2xl mb-4 bg-slate-100">
                                    @else
                                        <div class="w-full h-48 bg-slate-200 rounded-2xl mb-4 flex items-center justify-center text-slate-400 font-medium text-xs">No Image</div>
                                    @endif
                                    <h3 class="font-bold text-md text-[#0F2857] mb-1">{{ $produk->nama_produk }}</h3>
                                    <p class="text-xs text-blue-600 font-bold uppercase tracking-wider mb-2">{{ $produk->nama_merek }}</p>
                                    <p class="text-xs text-slate-500 line-clamp-2 mb-4 h-8">{{ $produk->deskripsi }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('produk.detail.publik', $produk->id) }}" class="text-xs text-blue-900 font-bold hover:underline inline-flex items-center gap-1">Lihat detail →</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-16 bg-slate-50 rounded-2xl">
                <p class="text-slate-500 text-sm">Belum ada produk yang ditemukan untuk pencarian ini.</p>
            </div>
        @endif
    </section>

    <footer class="bg-white border-t border-slate-100 py-10 px-8 text-center text-slate-400 text-xs font-medium tracking-wide">
        &copy; 2026 Kemendikdasmen. All rights reserved.
    </footer>
</body>
</html>