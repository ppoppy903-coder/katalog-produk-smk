<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Guru - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="flex h-screen overflow-hidden bg-white text-slate-800">

    <div class="hidden lg:flex lg:w-5/12 bg-[#0A193F] text-white flex-col justify-between p-12 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-20">
                <div class="w-10 h-10 bg-white rounded-lg flex items-center justify-center text-[#0A193F] shadow-sm">
                    <i class="fa-solid fa-graduation-cap text-xl"></i>
                </div>
                <span class="font-bold text-xl tracking-tight">PKK Kemendikdasmen</span>
            </div>
            <h1 class="text-5xl font-extrabold leading-tight mb-6 mt-20 tracking-tight">
                Bimbing Inovasi<br><span class="text-[#80F2D6]">Siswa SMK</span>
            </h1>
            <p class="text-slate-300 text-sm leading-relaxed max-w-sm">
                Bergabunglah dalam ekosistem pendidikan vokasi yang modern dan terintegrasi untuk masa depan industri Indonesia yang lebih cerah.
            </p>
        </div>
    </div>

    <div class="flex-1 flex flex-col overflow-y-auto">
        <div class="flex-1 flex items-center justify-center p-8 md:p-12">
            <div class="w-full max-w-2xl">
                <div class="mb-10 text-center sm:text-left mt-8 sm:mt-0">
                    <h2 class="text-3xl font-extrabold text-[#0A193F] mb-2 tracking-tight">Profil Guru Pembimbing</h2>
                    <p class="text-slate-500 text-sm">Lengkapi data diri dan sekolah Anda.</p>
                </div>

                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 text-red-600 rounded-lg text-sm">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('daftar.guru.proses') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Masukan nama lengkap Anda" class="w-full p-3 border border-slate-200 rounded-lg outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>
                        
                        <div>
                            <label class="block text-xs font-bold text-[#0A193F] mb-2">Nama Sekolah</label>
                            <input type="text" name="nama_sekolah" value="{{ old('nama_sekolah') }}" placeholder="Contoh: SMK Negeri 1 Jakarta" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#0A193F] transition shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#0A193F] mb-2">Kata Sandi</label>
                            <input type="password" name="password" placeholder="Min. 8 karakter" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#0A193F] transition shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-[#0A193F] mb-2">Ulangi Kata Sandi</label>
                            <input type="password" name="password_confirmation" placeholder="Sesuai kata sandi" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#0A193F] transition shadow-sm" required>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-[#0A193F] mb-2">NPSN Sekolah</label>
                            <input type="text" name="npsn" value="{{ old('npsn') }}" placeholder="Masukkan 8 digit NPSN" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:outline-none focus:border-[#0A193F] transition shadow-sm" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="w-full py-4 bg-[#0A193F] text-white rounded-xl text-sm font-bold hover:bg-[#071330] transition shadow-md flex items-center justify-center gap-2 mt-8">
                        Buat Akun <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </form>

                <div class="mt-8 text-center space-y-4">
                    <p class="text-sm text-slate-500">
                        Sudah punya akun? <a href="{{ route('login.guru') }}" class="font-bold text-[#0A193F] hover:underline">Masuk</a>
                    </p>
                    <a href="{{ route('daftar') }}" class="inline-flex items-center gap-2 text-[10px] font-bold text-slate-400 hover:text-[#0A193F] transition uppercase tracking-widest mt-4">
                        <i class="fa-solid fa-arrow-left"></i> Kembali Pilih Peran
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>