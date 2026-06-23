<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_merek');
            $table->string('logo')->nullable();
            $table->text('filosofi')->nullable();
            $table->string('nib')->nullable();
            $table->integer('tahun_nib')->nullable();
            $table->string('nama_produk');
            $table->string('foto_produk')->nullable();
            $table->text('latar_belakang')->nullable();
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 15, 2)->nullable();
            $table->text('lokasi')->nullable();
            $table->string('link_maps')->nullable();
            $table->string('sosmed')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};