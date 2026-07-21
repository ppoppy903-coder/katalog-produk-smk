<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PKK SMK')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #F8FAFC; }
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="min-h-screen flex text-slate-800 bg-[#F8FAFC]" x-data="{ sidebarOpen: false }">

    {{-- SIDEBAR (Desktop: selalu tampil, Mobile: muncul jika sidebarOpen true) --}}
    <div :class="sidebarOpen ? 'block fixed inset-y-0 left-0 z-50 w-64 shadow-2xl' : 'hidden'" class="lg:block lg:relative lg:z-0">
        @auth
            @if(auth()->user()->role === 'guru')
                @include('layouts.sidebar-guru')
            @elseif(auth()->user()->role === 'admin')
                <x-sidebar-admin />
            @else
                @include('layouts.sidebar-siswa')
            @endif
        @endauth
    </div>

    {{-- Overlay Gelap saat Sidebar Mobile Terbuka --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-cloak></div>

    <div class="flex-1 flex flex-col min-w-0 min-h-screen">
        {{-- HEADER DENGAN TOMBOL HAMBURGER MOBILE & JUDUL DINAMIS --}}
        <header class="h-16 bg-white border-b flex items-center justify-between px-4 sm:px-8 shadow-sm z-30 sticky top-0">
            <div class="flex items-center gap-3">
                {{-- Tombol Hamburger khusus HP --}}
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden text-slate-600 hover:text-[#0A193F] focus:outline-none p-2 rounded-xl hover:bg-slate-100 transition">
                    <i class="fa-solid fa-bars text-lg"></i>
                </button>
                <span class="font-extrabold text-[#0A193F] text-sm lg:hidden">
                    @if(auth()->check() && auth()->user()->role === 'guru')
                        Panel Guru
                    @else
                        Panel Siswa
                    @endif
                </span>
            </div> 
            
            <div class="flex items-center gap-6">
                <div class="text-right">
                    <div class="text-sm font-bold text-[#0A193F]">{{ auth()->user()->name ?? 'Pengguna' }}</div>
                    <div class="text-[10px] text-slate-500 uppercase">{{ auth()->user()->role ?? 'User' }}</div>
                </div>
            </div>
        </header>

        <main class="flex-1 p-4 sm:p-8">
            @yield('content')
        </main>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>