<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - PKK SMK Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-[#F8FAFC] flex h-screen overflow-hidden text-slate-800">

    {{-- Sidebar Siswa (Sudah dipanggil di sini, jadi jangan dipanggil lagi di file isi) --}}
    @include('layouts.sidebar-siswa')

    {{-- Konten Utama --}}
    <main class="flex-1 h-full overflow-y-auto">
        <div class="p-10">
            @yield('content')
        </div>
    </main>

</body>
</html>