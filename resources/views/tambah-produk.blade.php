<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - PKK SMK Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .input-3d { 
            width: 100%; padding: 1rem; background: white; border: 1px solid #e2e8f0; border-radius: 1rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); outline: none; transition: all 0.3s ease; 
        }
        .input-3d:focus { box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2); border-color: #3b82f6; }
    </style>
</head>
<body class="bg-[#F1F5F9] flex h-screen overflow-hidden">

    @include('layouts.sidebar-siswa')

    <main class="flex-1 overflow-y-auto p-12">
        <div class="max-w-5xl mx-auto">
            <h2 class="text-3xl font-extrabold text-[#0A193F] mb-8">Tambah Produk Baru</h2>

            @if ($errors->any())
                <div class="bg-red-50 border border-red-100 text-red-600 p-4 rounded-2xl mb-8 text-sm font-bold">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('simpan.produk') }}" method="POST" enctype="multipart/form-data" class="space-y-8 pb-20">
                @csrf
                
                {{-- SECTION 1: IDENTITAS --}}
                <section class="bg-white p-8 rounded-3xl border-l-8 border-[#0A193F] shadow-lg shadow-blue-900/5">
                    <h3 class="text-lg font-extrabold text-[#0A193F] mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm">1</span> Identitas Merek & Bidang
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nama Merek</label><input type="text" name="nama_merek" required class="input-3d"></div>
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Kategori Bidang</label>
                            <select name="kategori" class="input-3d" required>
                                <option value="">-- Pilih Kategori --</option>
                                <option value="Makanan dan Minuman">Makanan dan Minuman</option>
                                <option value="Budidaya">Budidaya</option>
                                <option value="Industri Kreatif, Seni, dan Budaya">Industri Kreatif, Seni, dan Budaya</option>
                                <option value="Jasa, Pariwisata, dan Perdagangan">Jasa, Pariwisata, dan Perdagangan</option>
                                <option value="Manufaktur dan Teknologi Terapan">Manufaktur dan Teknologi Terapan</option>
                                <option value="Bisnis Digital">Bisnis Digital</option>
                            </select>
                        </div>
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Logo Merek</label><input type="file" name="logo" required class="input-3d"></div>
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Tahun NIB</label><input type="number" name="tahun_nib" required class="input-3d" placeholder="Contoh: 2026"></div>
                        <div class="md:col-span-2">
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">NIB</label>
                            <input type="text" name="nib" id="nibInput" disabled required class="input-3d bg-slate-50">
                            <label class="mt-4 flex items-center gap-3 cursor-pointer"><input type="checkbox" name="tampilkan_nib" id="nibCheckbox" value="1" class="w-5 h-5 rounded text-[#0A193F]"><span class="text-sm font-semibold text-slate-700">Aktifkan & Tampilkan NIB</span></label>
                        </div>
                        <div class="md:col-span-2"><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Filosofi Merek</label><textarea name="filosofi" rows="2" required class="input-3d"></textarea></div>
                    </div>
                </section>

                {{-- SECTION 2: DETAIL PRODUK --}}
                <section class="bg-white p-8 rounded-3xl border-l-8 border-blue-500 shadow-lg shadow-blue-900/5">
                    <h3 class="text-lg font-extrabold text-[#0A193F] mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-sm">2</span> Detail Produk/Jasa
                    </h3>
                    <div class="space-y-6">
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nama Produk</label><input type="text" name="nama_produk" required class="input-3d"></div>
                        <div>
                            <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Foto Produk (Maksimal 6 Foto)</label>
                            <input type="file" name="foto_produk[]" multiple accept="image/*" required class="input-3d" onchange="checkFileCount(this)">
                        </div>
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Latar Belakang</label><textarea name="latar_belakang" rows="2" required class="input-3d"></textarea></div>
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Deskripsi Produk</label><textarea name="deskripsi" rows="2" required class="input-3d"></textarea></div>
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Harga</label><input type="text" name="harga" required class="input-3d" placeholder="Contoh: Rp 100.000"></div>
                    </div>
                </section>

                {{-- SECTION 3: KONTAK & LOKASI --}}
                <section class="bg-white p-8 rounded-3xl border-l-8 border-emerald-500 shadow-lg shadow-emerald-900/5">
                    <h3 class="text-lg font-extrabold text-[#0A193F] mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-sm">3</span> Kontak & Lokasi
                    </h3>
                    <div class="space-y-6">
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Lokasi Produksi</label><textarea name="lokasi" required rows="2" class="input-3d"></textarea></div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Link Google Maps</label><input type="url" name="link_maps" required class="input-3d"></div>
                            <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Akun Media Sosial</label><input type="text" name="sosmed" required class="input-3d"></div>
                        </div>
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nomor WhatsApp</label><input type="text" name="no_wa" required class="input-3d" placeholder="628123456789"></div>
                    </div>
                </section>

                {{-- SECTION 4: IDENTITAS TIM & INSTITUSI --}}
                <section class="bg-white p-8 rounded-3xl border-l-8 border-indigo-500 shadow-lg shadow-indigo-900/5">
                    <h3 class="text-lg font-extrabold text-[#0A193F] mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-sm">4</span> Identitas Tim & Institusi
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Nama Sekolah</label><input type="text" name="nama_sekolah" required class="input-3d"></div>
                        <div><label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Jurusan</label><input type="text" name="jurusan" required class="input-3d"></div>
                    </div>
                    
                    <div class="mt-8">
                        <label class="block text-[10px] font-bold text-slate-500 uppercase mb-2 ml-1">Foto Tim Pengembang (Foto Bersama Siswa & Guru)</label>
                        <input type="file" name="foto_tim" accept="image/*" required class="input-3d">
                        <p class="text-[10px] text-slate-400 mt-2 font-bold uppercase">* Pastikan foto bersama terlihat jelas dan cerah.</p>
                    </div>
                </section>

                <button type="submit" class="w-full bg-[#0A193F] text-white py-5 rounded-2xl font-bold hover:bg-blue-900 transition-all text-lg">
                    Simpan Semua Data Produk <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </form>
        </div>
    </main>

    <script>
        // Toggle NIB Input
        const checkbox = document.getElementById('nibCheckbox');
        const input = document.getElementById('nibInput');
        checkbox.addEventListener('change', function() {
            input.disabled = !this.checked;
            input.className = this.checked ? "input-3d" : "input-3d bg-slate-50";
        });

        // Validasi jumlah file foto produk
        function checkFileCount(input) {
            if (input.files.length > 6) {
                alert("Maksimal hanya boleh upload 6 foto!");
                input.value = "";
            }
        }

        // Tambah anggota tim
        let count = 1;
        function tambahAnggota() {
            if (count < 4) {
                count++;
                const div = document.createElement('div');
                div.className = "flex gap-4 items-center bg-slate-50 p-4 rounded-2xl";
                div.innerHTML = `<input type="text" name="tim_nama[]" placeholder="Nama Anggota" class="input-3d" required>
                                 <input type="file" name="tim_foto[]" accept="image/*" class="input-3d" required>`;
                document.getElementById('tim-container').appendChild(div);
            } else {
                alert("Maksimal 4 anggota tim.");
            }
        }
    </script>
</body>
</html>