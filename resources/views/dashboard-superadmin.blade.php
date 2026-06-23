@php
if (!session('admin_logged_in')) {
    header("Location: /login-superadmin");
    exit();
}
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 font-sans">

<div class="flex min-h-screen">
    <aside class="w-64 bg-slate-900 text-white flex flex-col p-6">
        <div class="flex items-center gap-3 mb-10">
            <div class="w-8 h-8 bg-blue-500 rounded-lg"></div>
            <h1 class="text-xl font-bold tracking-tight">Superadmin</h1>
        </div>
        <nav class="space-y-4 flex-grow">
            <a href="/dashboard-superadmin" class="flex items-center gap-3 bg-slate-800 p-3 rounded-lg font-medium">Dashboard</a>
            <a href="/monitoring-produk" class="flex items-center gap-3 text-slate-400 p-3 hover:text-white transition">Monitoring Produk</a>
            <a href="#" class="flex items-center gap-3 text-slate-400 p-3 hover:text-white transition">Pengaturan</a>
        </nav>
        <div class="flex items-center gap-3 mt-auto border-t border-slate-800 pt-6">
            <div class="w-10 h-10 rounded-full bg-emerald-500 flex items-center justify-center font-bold">SA</div>
            <div>
                <p class="text-sm font-bold">Admin Utama</p>
                <p class="text-xs text-slate-400">admin@kemdikbud.go.id</p>
            </div>
        </div>
    </aside>

    <main class="flex-1 p-8">
        <header class="flex justify-between items-center mb-8">
            <input type="text" placeholder="Cari data monitoring..." class="w-96 p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-slate-400 outline-none">
            <p class="font-bold text-slate-600">Luminous Admin</p>
        </header>

        <h2 class="text-2xl font-bold text-slate-800 mb-2">Ringkasan Statistik Monitoring</h2>
        <p class="text-slate-500 mb-8">Pantau performa produk dan partisipasi sekolah secara real-time.</p>

        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 mb-1">TOTAL PRODUK DISETUJUI</p>
                <h2 class="text-3xl font-bold text-emerald-600">2,482</h2>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 mb-1">SEKOLAH BERPARTISIPASI</p>
                <h2 class="text-3xl font-bold text-slate-800">1,120</h2>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 mb-1">KATEGORI PRODUK AKTIF</p>
                <h2 class="text-3xl font-bold text-slate-800">24</h2>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <p class="text-[10px] font-bold text-slate-400 mb-1">PRODUK DALAM PENINJAUAN</p>
                <h2 class="text-3xl font-bold text-red-500">156</h2>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-6">
            <div class="col-span-2 bg-white p-6 rounded-2xl border border-slate-100 shadow-sm h-80">
                <h3 class="font-bold text-slate-800 mb-4">Tren Pengajuan Produk</h3>
                <div class="h-48 border-2 border-dashed border-slate-200 rounded-xl flex items-center justify-center text-slate-400">
                    Visualisasi Grafik Interaktif
                </div>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm">
                <h3 class="font-bold text-slate-800 mb-4">Aktivitas Terbaru</h3>
                <div class="space-y-6 text-sm">
                    <div class="border-l-2 border-emerald-500 pl-4">
                        <p class="text-slate-800 font-medium">Admin menyetujui "Mesin CNC Mini"</p>
                        <p class="text-slate-400 text-xs">2 menit lalu</p>
                    </div>
                    <div class="border-l-2 border-slate-200 pl-4">
                        <p class="text-slate-800 font-medium">Pembaruan kategori "Furniture Rotan"</p>
                        <p class="text-slate-400 text-xs">15 menit lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

</body>
</html>