<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Peran - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        /* Efek transisi halus pada card */
        .role-card { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
    </style>
</head>
<body class="flex h-screen overflow-hidden bg-slate-50 text-slate-800">

    {{-- Sisi Kiri (Modern Branding) --}}
    <div class="hidden lg:flex lg:w-5/12 bg-[#0A193F] text-white flex-col justify-center p-16 relative overflow-hidden">
        {{-- Aksen Dekoratif --}}
        <div class="absolute -top-24 -left-24 w-64 h-64 bg-blue-500 rounded-full opacity-10"></div>
        <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-indigo-500 rounded-full opacity-10"></div>
        
        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-12">
                <div class="w-10 h-10 bg-white/10 backdrop-blur rounded-xl flex items-center justify-center text-white"><i class="fa-solid fa-graduation-cap"></i></div>
                <span class="font-bold tracking-widest uppercase text-xs opacity-80">PKK Kemendikdasmen</span>
            </div>
            <h1 class="text-6xl font-extrabold leading-[1.1] mb-6">Meningkatkan<br><span class="text-blue-400">Ekselensi</span> SMK</h1>
            <p class="text-slate-400 max-w-sm leading-relaxed">Platform inovatif untuk mendukung pengembangan kreativitas dan kewirausahaan murid SMK.</p>
        </div>
    </div>

    {{-- Sisi Kanan (Form) --}}
    <div class="flex-1 flex flex-col justify-center p-8 lg:p-24 overflow-y-auto">
        <div class="max-w-md w-full mx-auto bg-white p-10 rounded-3xl shadow-xl shadow-slate-200/50">
            <h2 class="text-2xl font-extrabold text-[#0A193F] mb-2">Pilih Peran Anda</h2>
            <p class="text-slate-500 text-sm mb-8">Pilih tipe akun untuk melanjutkan registrasi</p>
            
            <form action="{{ route('proses.pilih.peran') }}" method="POST">
                @csrf
                
                <div class="mb-8">
                    <div class="grid grid-cols-2 gap-4">
                        {{-- Opsi Siswa --}}
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="siswa" class="peer hidden" required>
                            <div class="role-card flex flex-col items-center justify-center p-6 border-2 border-slate-100 rounded-2xl hover:border-blue-200 peer-checked:border-[#0A193F] peer-checked:bg-[#0A193F] peer-checked:text-white">
                                <i class="fa-solid fa-user-graduate text-3xl mb-3"></i>
                                <span class="text-sm font-bold">Siswa</span>
                            </div>
                        </label>
                        
                        {{-- Opsi Guru --}}
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="guru" class="peer hidden" required>
                            <div class="role-card flex flex-col items-center justify-center p-6 border-2 border-slate-100 rounded-2xl hover:border-blue-200 peer-checked:border-[#0A193F] peer-checked:bg-[#0A193F] peer-checked:text-white">
                                <i class="fa-solid fa-users text-3xl mb-3"></i>
                                <span class="text-sm font-bold">Guru</span>
                            </div>
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full py-4 bg-[#0A193F] text-white rounded-xl font-bold transition hover:bg-slate-800 hover:shadow-lg active:scale-95 flex items-center justify-center gap-2">
                    Langkah Berikutnya <i class="fa-solid fa-arrow-right text-xs"></i>
                </button>
            </form>
        </div>
        <p class="text-center text-slate-400 text-xs mt-8">© 2026 PKK Kemendikdasmen</p>
    </div>
</body> 
</html>