<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Produk - PKK SMK Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden">

    @include('sidebar')

    <main class="flex-1 overflow-y-auto p-10">
        <h2 class="text-2xl font-bold text-[#0F2857] mb-8">Riwayat Produk Saya</h2>

        <div class="grid grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Total Produk</p>
                <h3 class="text-3xl font-bold text-[#0F2857]">{{ $stats['total'] }}</h3>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Diterbitkan</p>
                <h3 class="text-3xl font-bold text-green-600">{{ $stats['diterbitkan'] }}</h3>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Revisi</p>
                <h3 class="text-3xl font-bold text-orange-500">{{ $stats['revisi'] }}</h3>
            </div>
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Menunggu</p>
                <h3 class="text-3xl font-bold text-blue-600">{{ $stats['menunggu'] }}</h3>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <table class="w-full text-left">
                <thead class="bg-slate-50 text-slate-500 text-[10px] uppercase font-bold tracking-widest">
                    <tr>
                        <th class="p-6">Info Produk</th>
                        <th class="p-6">Kategori</th>
                        <th class="p-6">Tgl Pengajuan</th>
                        <th class="p-6">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($allProduks as $produk)
                    <tr>
                        <td class="p-6 font-bold text-[#0F2857]">{{ $produk->nama_produk }}</td>
                        <td class="p-6 text-sm text-slate-600">{{ $produk->kategori ?? '-' }}</td>
                        <td class="p-6 text-sm text-slate-600">{{ $produk->created_at ? \Carbon\Carbon::parse($produk->created_at)->format('d M Y') : '-' }}</td>
                        <td class="p-6">
                            <span class="px-3 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-600 uppercase">{{ ucfirst($produk->status ?? 'Draft') }}</span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>