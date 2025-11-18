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
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('res_id');
            $table->integer('cust_id');
            $table->integer('console_id');
            $table->time('waktu_mulai');
            $table->time('durasi_jam');
            $table->integer('disetujui_oleh');
            $table->enum('status', ['Dipesan', 'Berlangsung', 'Selesai', 'Dibatalkan'])->default('Dipesan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
