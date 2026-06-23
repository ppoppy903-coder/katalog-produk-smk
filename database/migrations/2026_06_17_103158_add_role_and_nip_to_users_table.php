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
        Schema::table('users', function (Blueprint $table) {
            // Kita cek dulu apakah kolom sudah ada agar tidak error "Duplicate column name"
            if (!Schema::hasColumn('users', 'role')) {
                $table->string('role')->default('siswa');
            }
            if (!Schema::hasColumn('users', 'nip')) {
                $table->string('nip')->nullable();
            }
            if (!Schema::hasColumn('users', 'nisn')) {
                $table->string('nisn')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus kolom jika ingin membatalkan migrasi
            $table->dropColumn(['role', 'nip', 'nisn']);
        });
    }
};