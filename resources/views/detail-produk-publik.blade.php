<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} | Detail Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-[#F8FAFC]">

    <div class="max-w-6xl mx-auto px-4 py-10">
        {{-- Tombol Navigasi --}}
        <a href="{{ route('katalog') }}" class="inline-flex items-center gap-2 text-sm font-medium text-blue-500 hover:text-blue-800 transition mb-6">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Katalog
        </a>

        {{-- Navbar Header --}}
        <div class="bg-blue-600 text-white px-8 py-6 rounded-3xl mb-8 shadow-lg flex items-center justify-between">
            <h1 class="text-xl font-bold flex items-center gap-3">
                <i class="fa-solid fa-circle-info"></i> Detail Postingan
            </h1>
            <span class="px-4 py-1 bg-white/20 rounded-full text-xs font-bold uppercase tracking-widest">{{ $produk->kategori }}</span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            {{-- Bagian Kiri --}}
            <div class="lg:col-span-8 space-y-6">
                <div class="bg-white p-3 rounded-3xl shadow-sm border border-blue-100">
                    <img src="{{ asset('storage/'.$produk->foto_produk) }}" class="w-full h-96 object-cover rounded-2xl" alt="Produk">
                    @if(isset($produk->galeri) && count($produk->galeri) > 0)
                        <div class="grid grid-cols-5 gap-2 mt-3">
                            @foreach($produk->galeri as $foto)
                                <img src="{{ asset('storage/'.$foto) }}" class="h-20 w-full object-cover rounded-xl border border-blue-100">
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="bg-white p-8 rounded-3xl border border-blue-100 shadow-sm space-y-6">
                    <h1 class="text-4xl font-extrabold text-slate-900">{{ $produk->nama_produk }}</h1>
                    <p class="text-blue-600 font-medium italic">Merek: {{ $produk->nama_merek }}</p>
                    
                    <div class="space-y-6 text-slate-600">
                        <div><h3 class="font-bold text-slate-900 mb-2">Filosofi</h3><p class="bg-blue-50 p-4 rounded-2xl italic border-l-4 border-blue-200">"{{ $produk->filosofi }}"</p></div>
                        <div><h3 class="font-bold text-slate-900 mb-2">Latar Belakang</h3><p class="leading-relaxed">{{ $produk->latar_belakang }}</p></div>
                        <div><h3 class="font-bold text-slate-900 mb-2">Deskripsi</h3><p class="leading-relaxed">{{ $produk->deskripsi }}</p></div>
                    </div>

                    {{-- BLOK IDENTITAS TIM PENGEMBANG --}}
                    <div class="mt-8 bg-indigo-50 p-6 rounded-3xl border border-indigo-100">
                        <h3 class="font-bold text-indigo-900 mb-4 flex items-center gap-2">
                            <i class="fa-solid fa-users"></i> Tim Pengembang & Institusi
                        </h3>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="bg-white p-4 rounded-xl shadow-sm">
                                <p class="text-[10px] uppercase font-bold text-slate-400">Sekolah</p>
                                <p class="font-bold text-slate-900">{{ $produk->nama_sekolah ?? '-' }}</p>
                            </div>
                            <div class="bg-white p-4 rounded-xl shadow-sm">
                                <p class="text-[10px] uppercase font-bold text-slate-400">Jurusan</p>
                                <p class="font-bold text-slate-900">{{ $produk->jurusan ?? '-' }}</p>
                            </div>
                        </div>
                        @if($produk->foto_tim)
                            <p class="text-[10px] uppercase font-bold text-slate-400 mb-2">Foto Tim</p>
                            <img src="{{ asset('storage/'.$produk->foto_tim) }}" class="w-full h-48 object-cover rounded-2xl shadow-md border-4 border-white" alt="Foto Tim">
                        @endif
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan --}}
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white p-8 rounded-3xl border border-blue-100 shadow-sm space-y-4">
                    <img src="{{ asset('storage/'.$produk->logo) }}" class="w-32 h-32 rounded-3xl object-cover mb-4 shadow-md border border-blue-50">
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-slate-50 p-4 rounded-2xl"><p class="text-[9px] uppercase font-bold text-slate-400">Harga</p><p class="font-bold text-slate-900">{{ $produk->harga }}</p></div>
                        <div class="bg-slate-50 p-4 rounded-2xl"><p class="text-[9px] uppercase font-bold text-slate-400">Lokasi</p><p class="font-bold text-slate-900">{{ $produk->lokasi }}</p></div>
                    </div>
                    <a href="https://wa.me/{{ $produk->user->no_hp ?? '' }}" target="_blank" class="w-full block text-center bg-[#A7F3D0] hover:bg-[#86EFAC] text-[#065F46] font-bold py-4 rounded-2xl transition shadow-sm">
                        <i class="fa-brands fa-whatsapp mr-2"></i> Hubungi Penjual
                    </a>
                </div>
                
                {{-- Form Ulasan --}}
                <div class="bg-white p-8 rounded-3xl border border-blue-100 shadow-sm">
                    <h3 class="font-bold text-slate-900 mb-4">Tulis Ulasan</h3>
                    <form action="{{ route('produk.komentar', $produk->id) }}" method="POST" class="space-y-3">
                        @csrf
                        <input type="text" name="nama" placeholder="Nama Anda" class="w-full p-3 bg-slate-50 rounded-xl outline-none" required>
                        <select name="rating" class="w-full p-3 border border-gray-200 rounded-xl outline-none" required>
                            <option value="5">⭐⭐⭐⭐⭐ (Sangat Bagus)</option>
                            <option value="4">⭐⭐⭐⭐ (Bagus)</option>
                            <option value="3">⭐⭐⭐ (Cukup)</option>
                            <option value="2">⭐⭐ (Kurang)</option>
                            <option value="1">⭐ (Sangat Kurang)</option>
                        </select>
                        <textarea name="komentar" placeholder="Ulasan..." class="w-full p-3 bg-slate-50 rounded-xl outline-none h-20" required></textarea>
                        <button class="w-full bg-slate-900 text-white py-3 rounded-2xl font-bold">Kirim Ulasan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>