<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('cust_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->foreignId('console_id')
                ->constrained('consoles')
                ->onDelete('cascade');

            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');

            $table->integer('durasi_jam');

            $table->foreignId('disetujui_oleh')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->enum('status', [
                'Menunggu',
                'Diterima',
                'Berlangsung',
                'Selesai',
                'Ditolak',
                'Dibatalkan'
            ])->default('Menunggu');

            $table->index(['console_id', 'waktu_mulai', 'status']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
