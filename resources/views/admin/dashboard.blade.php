<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="min-h-screen flex text-slate-800 bg-[#F8FAFC]" x-data="{ sidebarOpen: false }">

    {{-- SIDEBAR ADMIN (Responsive Mobile & Desktop) --}}
    <div :class="sidebarOpen ? 'block fixed inset-y-0 left-0 z-50 w-64 shadow-2xl' : 'hidden'" class="lg:block lg:relative lg:z-0 flex-shrink-0">
        <x-sidebar-admin />
    </div>

    {{-- Overlay Gelap saat Sidebar Mobile Terbuka --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-cloak></div>

    {{-- KONTEN UTAMA --}}
    <div class="flex-1 flex flex-col min-w-0 min-h-screen">
        
        {{-- HEADER MOBILE DENGAN TOMBOL HAMBURGER --}}
        <header class="h-16 bg-white border-b flex items-center justify-between px-4 sm:px-8 shadow-sm z-30 sticky top-0 lg:hidden">
            <div class="flex items-center gap-3">
                <button @click="sidebarOpen = !sidebarOpen" class="text-slate-600 hover:text-[#0A193F] focus:outline-none p-2 rounded-xl hover:bg-slate-100 transition">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <span class="font-extrabold text-[#0A193F] text-sm">Panel Admin</span>
            </div>
            <div class="text-right">
                <div class="text-xs font-bold text-[#0A193F]">{{ auth()->user()->name ?? 'Admin' }}</div>
            </div>
        </header>

        <main class="flex-1 p-4 sm:p-8 overflow-y-auto">
            <div class="mb-8">
                <h1 class="text-2xl sm:text-3xl font-extrabold text-[#0A193F]">Halo, Admin!</h1>
                <p class="text-slate-500 text-sm mt-1">Selamat datang kembali di sistem pengelolaan data.</p>
            </div>

            {{-- Stats Grid (PASTI 2 kolom di HP, 3 kolom di Desktop) --}}
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                @foreach([['title' => 'Total User', 'value' => 7, 'icon' => 'fa-users'], ['title' => 'Sertifikat Masuk', 'value' => 0, 'icon' => 'fa-certificate'], ['title' => 'Data Pending', 'value' => 0, 'icon' => 'fa-clock']] as $stat)
                <div class="bg-white p-4 sm:p-6 rounded-3xl border border-slate-200 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-[10px] sm:text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $stat['title'] }}</p>
                            <p class="text-2xl sm:text-3xl font-extrabold text-[#0A193F] mt-1 sm:mt-2">{{ $stat['value'] }}</p>
                        </div>
                        <div class="bg-blue-50 text-blue-600 w-10 h-10 sm:w-12 sm:h-12 rounded-2xl flex items-center justify-center flex-shrink-0">
                            <i class="fa-solid {{ $stat['icon'] }} text-base sm:text-lg"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- Aktivitas Terbaru --}}
            <div class="bg-white p-6 sm:p-8 rounded-3xl border border-slate-200 shadow-sm mt-8">
                <h3 class="text-lg font-extrabold text-[#0A193F] mb-6">Aktivitas Terbaru</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead class="text-slate-400 text-xs uppercase border-b border-slate-100">
                            <tr>
                                <th class="pb-4 font-bold">Pengguna</th>
                                <th class="pb-4 font-bold">Tindakan</th>
                                <th class="pb-4 font-bold">Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="text-slate-500">
                                <td class="py-5 italic">Belum ada aktivitas terbaru</td>
                                <td class="py-5">-</td>
                                <td class="py-5">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>