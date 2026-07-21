<aside class="w-64 bg-[#0A193F] text-white flex-shrink-0 flex flex-col h-full lg:h-screen lg:sticky lg:top-0 shadow-lg">
    <div class="p-6 text-xl font-bold border-b border-blue-900 flex justify-between items-center">
        <span>Panel Siswa</span>
        {{-- Tombol Close X untuk HP --}}
        <button @click="sidebarOpen = false" class="lg:hidden text-slate-400 hover:text-white">
            <i class="fa-solid fa-xmark text-lg"></i>
        </button>
    </div>

    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        <a href="{{ Route::has('dashboard.siswa') ? route('dashboard.siswa') : '#' }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('dashboard.siswa') ? 'bg-blue-900 text-white shadow-sm' : 'text-slate-300 hover:bg-blue-900/50 hover:text-white' }} transition">
            <i class="fa-solid fa-house"></i> Dashboard
        </a>

        <a href="{{ Route::has('tambah.produk') ? route('tambah.produk') : '#' }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('tambah.produk') ? 'bg-blue-900 text-white shadow-sm' : 'text-slate-300 hover:bg-blue-900/50 hover:text-white' }} transition">
            <i class="fa-solid fa-plus"></i> Tambah Produk
        </a>

        <a href="{{ Route::has('notifikasi') ? route('notifikasi') : '#' }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('notifikasi') ? 'bg-blue-900 text-white shadow-sm' : 'text-slate-300 hover:bg-blue-900/50 hover:text-white' }} transition">
            <i class="fa-solid fa-bell"></i> Notifikasi
        </a>

        <a href="{{ Route::has('pengaturan') ? route('pengaturan') : '#' }}" 
           class="flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-semibold {{ request()->routeIs('pengaturan') ? 'bg-blue-900 text-white shadow-sm' : 'text-slate-300 hover:bg-blue-900/50 hover:text-white' }} transition">
            <i class="fa-solid fa-gear"></i> Pengaturan
        </a>

        <a href="{{ route('sertifikat.index') }}" 
           class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl {{ request()->routeIs('sertifikat.index') ? 'bg-blue-600 text-white shadow-sm' : 'text-slate-300 hover:bg-blue-900/50 hover:text-white' }} transition">
            <i class="fa-solid fa-certificate"></i>
            <span>Sertifikat Saya</span>
        </a>
    </nav>

    <div class="p-4 border-t border-blue-900">
        <a href="{{ Route::has('logout') ? route('logout') : '#' }}" 
           class="flex items-center gap-3 px-4 py-3 text-sm font-semibold text-red-300 hover:bg-red-500/10 hover:text-white rounded-xl transition">
            <i class="fa-solid fa-right-from-bracket"></i> Keluar
        </a>
    </div>
</aside>