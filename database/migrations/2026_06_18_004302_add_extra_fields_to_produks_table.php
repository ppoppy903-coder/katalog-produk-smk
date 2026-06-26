<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            // Menambahkan kolom kategori
            if (!Schema::hasColumn('produks', 'kategori')) {
                $table->string('kategori')->nullable()->after('nama_merek');
            }

            // Pengecekan hasColumn mencegah error "Column already exists"
            if (!Schema::hasColumn('produks', 'lokasi')) {
                $table->text('lokasi')->nullable()->after('harga');
            }
            if (!Schema::hasColumn('produks', 'link_maps')) {
                $table->string('link_maps')->nullable()->after('lokasi');
            }
            if (!Schema::hasColumn('produks', 'sosmed')) {
                $table->string('sosmed')->nullable()->after('link_maps');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            // Kita drop hanya jika kolom tersebut ada agar rollback tidak error
            // Kolom 'kategori' juga ditambahkan ke daftar drop
            $table->dropColumn(['kategori', 'lokasi', 'link_maps', 'sosmed']);
        });
    }
};