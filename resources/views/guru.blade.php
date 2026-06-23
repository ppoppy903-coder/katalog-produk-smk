<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>PKK SMK | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }</style>
</head>
<body class="flex h-screen overflow-hidden text-slate-800">

    <aside class="w-64 bg-[#F8FAFC] border-r border-slate-200 flex flex-col justify-between flex-shrink-0">
        <div>
            <div class="h-20 flex flex-col justify-center px-8 border-b"><h1 class="font-extrabold text-[#0A193F] text-xl">PKK SMK</h1></div>
            <nav class="px-4 flex flex-col gap-2 mt-4">
                <a href="/dashboard-guru" class="flex items-center gap-3 px-4 py-3 {{ request()->is('dashboard-guru') ? 'bg-[#80F2D6] font-bold text-[#054E45]' : 'text-slate-500' }} rounded-xl transition text-sm"><i class="fa-solid fa-border-all w-5"></i> Dashboard</a>
                <a href="/validasi-produk" class="flex items-center gap-3 px-4 py-3 {{ request()->is('validasi-produk') ? 'bg-[#80F2D6] font-bold text-[#054E45]' : 'text-slate-500' }} rounded-xl transition text-sm"><i class="fa-regular fa-square-check w-5"></i> Validasi Produk</a>
                <a href="/notifikasi-guru" class="flex items-center gap-3 px-4 py-3 {{ request()->is('notifikasi-guru') ? 'bg-[#80F2D6] font-bold text-[#054E45]' : 'text-slate-500' }} rounded-xl transition text-sm"><i class="fa-regular fa-bell w-5"></i> Notifikasi</a>
                <a href="/pengaturan" class="flex items-center gap-3 px-4 py-3 {{ request()->is('pengaturan') ? 'bg-[#80F2D6] font-bold text-[#054E45]' : 'text-slate-500' }} rounded-xl transition text-sm"><i class="fa-solid fa-gear w-5"></i> Pengaturan</a>
            </nav>
        </div>
        <div class="p-6"><a href="/logout" class="w-full bg-[#0A193F] text-white py-3 rounded-xl text-sm font-bold flex items-center justify-center gap-2"><i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar</a></div>
    </aside>

    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 flex items-center justify-end px-8 bg-white border-b shadow-sm">
            <div class="text-right"><div class="text-sm font-bold">Bpk. Aris Setiawan</div></div>
        </header>
        <main class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>