<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk SMK - Kemendikdasmen PKK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
    </style>
</head>
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <nav class="bg-white px-8 py-4 flex justify-between items-center shadow-sm sticky top-0 z-50">
        <div class="font-bold text-xl text-blue-900">Proyek Kreatif dan Kewirausahaan Murid SMK</div>
        <div class="hidden md:flex space-x-6 text-sm font-medium text-slate-600">
            <a href="/" class="hover:text-blue-900 transition">Beranda</a>
            <a href="/katalog" class="text-blue-900 border-b-2 border-blue-900 pb-1">Katalog</a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-8 py-12 flex-grow w-full">
        <h1 class="text-3xl font-bold text-blue-900 mb-8">Katalog Produk Murid SMK</h1>

        {{-- Navigasi Kategori (Warna Biru Konsisten) --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-12">
            @foreach($kategori_list as $kat)
                <a href="{{ route('katalog') }}?kategori={{ urlencode($kat) }}" 
                   class="p-4 border rounded-xl flex flex-col items-center hover:shadow-md transition 
                   {{ ($kategori_filter ?? '') == $kat ? 'bg-blue-900 text-white' : 'bg-white text-blue-900 hover:bg-blue-50 border-blue-100' }}">
                    
                    <i class="{{ $ikon_bidang[$kat] ?? 'fa-solid fa-folder' }} text-2xl mb-2"></i>
                    
                    <p class="text-[11px] font-bold text-center leading-tight">{{ $kat }}</p>
                </a>
            @endforeach
        </div>

        @if(isset($kategori_filter) && $kategori_filter)
            <div class="mb-6">
                <a href="/katalog" class="text-sm text-blue-600 hover:underline font-medium">✕ Hapus filter: {{ $kategori_filter }}</a>
            </div>
        @endif

        {{-- Produk List --}}
        @if(isset($produk_kelompok) && $produk_kelompok->count() > 0)
            @foreach($produk_kelompok as $kategori => $items)
                <div class="mb-12">
                    {{-- Judul Kategori dengan Aksen Biru --}}
                    <h2 class="text-2xl font-bold text-blue-900 mb-6 border-l-4 border-blue-900 pl-4 uppercase tracking-wide">
                        <i class="{{ $ikon_bidang[$kategori] ?? 'fa-solid fa-folder' }} mr-2 text-blue-800"></i>{{ $kategori }}
                    </h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach($items as $produk)
                            <div class="bg-white rounded-2xl shadow-sm border p-4 hover:shadow-lg transition group">
                                <img src="{{ asset('storage/'.$produk->foto_produk) }}" class="w-full h-48 object-cover rounded-xl mb-4">
                                <h3 class="font-bold text-lg text-blue-900">{{ $produk->nama_produk }}</h3>
                                <p class="text-xs text-blue-600 font-semibold uppercase mb-2">{{ $produk->nama_merek }}</p>
                                <p class="text-sm text-gray-600 line-clamp-3 mb-4">{{ $produk->deskripsi }}</p>
                                <a href="{{ route('produk.detail.publik', $produk->id) }}" class="text-sm text-blue-800 font-bold hover:underline block mt-auto">
                                    Lihat detail &rarr;
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @else
            <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-slate-300 shadow-sm">
                <p class="text-slate-500">Belum ada produk yang disetujui untuk kategori ini.</p>
            </div>
        @endif
    </section>

    <footer class="bg-slate-800 text-slate-300 py-8 px-8 text-sm mt-auto text-center">
        © 2026 Kemendikdasmen. All rights reserved.
    </footer>

</body>
</html>