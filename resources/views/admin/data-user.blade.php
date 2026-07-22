<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
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

        <!-- Main Content -->
        <main class="flex-1 p-4 sm:p-8 overflow-y-auto">
            <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm border border-slate-200">
                <h2 class="text-lg font-bold text-[#0A193F] mb-6">Daftar Pengguna</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left whitespace-nowrap">
                        <thead>
                            <tr class="text-slate-400 text-xs uppercase border-b border-slate-100">
                                <th class="pb-4 font-bold">Nama</th>
                                <th class="pb-4 font-bold">Email/NPSN</th>
                                <th class="pb-4 font-bold">Role</th>
                                <th class="pb-4 font-bold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($users as $user)
                            <tr class="border-b border-slate-50 last:border-0 hover:bg-slate-50 transition-colors">
                                <td class="py-4 font-semibold text-[#0A193F]">{{ $user->name }}</td>
                                <td class="py-4 text-slate-500">{{ $user->email ?? $user->npsn }}</td>
                                
                                <!-- Badge Role dengan warna dinamis -->
                                <td class="py-4">
                                    <span class="px-3 py-1 text-[10px] font-bold rounded-full border 
                                        {{ $user->role == 'SISWA' ? 'bg-blue-50 text-blue-600 border-blue-200' : 
                                           ($user->role == 'GURU' ? 'bg-emerald-50 text-emerald-600 border-emerald-200' : 
                                           'bg-amber-50 text-amber-600 border-amber-200') }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                
                                <td class="py-4">
                                    <button class="text-red-500 hover:text-red-700 font-bold text-xs uppercase">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>