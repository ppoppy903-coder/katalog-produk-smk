<aside class="w-64 bg-[#F8FAFC] border-r border-slate-200 flex flex-col justify-between flex-shrink-0 z-20">
    <div>
        <div class="h-20 flex flex-col justify-center px-8 border-b border-transparent mb-4 mt-2">
            <h1 class="font-extrabold text-[#0A193F] text-xl tracking-tight">PKK SMK</h1>
            <span class="text-[10px] font-medium text-slate-500 uppercase tracking-wider">Teacher Panel</span>
        </div>
        
        <nav class="px-4 flex flex-col gap-2">
            {{-- Dashboard --}}
            <a href="{{ route('dashboard.guru') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('dashboard.guru') ? 'bg-[#80F2D6] text-[#054E45] font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-100' }} rounded-xl transition text-sm">
                <i class="fa-solid fa-border-all w-5 text-center text-lg"></i> Dashboard
            </a>
            
            {{-- Validasi --}}
            <a href="{{ route('validasi.produk') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('validasi.produk') ? 'bg-[#80F2D6] text-[#054E45] font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-100' }} rounded-xl transition text-sm">
                <i class="fa-regular fa-square-check w-5 text-center text-lg"></i> Validasi Produk
            </a>
            
            {{-- Histori Validasi --}}
            <a href="{{ route('guru.histori') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('guru.histori') ? 'bg-[#80F2D6] text-[#054E45] font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-100' }} rounded-xl transition text-sm">
                <i class="fa-solid fa-clock-rotate-left w-5 text-center text-lg"></i> Histori Validasi
            </a>
            
            {{-- Pengaturan --}}
            <a href="{{ route('pengaturan') }}" class="flex items-center gap-3 px-4 py-3 {{ request()->routeIs('pengaturan') ? 'bg-[#80F2D6] text-[#054E45] font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-100' }} rounded-xl transition text-sm">
                <i class="fa-solid fa-gear w-5 text-center text-lg"></i> Pengaturan
            </a>
        </nav>
    </div>
    
    <div class="p-6">
        <a href="{{ route('logout') }}" class="w-full bg-[#0A193F] text-white py-3.5 rounded-xl text-sm font-bold flex items-center justify-center gap-2 hover:bg-[#1a2d5e] transition">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
        </a>
    </div>
</aside>