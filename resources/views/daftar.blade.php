<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - PKK Kemendikdasmen</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { font-family: 'Inter', sans-serif; }
        .bg-sidebar {
            background: linear-gradient(rgba(11, 33, 94, 0.85), rgba(11, 33, 94, 0.85)), 
                        url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');
            background-size: cover;
            background-position: center;
        }
    </style>
</head>
<body class="bg-white text-slate-800 min-h-screen flex flex-col lg:flex-row">

    <div class="lg:w-[35%] bg-sidebar text-white p-10 lg:p-16 flex flex-col justify-between relative overflow-hidden">
        <div class="relative z-10">
            <div class="flex items-center space-x-3 mb-20">
                <div class="bg-white text-[#0B215E] p-1.5 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"></path></svg>
                </div>
                <span class="font-bold text-lg tracking-wide uppercase">PKK Kemendikdasmen</span>
            </div>

            <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-6">
                Meningkatkan <br> Ekselensi Vokasi
            </h1>
            
            <p class="text-blue-100 text-sm leading-relaxed max-w-sm">
                Bergabunglah dalam ekosistem pendidikan vokasi yang modern dan terintegrasi untuk masa depan industri Indonesia yang lebih cerah.
            </p>
        </div>
        
        <div class="relative z-10 mt-10">
            <p class="text-xs text-blue-300 opacity-70">© 2024 Ministry of Primary and Secondary Education</p>
        </div>
    </div>

    <div class="flex-1 flex flex-col items-center py-10 lg:py-16 px-6 sm:px-10 overflow-y-auto">
        
        <div class="w-full max-w-2xl">
            
            <div class="flex items-center justify-between mb-16 px-4">
                <div class="flex items-center space-x-3">
                    <div class="w-6 h-6 rounded-full bg-blue-900 text-white flex items-center justify-center text-[10px] font-bold">1</div>
                    <span class="text-xs font-semibold text-blue-900">Info Akun</span>
                </div>
                <div class="flex-1 border-t border-slate-200 mx-4"></div>
                <div class="flex items-center space-x-3 opacity-40">
                    <div class="w-6 h-6 rounded-full border border-slate-400 flex items-center justify-center text-[10px] font-bold">2</div>
                    <span class="text-xs font-semibold">Detail Sekolah</span>
                </div>
                <div class="flex-1 border-t border-slate-200 mx-4"></div>
                <div class="flex items-center space-x-3 opacity-40">
                    <div class="w-6 h-6 rounded-full border border-slate-400 flex items-center justify-center text-[10px] font-bold">3</div>
                    <span class="text-xs font-semibold">Selesai</span>
                </div>
            </div>

            <div class="mb-10 text-left">
                <h2 class="text-3xl font-extrabold text-slate-900 mb-2">Buat akun Anda</h2>
                <p class="text-slate-500 text-sm">Lengkapi informasi berikut untuk bergabung dengan komunitas vokasi.</p>
            </div>

            <form action="#" method="POST" class="space-y-6">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Lengkap</label>
                        <input type="text" placeholder="Masukkan nama lengkap" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 focus:bg-white outline-none text-sm transition">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Alamat Email</label>
                        <input type="email" placeholder="contoh@email.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 focus:bg-white outline-none text-sm transition">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-3">Tipe Registrasi</label>
                    <div class="grid grid-cols-3 gap-4">
                        
                        <label class="relative cursor-pointer group">
                            <input type="radio" name="role" value="siswa" class="peer sr-only">
                            <div class="h-28 flex flex-col items-center justify-center border border-slate-200 rounded-xl bg-slate-50 peer-checked:border-blue-900 peer-checked:bg-blue-50 transition-all duration-200 group-hover:bg-slate-100">
                                <i class="fa-solid fa-graduation-cap text-xl mb-3 text-slate-400 peer-checked:text-blue-900 group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold text-slate-600 peer-checked:text-blue-900">Siswa</span>
                            </div>
                        </label>

                        <label class="relative cursor-pointer group">
                            <input type="radio" name="role" value="admin" class="peer sr-only" checked>
                            <div class="h-28 flex flex-col items-center justify-center border border-slate-200 rounded-xl bg-slate-50 peer-checked:border-blue-900 peer-checked:bg-blue-50 transition-all duration-200 group-hover:bg-slate-100">
                                <i class="fa-solid fa-school text-xl mb-3 text-slate-400 peer-checked:text-blue-900 group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold text-slate-600 peer-checked:text-blue-900">Admin Sekolah</span>
                            </div>
                        </label>

                        <label class="relative cursor-pointer group">
                            <input type="radio" name="role" value="tamu" class="peer sr-only">
                            <div class="h-28 flex flex-col items-center justify-center border border-slate-200 rounded-xl bg-slate-50 peer-checked:border-blue-900 peer-checked:bg-blue-50 transition-all duration-200 group-hover:bg-slate-100">
                                <i class="fa-solid fa-user text-xl mb-3 text-slate-400 peer-checked:text-blue-900 group-hover:scale-110 transition-transform"></i>
                                <span class="text-xs font-bold text-slate-600 peer-checked:text-blue-900">Tamu</span>
                            </div>
                        </label>

                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nomor Telepon</label>
                    <input type="text" placeholder="+62 8..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 focus:bg-white outline-none text-sm transition">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Kata Sandi</label>
                        <div class="relative">
                            <input type="password" placeholder="Min. 8 karakter" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 focus:bg-white outline-none text-sm transition">
                            <button type="button" class="absolute right-4 top-3 text-slate-400 hover:text-blue-900"><i class="fa-regular fa-eye text-sm"></i></button>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-slate-700 mb-2">Ulangi Kata Sandi</label>
                        <div class="relative">
                            <input type="password" placeholder="Sesuai kata sandi" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-900 focus:bg-white outline-none text-sm transition">
                            <button type="button" class="absolute right-4 top-3 text-slate-400 hover:text-blue-900"><i class="fa-regular fa-eye text-sm"></i></button>
                        </div>
                    </div>
                </div>

                <div class="pt-4">
                    <button type="button" id="btn-next" class="w-full bg-[#0B215E] text-white py-4 rounded-xl font-bold text-sm hover:bg-blue-900 transition-all flex items-center justify-center space-x-2 shadow-lg shadow-blue-900/20">
                        <span>Langkah Berikutnya</span>
                        <i class="fa-solid fa-arrow-right"></i>
                    </button>
                </div>
            </form>

            <div class="mt-8 text-center">
                <p class="text-sm text-slate-500">Sudah punya akun? <a href="#" class="text-blue-900 font-extrabold hover:underline">Masuk</a></p>
            </div>

            <div class="mt-20 flex flex-wrap justify-center gap-6 text-[11px] font-bold text-slate-400 uppercase tracking-widest">
                <a href="#" class="hover:text-blue-900 transition">Bantuan</a>
                <a href="#" class="hover:text-blue-900 transition">Kebijakan Privasi</a>
                <a href="#" class="hover:text-blue-900 transition">Syarat & Ketentuan</a>
                <a href="#" class="hover:text-blue-900 transition">Kontak Kami</a>
            </div>

        </div>
    </div>

    <script>
        document.getElementById('btn-next').addEventListener('click', function(e) {
            e.preventDefault(); // Menahan form agar tidak reload ke atas

            // Ambil kotak mana yang sedang dipilih
            const selectedRole = document.querySelector('input[name="role"]:checked').value;

            // Logika pindah halaman
            if (selectedRole === 'siswa') {
                window.location.href = '/daftar/detail-profil';
            } else {
                alert('Tampilan untuk ' + selectedRole + ' belum kita buat ya!');
            }
        });
    </script>
</body>
</html>