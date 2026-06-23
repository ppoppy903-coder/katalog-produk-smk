<aside class="w-64 bg-[#F8FAFC] border-r border-slate-200 flex flex-col justify-between flex-shrink-0 z-20">
    <div>
        <div class="h-20 flex flex-col justify-center px-8 border-b border-transparent mb-4 mt-2">
            <h1 class="font-extrabold text-[#0A193F] text-xl tracking-tight">PKK SMK</h1>
            <span class="text-[10px] font-medium text-slate-500 uppercase tracking-wider">Teacher Panel</span>
        </div>
        <nav class="px-4 flex flex-col gap-2">
            <a href="/dashboard-guru" class="flex items-center gap-3 px-4 py-3 {{ request()->is('dashboard-guru') ? 'bg-[#80F2D6] text-[#054E45] font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-100' }} rounded-xl transition text-sm">
                <i class="fa-solid fa-border-all w-5 text-center text-lg"></i> Dashboard
            </a>
            <a href="/validasi-produk" class="flex items-center gap-3 px-4 py-3 {{ request()->is('validasi-produk') ? 'bg-[#80F2D6] text-[#054E45] font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-100' }} rounded-xl transition text-sm">
                <i class="fa-regular fa-square-check w-5 text-center text-lg"></i> Validasi Produk
            </a>
            <a href="/notifikasi-guru" class="flex items-center gap-3 px-4 py-3 {{ request()->is('notifikasi-guru') ? 'bg-[#80F2D6] text-[#054E45] font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-100' }} rounded-xl transition text-sm">
                <i class="fa-regular fa-bell w-5 text-center text-lg"></i> Notifikasi
            </a>
            <a href="/pengaturan" class="flex items-center gap-3 px-4 py-3 {{ request()->is('pengaturan') ? 'bg-[#80F2D6] text-[#054E45] font-bold shadow-sm' : 'text-slate-500 hover:bg-slate-100' }} rounded-xl transition text-sm">
                <i class="fa-solid fa-gear w-5 text-center text-lg"></i> Pengaturan
            </a>
        </nav>
    </div>
    <div class="p-6">
        <a href="/logout" class="w-full bg-[#0A193F] text-white py-3.5 rounded-xl text-sm font-bold hover:bg-[#071330] transition flex items-center justify-center gap-2 shadow-md">
            <i class="fa-solid fa-arrow-right-from-bracket"></i> Keluar
        </a>
    </div>
</aside>