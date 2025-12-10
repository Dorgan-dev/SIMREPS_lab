<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateConsoleDummy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        foreach (range(1, 13) as $index) {
            DB::table('consoles')->insert([
                'id'   => $index,
                'nama_unit'  => $faker->randomElement(['PlayStation 5', 'PS4 Pro', 'Nintendo Switch', 'Xbox One S', 'Xbox Series X']),
                'nomor_unit'   => 'SN' . $faker->unique()->bothify('SN####'),
                'kategori'     => $faker->randomElement(['PS 5', 'PS 4', 'PS 3']),
                'harga_per_jam' => $faker->numberBetween(10, 50) * 1000,
                'room_id'   => $faker->numberBetween(1, 12),
                'status'       => $faker->randomElement(['Tersedia', 'Dipesan', 'Perbaikan']),
                'deskripsi'    => $faker->sentence(8),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
