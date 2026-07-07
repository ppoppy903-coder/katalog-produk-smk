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
<body class="flex h-screen overflow-hidden text-slate-800 bg-[#F8FAFC]">

    @auth
        @if(auth()->user()->role === 'guru')
            @include('layouts.sidebar-guru')
        @elseif(auth()->user()->role === 'admin')
            <x-sidebar-admin /> <!-- Memanggil komponen sidebar admin yang kita buat -->
        @else
            @include('layouts.sidebar-siswa')
        @endif
    @endauth

    <div class="flex-1 flex flex-col overflow-hidden">
        <header class="h-16 bg-white border-b flex items-center justify-between px-8 shadow-sm z-10">
            <div></div> 
            
            <div class="flex items-center gap-6">
                <div class="text-right">
                    <div class="text-sm font-bold text-[#0A193F]">{{ auth()->user()->name ?? 'Pengguna' }}</div>
                    <div class="text-[10px] text-slate-500 uppercase">{{ auth()->user()->role ?? 'User' }}</div>
                </div>
            </div>
        </header>

        <main class="flex-1 overflow-y-auto p-8">
            @yield('content')
        </main>
    </div>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>
</html>