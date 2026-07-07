<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-slate-50">

    <div class="flex h-screen">
        <x-sidebar-admin />
        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-auto">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h2 class="text-lg font-bold text-[#0A193F] mb-6">Daftar Pengguna</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="text-slate-400 text-xs uppercase border-b border-slate-100">
                                <th class="pb-4">Nama</th>
                                <th class="pb-4">Email/NPSN</th>
                                <th class="pb-4">Role</th>
                                <th class="pb-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm">
                            @foreach($users as $user)
                            <tr class="border-b border-slate-50 last:border-0 hover:bg-slate-50 transition-colors">
                                <td class="py-4 font-semibold text-[#0A193F]">{{ $user->name }}</td>
                                <td class="py-4 text-slate-500">{{ $user->email ?? $user->npsn }}</td>
                                
                                <!-- Badge Role dengan warna dinamis -->
                                <td class="py-4">
                                    <span class="px-3 py-1 text-[10px] font-bold rounded-full border 
                                        {{ $user->role == 'SISWA' ? 'bg-blue-50 text-blue-600 border-blue-200' : 
                                           ($user->role == 'GURU' ? 'bg-emerald-50 text-emerald-600 border-emerald-200' : 
                                           'bg-amber-50 text-amber-600 border-amber-200') }}">
                                        {{ $user->role }}
                                    </span>
                                </td>
                                
                                <td class="py-4">
                                    <button class="text-red-500 hover:text-red-700 font-bold text-xs uppercase">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>

</body>
</html>