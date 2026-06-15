<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Produk SMK - Kemendikdasmen PKK</title>
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
<body class="bg-slate-50 text-slate-800 flex flex-col min-h-screen">

    <nav class="bg-white px-8 py-4 flex justify-between items-center shadow-sm sticky top-0 z-50">
        <div></div>
        
        <div class="hidden md:flex space-x-6 text-sm font-medium text-slate-600">
            <a href="/" class="hover:text-blue-900 transition">Beranda</a>
            <a href="/katalog" class="text-blue-900 border-b-2 border-blue-900 pb-1">Katalog</a>
            <a href="#" class="hover:text-blue-900 transition">Dashboard</a>
            <a href="#" class="hover:text-blue-900 transition">About</a>
        </div>
        <div>
            <a href="#" class="bg-blue-900 text-white px-6 py-2 rounded-md text-sm font-semibold hover:bg-blue-800 transition">Login</a>
        </div>
    </nav>

    @php
        $kategori_aktif = request()->query('kategori');

        // DATA PRODUK (Sudah dilengkapi dengan pemanggilan gambar)
        $semua_produk = [
            [
                'kategori_slug' => 'konstruksi',
                'nama' => 'PAVIBLOCK',
                'sub_judul' => 'Paving Block Plastik Daur Ulang',
                'deskripsi' => 'Paving block dan kanstin dari cacahan plastik yang dilelehkan dan dicampur pasir: kuat tekan, tidak licin, lebih ringan dari beton.',
                'gambar' => 'paviblock.png'
            ],
            [
                'kategori_slug' => 'manufaktur',
                'nama' => 'LASKARYA',
                'sub_judul' => 'Furnitur Besi Custom',
                'deskripsi' => 'Furnitur besi minimalis yang dilas, digerinda, dan di-coating anti karat oleh siswa teknik pengelasan.',
                'gambar' => 'laskaraya.png'
            ],
            [
                'kategori_slug' => 'energi',
                'nama' => 'COCOBRIK',
                'sub_judul' => 'Briket Tempurung Kelapa',
                'deskripsi' => 'Briket kubus untuk barbeque, pemanggang sate, dan shisha melalui proses karbonisasi.',
                'gambar' => 'cocobrik.png'
            ],
            [
                'kategori_slug' => 'ti',
                'nama' => 'WEBIN',
                'sub_judul' => 'Jasa Website UMKM Instan',
                'deskripsi' => 'Jasa pembuatan website profil dan katalog UMKM berbasis template selesai maksimal 3 hari.',
                'gambar' => 'webin.png'
            ],
            [
                'kategori_slug' => 'kesehatan',
                'nama' => 'JAMUMU',
                'sub_judul' => 'Jamu Kekinian Botol',
                'deskripsi' => 'Jamu botol 250 ml higienis dengan takaran terstandar tanpa pengawet sebagai sarana edukasi kesehatan.',
                'gambar' => 'jamumu.png'
            ],
            [
                'kategori_slug' => 'agribisnis',
                'nama' => 'HIDROFRESH',
                'sub_judul' => 'Sayur Hidroponik & Starter Kit',
                'deskripsi' => 'Budidaya selada, pakcoy, dan kangkung sistem NFT di greenhouse sekolah plus starter kit hidroponik.',
                'gambar' => 'hidrofresh.png'
            ],
            [
                'kategori_slug' => 'kemaritiman',
                'nama' => 'LAUTAN RASA',
                'sub_judul' => 'Abon & Stik Ikan',
                'deskripsi' => 'Abon ikan premium serta stik ikan crispy camilan anak, dikemas pouch kedap udara bermasa simpan panjang.',
                'gambar' => 'lautanrasa.png'
            ],
            [
                'kategori_slug' => 'bisnis',
                'nama' => 'ADMINKU',
                'sub_judul' => 'Jasa Administrasi & Pembukuan UMKM',
                'deskripsi' => 'Jasa pembukuan sederhana berbasis aplikasi, penataan arsip dan stok, pendampingan NIB/sertifikasi halal.',
                'gambar' => 'adminku.png'
            ],
            [
                'kategori_slug' => 'pariwisata',
                'nama' => 'JELAJAHLOKAL',
                'sub_judul' => 'Paket Wisata Edukasi Desa',
                'deskripsi' => 'Paket one-day trip tematik dengan pemandu siswa, konsumsi dari ibu-ibu desa, dan dokumentasi foto.',
                'gambar' => 'jelajahlokal.png'
            ],
            [
                'kategori_slug' => 'seni',
                'nama' => 'PERCAKARYA',
                'sub_judul' => 'Fesyen & Merchandise Kain Perca',
                'deskripsi' => 'Totebag patchwork, pouch, scrunchie, dan pesanan merchandise event dari limbah kain perca.',
                'gambar' => 'percakarya.png'
            ]
        ];

        // LOGIKA FILTER: Di halaman katalog, jika tidak ada kategori yang dipilih, tampilkan SEMUA produk
        if ($kategori_aktif) {
            $produk_tampil = array_filter($semua_produk, function($p) use ($kategori_aktif) {
                return $p['kategori_slug'] == $kategori_aktif;
            });
        } else {
            $produk_tampil = $semua_produk; 
        }
    @endphp

    <section class="max-w-7xl mx-auto px-8 py-12 flex-grow w-full">
        
        <div class="mb-10 flex flex-col md:flex-row justify-between items-end border-b border-slate-200 pb-6">
            <div>
                <h1 class="text-3xl font-bold text-blue-900 mb-2">Jelajahi Katalog Produk</h1>
                @if($kategori_aktif)
                    <p class="text-slate-500">Menampilkan hasil untuk kategori: <span class="font-bold text-teal-600 uppercase">{{ str_replace('-', ' ', $kategori_aktif) }}</span></p>
                @else
                    <p class="text-slate-500">Menampilkan semua karya inovatif murid SMK di seluruh Indonesia.</p>
                @endif
            </div>
            
            @if($kategori_aktif)
            <div class="mt-4 md:mt-0">
                <a href="/katalog" class="text-sm bg-slate-100 hover:bg-slate-200 text-slate-600 px-4 py-2 rounded-md transition">
                    ✕ Hapus Filter
                </a>
            </div>
            @endif
        </div>

        @if(count($produk_tampil) > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4">
                @foreach($produk_tampil as $produk)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden flex flex-col relative hover:shadow-lg transition group">
                        
                        <div class="h-48 w-full overflow-hidden bg-slate-100">
                            <img src="{{ asset('images/' . $produk['gambar']) }}" alt="{{ $produk['nama'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        
                        <div class="absolute top-40 left-4">
                            
                        </div>
                        <div class="p-6 pt-8 flex-1 flex flex-col">
                            <h3 class="text-xl font-bold text-gray-900 mb-1">{{ $produk['nama'] }}</h3>
                            <p class="text-xs text-teal-700 mb-3 font-semibold uppercase tracking-wider">{{ $produk['sub_judul'] }}</p>
                            <p class="text-sm text-gray-600 line-clamp-3 mb-6 flex-1 leading-relaxed">{{ $produk['deskripsi'] }}</p>
                            <a href="/detail-produk" class="text-sm text-blue-700 font-bold hover:underline mt-auto flex items-center">
                                Lihat detail <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-20 bg-slate-50 rounded-2xl border border-dashed border-slate-300">
                <p class="text-slate-500">Tidak ada produk yang ditemukan untuk kategori ini.</p>
                <a href="/katalog" class="inline-block mt-4 text-blue-600 font-medium hover:underline">Lihat semua produk</a>
            </div>
        @endif

    </section>

    <footer class="bg-slate-800 text-slate-300 py-12 px-8 text-sm mt-auto">
        <div class="max-w-7xl mx-auto grid md:grid-cols-4 gap-8 mb-8">
            <div class="md:col-span-2">
                <h3 class="font-bold text-white text-lg mb-4">Kemendikdasmen PKK</h3>
                <p class="max-w-sm text-slate-400">Mendorong ekosistem pendidikan vokasi yang berdaya saing melalui penguatan kewirausahaan siswa SMK di seluruh Indonesia.</p>
            </div>
            <div>
                <h3 class="font-bold text-white mb-4">TAUTAN CEPAT</h3>
                <ul class="space-y-2 text-slate-400">
                    <li><a href="#" class="hover:text-white transition">Ministry Profile</a></li>
                    <li><a href="#" class="hover:text-white transition">School Portal</a></li>
                    <li><a href="#" class="hover:text-white transition">Expertise Areas</a></li>
                    <li><a href="#" class="hover:text-white transition">Privacy Policy</a></li>
                </ul>
            </div>
            <div>
                <h3 class="font-bold text-white mb-4">KONTAK KAMI</h3>
                <ul class="space-y-3 text-slate-400">
                    <li class="flex items-center"><span class="mr-2">✉️</span> pkk@kemdikbud.go.id</li>
                    <li class="flex items-center"><span class="mr-2">📞</span> (021) 572-5061</li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto border-t border-slate-700 pt-8 text-center text-slate-500">
            © 2026 Kemendikdasmen. All rights reserved. Ministry of Primary and Secondary Education.
        </div>
    </footer>

</body>
</html>