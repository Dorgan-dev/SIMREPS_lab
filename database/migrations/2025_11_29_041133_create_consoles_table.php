<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consoles', function (Blueprint $table) {
            $table->integer('console_id')->primary();
            $table->string('nama_unit');
            $table->string('nomor_unit')->unique();
            $table->enum('kategori', ['PS 5', 'PS 4', 'PS 3']);
            $table->integer('harga_per_jam');
            $table->unsignedBigInteger('ruangan_id')->nullable();
            $table->enum('status', ['Tersedia', 'Dipesan', 'Perbaikan'])->default('Tersedia');
            $table->text('deskripsi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('consoles');
    }
};
