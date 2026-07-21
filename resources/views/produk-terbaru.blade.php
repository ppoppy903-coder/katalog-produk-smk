<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Terbaru - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style> 
        body { font-family: 'Plus Jakarta Sans', sans-serif; } 
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 antialiased flex flex-col min-h-screen">

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

   {{-- MAIN CONTENT --}}
    <section class="max-w-7xl mx-auto px-8 py-16 flex-grow w-full">
        <h1 class="text-3xl font-extrabold text-[#0F2857] mb-12">Produk Terbaru</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($produk_terbaru as $produk)
                @php
                    // LOGIKA PEMBERSIH GAMBAR (Agar format JSON di DB tidak merusak tampilan)
                    $foto_path = str_replace(['[', ']', '"', '\\'], '', $produk->foto_produk);
                    $foto_utama = explode(',', $foto_path)[0];
                @endphp
                
                {{-- Card Modern --}}
                <div class="group bg-white rounded-3xl p-5 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <img src="{{ asset('storage/'.$produk->logo) }}" 
                         alt="{{ $produk->nama_produk }}" 
                         class="w-full h-56 object-cover rounded-2xl mb-6 bg-slate-100">
                    <h3 class="font-bold text-lg text-[#0F2857] mb-1">{{ $produk->nama_produk }}</h3>
                    <p class="text-xs text-blue-600 font-bold uppercase tracking-wider mb-3">{{ $produk->nama_merek }}</p>
                    <p class="text-sm text-slate-500 line-clamp-2 mb-6 h-10">{{ $produk->deskripsi }}</p>
                    <a href="{{ route('produk.detail.publik', $produk->id) }}" class="text-sm text-blue-900 font-bold hover:underline">Lihat detail →</a>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-16">
            {{ $produk_terbaru->links() }}
        </div>
    </section>

    {{-- FOOTER --}}
    <footer class="bg-white border-t border-slate-100 py-10 px-8 text-center text-slate-400 text-xs font-medium tracking-wide">
        &copy; 2026 Kemendikdasmen. All rights reserved.
    </footer>

</body>
</html>