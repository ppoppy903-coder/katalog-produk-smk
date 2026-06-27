<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Akun Siswa - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="flex h-screen bg-white text-slate-800">

    <div class="hidden lg:flex lg:w-5/12 bg-[#0A193F] text-white flex-col justify-center p-12">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-8 h-8 bg-white rounded flex items-center justify-center text-[#0A193F]"><i class="fa-solid fa-graduation-cap text-sm"></i></div>
            <span class="font-bold text-sm tracking-widest uppercase">PKK Kemendikdasmen</span>
        </div>
        <h1 class="text-5xl font-extrabold leading-tight tracking-tight">Meningkatkan<br>Ekselensi SMK</h1>
    </div>

    <div class="flex-1 flex flex-col justify-center p-8 md:p-12 lg:p-24 overflow-y-auto">
        <div class="max-w-md w-full mx-auto">
            <div class="mb-10">
                <h2 class="text-3xl font-extrabold text-[#0A193F] mb-2 tracking-tight">Masuk Akun Siswa</h2>
                <p class="text-slate-500 text-sm">Masukkan email dan kata sandi untuk masuk ke sistem.</p>
            </div>

            {{-- Pesan Error Jika Login Gagal --}}
            @if($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm font-bold">
                    <i class="fa-solid fa-circle-exclamation mr-2"></i> {{ $errors->first() }}
                </div>
            @endif

            {{-- Form Login dengan struktur yang benar --}}
            <form action="{{ route('login.siswa.proses') }}" method="POST" class="space-y-6">
                @csrf 
                
                {{-- Input Email --}}
                <div>
                    <label class="block text-xs font-bold text-[#0A193F] mb-2">Email</label>
                    <input type="email" name="email" 
                        class="w-full p-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#0A193F] outline-none @error('email') border-red-500 @enderror" 
                        placeholder="contoh@email.com" 
                        required 
                        value="{{ old('email') }}"
                        autocomplete="email">
                </div>

                {{-- Input Password --}}
                <div>
                    <label class="block text-xs font-bold text-[#0A193F] mb-2">Kata Sandi</label>
                    <input type="password" name="password" 
                        class="w-full p-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#0A193F] outline-none" 
                        placeholder="Masukkan kata sandi" 
                        required
                        autocomplete="current-password">
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="w-full py-4 bg-[#0A193F] text-white rounded-xl text-sm font-bold hover:bg-[#071330] transition shadow-md flex items-center justify-center gap-2">
                    Masuk Sekarang <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-slate-500">
                    Belum punya akun? <a href="{{ route('daftar.siswa') }}" class="font-bold text-[#065F46] hover:underline">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>