<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Profil Siswa - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-sidebar {
            background: linear-gradient(rgba(11, 33, 94, 0.9), rgba(11, 33, 94, 0.9)), 
                        url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-white text-slate-800 min-h-screen flex flex-col">

    <nav class="bg-white px-12 py-5 flex justify-between items-center border-b border-slate-100">
        <div class="flex items-center space-x-2">
            <div class="bg-[#0B215E] text-white p-1 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
            </div>
            <span class="font-bold text-blue-900 tracking-tight">PKK Kemendikdasmen</span>
        </div>
        <div class="hidden md:flex space-x-8 text-sm font-medium text-slate-500">
            <a href="/" class="hover:text-blue-900">Beranda</a>
            <a href="/katalog" class="hover:text-blue-900">Katalog</a>
            <a href="#" class="hover:text-blue-900">Tentang Kami</a>
            <a href="#" class="hover:text-blue-900">Bantuan</a>
        </div>
        <div class="flex items-center space-x-4">
            <a href="#" class="text-sm font-semibold text-slate-600">Masuk</a>
            <a href="/daftar" class="bg-[#0B215E] text-white px-5 py-2 rounded-lg text-sm font-semibold hover:bg-blue-900 transition">Daftar</a>
        </div>
    </nav>

    <div class="flex-1 flex flex-col lg:flex-row">
        <div class="lg:w-[32%] bg-sidebar text-white p-12 lg:p-16 flex flex-col justify-center relative">
            <div class="mb-6">
                <span class="bg-white/20 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest flex items-center w-fit">
                    <i class="fa-solid fa-star text-yellow-300 mr-2"></i> Keunggulan Vokasi
                </span>
            </div>
            <h1 class="text-4xl font-bold leading-tight mb-6">
                Meningkatkan <br> Ekselensi Vokasi
            </h1>
            <p class="text-blue-100 text-sm leading-relaxed mb-10 opacity-80">
                Bergabunglah dengan ekosistem pendidikan menengah yang berfokus pada pengembangan kompetensi nyata dan kesiapan industri masa depan.
            </p>
            <div class="space-y-4">
                <div class="flex items-center space-x-3 text-sm">
                    <div class="w-5 h-5 bg-teal-500/20 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-check text-teal-400 text-[10px]"></i>
                    </div>
                    <span>Sertifikasi Kompetensi Industri</span>
                </div>
                <div class="flex items-center space-x-3 text-sm">
                    <div class="w-5 h-5 bg-teal-500/20 rounded-full flex items-center justify-center">
                        <i class="fa-solid fa-check text-teal-400 text-[10px]"></i>
                    </div>
                    <span>Kemitraan Perusahaan Global</span>
                </div>
            </div>
        </div>

        <div class="flex-1 bg-slate-50/50 flex flex-col items-center py-12 px-6 lg:px-20">
            <div class="w-full max-w-2xl">
                
                <div class="flex items-center justify-between mb-12 px-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-6 h-6 rounded-full bg-teal-500 text-white flex items-center justify-center text-[10px]"><i class="fa-solid fa-check"></i></div>
                        <span class="text-xs font-semibold text-teal-600">Akun</span>
                    </div>
                    <div class="flex-1 border-t border-slate-200 mx-4"></div>
                    <div class="flex items-center space-x-3">
                        <div class="w-6 h-6 rounded-full bg-blue-900 text-white flex items-center justify-center text-[10px] font-bold">2</div>
                        <span class="text-xs font-semibold text-blue-900">Detail Profil</span>
                    </div>
                    <div class="flex-1 border-t border-slate-200 mx-4"></div>
                    <div class="flex items-center space-x-3 opacity-30">
                        <div class="w-6 h-6 rounded-full border border-slate-400 flex items-center justify-center text-[10px] font-bold">3</div>
                        <span class="text-xs font-semibold">Selesai</span>
                    </div>
                </div>

                <div class="mb-8">
                    <h2 class="text-3xl font-extrabold text-slate-900 mb-1 tracking-tight">Detail Profil Siswa</h2>
                    <p class="text-slate-500 text-sm">Lengkapi data pendidikan Anda untuk melanjutkan pendaftaran.</p>
                </div>

                <div class="bg-blue-50 border border-blue-100 rounded-xl p-5 flex items-start space-x-4 mb-8">
                    <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                        <i class="fa-solid fa-circle-check text-lg"></i>
                    </div>
                    <div>
                        <h4 class="text-sm font-bold text-blue-900">Verifikasi Dapodik Otomatis</h4>
                        <p class="text-xs text-blue-700 leading-relaxed mt-0.5">Data yang Anda masukkan akan divalidasi langsung dengan basis data Dapodik Kemendikdasmen.</p>
                    </div>
                </div>

                <form action="#" method="POST" class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Nama Lengkap</label>
                        <input type="text" value="Ahmad Dhani Ramadhan" readonly class="w-full px-4 py-3 bg-slate-100 border border-slate-200 rounded-lg text-slate-500 text-sm outline-none cursor-not-allowed">
                        <p class="text-[10px] text-slate-400 mt-1 italic">*Nama terkunci berdasarkan data akun</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">NISN (10 Digit)</label>
                            <input type="text" placeholder="Contoh: 0012345678" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 outline-none text-sm transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Kelas</label>
                            <select class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 outline-none text-sm transition appearance-none cursor-pointer">
                                <option disabled selected>Pilih Kelas</option>
                                <option>Kelas X</option>
                                <option>Kelas XI</option>
                                <option>Kelas XII</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Nama Sekolah</label>
                        <div class="relative">
                            <i class="fa-solid fa-magnifying-glass absolute left-4 top-4 text-slate-300 text-xs"></i>
                            <input type="text" placeholder="Cari sekolah Anda..." class="w-full pl-10 pr-4 py-3 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 outline-none text-sm transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Bidang Keahlian</label>
                        <select class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 outline-none text-sm transition appearance-none cursor-pointer">
                            <option selected>Pilih Bidang</option>
                            <option>Teknologi Informasi</option>
                            <option>Teknik Mesin</option>
                            <option>Seni Kreatif</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-2 uppercase tracking-wider">Program Keahlian / Jurusan</label>
                        <input type="text" placeholder="Masukkan nama jurusan spesifik" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 outline-none text-sm transition">
                    </div>

                    <div class="flex items-center justify-between pt-6">
                        <button type="button" class="text-sm font-bold text-slate-500 hover:text-blue-900 transition flex items-center">
                            <i class="fa-solid fa-arrow-left mr-2"></i> Kembali
                        </button>
                        <button type="button" class="bg-[#0B215E] text-white px-10 py-3.5 rounded-xl font-bold text-sm hover:bg-blue-900 transition-all shadow-lg shadow-blue-900/20 flex items-center">
                            <span>Simpan & Lanjutkan</span>
                            <i class="fa-solid fa-chevron-right ml-2 text-[10px]"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <footer class="bg-white border-t border-slate-100 py-8 px-12 text-slate-400 text-[11px] font-medium uppercase tracking-wider">
        <div class="max-w-7xl mx-auto flex flex-col md:row-reverse md:flex-row justify-between items-center space-y-4 md:space-y-0">
            <div>
                <span class="text-blue-900 font-bold">PKK Kemendikdasmen</span>
                <span class="mx-2">|</span>
                <span>© 2024 Kemendikdasmen. Hak Cipta Dilindungi Undang-Undang.</span>
            </div>
            <div class="flex space-x-6">
                <a href="#" class="hover:text-blue-900">Kebijakan Privasi</a>
                <a href="#" class="hover:text-blue-900">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-blue-900">Peta Situs</a>
                <a href="#" class="hover:text-blue-900">Kontak Kami</a>
            </div>
        </div>
    </footer>

</body>
</html>
