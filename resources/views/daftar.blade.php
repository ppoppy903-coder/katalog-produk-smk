<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Peran - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="flex h-screen overflow-hidden bg-white text-slate-800">

    <div class="hidden lg:flex lg:w-5/12 bg-[#0A193F] text-white flex-col justify-center p-12 relative">
        <div class="absolute top-12 left-12 flex items-center gap-3">
            <div class="w-8 h-8 bg-white rounded flex items-center justify-center text-[#0A193F]"><i class="fa-solid fa-graduation-cap text-sm"></i></div>
            <span class="font-bold text-sm tracking-widest uppercase">PKK Kemendikdasmen</span>
        </div>
        <h1 class="text-5xl font-extrabold leading-tight z-10">Meningkatkan<br>Ekselensi Vokasi</h1>
    </div>

    <div class="flex-1 flex flex-col justify-center p-8 lg:p-24 overflow-y-auto">
        <div class="max-w-md w-full mx-auto">
            <h2 class="text-3xl font-extrabold text-[#0A193F] mb-8">Pilih Peran Anda</h2>
            
            <form action="{{ route('proses.pilih.peran') }}" method="POST">
                @csrf
                
                <div class="mb-8">
                    <label class="block text-xs font-bold text-[#0A193F] mb-4">Tipe Registrasi</label>
                    <div class="grid grid-cols-2 gap-4">
                        
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="siswa" class="peer hidden" required>
                            <div class="flex flex-col items-center justify-center p-5 border-2 border-slate-200 rounded-xl transition peer-checked:border-[#0A193F] peer-checked:bg-blue-50">
                                <i class="fa-solid fa-user-graduate text-2xl mb-2"></i>
                                <span class="text-xs font-bold">Siswa</span>
                            </div>
                        </label>
                        
                        <label class="cursor-pointer">
                            <input type="radio" name="role" value="guru" class="peer hidden" required>
                            <div class="flex flex-col items-center justify-center p-5 border-2 border-slate-200 rounded-xl transition peer-checked:border-[#0A193F] peer-checked:bg-blue-50">
                                <i class="fa-solid fa-users text-2xl mb-2"></i>
                                <span class="text-xs font-bold">Guru</span>
                            </div>
                        </label>
                    </div>
                </div>

                <button type="submit" class="w-full py-4 bg-[#0A193F] text-white rounded-xl text-sm font-bold transition shadow-md hover:bg-slate-800 flex items-center justify-center gap-2">
                    Langkah Berikutnya <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</body>
</html>