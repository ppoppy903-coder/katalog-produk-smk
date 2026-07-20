<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // --- AKUN ---

        User::create([
            'name'     => 'Super Admin',
            'email'    => 'admin@kemdikbud.go.id',
            'password' => Hash::make('password'),
            'role'     => 'superadmin',
        ]);

        $guru1 = User::create([
            'name'     => 'Budi Santoso, S.Pd',
            'email'    => 'guru-nusantara@pkk-smk.id',
            'password' => Hash::make('password'),
            'role'     => 'guru',
            'npsn'     => '20501234',
        ]);

        $guru2 = User::create([
            'name'     => 'Siti Rahayu, M.Pd',
            'email'    => 'guru-mandiri@pkk-smk.id',
            'password' => Hash::make('password'),
            'role'     => 'guru',
            'npsn'     => '20505678',
        ]);

        $siswa1 = User::create([
            'name'     => 'Andi Pratama',
            'email'    => 'andi@siswa.id',
            'password' => Hash::make('password'),
            'role'     => 'siswa',
            'npsn'     => '20501234',
        ]);

        $siswa2 = User::create([
            'name'     => 'Dewi Kusuma',
            'email'    => 'dewi@siswa.id',
            'password' => Hash::make('password'),
            'role'     => 'siswa',
            'npsn'     => '20501234',
        ]);

        $siswa3 = User::create([
            'name'     => 'Rizky Firmansyah',
            'email'    => 'rizky@siswa.id',
            'password' => Hash::make('password'),
            'role'     => 'siswa',
            'npsn'     => '20505678',
        ]);

        $siswa4 = User::create([
            'name'     => 'Putri Anggraini',
            'email'    => 'putri@siswa.id',
            'password' => Hash::make('password'),
            'role'     => 'siswa',
            'npsn'     => '20505678',
        ]);

        $siswa5 = User::create([
            'name'     => 'Fajar Nugroho',
            'email'    => 'fajar@siswa.id',
            'password' => Hash::make('password'),
            'role'     => 'siswa',
            'npsn'     => '20501234',
        ]);

        // --- PRODUK DISETUJUI ---

        Produk::create([
            'user_id'          => $siswa1->id,
            'nama_merek'       => 'HidroFresh',
            'kategori'         => 'Agribisnis dan Agriteknologi',
            'filosofi'         => 'Segar dari alam, sehat untuk semua',
            'nib'              => '1234567890',
            'tahun_nib'        => 2024,
            'nama_produk'      => 'Sayuran Hidroponik Premium',
            'latar_belakang'   => 'Berawal dari kebutuhan sayuran segar bebas pestisida di lingkungan sekolah.',
            'deskripsi'        => 'Sayuran hidroponik segar dibudidayakan dengan sistem NFT tanpa tanah dan bebas pestisida kimia. Tersedia bayam, kangkung, selada, dan pakcoy.',
            'harga'            => 'Rp 15.000 / pack',
            'lokasi'           => 'SMK Nusantara, Jl. Pendidikan No. 1, Jakarta Selatan',
            'link_maps'        => 'https://maps.google.com',
            'sosmed'           => '@hidrofresh.id',
            'nama_sekolah'     => 'SMK Nusantara Jakarta',
            'jurusan'          => 'Agribisnis Tanaman Pangan dan Hortikultura',
            'status'           => 'disetujui',
            'no_sertifikat'    => 'PKK/2024/001',
            'tanggal_validasi' => '2024-11-10',
        ]);

        Produk::create([
            'user_id'          => $siswa2->id,
            'nama_merek'       => 'JamuMu',
            'kategori'         => 'Kesehatan dan Pekerjaan Sosial',
            'filosofi'         => 'Warisan leluhur untuk generasi masa kini',
            'nib'              => '0987654321',
            'tahun_nib'        => 2024,
            'nama_produk'      => 'Jamu Herbal Tradisional',
            'latar_belakang'   => 'Terinspirasi dari resep tradisional nenek yang terbukti menyehatkan keluarga.',
            'deskripsi'        => 'Minuman jamu herbal berbahan alami: jahe, kunyit, temulawak, dan kayu manis. Tanpa pengawet, tanpa pemanis buatan. Tersedia dalam kemasan botol 250ml.',
            'harga'            => 'Rp 8.000 / botol',
            'lokasi'           => 'SMK Nusantara, Jl. Pendidikan No. 1, Jakarta Selatan',
            'link_maps'        => 'https://maps.google.com',
            'sosmed'           => '@jamu.mu.official',
            'nama_sekolah'     => 'SMK Nusantara Jakarta',
            'jurusan'          => 'Farmasi Klinis dan Komunitas',
            'status'           => 'disetujui',
            'no_sertifikat'    => 'PKK/2024/002',
            'tanggal_validasi' => '2024-11-12',
        ]);

        Produk::create([
            'user_id'          => $siswa3->id,
            'nama_merek'       => 'WebIn',
            'kategori'         => 'Teknologi Informasi',
            'filosofi'         => 'Digitalisasi UMKM lokal mulai dari sini',
            'nib'              => '1122334455',
            'tahun_nib'        => 2025,
            'nama_produk'      => 'Jasa Pembuatan Website UMKM',
            'latar_belakang'   => 'Banyak UMKM lokal belum memiliki website profesional sehingga sulit menjangkau pasar digital.',
            'deskripsi'        => 'Layanan pembuatan website profesional untuk UMKM dengan harga terjangkau, responsif, dan SEO-friendly. Termasuk domain, hosting 1 tahun, dan pelatihan pengelolaan konten.',
            'harga'            => 'Mulai Rp 500.000',
            'lokasi'           => 'SMK Teknologi Mandiri, Jl. Inovasi No. 5, Bandung',
            'link_maps'        => 'https://maps.google.com',
            'sosmed'           => '@webin.dev',
            'nama_sekolah'     => 'SMK Teknologi Mandiri Bandung',
            'jurusan'          => 'Rekayasa Perangkat Lunak',
            'status'           => 'disetujui',
            'no_sertifikat'    => 'PKK/2025/001',
            'tanggal_validasi' => '2025-01-20',
        ]);

        Produk::create([
            'user_id'          => $siswa4->id,
            'nama_merek'       => 'LaskarAya',
            'kategori'         => 'Seni dan Ekonomi Kreatif',
            'filosofi'         => 'Karya lokal, cita rasa global',
            'nib'              => '6677889900',
            'tahun_nib'        => 2024,
            'nama_produk'      => 'Batik Ecoprint Modern',
            'latar_belakang'   => 'Mengangkat teknik ecoprint ramah lingkungan dengan sentuhan desain kontemporer untuk pasar fashion modern.',
            'deskripsi'        => 'Kain batik ecoprint menggunakan daun-daun alami sebagai pewarna dan motif. Setiap lembar bersifat unik, tersedia dalam bentuk kain, kemeja, dan totebag.',
            'harga'            => 'Rp 85.000 - Rp 350.000',
            'lokasi'           => 'SMK Teknologi Mandiri, Jl. Inovasi No. 5, Bandung',
            'link_maps'        => 'https://maps.google.com',
            'sosmed'           => '@laskaraya.craft',
            'nama_sekolah'     => 'SMK Teknologi Mandiri Bandung',
            'jurusan'          => 'Kriya Kreatif Batik dan Tekstil',
            'status'           => 'disetujui',
            'no_sertifikat'    => 'PKK/2024/003',
            'tanggal_validasi' => '2024-12-05',
        ]);

        Produk::create([
            'user_id'          => $siswa5->id,
            'nama_merek'       => 'CocoBrik',
            'kategori'         => 'Teknologi Konstruksi dan Properti',
            'filosofi'         => 'Bahan bangunan ramah lingkungan dari limbah kelapa',
            'nib'              => '5566778899',
            'tahun_nib'        => 2025,
            'nama_produk'      => 'Bata Ringan dari Sabut Kelapa',
            'latar_belakang'   => 'Memanfaatkan limbah sabut kelapa yang melimpah menjadi material bangunan bernilai tinggi dan ramah lingkungan.',
            'deskripsi'        => 'Bata ringan inovatif dari campuran sabut kelapa dan semen, lebih ringan 30% dari bata konvensional, tahan air, dan memiliki insulasi panas yang baik.',
            'harga'            => 'Rp 3.500 / buah',
            'lokasi'           => 'SMK Nusantara, Jl. Pendidikan No. 1, Jakarta Selatan',
            'link_maps'        => 'https://maps.google.com',
            'sosmed'           => '@cocobrik.official',
            'nama_sekolah'     => 'SMK Nusantara Jakarta',
            'jurusan'          => 'Desain Pemodelan dan Informasi Bangunan',
            'status'           => 'disetujui',
            'no_sertifikat'    => 'PKK/2025/002',
            'tanggal_validasi' => '2025-02-14',
        ]);

        Produk::create([
            'user_id'          => $siswa3->id,
            'nama_merek'       => 'JelajahLokal',
            'kategori'         => 'Pariwisata',
            'filosofi'         => 'Menghubungkan wisatawan dengan keindahan tersembunyi nusantara',
            'nib'              => '3344556677',
            'tahun_nib'        => 2025,
            'nama_produk'      => 'Aplikasi Wisata Lokal',
            'latar_belakang'   => 'Destinasi wisata lokal kurang terpromosikan secara digital sehingga kalah bersaing dengan wisata luar negeri.',
            'deskripsi'        => 'Platform digital yang menghubungkan wisatawan dengan pemandu lokal bersertifikat, menawarkan paket wisata alam, budaya, dan kuliner khas daerah.',
            'harga'            => 'Mulai Rp 150.000 / paket',
            'lokasi'           => 'SMK Teknologi Mandiri, Jl. Inovasi No. 5, Bandung',
            'link_maps'        => 'https://maps.google.com',
            'sosmed'           => '@jelajahlokal.app',
            'nama_sekolah'     => 'SMK Teknologi Mandiri Bandung',
            'jurusan'          => 'Usaha Perjalanan Wisata',
            'status'           => 'disetujui',
            'no_sertifikat'    => 'PKK/2025/003',
            'tanggal_validasi' => '2025-03-01',
        ]);

        // --- PRODUK MENUNGGU VALIDASI ---

        Produk::create([
            'user_id'        => $siswa2->id,
            'nama_merek'     => 'LautanRasa',
            'kategori'       => 'Kemaritiman',
            'filosofi'       => 'Cita rasa laut di setiap hidangan',
            'nib'            => '9988776655',
            'tahun_nib'      => 2025,
            'nama_produk'    => 'Kerupuk Ikan Tenggiri',
            'latar_belakang' => 'Memanfaatkan hasil tangkapan ikan lokal nelayan sekitar sekolah untuk meningkatkan nilai jual.',
            'deskripsi'      => 'Kerupuk ikan tenggiri renyah tanpa MSG, dibuat dari ikan segar pilihan. Tersedia rasa original, pedas, dan balado.',
            'harga'          => 'Rp 12.000 / bungkus',
            'lokasi'         => 'SMK Nusantara, Jl. Pendidikan No. 1, Jakarta Selatan',
            'link_maps'      => 'https://maps.google.com',
            'sosmed'         => '@lautanrasa',
            'nama_sekolah'   => 'SMK Nusantara Jakarta',
            'jurusan'        => 'Agribisnis Pengolahan Hasil Perikanan',
            'status'         => 'menunggu',
        ]);

        Produk::create([
            'user_id'        => $siswa4->id,
            'nama_merek'     => 'PaviBlock',
            'kategori'       => 'Teknologi Manufaktur dan Rekayasa',
            'filosofi'       => 'Infrastruktur kuat dari tangan pelajar',
            'nib'            => '1029384756',
            'tahun_nib'      => 2025,
            'nama_produk'    => 'Paving Block Daur Ulang Plastik',
            'latar_belakang' => 'Sampah plastik yang melimpah di sekitar sekolah diolah menjadi material infrastruktur yang bernilai ekonomis.',
            'deskripsi'      => 'Paving block berbahan campuran plastik daur ulang dan pasir, lebih kuat dari paving konvensional, tahan cuaca, dan membantu mengurangi limbah plastik.',
            'harga'          => 'Rp 5.000 / buah',
            'lokasi'         => 'SMK Teknologi Mandiri, Jl. Inovasi No. 5, Bandung',
            'link_maps'      => 'https://maps.google.com',
            'sosmed'         => '@paviblock.id',
            'nama_sekolah'   => 'SMK Teknologi Mandiri Bandung',
            'jurusan'        => 'Teknik Mesin',
            'status'         => 'menunggu',
        ]);

        // --- PRODUK DRAFT ---

        Produk::create([
            'user_id'        => $siswa1->id,
            'nama_merek'     => 'AdminKu',
            'kategori'       => 'Bisnis dan Manajemen',
            'filosofi'       => 'Administrasi mudah untuk semua UMKM',
            'nama_produk'    => 'Aplikasi Pembukuan UMKM',
            'latar_belakang' => 'UMKM kecil kesulitan mencatat keuangan secara rapi sehingga sulit berkembang.',
            'deskripsi'      => 'Aplikasi pembukuan sederhana berbasis web untuk UMKM, dengan fitur pencatatan pemasukan/pengeluaran, laporan laba-rugi, dan stok barang.',
            'harga'          => 'Gratis (versi basic) / Rp 50.000/bulan (pro)',
            'lokasi'         => 'SMK Nusantara, Jl. Pendidikan No. 1, Jakarta Selatan',
            'link_maps'      => 'https://maps.google.com',
            'sosmed'         => '@adminku.app',
            'nama_sekolah'   => 'SMK Nusantara Jakarta',
            'jurusan'        => 'Akuntansi dan Keuangan Lembaga',
            'status'         => 'draft',
        ]);

        Produk::create([
            'user_id'        => $siswa5->id,
            'nama_merek'     => 'PercaKarya',
            'kategori'       => 'Seni dan Ekonomi Kreatif',
            'filosofi'       => 'Limbah tekstil menjadi karya bernilai seni',
            'nama_produk'    => 'Tas Perca Handmade',
            'latar_belakang' => 'Limbah kain perca dari industri garmen sekitar sekolah belum termanfaatkan secara optimal.',
            'deskripsi'      => 'Tas handmade dari kain perca pilihan dengan desain colorful dan unik. Setiap tas dibuat manual sehingga tidak ada yang sama persis.',
            'harga'          => 'Rp 45.000 - Rp 120.000',
            'lokasi'         => 'SMK Nusantara, Jl. Pendidikan No. 1, Jakarta Selatan',
            'link_maps'      => 'https://maps.google.com',
            'sosmed'         => '@percakarya',
            'nama_sekolah'   => 'SMK Nusantara Jakarta',
            'jurusan'        => 'Tata Busana',
            'status'         => 'draft',
        ]);
    }
}
