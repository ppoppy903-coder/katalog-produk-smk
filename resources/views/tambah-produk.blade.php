<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - PKK SMK Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden">

    {{-- SIDEBAR SISWA --}}
    @include('layouts.sidebar-siswa')

    <main class="flex-1 overflow-y-auto p-10">
        <h2 class="text-2xl font-bold text-[#0F2857] mb-8">Tambah Produk Baru</h2>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('simpan.produk') }}" method="POST" enctype="multipart/form-data" class="max-w-5xl space-y-8 pb-20">
            @csrf
            
            {{-- Bagian 1: Identitas & Bidang --}}
            <section class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="text-lg font-bold text-[#0F2857] mb-6">Identitas Merek & Bidang</h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Nama Merek</label>
                        <input type="text" name="nama_merek" required class="w-full p-3 bg-slate-50 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Kategori Bidang</label>
                        <select name="kategori" class="w-full border p-3 bg-slate-50 rounded-lg" required>
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
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Logo Merek</label>
                        <input type="file" name="logo" required class="w-full p-3 bg-slate-50 border rounded-lg">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Tahun NIB</label>
                        <input type="number" name="tahun_nib" required class="w-full p-3 bg-slate-50 border rounded-lg" placeholder="Contoh: 2026">
                    </div>
                    
                    {{-- NIB Section - Full Width agar rapi --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">NIB</label>
                        <input type="text" name="nib" id="nibInput" disabled required class="w-full p-3 bg-slate-100 border rounded-lg cursor-not-allowed">
                        <div class="mt-3 p-3 border rounded-lg bg-slate-50">
                            <label class="flex items-center space-x-2 cursor-pointer">
                                <input type="checkbox" name="tampilkan_nib" id="nibCheckbox" value="1" class="w-4 h-4 text-blue-900">
                                <span class="text-sm text-slate-700 font-medium">Aktifkan & Tampilkan NIB</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Filosofi Merek</label>
                        <textarea name="filosofi" rows="2" required class="w-full p-3 bg-slate-50 border rounded-lg"></textarea>
                    </div>
                </div>
            </section>

            {{-- Bagian 2: Detail Produk --}}
            <section class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="text-lg font-bold text-[#0F2857] mb-6">Detail Produk/Jasa</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Nama Produk/Jasa</label>
                        <input type="text" name="nama_produk" required class="w-full p-3 bg-slate-50 border rounded-lg">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Foto Produk/Jasa</label>
                        <input type="file" name="foto_produk" required class="w-full p-3 bg-slate-50 border rounded-lg">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Latar Belakang</label>
                        <textarea name="latar_belakang" rows="2" required class="w-full p-3 bg-slate-50 border rounded-lg"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Deskripsi Produk</label>
                        <textarea name="deskripsi" rows="2" required class="w-full p-3 bg-slate-50 border rounded-lg"></textarea>
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Harga (Bebas, contoh: Rp 100.000/Kotak/Hari)</label>
                        <input type="text" name="harga" required class="w-full p-3 bg-slate-50 border rounded-lg" placeholder="Masukkan harga...">
                    </div>
                </div>
            </section>

            {{-- Bagian 3: Kontak & Lokasi --}}
            <section class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="text-lg font-bold text-[#0F2857] mb-6">Kontak & Lokasi</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Lokasi Produksi</label>
                        <textarea name="lokasi" required rows="2" class="w-full p-3 bg-slate-50 border rounded-lg"></textarea>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Link Google Maps</label>
                        <input type="url" name="link_maps" required class="w-full p-3 bg-slate-50 border rounded-lg">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Akun Media Sosial</label>
                        <input type="text" name="sosmed" required class="w-full p-3 bg-slate-50 border rounded-lg">
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-[#0F2857] mb-2">Nomor WhatsApp (628123456789)</label>
                        <input type="text" name="no_wa" required class="w-full p-3 bg-slate-50 border rounded-lg" placeholder="628123456789">
                    </div>
                </div>
            </section>

            <button type="submit" class="w-full bg-[#0F2857] text-white py-4 rounded-xl font-bold text-lg hover:bg-blue-900 transition shadow-lg">
                Simpan Semua Data Produk
            </button>
        </form>
    </main>

    <script>
        const checkbox = document.getElementById('nibCheckbox');
        const input = document.getElementById('nibInput');

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                input.disabled = false;
                input.classList.remove('bg-slate-100', 'cursor-not-allowed');
                input.classList.add('bg-white');
            } else {
                input.disabled = true;
                input.value = ''; 
                input.classList.add('bg-slate-100', 'cursor-not-allowed');
                input.classList.remove('bg-white');
            }
        });
    </script>
</body>
</html>