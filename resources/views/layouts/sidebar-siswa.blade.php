<aside class="w-64 bg-[#0A193F] text-white flex-shrink-0 flex flex-col h-screen">
    <div class="p-6 text-xl font-bold border-b border-blue-900">
        Panel Siswa
    </div>

    <nav class="flex-1 p-4 space-y-2">
        {{-- Dashboard --}}
        <a href="{{ Route::has('dashboard.siswa') ? route('dashboard.siswa') : '#' }}" 
           class="block px-4 py-3 rounded-lg {{ request()->routeIs('dashboard.siswa') ? 'bg-blue-900' : 'hover:bg-blue-900' }} transition">
            <i class="fa-solid fa-house mr-3"></i> Dashboard
        </a>

        {{-- Tambah Produk --}}
        <a href="{{ Route::has('tambah.produk') ? route('tambah.produk') : '#' }}" 
           class="block px-4 py-3 rounded-lg {{ request()->routeIs('tambah.produk') ? 'bg-blue-900' : 'hover:bg-blue-900' }} transition">
            <i class="fa-solid fa-plus mr-3"></i> Tambah Produk
        </a>

        {{-- Notifikasi (Diperbaiki dengan pengecekan Route::has) --}}
        <a href="{{ Route::has('notifikasi') ? route('notifikasi') : '#' }}" 
           class="block px-4 py-3 rounded-lg {{ request()->routeIs('notifikasi') ? 'bg-blue-900' : 'hover:bg-blue-900' }} transition">
            <i class="fa-solid fa-bell mr-3"></i> Notifikasi
        </a>

        {{-- Pengaturan (Diperbaiki dengan pengecekan Route::has) --}}
        <a href="{{ Route::has('pengaturan') ? route('pengaturan') : '#' }}" 
           class="block px-4 py-3 rounded-lg {{ request()->routeIs('pengaturan') ? 'bg-blue-900' : 'hover:bg-blue-900' }} transition">
            <i class="fa-solid fa-gear mr-3"></i> Pengaturan
        </a>

        <a href="{{ route('sertifikat.index') }}" 
        class="flex items-center gap-3 px-4 py-3 text-sm font-semibold rounded-xl 
        {{ request()->routeIs('sertifikat.index') ? 'bg-blue-600 text-white' : 'text-slate-400 hover:bg-slate-50 hover:text-slate-700' }}">
            <i class="fa-solid fa-certificate"></i>
            <span>Sertifikat Saya</span>
        </a>
    </nav>

    <div class="p-4 border-t border-blue-900">
        <a href="{{ Route::has('logout') ? route('logout') : '#' }}" 
           class="block px-4 py-3 text-red-300 hover:text-white transition">
            <i class="fa-solid fa-right-from-bracket mr-3"></i> Keluar
        </a>
    </div>
</aside>