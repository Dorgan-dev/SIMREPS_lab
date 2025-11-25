<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateReservationDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 1000) as $index) {
            DB::table('reservations')->insert([
                'cust_id' => $faker->numberBetween(1, 500),   // sesuaikan jumlah customer
                'console_id' => $faker->numberBetween(1, 20), // misal ada 20 console
                'waktu_mulai' => $faker->time('H:i:s'),
                'durasi_jam' => $faker->time('H:i:s', '03:00:00'), // durasi acak max 3 jam
                'disetujui_oleh' => $faker->numberBetween(1, 10), // id admin
                'status' => $faker->randomElement(['Dipesan', 'Berlangsung','Selesai', 'Dibatalkan']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
