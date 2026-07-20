<aside class="w-64 bg-gradient-to-b from-indigo-50/60 via-slate-50 to-white border-r border-indigo-100/60 flex flex-col justify-between flex-shrink-0 z-20 shadow-sm">
    <div>
        <div class="h-20 flex flex-col justify-center px-8 border-b border-indigo-100/40 mb-4 mt-2">
            <h1 class="font-extrabold text-[#0A193F] text-xl tracking-tight">PKK SMK</h1>
            <span class="text-[10px] font-bold text-indigo-500 uppercase tracking-widest">Teacher Panel</span>
        </div>
        
        <nav class="px-4 flex flex-col gap-2">
            {{-- Dashboard --}}
            <a href="{{ route('dashboard.guru') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dashboard.guru') ? '!bg-indigo-600 !text-white !font-bold shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/80 hover:text-indigo-600' }} rounded-2xl transition-all duration-300 text-sm">
                <i class="fa-solid fa-border-all w-5 text-center text-lg {{ request()->routeIs('dashboard.guru') ? 'text-white' : 'text-indigo-400' }}"></i> Dashboard
            </a>
            
            {{-- Validasi Produk --}}
            <a href="{{ route('validasi.produk') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('validasi.produk*') ? '!bg-indigo-600 !text-white !font-bold shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/80 hover:text-indigo-600' }} rounded-2xl transition-all duration-300 text-sm">
                <i class="fa-regular fa-square-check w-5 text-center text-lg {{ request()->routeIs('validasi.produk*') ? 'text-white' : 'text-indigo-400' }}"></i> Validasi Produk
            </a>
            
            {{-- Histori Validasi --}}
            <a href="{{ route('guru.histori') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('guru.histori') ? '!bg-indigo-600 !text-white !font-bold shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/80 hover:text-indigo-600' }} rounded-2xl transition-all duration-300 text-sm">
                <i class="fa-solid fa-clock-rotate-left w-5 text-center text-lg {{ request()->routeIs('guru.histori') ? 'text-white' : 'text-indigo-400' }}"></i> Histori Validasi
            </a>
            
            {{-- Pengaturan --}}
            <a href="{{ route('pengaturan') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('pengaturan') ? '!bg-indigo-600 !text-white !font-bold shadow-md shadow-indigo-200' : 'text-slate-600 hover:bg-indigo-50/80 hover:text-indigo-600' }} rounded-2xl transition-all duration-300 text-sm">
                <i class="fa-solid fa-gear w-5 text-center text-lg {{ request()->routeIs('pengaturan') ? 'text-white' : 'text-indigo-400' }}"></i> Pengaturan
            </a>
        </nav>
    </div>
    
    <div class="p-6">
        <a href="{{ route('logout') }}" class="w-full bg-[#0A193F] text-white py-3.5 rounded-2xl text-sm font-bold flex items-center justify-center gap-2 hover:bg-[#1a2d5e] transition-all duration-300 shadow-sm">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
        </a>
    </div>
</aside>