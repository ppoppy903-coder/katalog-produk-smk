<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Berhasil Diajukan - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#F8FAFC] text-slate-800 flex flex-col min-h-screen">

    <header class="h-20 bg-white border-b border-slate-200 flex items-center justify-between px-6 md:px-12 flex-shrink-0">
        <div class="flex items-center gap-3">
            <div class="text-[#0F2857] text-2xl">
                <i class="fa-solid fa-graduation-cap"></i>
            </div>
            <span class="font-bold text-[#0F2857] text-lg tracking-tight">PKK Kemendikdasmen</span>
        </div>
        <a href="/dashboard-siswa" class="text-sm font-medium text-slate-600 hover:text-[#0F2857] transition">
            Dashboard Siswa
        </a>
    </header>

    <main class="flex-1 flex flex-col items-center justify-center p-6 md:p-12">
        
        <div class="bg-white rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-slate-100 p-8 md:p-14 max-w-3xl w-full relative overflow-hidden text-center z-10">
            
            <i class="fa-solid fa-certificate absolute -top-4 -right-4 text-[140px] text-slate-100 opacity-60 -z-10 rotate-12"></i>
            <i class="fa-solid fa-check absolute top-10 right-10 text-3xl text-white -z-10"></i>

            <div class="w-24 h-24 bg-[#80F2D6] rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
                <i class="fa-solid fa-check text-[#054E45] text-4xl"></i>
            </div>

            <h1 class="text-2xl md:text-3xl font-bold text-[#0F2857] mb-4">Produk Berhasil Diajukan!</h1>
            <p class="text-slate-600 text-sm md:text-base max-w-lg mx-auto mb-12 leading-relaxed">
                Produk Anda telah berhasil disimpan dan saat ini sedang menunggu verifikasi oleh Guru Pembimbing.
            </p>

            <div class="relative max-w-md mx-auto mb-12">
                <div class="absolute top-5 left-[15%] right-[15%] h-0.5 bg-slate-200 -z-10"></div>
                
                <div class="flex justify-between items-start">
                    
                    <div class="flex flex-col items-center w-24 bg-white">
                        <div class="w-10 h-10 rounded-full bg-[#054E45] text-white flex items-center justify-center mb-3 shadow-sm ring-4 ring-white">
                            <i class="fa-solid fa-check text-sm"></i>
                        </div>
                        <span class="text-[10px] md:text-xs font-bold text-[#054E45] uppercase tracking-wider mb-1">Diajukan</span>
                        <span class="text-[10px] text-slate-400">Hari ini</span>
                    </div>

                    <div class="flex flex-col items-center w-28 bg-white">
                        <div class="w-10 h-10 rounded-full border-2 border-[#054E45] text-[#054E45] bg-white flex items-center justify-center mb-3 ring-4 ring-white">
                            <i class="fa-solid fa-hourglass-half text-sm"></i>
                        </div>
                        <span class="text-[10px] md:text-xs font-bold text-[#0F2857] uppercase tracking-wider mb-1 text-center">Verifikasi Guru</span>
                        <span class="text-[10px] text-slate-400">Sedang Proses</span>
                    </div>

                    <div class="flex flex-col items-center w-24 bg-white opacity-60">
                        <div class="w-10 h-10 rounded-full border-2 border-slate-300 text-slate-400 bg-slate-50 flex items-center justify-center mb-3 ring-4 ring-white">
                            <i class="fa-solid fa-file-signature text-sm"></i>
                        </div>
                        <span class="text-[10px] md:text-xs font-bold text-slate-500 uppercase tracking-wider mb-1">Persetujuan</span>
                        <span class="text-[10px] text-slate-400">Belum Dimulai</span>
                    </div>

                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="/dashboard-siswa" class="w-full sm:w-auto px-8 py-3.5 bg-[#0F2857] text-white text-sm font-bold rounded-lg hover:bg-blue-900 transition flex items-center justify-center gap-2 shadow-md">
                    Kembali ke Dashboard <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="/riwayat-produk" class="w-full sm:w-auto px-8 py-3.5 bg-[#80F2D6] text-teal-900 text-sm font-bold rounded-lg hover:bg-teal-300 transition shadow-sm text-center">
                    Lihat Riwayat Produk
                </a>
            </div>

        </div>

        <p class="mt-8 text-sm text-slate-500 text-center">
            Butuh bantuan terkait pengajuan? <a href="#" class="font-bold text-[#0F2857] hover:underline">Hubungi Admin Sekolah</a>
        </p>

    </main>

    <footer class="bg-slate-100 border-t border-slate-200 px-6 md:px-12 py-8 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="text-center md:text-left">
            <h4 class="font-bold text-[#0F2857] text-lg mb-1 tracking-tight">PKK Kemendikdasmen</h4>
            <p class="text-xs text-slate-500">© 2024 PKK Kemendikdasmen. Hak Cipta Dilindungi.</p>
        </div>
        <div class="flex flex-wrap justify-center gap-6 text-xs text-slate-600 font-medium">
            <a href="#" class="hover:text-[#0F2857] transition">Kebijakan Privasi</a>
            <a href="#" class="hover:text-[#0F2857] transition">Syarat & Ketentuan</a>
            <a href="#" class="hover:text-[#0F2857] transition">Kontak Kami</a>
        </div>
    </footer>

</body>
</html>