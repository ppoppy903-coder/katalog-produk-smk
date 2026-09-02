@extends('layouts.app')

@section('title', 'Tambah Produk - PKK SMK Portal')

@section('content')
<div class="max-w-5xl mx-auto pb-20">
    <div class="mb-8">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-[#0A193F] tracking-tight">Tambah Produk Baru</h2>
        <p class="text-slate-500 text-sm mt-1">Lengkapi form di bawah ini untuk mengajukan produk inovasi Anda.</p>
    </div>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-100 text-red-600 p-4 rounded-2xl mb-8 text-sm font-bold">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error) 
                    <li>{{ $error }}</li> 
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('simpan.produk') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        {{-- SECTION 1: IDENTITAS --}}
        <section class="bg-white p-6 sm:p-8 rounded-3xl border-l-8 border-[#0A193F] shadow-lg shadow-blue-900/5">
            <h3 class="text-base sm:text-lg font-extrabold text-[#0A193F] mb-6 flex items-center gap-3">
                <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm flex-shrink-0">1</span> Identitas Merek & Bidang
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nama Merek</label>
                    <input type="text" name="nama_merek" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Kategori Bidang</label>
                    <select name="kategori" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Makanan dan Minuman">Makanan dan Minuman</option>
                        <option value="Budidaya">Budidaya</option>
                        <option value="Industri Kreatif, Seni, dan Budaya">Industri Kreatif, Seni, dan Budaya</option>
                        <option value="Jasa, Pariwisata, dan Perdagangan">Jasa, Pariwisata, dan Perdagangan</option>
                        <option value="Manufaktur dan Teknologi Terapan">Manufaktur dan Teknologi Terapan</option>
                        <option value="Bisnis Digital">Bisnis Digital</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Logo Merek</label>
                    <input type="file" name="logo" required class="w-full p-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Tahun NIB</label>
                    <input type="number" name="tahun_nib" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="Contoh: 2026">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">NIB</label>
                    <input type="text" name="nib" id="nibInput" readonly required class="w-full p-4 bg-slate-100 border border-slate-200 rounded-2xl text-sm outline-none transition-all">
                    <label class="mt-4 flex items-center gap-3 cursor-pointer select-none">
                        <input type="checkbox" name="tampilkan_nib" id="nibCheckbox" value="1" class="w-5 h-5 rounded text-[#0A193F]">
                        <span class="text-sm font-semibold text-slate-700">Aktifkan & Tampilkan NIB</span>
                    </label>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Filosofi Merek</label>
                    <textarea name="filosofi" rows="2" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all"></textarea>
                </div>
            </div>
        </section>

        {{-- SECTION 2: DETAIL PRODUK --}}
        <section class="bg-white p-6 sm:p-8 rounded-3xl border-l-8 border-blue-500 shadow-lg shadow-blue-900/5">
            <h3 class="text-base sm:text-lg font-extrabold text-[#0A193F] mb-6 flex items-center gap-3">
                <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm flex-shrink-0">2</span> Detail Produk/Jasa
            </h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nama Produk</label>
                    <input type="text" name="nama_produk" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Foto Produk (Maksimal 6 Foto)</label>
                    <input type="file" name="foto_produk[]" multiple accept="image/*" required class="w-full p-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" onchange="checkFileCount(this)">
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Latar Belakang</label>
                    <textarea name="latar_belakang" rows="2" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Deskripsi Produk</label>
                    <textarea name="deskripsi" rows="2" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all"></textarea>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Harga</label>
                    <input type="text" name="harga" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="Contoh: Rp 100.000">
                </div>
            </div>
        </section>

        {{-- SECTION 3: KONTAK & LOKASI --}}
        <section class="bg-white p-6 sm:p-8 rounded-3xl border-l-8 border-emerald-500 shadow-lg shadow-emerald-900/5">
            <h3 class="text-base sm:text-lg font-extrabold text-[#0A193F] mb-6 flex items-center gap-3">
                <span class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-sm flex-shrink-0">3</span> Kontak & Lokasi
            </h3>
            <div class="space-y-6">
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Lokasi Produksi</label>
                    <textarea name="lokasi" required rows="2" class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all"></textarea>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Link Google Maps</label>
                        <input type="url" name="link_maps" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all">
                    </div>
                    <div>
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Akun Media Sosial</label>
                        <input type="text" name="sosmed" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all">
                    </div>
                </div>
                <div>
                    <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nomor WhatsApp</label>
                    <input type="text" name="no_wa" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all" placeholder="628123456789">
                </div>
            </div>
        </section>

        {{-- SECTION 4: IDENTITAS TIM & INSTITUSI --}}
        <section class="bg-white p-6 sm:p-8 rounded-3xl border-l-8 border-indigo-500 shadow-lg shadow-indigo-900/5">
            <h3 class="text-base sm:text-lg font-extrabold text-[#0A193F] mb-6 flex items-center gap-3">
                <span class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-sm flex-shrink-0">4</span> Identitas Tim & Institusi
            </h3>
            
            {{-- Kotak Nama Sekolah (Jurusan dihapus, kini tampil full-width) --}}
            <div class="w-full">
                <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nama Sekolah</label>
                <input type="text" name="nama_sekolah" required class="w-full p-4 bg-slate-50 border border-slate-200 rounded-2xl text-sm focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F] outline-none transition-all">
            </div>
            
            {{-- CONTAINER ANGGOTA TIM --}}
            <div class="mt-8 space-y-4">
                <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Daftar Anggota Tim</label>
                <div id="tim-container" class="space-y-4">
                    <div class="flex flex-col sm:flex-row gap-4 items-center bg-slate-50 p-4 rounded-2xl">
                        <input type="text" name="tim_nama[]" placeholder="Nama Lengkap Anggota" class="w-full p-4 bg-white border border-slate-200 rounded-xl text-sm outline-none focus:border-[#0A193F]" required>
                        <input type="text" name="tim_nis[]" placeholder="NIS/NISN" class="w-full sm:w-48 p-4 bg-white border border-slate-200 rounded-xl text-sm outline-none focus:border-[#0A193F]" required>
                    </div>
                </div>
                <button type="button" onclick="tambahAnggota()" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 transition pt-2">
                    <i class="fa-solid fa-plus mr-1"></i> Tambah Anggota Tim
                </button>
            </div>

            <div class="mt-8">
                <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Foto Tim Pengembang (Foto Bersama Siswa & Guru)</label>
                <input type="file" name="foto_tim" accept="image/*" required class="w-full p-3 bg-slate-50 border border-slate-200 rounded-2xl text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase">* Pastikan foto bersama terlihat jelas dan cerah.</p>
            </div>
        </section>

        <button type="submit" class="w-full bg-[#0A193F] text-white py-5 rounded-2xl font-bold hover:bg-blue-900 transition-all text-base sm:text-lg shadow-xl shadow-blue-900/10">
            Simpan Semua Data Produk <i class="fa-solid fa-arrow-right ml-2"></i>
        </button>
    </form>
</div>

<script>
    // Toggle NIB Input
    const checkbox = document.getElementById('nibCheckbox');
    const input = document.getElementById('nibInput');

    checkbox.addEventListener('change', function() {
        input.readOnly = !this.checked;
        input.className = this.checked 
            ? "w-full p-4 bg-white border border-slate-200 rounded-2xl text-sm outline-none transition-all focus:border-[#0A193F] focus:ring-1 focus:ring-[#0A193F]" 
            : "w-full p-4 bg-slate-100 border border-slate-200 rounded-2xl text-sm outline-none transition-all";
        if (this.checked) input.focus();
    });

    // Validasi jumlah file foto produk
    function checkFileCount(input) {
        if (input.files.length > 6) {
            alert("Maksimal hanya boleh upload 6 foto!");
            input.value = "";
        }
    }

    // Tambah Anggota Tim
    let count = 1;
    function tambahAnggota() {
        if (count < 5) { 
            count++;
            const div = document.createElement('div');
            div.className = "flex flex-col sm:flex-row gap-4 items-center bg-slate-50 p-4 rounded-2xl";
            div.innerHTML = `<input type="text" name="tim_nama[]" placeholder="Nama Lengkap Anggota" class="w-full p-4 bg-white border border-slate-200 rounded-xl text-sm outline-none focus:border-[#0A193F]" required>
                             <input type="text" name="tim_nis[]" placeholder="NIS/NISN" class="w-full sm:w-48 p-4 bg-white border border-slate-200 rounded-xl text-sm outline-none focus:border-[#0A193F]" required>`;
            document.getElementById('tim-container').appendChild(div);
        } else {
            alert("Maksimal 5 anggota tim.");
        }
    }
</script>
@endsection