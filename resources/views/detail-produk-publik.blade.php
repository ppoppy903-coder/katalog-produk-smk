<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $produk->nama_produk }} | Detail Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        ink:     '#16213E', /* dark navy, matches site headings */
                        indigo:  '#5B6EF5', /* gradient start, matches "Lihat Katalog" button */
                        violet:  '#8B5CF6', /* gradient mid */
                        sunset:  '#F97316', /* gradient end, matches "& Jiwa Wirausaha" text */
                        teal:    '#10B981', /* matches "Daftar Sekarang" button */
                        peach:   '#FBE7D6',
                        mint:    '#DEF3E7',
                        lav:     '#EAE5FB',
                        sky:     '#DEEEFB',
                    },
                    fontFamily: {
                        display: ['Fraunces', 'serif'],
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #FBFCFF; }
        .font-display { font-family: 'Fraunces', serif; }
        .eyebrow { letter-spacing: 0.14em; }

        .mySwiper {
            --swiper-navigation-color: #5B6EF5;
            --swiper-navigation-size: 18px;
        }
        .mySwiper .swiper-button-next,
        .mySwiper .swiper-button-prev {
            background: rgba(255,255,255,0.9);
            width: 38px;
            height: 38px;
            border-radius: 9999px;
            box-shadow: 0 4px 14px rgba(91,110,245,0.2);
        }
        .mySwiper .swiper-button-next:after,
        .mySwiper .swiper-button-prev:after {
            font-size: 14px;
            font-weight: 700;
        }

        .social-pill { transition: transform .18s ease, box-shadow .18s ease; }
        .social-pill:hover { transform: translateY(-3px); }

        .soft-divider { border-top: 1.5px dashed rgba(22,33,62,0.12); }
    </style>
</head>
<body class="text-ink">

    <div class="max-w-6xl mx-auto px-4 py-10">

        <a href="{{ route('katalog') }}" class="inline-flex items-center gap-2 text-sm font-semibold text-indigo/80 hover:text-indigo transition mb-6 group">
            <span class="w-8 h-8 rounded-full bg-white border border-indigo/15 flex items-center justify-center shadow-sm group-hover:-translate-x-0.5 transition">
                <i class="fa-solid fa-arrow-left text-xs"></i>
            </span>
            Kembali ke Katalog
        </a>

        {{-- HEADER --}}
        <div class="bg-gradient-to-br from-sky via-white to-lav px-8 py-7 rounded-3xl mb-8 border border-indigo/10 flex items-center justify-between">
            <h1 class="font-display text-2xl text-ink flex items-center gap-3">
                <span class="w-9 h-9 rounded-full bg-indigo/10 text-indigo flex items-center justify-center">
                    <i class="fa-solid fa-circle-info text-sm"></i>
                </span>
                Detail Postingan
            </h1>
            <span class="eyebrow inline-flex items-center gap-2 px-4 py-1.5 bg-white border border-indigo/20 text-indigo rounded-full text-[11px] font-bold uppercase shadow-sm">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo"></span> {{ $produk->kategori }}
            </span>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
            {{-- KIRI --}}
            <div class="lg:col-span-8 space-y-6">

                <div class="bg-white p-3 rounded-3xl shadow-sm border border-indigo/10">
                    <div class="swiper mySwiper w-full h-96 rounded-2xl overflow-hidden">
                        <div class="swiper-wrapper">
                            @php
                                $clean = fn($p) => str_replace(['[', ']', '"', '\\', '/'], ['', '', '', '', '/'], $p);
                                $fotos = json_decode($produk->foto_produk, true) ?? [$produk->foto_produk];
                            @endphp
                            @foreach($fotos as $foto)
                                <div class="swiper-slide"><img src="{{ asset('storage/'.$clean($foto)) }}" class="w-full h-full object-cover"></div>
                            @endforeach
                        </div>
                        <div class="swiper-button-next"></div><div class="swiper-button-prev"></div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-indigo/10 shadow-sm space-y-6">
                    <div>
                        <p class="eyebrow text-xs font-bold text-indigo uppercase mb-1">Merek &mdash; {{ $produk->nama_merek }}</p>
                        <h1 class="font-display text-4xl font-semibold text-ink leading-tight">{{ $produk->nama_produk }}</h1>
                    </div>

                    <div class="h-1.5 w-16 rounded-full bg-gradient-to-r from-sky-500 via-teal to-sunset"></div>

                    <div class="space-y-6 text-slate-500 text-justify">
                        <div>
                            <h3 class="font-display font-semibold text-lg text-ink mb-2 flex items-center gap-2">
                                <i class="fa-solid fa-quote-left text-indigo text-sm"></i> Filosofi
                            </h3>
                            <p class="bg-lav/60 p-5 rounded-2xl italic border-l-4 border-indigo text-ink/80">"{{ $produk->filosofi }}"</p>
                        </div>
                        <div class="soft-divider pt-6">
                            <h3 class="font-display font-semibold text-lg text-ink mb-2 flex items-center gap-2">
                                <i class="fa-solid fa-book-open text-sunset text-sm"></i> Latar Belakang
                            </h3>
                            <p>{{ $produk->latar_belakang }}</p>
                        </div>
                        <div class="soft-divider pt-6">
                            <h3 class="font-display font-semibold text-lg text-ink mb-2 flex items-center gap-2">
                                <i class="fa-solid fa-align-left text-teal text-sm"></i> Deskripsi
                            </h3>
                            <p>{{ $produk->deskripsi }}</p>
                        </div>
                    </div>

                    {{-- TIM PENGEMBANG --}}
                    <div class="mt-8 rounded-3xl overflow-hidden border border-indigo/10">
                        <div class="bg-gradient-to-r from-teal to-emerald-600 px-6 py-4 flex items-center gap-3">
                            <span class="w-8 h-8 rounded-full bg-white/25 flex items-center justify-center">
                                <i class="fa-solid fa-users text-white text-sm"></i>
                            </span>
                            <h3 class="font-display font-semibold text-white">Tim Pengembang</h3>
                        </div>
                        <div class="bg-mint/40 p-6">
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="bg-white p-4 rounded-xl shadow-sm border border-indigo/10">
                                    <p class="text-[10px] eyebrow uppercase font-bold text-ink/40">Sekolah</p>
                                    <p class="font-semibold text-ink">{{ $produk->nama_sekolah ?? '-' }}</p>
                                </div>
                                <div class="bg-white p-4 rounded-xl shadow-sm border border-indigo/10">
                                    <p class="text-[10px] eyebrow uppercase font-bold text-ink/40">Jurusan</p>
                                    <p class="font-semibold text-ink">{{ $produk->jurusan ?? '-' }}</p>
                                </div>
                            </div>
                            @if($produk->foto_tim)
                                <p class="text-[10px] eyebrow uppercase font-bold text-ink/40 mb-2">Foto Tim</p>
                                <img src="{{ asset('storage/'.$clean($produk->foto_tim)) }}" class="w-full h-48 object-cover rounded-2xl border-4 border-white shadow-md">
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- KANAN --}}
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white p-8 rounded-3xl border border-indigo/10 shadow-sm space-y-6">
                    <img src="{{ asset('storage/'.$clean($produk->logo)) }}" class="w-28 h-28 rounded-3xl object-cover shadow-md border-4 border-lav/50">

                    <div class="space-y-3">
                        {{-- Bagian Harga & Lokasi yang Dirapikan --}}
                        <div class="bg-peach/60 p-4 rounded-2xl flex flex-col gap-1">
                            <p class="text-[10px] eyebrow font-bold text-ink/50 uppercase tracking-widest">Harga</p>
                            <p class="font-display font-semibold text-ink text-lg">{{ $produk->harga }}</p>
                        </div>
                        <div class="bg-sky/70 p-4 rounded-2xl flex flex-col gap-1">
                            <p class="text-[10px] eyebrow font-bold text-ink/50 uppercase tracking-widest">Lokasi</p>
                            <p class="font-semibold text-ink">{{ $produk->lokasi }}</p>
                        </div>
                    </div>

                    {{-- SOSIAL MEDIA TIM --}}
                    <div class="bg-gradient-to-br from-sky-500 to-blue-600 rounded-2xl p-5">
                        <p class="text-[9px] eyebrow font-bold text-white/70 uppercase mb-3 text-center tracking-widest">Kontak Media</p>
                        
                        {{-- Jarak dikurangi dengan gap-2 dan ukuran ikon sedikit disesuaikan --}}
                        <div class="flex justify-center gap-2">
                            {{-- Ikon Instagram --}}
                            <a href="{{ $produk->sosmed ?? '#' }}" target="_blank" 
                            class="social-pill w-10 h-10 rounded-full bg-white flex items-center justify-center text-pink-500 shadow-md hover:scale-110 hover:bg-pink-50 transition-all duration-300">
                            <i class="fa-brands fa-instagram text-lg"></i>
                            </a>

                            {{-- Ikon TikTok --}}
                            <a href="{{ $produk->tiktok ?? 'https://tiktok.com' }}" target="_blank" 
                            class="social-pill w-10 h-10 rounded-full bg-white flex items-center justify-center text-slate-700 shadow-md hover:scale-110 hover:bg-slate-100 transition-all duration-300">
                            <i class="fa-brands fa-tiktok text-lg"></i>
                            </a>

                            {{-- Ikon Google Maps --}}
                            <a href="{{ $produk->gmaps ?? 'https://maps.google.com' }}" target="_blank" 
                            class="social-pill w-10 h-10 rounded-full bg-white flex items-center justify-center text-red-500 shadow-md hover:scale-110 hover:bg-red-50 transition-all duration-300">
                            <i class="fa-solid fa-location-dot text-lg"></i>
                            </a>
                        </div>
                    </div>

                    <a href="https://wa.me/{{ $produk->user->no_hp ?? '' }}" target="_blank" class="block w-full text-center bg-gradient-to-r from-teal to-emerald-600 hover:opacity-90 text-white font-bold py-4 rounded-2xl transition shadow-md">
                        <i class="fa-brands fa-whatsapp text-lg mr-2"></i> Hubungi Penjual
                    </a>
                </div>

                {{-- FORM ULASAN --}}
                <div class="bg-white rounded-3xl border border-indigo/10 shadow-sm overflow-hidden">
                    <div class="bg-gradient-to-r from-orange-400 to-amber-500 px-8 py-4">
                        <h3 class="font-display font-semibold text-white flex items-center gap-2">
                            <i class="fa-solid fa-pen-nib text-sm"></i> Tulis Ulasan
                        </h3>
                    </div>
                    <form action="{{ route('produk.komentar', $produk->id) }}" method="POST" class="p-8 space-y-3">
                        @csrf
                        <input type="text" name="nama" placeholder="Nama Anda" class="w-full p-3 bg-lav/40 rounded-xl outline-none focus:ring-2 focus:ring-sky-500 transition" required>
                        <select name="rating" class="w-full p-3 border border-indigo/15 rounded-xl bg-white focus:ring-2 focus:ring-sky-500 outline-none transition" required>
                            <option value="5">⭐⭐⭐⭐⭐ (Sangat Bagus)</option>
                            <option value="4">⭐⭐⭐⭐ (Bagus)</option>
                            <option value="3">⭐⭐⭐ (Cukup)</option>
                            <option value="2">⭐⭐ (Kurang)</option>
                            <option value="1">⭐ (Sangat Kurang)</option>
                        </select>
                        <textarea name="komentar" placeholder="Ulasan..." class="w-full p-3 bg-lav/40 rounded-xl h-20 outline-none focus:ring-2 focus:ring-sky-500 transition" required></textarea>
                        <button class="w-full bg-ink hover:opacity-90 text-white py-3 rounded-2xl font-bold transition">Kirim Ulasan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        new Swiper(".mySwiper", { navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" }, loop: true });
    </script>
</body>
</html>