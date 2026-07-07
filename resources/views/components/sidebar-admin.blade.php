<aside class="w-64 bg-[#0A193F] text-white p-6 hidden md:flex flex-col">
    <div class="flex items-center gap-3 mb-10">
        <div class="w-8 h-8 bg-white rounded flex items-center justify-center text-[#0A193F]">
            <i class="fa-solid fa-shield-halved"></i>
        </div>
        <span class="font-bold text-sm tracking-widest uppercase">Admin Panel</span>
    </div>
    
    <nav class="space-y-4 flex-1">
        <!-- Link Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="block p-3 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10' : 'hover:bg-white/5' }} rounded-xl font-semibold text-sm transition">
            <i class="fa-solid fa-gauge mr-3"></i> Dashboard
        </a>
        
        <!-- Link Data User -->
        <a href="{{ route('admin.data-user') }}" class="block p-3 {{ request()->routeIs('admin.data-user') ? 'bg-white/10' : 'hover:bg-white/5' }} rounded-xl text-slate-400 hover:text-white transition text-sm">
            <i class="fa-solid fa-users mr-3"></i> Data User
        </a>

        <a href="{{ route('sertifikat.index') }}" class="block p-3 {{ request()->routeIs('sertifikat.*') ? 'bg-white/10' : 'hover:bg-white/5' }} rounded-xl text-slate-400 hover:text-white transition text-sm">
            <i class="fa-solid fa-file-contract mr-3"></i> Sertifikat
        </a>
    </nav>

    <a href="{{ route('logout') }}" class="text-red-400 text-sm font-bold">
        <i class="fa-solid fa-right-from-bracket mr-2"></i> Keluar
    </a>
</aside>