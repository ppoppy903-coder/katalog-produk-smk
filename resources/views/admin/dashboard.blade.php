<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50">

    <div class="flex h-screen">
        <x-sidebar-admin />
        <main class="flex-1 p-8 overflow-y-auto">
            <div class="mb-8">
                <h1 class="text-2xl font-extrabold text-[#0A193F]">Halo, Admin!</h1>
                <p class="text-slate-500 text-sm">Selamat datang kembali di sistem pengelolaan data.</p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach([['title' => 'Total User', 'value' => 7, 'icon' => 'fa-users'], ['title' => 'Sertifikat Masuk', 'value' => 0, 'icon' => 'fa-certificate'], ['title' => 'Data Pending', 'value' => 0, 'icon' => 'fa-clock']] as $stat)
                <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-slate-500 uppercase tracking-wide">{{ $stat['title'] }}</p>
                            <p class="text-3xl font-extrabold text-[#0A193F] mt-2">{{ $stat['value'] }}</p>
                        </div>
                        <div class="bg-blue-50 text-blue-600 p-3 rounded-xl">
                            <i class="fa-solid {{ $stat['icon'] }} text-xl"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Aktivitas Terbaru -->
            <div class="bg-white p-8 rounded-2xl border border-slate-100 shadow-sm mt-8">
                <h3 class="text-lg font-bold text-[#0A193F] mb-6">Aktivitas Terbaru</h3>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead class="text-slate-400 text-xs uppercase border-b border-slate-50">
                            <tr>
                                <th class="pb-4 font-semibold">Pengguna</th>
                                <th class="pb-4 font-semibold">Tindakan</th>
                                <th class="pb-4 font-semibold">Waktu</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            <tr class="text-slate-500 border-b border-slate-50">
                                <td class="py-5 italic">Belum ada aktivitas terbaru</td>
                                <td class="py-5">-</td>
                                <td class="py-5">-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>