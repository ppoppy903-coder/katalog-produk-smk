<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk SMK - Kemendikdasmen PKK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body class="bg-white text-slate-800 flex flex-col min-h-screen antialiased">

    {{-- NAVBAR TANPA GARIS --}}
    <nav class="bg-white/80 backdrop-blur-md px-8 py-6 flex justify-between items-center sticky top-0 z-50">
        <div class="font-bold text-xl text-blue-900 tracking-tight">Proyek Kreatif dan Kewirausahaan Murid SMK</div>
        <div class="flex items-center space-x-8 text-sm font-medium text-slate-600">
            <a href="/" class="hover:text-blue-900 transition-colors">Beranda</a>
            <a href="/katalog" class="text-blue-900 border-b-2 border-blue-900 pb-1">Katalog</a>
            <a href="{{ route('produk.terbaru') }}" class="hover:text-blue-900 transition-colors">Terbaru</a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-8 py-12 flex-grow w-full">
        <h1 class="text-3xl font-extrabold text-[#0F2857] mb-10">Katalog Produk</h1>

        {{-- FORM PENCARIAN --}}
        <form action="{{ route('katalog') }}" method="GET" class="mb-12">
            <div class="relative flex items-center w-full"> 
                <input type="text" name="search" placeholder="Cari nama produk..." 
                       value="{{ request('search') }}"
                       class="w-full p-4 pl-6 bg-slate-50 rounded-full shadow-inner focus:ring-2 focus:ring-blue-900 outline-none transition text-sm">
                <button type="submit" 
                        class="absolute right-2 bg-[#0F2857] text-white px-6 py-2 rounded-full font-bold text-sm hover:bg-blue-900 transition-all active:scale-95 shadow-lg">
                    Cari Produk
                </button>
            </div>
        </form>

        {{-- NAVIGASI KATEGORI --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            @php
                $kategori_data = [
                    'Makanan dan Minuman' => ['icon' => 'fas fa-utensils', 'bg' => 'bg-orange-50', 'text' => 'text-orange-600'],
                    'Budidaya' => ['icon' => 'fas fa-seedling', 'bg' => 'bg-emerald-50', 'text' => 'text-emerald-600'],
                    'Industri Kreatif, Seni, dan Budaya' => ['icon' => 'fas fa-palette', 'bg' => 'bg-purple-50', 'text' => 'text-purple-600'],
                    'Jasa, Pariwisata, dan Perdagangan' => ['icon' => 'fas fa-briefcase', 'bg' => 'bg-sky-50', 'text' => 'text-sky-600'],
                    'Manufaktur dan Teknologi Terapan' => ['icon' => 'fas fa-industry', 'bg' => 'bg-slate-100', 'text' => 'text-slate-700'],
                    'Bisnis Digital' => ['icon' => 'fas fa-chart-line', 'bg' => 'bg-indigo-50', 'text' => 'text-indigo-600'],
                ];
            @endphp

            @foreach($kategori_data as $nama => $data)
                <a href="{{ route('katalog') }}?kategori={{ urlencode($nama) }}" 
                   class="group {{ $data['bg'] }} p-6 rounded-2xl transition-all duration-300 hover:shadow-md {{ ($kategori_filter ?? '') == $nama ? 'ring-2 ring-blue-900' : '' }}">
                    <div class="w-12 h-12 bg-white/60 rounded-xl flex items-center justify-center text-lg {{ $data['text'] }} mb-4 group-hover:scale-105 transition-transform duration-300">
                        <i class="{{ $data['icon'] }}"></i>
                    </div>
                    <h3 class="text-md font-bold text-[#0F2857]">{{ $nama }}</h3>
                </a>
            @endforeach
        </div>

        {{-- PRODUK LIST TANPA BORDER --}}
        @if(isset($produk_kelompok) && $produk_kelompok->count() > 0)
            @foreach($produk_kelompok as $kategori => $items)
                <div class="mb-16">
                    <h2 class="text-2xl font-extrabold text-[#0F2857] mb-8">{{ $kategori }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($items as $produk)
                            <div class="group bg-white rounded-3xl p-4 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                                <img src="{{ asset('storage/'.$produk->foto_produk) }}" class="w-full h-48 object-cover rounded-2xl mb-4">
                                <h3 class="font-bold text-md text-[#0F2857] mb-1">{{ $produk->nama_produk }}</h3>
                                <p class="text-xs text-blue-600 font-bold uppercase tracking-wider mb-2">{{ $produk->nama_merek }}</p>
                                <p class="text-xs text-slate-500 line-clamp-2 mb-4 h-8">{{ $produk->deskripsi }}</p>
                                <a href="{{ route('produk.detail.publik', $produk->id) }}" class="text-xs text-blue-900 font-bold hover:underline">Lihat detail →</a>
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

    <footer class="bg-slate-50 py-10 px-8 text-center text-slate-500 text-xs mt-auto">
        © 2026 Kemendikdasmen. All rights reserved.
    </footer>
</body>
</html>