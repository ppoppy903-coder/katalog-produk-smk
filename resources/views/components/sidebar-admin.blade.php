<aside class="w-64 bg-[#0A193F] text-white p-6 flex flex-col justify-between h-full lg:h-screen lg:sticky lg:top-0 z-20 shadow-2xl">
    <div>
        <div class="flex items-center justify-between mb-10">
            <div class="flex items-center gap-3">
                <div class="w-8 h-8 bg-white rounded-xl flex items-center justify-center text-[#0A193F] shadow-sm">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <span class="font-bold text-sm tracking-widest uppercase">Admin Panel</span>
            </div>
            
            {{-- Tombol Close X khusus tampilan Mobile --}}
            <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white p-2">
                <i class="fa-solid fa-xmark text-lg"></i>
            </button>
        </div>
        
        <nav class="space-y-2 flex-1">
            <!-- Link Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3.5 {{ request()->routeIs('admin.dashboard') ? 'bg-white/10 font-bold text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-2xl transition-all text-sm">
                <i class="fa-solid fa-gauge w-6 mr-2 text-blue-400"></i> Dashboard
            </a>
            
            <!-- Link Data User -->
            <a href="{{ route('admin.data-user') }}" class="flex items-center p-3.5 {{ request()->routeIs('admin.data-user') ? 'bg-white/10 font-bold text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-2xl transition-all text-sm">
                <i class="fa-solid fa-users w-6 mr-2 text-blue-400"></i> Data User
            </a>

            <!-- Link Sertifikat -->
            <a href="{{ route('sertifikat.index') }}" class="flex items-center p-3.5 {{ request()->routeIs('sertifikat.*') ? 'bg-white/10 font-bold text-white shadow-sm' : 'text-slate-300 hover:bg-white/5 hover:text-white' }} rounded-2xl transition-all text-sm">
                <i class="fa-solid fa-file-contract w-6 mr-2 text-blue-400"></i> Sertifikat
            </a>
        </nav>
    </div>

    <div class="pt-6 border-t border-slate-800">
        <a href="{{ route('logout') }}" class="flex items-center p-3.5 text-red-400 hover:bg-red-500/10 rounded-2xl text-sm font-bold transition">
            <i class="fa-solid fa-right-from-bracket w-6 mr-2"></i> Keluar
        </a>
    </div>
</aside>