<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Cek dulu apakah tabelnya sudah ada agar tidak error
        if (!Schema::hasTable('komentars')) {
            Schema::create('komentars', function (Blueprint $table) {
                $table->id();
                $table->foreignId('produk_id')->constrained('produks')->onDelete('cascade');
                $table->string('nama_pengunjung');
                $table->text('komentar');
                $table->integer('rating');
                $table->string('status')->default('disetujui');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
