<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Terbaru - Kemendikdasmen PKK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body class="bg-white text-slate-800 flex flex-col min-h-screen antialiased">

    {{-- NAVBAR MODERN (Tanpa Border) --}}
    <nav class="bg-white/80 backdrop-blur-md px-8 py-6 flex justify-between items-center sticky top-0 z-50">
        <div class="font-bold text-xl text-blue-900 tracking-tight">Proyek Kreatif dan Kewirausahaan Murid SMK</div>
        <div class="flex items-center space-x-8 text-sm font-medium text-slate-600">
            <a href="/" class="hover:text-blue-900 transition-colors">Beranda</a>
            <a href="/katalog" class="hover:text-blue-900 transition-colors">Katalog</a>
            <a href="{{ route('produk.terbaru') }}" class="text-blue-900 border-b-2 border-blue-900 pb-1">Terbaru</a>
        </div>
    </nav>

    {{-- MAIN CONTENT --}}
    <section class="max-w-7xl mx-auto px-8 py-16 flex-grow w-full">
        <h1 class="text-3xl font-extrabold text-[#0F2857] mb-12">Produk Terbaru</h1>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach($produk_terbaru as $produk)
                {{-- Card Modern (Tanpa Border, Shadow halus saat hover) --}}
                <div class="group bg-white rounded-3xl p-5 hover:shadow-2xl transition-all duration-300 hover:-translate-y-2">
                    <img src="{{ asset('storage/'.$produk->foto_produk) }}" class="w-full h-56 object-cover rounded-2xl mb-6">
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
    <footer class="bg-slate-50 py-16 px-8 text-center text-slate-500 text-sm mt-auto">
        © 2026 Kemendikdasmen. All rights reserved.
    </footer>

</body>
</html>