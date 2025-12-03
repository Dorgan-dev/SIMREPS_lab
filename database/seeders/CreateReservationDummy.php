<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateReservationDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 23) as $index) {

            $tanggal = $faker->date();              // contoh: 2025-12-03
            $mulai   = $faker->time('H:i:s');       // contoh: 14:24:08
            $durasi  = $faker->numberBetween(1, 5); // 1–5 jam

            // Buat datetime lengkap
            $waktu_mulai   = $tanggal . ' ' . $mulai;
            $waktu_selesai = date('Y-m-d H:i:s', strtotime($waktu_mulai . " + $durasi hours"));

            DB::table('reservations')->insert([
                'cust_id'         => $faker->numberBetween(1, 500),
                'console_id'      => $faker->numberBetween(1, 20),

                'tanggal_bermain' => $tanggal,
                'waktu_mulai'     => $waktu_mulai,
                'waktu_selesai'   => $waktu_selesai,

                'durasi_jam'      => $durasi,

                'disetujui_oleh'  => $faker->numberBetween(1, 10),
                'status'          => $faker->randomElement(['Dipesan', 'Berlangsung', 'Selesai', 'Dibatalkan']),
                'created_at'      => now(),
                'updated_at'      => now(),
            ]);
        }
    }

}
