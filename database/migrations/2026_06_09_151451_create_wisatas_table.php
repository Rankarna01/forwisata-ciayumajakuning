<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->string('kategori'); // Alam, Budaya, Religi
            $table->string('kabupaten'); // Cirebon, Indramayu, Majalengka, Kuningan
            $table->text('deskripsi');
            $table->string('gambar');
            $table->text('link_maps');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('wisatas');
    }
};