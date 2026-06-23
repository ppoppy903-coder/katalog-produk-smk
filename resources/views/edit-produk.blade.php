<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk - PKK SMK Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#F8FAFC]">
    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6 text-[#0F2857]">Edit Produk</h1>
        
        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 space-y-8">
                    {{-- Bagian 1: Identitas Merek --}}
                    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                        <h2 class="font-bold mb-4 text-[#0F2857]">1. Identitas Merek</h2>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="col-span-2"><label class="text-[10px] font-bold text-slate-500 uppercase">Nama Merek</label><input type="text" name="nama_merek" value="{{ $produk->nama_merek }}" class="w-full p-3 bg-slate-50 border rounded-lg outline-none"></div>
                            <div class="col-span-2"><label class="text-[10px] font-bold text-slate-500 uppercase">Filosofi Merek</label><textarea name="filosofi" rows="3" class="w-full p-3 bg-slate-50 border rounded-lg outline-none">{{ $produk->filosofi }}</textarea></div>
                            <div><label class="text-[10px] font-bold text-slate-500 uppercase">NIB</label><input type="text" name="nib" value="{{ $produk->nib }}" class="w-full p-3 bg-slate-50 border rounded-lg outline-none"></div>
                            
                            {{-- TAMBAHAN TAHUN NIB --}}
                            <div><label class="text-[10px] font-bold text-slate-500 uppercase">Tahun NIB</label><input type="number" name="tahun_nib" value="{{ $produk->tahun_nib }}" class="w-full p-3 bg-slate-50 border rounded-lg outline-none"></div>
                        </div>
                    </section>

                    {{-- Bagian 2: Detail Produk --}}
                    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                        <h2 class="font-bold mb-4 text-[#0F2857]">2. Detail Produk / Jasa</h2>
                        <label class="text-[10px] font-bold text-slate-500 uppercase">Nama Produk / Jasa</label>
                        <input type="text" name="nama_produk" value="{{ $produk->nama_produk }}" class="w-full p-3 bg-slate-50 border rounded-lg mb-4 outline-none">
                        
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            {{-- UBAH HARGA MENJADI TEXT --}}
                            <div><label class="text-[10px] font-bold text-slate-500 uppercase">Harga</label><input type="text" name="harga" value="{{ $produk->harga }}" placeholder="Contoh: Rp 10.000 / Box" class="w-full p-3 bg-slate-50 border rounded-lg outline-none"></div>
                            <div>
                                <label class="text-[10px] font-bold text-slate-500 uppercase">Kategori</label>
                                <select name="kategori" class="w-full p-3 bg-slate-50 border rounded-lg outline-none">
                                    @foreach(['Teknologi Konstruksi dan Properti', 'Teknologi Manufaktur dan Rekayasa', 'Energi dan Pertambangan', 'Teknologi Informasi', 'Kesehatan dan Pekerjaan Sosial', 'Agribisnis dan Agriteknologi', 'Kemaritiman', 'Bisnis dan Manajemen', 'Pariwisata', 'Seni dan Ekonomi Kreatif'] as $kat)
                                        <option value="{{ $kat }}" {{ $produk->kategori == $kat ? 'selected' : '' }}>{{ $kat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <label class="text-[10px] font-bold text-slate-500 uppercase">Latar Belakang</label>
                        <textarea name="latar_belakang" rows="3" class="w-full p-3 bg-slate-50 border rounded-lg mb-4 outline-none">{{ $produk->latar_belakang }}</textarea>
                        <label class="text-[10px] font-bold text-slate-500 uppercase">Deskripsi Produk</label>
                        <textarea name="deskripsi" rows="3" class="w-full p-3 bg-slate-50 border rounded-lg outline-none">{{ $produk->deskripsi }}</textarea>
                    </section>
                </div>

                {{-- Bagian Sidebar (File & Kontak) --}}
                <div class="space-y-8">
                    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                        <label class="text-[10px] font-bold text-slate-500 uppercase mb-2 block">Ganti Logo Merek</label>
                        <input type="file" name="logo" class="w-full p-2 bg-slate-50 border rounded-lg mb-4">
                        <label class="text-[10px] font-bold text-slate-500 uppercase mb-2 block">Ganti Foto Produk</label>
                        <input type="file" name="foto_produk" class="w-full p-2 bg-slate-50 border rounded-lg">
                    </section>

                    <section class="bg-white p-6 rounded-xl border border-slate-200 shadow-sm">
                        <h2 class="font-bold mb-4 text-[#0F2857]">3. Informasi Kontak & Lokasi</h2>
                        <label class="text-[10px] font-bold text-slate-500 uppercase">Lokasi Produksi</label>
                        <input type="text" name="lokasi" value="{{ $produk->lokasi }}" class="w-full p-3 bg-slate-50 border rounded-lg mb-3 outline-none">
                        <label class="text-[10px] font-bold text-slate-500 uppercase">Link Google Maps</label>
                        <input type="url" name="link_maps" value="{{ $produk->link_maps }}" class="w-full p-3 bg-slate-50 border rounded-lg mb-3 outline-none">
                        <label class="text-[10px] font-bold text-slate-500 uppercase">Media Sosial</label>
                        <input type="text" name="sosmed" value="{{ $produk->sosmed }}" class="w-full p-3 bg-slate-50 border rounded-lg outline-none">
                    </section>
                </div>
            </div>

            <div class="mt-8 flex justify-end gap-4 border-t pt-6">
                <a href="{{ route('dashboard.siswa') }}" class="px-8 py-3 border border-slate-300 rounded-xl font-bold text-slate-600 hover:bg-slate-50">Batal</a>
                <button type="submit" class="px-8 py-3 bg-[#0F2857] text-white rounded-xl font-bold hover:bg-blue-900 transition">Simpan Perubahan</button>
            </div>
        </form>
    </div>
</body>
</html>