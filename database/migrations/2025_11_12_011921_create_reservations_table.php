<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('res_id');
            $table->integer('cust_id');
            $table->integer('console_id');

            $table->date('tanggal_bermain');

            // waktu mulai & selesai (date + time)
            $table->time('waktu_selesai');

            // durasi jam INTEGER (bukan time)
            $table->integer('durasi_jam');

            $table->integer('disetujui_oleh')->nullable();

            $table->enum('status', ['Dipesan', 'Berlangsung', 'Selesai', 'Dibatalkan'])
                  ->default('Dipesan');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
