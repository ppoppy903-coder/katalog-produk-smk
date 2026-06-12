<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk - Kemendikdasmen PKK</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</head>
<body class="bg-[#F8F9FB] text-slate-800">

    <nav class="bg-white px-8 py-4 flex justify-between items-center border-b border-slate-200">
        <div class="font-bold text-xl text-blue-900">Kemendikdasmen PKK</div>
        <div class="hidden md:flex space-x-6 text-sm font-medium text-slate-600">
            <a href="/" class="hover:text-blue-900">Beranda</a>
            <a href="/katalog" class="text-blue-900 border-b-2 border-blue-900 pb-1">Katalog</a>
            <a href="#" class="hover:text-blue-900">Dashboard</a>
            <a href="#" class="hover:text-blue-900">About</a>
        </div>
        <div>
            <a href="#" class="bg-blue-900 text-white px-6 py-2 rounded-md text-sm font-semibold hover:bg-blue-800 transition">Login</a>
        </div>
    </nav>

    <section class="max-w-7xl mx-auto px-8 pt-12 pb-8">
        <h1 class="text-4xl font-bold text-blue-900 mb-4">Katalog Produk Siswa SMK</h1>
        <p class="text-slate-600 max-w-3xl leading-relaxed mb-10">
            Temukan karya inovatif dari 10 Bidang Keahlian SMK di seluruh Indonesia. Wadah apresiasi kreativitas dan kewirausahaan siswa SMK untuk Indonesia maju.
        </p>

        <div class="mb-8">
            <label class="block text-blue-900 font-semibold mb-3">Cari Produk Kewirausahaan siswa SMK</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" placeholder="Cari produk, kategori, atau nama SMK..." class="w-full pl-12 pr-4 py-3 bg-white border border-slate-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent shadow-sm text-sm">
            </div>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-8 pb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-6">
            
            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Teknologi Konstruksi</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Inovasi desain bangunan, material ramah lingkungan, dan teknik sipil modern.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=konstruksi" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Manufaktur</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Produksi komponen mesin, fabrikasi logam, dan otomasi industri presisi tinggi.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=manufaktur" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Energi</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Panel surya, turbin angin, dan sistem kelistrikan terbarukan masa depan.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=energi" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">TI</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Pengembangan software, keamanan siber, dan infrastruktur jaringan digital.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=ti" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Kesehatan</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Alat pelindung diri, asisten kesehatan digital, dan farmasi herbal.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=kesehatan" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Agribisnis</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Teknologi hidroponik, pengolahan pangan organik, dan peternakan modern.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=agribisnis" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Kemaritiman</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Navigasi kapal, teknologi budidaya laut, dan pengolahan hasil perikanan.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=kemaritiman" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Bisnis</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">E-commerce, layanan logistik pintar, dan manajemen ritel inovatif.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=bisnis" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Pariwisata</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Produk kuliner nusantara, layanan perhotelan, dan travel guide digital.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=pariwisata" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-b-xl rounded-t-sm border border-slate-200 border-t-4 border-t-teal-700 shadow-sm flex flex-col h-full hover:shadow-md transition">
                <div class="p-6 flex-grow">
                    <div class="text-teal-700 mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
                    </div>
                    <h3 class="font-bold text-blue-900 mb-2">Seni Kreatif</h3>
                    <p class="text-slate-500 text-xs leading-relaxed">Animasi, desain grafis, kriya tekstil, dan karya seni media baru.</p>
                </div>
                <div class="px-6 py-4 border-t border-slate-100">
                    <a href="?kategori=seni" class="text-xs font-semibold text-slate-600 hover:text-blue-900 flex items-center justify-between">
                        Lihat produk <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>

        </div>
    </section>

    @php
        $kategori_aktif = request()->query('kategori');

        $semua_produk = [
            [
                'kategori_slug' => 'konstruksi',
                'nama' => 'PAVIBLOCK',
                'sub_judul' => 'Paving Block Plastik Daur Ulang',
                'deskripsi' => 'Paving block dan kanstin dari cacahan plastik yang dilelehkan dan dicampur pasir: kuat tekan, tidak licin, lebih ringan dari beton.',
                'warna_bg' => '#e6f4f1', 'warna_teks' => '#1f5f5f'
            ],
            [
                'kategori_slug' => 'manufaktur',
                'nama' => 'LASKARYA',
                'sub_judul' => 'Furnitur Besi Custom',
                'deskripsi' => 'Furnitur besi minimalis yang dilas, digerinda, dan di-coating anti karat oleh siswa teknik pengelasan.',
                'warna_bg' => '#f0f4f8', 'warna_teks' => '#2d4059'
            ],
            [
                'kategori_slug' => 'energi',
                'nama' => 'COCOBRIK',
                'sub_judul' => 'Briket Tempurung Kelapa',
                'deskripsi' => 'Briket kubus untuk barbeque, pemanggang sate, dan shisha melalui proses karbonisasi.',
                'warna_bg' => '#faf6f0', 'warna_teks' => '#5c3a21'
            ],
            [
                'kategori_slug' => 'ti',
                'nama' => 'WEBIN',
                'sub_judul' => 'Jasa Website UMKM Instan',
                'deskripsi' => 'Jasa pembuatan website profil dan katalog UMKM berbasis template selesai maksimal 3 hari.',
                'warna_bg' => '#edf2fa', 'warna_teks' => '#2b4c9e'
            ],
            [
                'kategori_slug' => 'kesehatan',
                'nama' => 'JAMUMU',
                'sub_judul' => 'Jamu Kekinian Botol',
                'deskripsi' => 'Jamu botol 250 ml higienis dengan takaran terstandar tanpa pengawet sebagai sarana edukasi kesehatan.',
                'warna_bg' => '#faf6f0', 'warna_teks' => '#8a5a2b'
            ],
            [
                'kategori_slug' => 'agribisnis',
                'nama' => 'HIDROFRESH',
                'sub_judul' => 'Sayur Hidroponik & Starter Kit',
                'deskripsi' => 'Budidaya selada, pakcoy, dan kangkung sistem NFT di greenhouse sekolah plus starter kit hidroponik.',
                'warna_bg' => '#eaf4ed', 'warna_teks' => '#1f6645'
            ],
            [
                'kategori_slug' => 'kemaritiman',
                'nama' => 'LAUTAN RASA',
                'sub_judul' => 'Abon & Stik Ikan',
                'deskripsi' => 'Abon ikan premium serta stik ikan crispy camilan anak, dikemas pouch kedap udara bermasa simpan panjang.',
                'warna_bg' => '#f0f6fa', 'warna_teks' => '#1b436b'
            ],
            [
                'kategori_slug' => 'bisnis',
                'nama' => 'ADMINKU',
                'sub_judul' => 'Jasa Administrasi & Pembukuan UMKM',
                'deskripsi' => 'Jasa pembukuan sederhana berbasis aplikasi, penataan arsip dan stok, pendampingan NIB/sertifikasi halal.',
                'warna_bg' => '#f3f0f8', 'warna_teks' => '#42287a'
            ],
            [
                'kategori_slug' => 'pariwisata',
                'nama' => 'JELAJAHLOKAL',
                'sub_judul' => 'Paket Wisata Edukasi Desa',
                'deskripsi' => 'Paket one-day trip tematik dengan pemandu siswa, konsumsi dari ibu-ibu desa, dan dokumentasi foto.',
                'warna_bg' => '#faf6f0', 'warna_teks' => '#7a4c28'
            ],
            [
                'kategori_slug' => 'seni',
                'nama' => 'PERCAKARYA',
                'sub_judul' => 'Fesyen & Merchandise Kain Perca',
                'deskripsi' => 'Totebag patchwork, pouch, scrunchie, dan pesanan merchandise event dari limbah kain perca.',
                'warna_bg' => '#fdf2f5', 'warna_teks' => '#8a2b4b'
            ]
        ];

        if ($kategori_aktif) {
            $produk_tampil = array_filter($semua_produk, function($p) use ($kategori_aktif) {
                return $p['kategori_slug'] == $kategori_aktif;
            });
        } else {
            $produk_tampil = []; 
        }
    @endphp

    <div class="max-w-7xl mx-auto px-8 mb-16">
        @if(count($produk_tampil) > 0)
            <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">
                Menampilkan Produk: <span class="text-blue-600 uppercase">{{ str_replace('-', ' ', $kategori_aktif) }}</span>
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 xl:grid-cols-5 gap-6">
                @foreach($produk_tampil as $produk)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col relative hover:shadow-md transition">
                        <div class="h-40 flex items-center justify-center p-4" style="background-color: {{ $produk['warna_bg'] }};">
                            <span class="text-2xl font-bold text-center" style="color: {{ $produk['warna_teks'] }};">
                                {{ $produk['nama'] }}
                            </span>
                        </div>
                        <div class="absolute top-36 left-4">
                            <span class="bg-[#1a365d] text-white text-[11px] font-semibold px-3 py-1 rounded-full">Usaha Berjalan</span>
                        </div>
                        <div class="p-5 pt-6 flex-1 flex flex-col">
                            <h3 class="text-lg font-bold text-gray-900 mb-1">{{ $produk['nama'] }}</h3>
                            <p class="text-xs text-gray-500 mb-2 font-medium">{{ $produk['sub_judul'] }}</p>
                            <p class="text-xs text-gray-600 line-clamp-3 mb-4 flex-1">{{ $produk['deskripsi'] }}</p>
                            <a href="/detail-produk" class="text-xs text-blue-700 font-medium hover:underline mt-auto">Lihat detail produk ...</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @elseif($kategori_aktif)
            <div class="text-center bg-white p-12 rounded-2xl border border-dashed border-gray-300">
                <p class="text-gray-500">Belum ada produk untuk bidang keahlian ini.</p>
            </div>
        @else
            <div class="text-center bg-blue-50/50 p-12 rounded-2xl border border-blue-100">
                <p class="text-blue-800 font-medium">Silakan klik tombol "Lihat produk" pada salah satu Bidang Keahlian di atas untuk menampilkan daftar produk.</p>
            </div>
        @endif
    </div>
    <section class="max-w-7xl mx-auto px-8 mb-16">
        <div class="bg-[#3B508C] rounded-2xl p-12 text-center text-white shadow-lg">
            <h2 class="text-3xl font-bold mb-4">Ingin Menampilkan Produk SMK Anda?</h2>
            <p class="text-blue-100 mb-8 max-w-2xl mx-auto text-sm">
                Bergabunglah dengan ribuan SMK lainnya dan tunjukkan produk unggulan sekolah Anda kepada dunia melalui Dashboard PKK.
            </p>
            <div class="flex justify-center space-x-4">
                <a href="/daftar" class="bg-teal-300 text-teal-900 px-6 py-3 rounded-full font-bold text-sm hover:bg-teal-400 transition">
                    Daftar Sekarang
                </a>
                <a href="#" class="bg-transparent border border-blue-300 text-white px-6 py-3 rounded-full font-bold text-sm hover:bg-white/10 transition">
                    Panduan Produk
                </a>
            </div>
        </div>
    </section>

    <footer class="bg-[#24292E] text-slate-300 py-12 px-8 text-sm">
        <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8 mb-8">
            <div class="md:col-span-2">
                <h3 class="font-bold text-white text-lg mb-4">Kemendikdasmen</h3>
                <p class="max-w-sm text-slate-400">Mewujudkan pendidikan vokasi yang relevan dengan kebutuhan industri dan berorientasi pada masa depan bangsa.</p>
            </div>
            <div>
                <h3 class="font-bold text-teal-400 mb-4">Tautan Cepat</h3>
                <ul class="space-y-2 text-slate-400">
                    <li><a href="#" class="hover:text-white">Ministry Profile</a></li>
                    <li><a href="#" class="hover:text-white">School Portal</a></li>
                    <li><a href="#" class="hover:text-white">Expertise Areas</a></li>
                    <li><a href="#" class="hover:text-white">Privacy Policy</a></li>
                    <li><a href="#" class="hover:text-white">Terms of Service</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-teal-400 mb-4">Kontak Kami</h3>
                <ul class="space-y-3 text-slate-400">
                    <li class="flex items-start">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                        <span>Jl. Jenderal Sudirman, Senayan, Jakarta Pusat</span>
                    </li>
                    <li class="flex items-center">
                        <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        <span>kontak@kemendikdasmen.go.id</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto border-t border-slate-700 pt-8 text-center text-slate-500">
            © 2026 Kemendikdasmen. All rights reserved. Ministry of Primary and Secondary Education.
        </div>
    </footer>

</body>
</html>