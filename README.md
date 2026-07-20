# Katalog PKK — Produk Karya Keahlian SMK

Platform katalog digital untuk menampilkan, mengelola, dan memvalidasi produk hasil karya siswa SMK (Sekolah Menengah Kejuruan). Siswa mendaftarkan produk mereka, guru pembimbing memvalidasinya, lalu produk yang disetujui tampil di katalog publik yang dapat diakses siapa saja.

---

## Fitur Website

### Halaman Publik (Tanpa Login)
| Fitur | URL |
|-------|-----|
| Beranda dengan produk unggulan | `/` |
| Katalog semua produk disetujui | `/katalog` |
| Filter katalog per bidang keahlian | `/katalog?kategori=...` |
| Produk terbaru | `/produk-terbaru` |
| Detail produk (foto, deskripsi, harga, lokasi, sosmed) | `/detail-produk/{id}` |
| Ulasan & rating produk oleh pengunjung | form di halaman detail |
| Autocomplete pencarian produk | `/api/search-produk` |

### Dashboard Siswa
- Daftar dan kelola semua produk milik sendiri
- Tambah produk baru (nama merek, kategori, logo, foto, NIB, deskripsi, harga, lokasi, Maps, sosmed, info tim & jurusan)
- Edit produk yang masih berstatus draft atau ditolak
- Ajukan produk ke guru pembimbing untuk divalidasi
- Notifikasi saat produk disetujui atau ditolak
- Riwayat status semua produk yang pernah diajukan
- Pengaturan profil dan ubah password

### Dashboard Guru Pembimbing
- Melihat daftar produk menunggu validasi dari sekolah yang sama (berdasarkan NPSN)
- Detail lengkap produk sebelum memutuskan
- Setujui atau tolak pengajuan produk siswa
- Histori semua produk yang pernah divalidasi
- Notifikasi pengajuan produk baru
- Moderasi ulasan/komentar produk (approve / hapus)
- Pengaturan profil dan ubah password

### Dashboard Superadmin
- Manajemen seluruh pengguna (siswa & guru) lintas sekolah
- Monitoring produk dari semua sekolah
- Daftar guru dan siswa terdaftar

### Alur Status Produk
```
draft → menunggu → disetujui  ✓ tampil di katalog publik
                 → ditolak    ✗ dapat direvisi dan diajukan ulang
```

### Bidang Keahlian (10 Kategori)
1. Teknologi Konstruksi dan Properti
2. Teknologi Manufaktur dan Rekayasa
3. Energi dan Pertambangan
4. Teknologi Informasi
5. Kesehatan dan Pekerjaan Sosial
6. Agribisnis dan Agriteknologi
7. Kemaritiman
8. Bisnis dan Manajemen
9. Pariwisata
10. Seni dan Ekonomi Kreatif

---

## Persyaratan Sistem

### Server / Hosting
| Komponen | Minimum | Rekomendasi |
|----------|---------|-------------|
| PHP | 8.2 | 8.3+ |
| Database | SQLite / MySQL 5.7+ | MySQL 8.0 / MariaDB 10.6+ |
| Web Server | Apache / Nginx | Nginx |
| RAM | 512 MB | 1 GB+ |
| Storage | 500 MB | 2 GB+ |
| Node.js | 18.x | 20.x LTS |
| Composer | 2.x | 2.x |

### Ekstensi PHP yang Wajib
```
php-cli
php-mbstring
php-xml
php-curl
php-zip
php-fileinfo
php-sqlite3      (jika menggunakan SQLite)
php-mysql        (jika menggunakan MySQL)
```

---

## Instalasi di Server Produksi (Linux/VPS)

### 1. Clone Repository
```bash
git clone https://github.com/ppoppy903-coder/katalog-produk-smk.git
cd katalog-produk-smk
```

### 2. Install Dependensi PHP
```bash
composer install --optimize-autoloader --no-dev
```

### 3. Konfigurasi Environment
```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` sesuai server:
```env
APP_NAME="Katalog PKK"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://domain-kamu.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=katalog_pkk
DB_USERNAME=db_user
DB_PASSWORD=db_password

SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

### 4. Siapkan Database
```bash
# Buat database MySQL terlebih dahulu, lalu jalankan migrasi:
php artisan migrate --force

# Opsional: isi data demo
php artisan db:seed
```

### 5. Buat Storage Symlink
```bash
php artisan storage:link
```

### 6. Build Asset Frontend
```bash
npm install
npm run build
```

### 7. Optimalkan Cache Produksi
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 8. Set Permission Folder
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

---

## Konfigurasi Web Server

### Nginx
```nginx
server {
    listen 80;
    server_name domain-kamu.com;
    root /var/www/katalog-pkk/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

### Apache
File `.htaccess` sudah disertakan di folder `public/`. Pastikan `mod_rewrite` aktif:
```bash
a2enmod rewrite
systemctl restart apache2
```

---

## Instalasi untuk Development Lokal

### Prasyarat
- PHP 8.2+
- Composer 2.x
- Node.js 18+
- Git

### Langkah Cepat
```bash
git clone https://github.com/ppoppy903-coder/katalog-produk-smk.git
cd katalog-produk-smk
cp .env.example .env
composer install
php artisan key:generate
php artisan migrate --seed
php artisan storage:link
npm install
```

### Jalankan Dev Server
```bash
# Terminal 1 — Laravel
php artisan serve --host=0.0.0.0 --port=8000

# Terminal 2 — Vite (hot reload CSS/JS)
npm run dev
```

Atau jalankan semua sekaligus:
```bash
composer dev
```

Akses di: **http://localhost:8000**

---

## Akun Demo (Setelah Seeding)

> Password semua akun: **`password`**

| Peran | Login Via | Kredensial |
|-------|-----------|------------|
| Superadmin | `/login-superadmin` | `admin@kemdikbud.go.id` |
| Guru — SMK Nusantara | `/login-guru` | NPSN: `20501234` |
| Guru — SMK Mandiri | `/login-guru` | NPSN: `20505678` |
| Siswa — Andi Pratama | `/login-siswa` | `andi@siswa.id` |
| Siswa — Dewi Kusuma | `/login-siswa` | `dewi@siswa.id` |
| Siswa — Rizky Firmansyah | `/login-siswa` | `rizky@siswa.id` |
| Siswa — Putri Anggraini | `/login-siswa` | `putri@siswa.id` |
| Siswa — Fajar Nugroho | `/login-siswa` | `fajar@siswa.id` |

> Guru dan siswa dengan NPSN yang sama berasal dari sekolah yang sama. Guru hanya dapat memvalidasi produk siswa di sekolahnya.

---

## Tech Stack

| Komponen | Teknologi | Versi |
|----------|-----------|-------|
| Framework Backend | Laravel | 12.x |
| Bahasa | PHP | ^8.2 |
| CSS Framework | Tailwind CSS | v4 |
| Build Tool | Vite | ^7.0 |
| Database Default | SQLite | — |
| Notifikasi | Laravel Notifications | — |
| Storage Upload | Laravel Storage (public disk) | — |
| Dependency Manager | Composer + NPM | 2.x |

---

## Struktur Direktori

```
app/
├── Http/Controllers/
│   ├── AuthController.php        # Registrasi & login semua peran
│   ├── DashboardController.php   # Dashboard, notifikasi, pengaturan
│   ├── ProdukController.php      # CRUD produk, katalog publik, komentar
│   └── ValidasiController.php    # Validasi produk oleh guru
├── Models/
│   ├── User.php                  # Model user (siswa, guru, superadmin)
│   └── Produk.php                # Model produk (relasi ke user & komentar)
└── Notifications/
    └── ProdukDisetujui.php       # Notifikasi in-app saat produk disetujui

database/
├── migrations/                   # Semua skema tabel database
└── seeders/
    └── DatabaseSeeder.php        # Data demo (akun + produk)

resources/views/                  # Template Blade semua halaman
routes/web.php                    # Definisi semua rute aplikasi
public/
├── images/                       # Gambar statis produk
└── storage -> storage/app/public # Symlink upload pengguna
```

---

## Perintah Artisan Berguna

```bash
# Reset database + isi ulang data demo
php artisan migrate:fresh --seed

# Hapus semua cache
php artisan cache:clear && php artisan config:clear && php artisan view:clear

# Buat symlink storage (wajib setelah clone)
php artisan storage:link

# Lihat semua rute
php artisan route:list

# Jalankan antrian (jika QUEUE_CONNECTION=database)
php artisan queue:work
```

---

## Lisensi

Project ini dikembangkan untuk keperluan pendidikan vokasi SMK dalam program PKK (Produk Karya Keahlian) Kemendikdasmen. Tidak untuk distribusi komersial.
