<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Superadmin - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex h-screen overflow-hidden bg-white text-slate-800">

    <!-- Panel Kiri (Biru) -->
    <div class="hidden lg:flex lg:w-5/12 bg-[#0A193F] text-white flex-col justify-center p-12">
        <h1 class="text-5xl font-extrabold mb-6">Meningkatkan<br>Ekselensi Vokasi</h1>
        <p class="text-slate-300">Bergabunglah dalam ekosistem pendidikan vokasi yang modern.</p>
    </div>

    <!-- Panel Kanan (Form) -->
    <div class="flex-1 flex flex-col justify-center p-12">
        <div class="max-w-md w-full mx-auto">
            <h2 class="text-3xl font-extrabold mb-8">Masuk ke Portal</h2>
            
            <form action="/login-superadmin" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-xs font-bold mb-2">Email</label>
                    <input type="email" name="email" value="admin@kemdikbud.go.id" class="w-full p-3 border border-slate-200 rounded-xl" required>
                </div>
                <div>
                    <label class="block text-xs font-bold mb-2">Kata Sandi</label>
                    <input type="password" name="password" value="password" class="w-full p-3 border border-slate-200 rounded-xl" required>
                </div>
                
                <!-- Tombol yang cantik dan berfungsi -->
                <button type="submit" class="w-full py-4 bg-[#6EE7B7] text-[#065F46] rounded-xl font-bold hover:bg-[#34D399] transition shadow-md">
                    Masuk Sekarang →
                </button>
            </form>
        </div>
    </div>
</body>
</html>