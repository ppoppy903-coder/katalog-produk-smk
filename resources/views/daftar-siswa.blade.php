<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="flex h-screen overflow-hidden bg-white text-slate-800">

    <div class="hidden lg:flex lg:w-5/12 bg-[#0A193F] text-white flex-col justify-center p-12 relative overflow-hidden">
        <div class="absolute top-12 left-12 flex items-center gap-3">
            <div class="w-8 h-8 bg-white rounded flex items-center justify-center text-[#0A193F]"><i class="fa-solid fa-graduation-cap text-sm"></i></div>
            <span class="font-bold text-sm tracking-widest uppercase">PKK Kemendikdasmen</span>
        </div>
        <h1 class="text-5xl font-extrabold leading-tight tracking-tight">Meningkatkan<br>Ekselensi Vokasi</h1>
    </div>

    <div class="flex-1 flex flex-col justify-center p-8 md:p-12 lg:p-24 overflow-y-auto">
        <div class="max-w-md w-full mx-auto">
            <div class="mb-8">
                <h2 class="text-3xl font-extrabold text-[#0A193F] mb-2 tracking-tight">Buat Akun Siswa</h2>
                <p class="text-slate-500 text-sm">Lengkapi informasi berikut untuk bergabung.</p>
            </div>

            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-600 rounded-xl text-sm font-bold">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('daftar.siswa.proses') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-xs font-bold text-[#0A193F] mb-2">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full p-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#0A193F] outline-none" placeholder="Nama lengkap" required autocomplete="name">
                    </div>
                    <div>
                        <label for="email" class="block text-xs font-bold text-[#0A193F] mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full p-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#0A193F] outline-none" placeholder="contoh@email.com" required autocomplete="email">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="password" class="block text-xs font-bold text-[#0A193F] mb-2">Kata Sandi</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#0A193F] outline-none" placeholder="Min. 8 karakter" required autocomplete="new-password">
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-xs font-bold text-[#0A193F] mb-2">Ulangi Sandi</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="w-full p-3 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#0A193F] outline-none" placeholder="Ulangi sandi" required autocomplete="new-password">
                    </div>
                </div>

                <div>
                    <label for="npsn" class="block text-xs font-bold text-[#0A193F] mb-2">NPSN Sekolah</label>
                    <input type="text" id="npsn" name="npsn" value="{{ old('npsn') }}" placeholder="Masukkan 8 digit NPSN sekolah Anda" class="w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-[#0A193F] outline-none" required>
                </div>

                <button type="submit" class="w-full py-4 mt-4 bg-[#0A193F] text-white rounded-xl text-sm font-bold hover:bg-[#071330] transition shadow-md flex items-center justify-center gap-2">
                    Buat Akun <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <div class="mt-6 text-center">
                <p class="text-sm text-slate-500">
                    Sudah punya akun? <a href="{{ route('login.siswa') }}" class="font-bold text-[#065F46] hover:underline">Masuk di sini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>