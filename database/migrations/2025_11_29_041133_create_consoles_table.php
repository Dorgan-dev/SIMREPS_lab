<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consoles', function (Blueprint $table) {
            $table->id();
            $table->string('nama_unit');

            // Foreign key
            $table->foreignId('room_id')
                ->nullable()
                ->constrained('rooms')
                ->nullOnDelete();

            $table->string('nomor_unit')->unique();
            $table->enum('kategori', ['PS 5', 'PS 4', 'PS 3']);
            $table->integer('harga_per_jam');

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
