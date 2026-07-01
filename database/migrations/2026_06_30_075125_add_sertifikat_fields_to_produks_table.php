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
            // Menambahkan kolom no_sertifikat dan tanggal_validasi
            $table->string('no_sertifikat')->nullable()->after('status');
            $table->date('tanggal_validasi')->nullable()->after('no_sertifikat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produks', function (Blueprint $table) {
            // Menghapus kolom jika migrasi di-rollback
            $table->dropColumn(['no_sertifikat', 'tanggal_validasi']);
        });
    }
};