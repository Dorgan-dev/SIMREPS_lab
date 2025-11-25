<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateSuperAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Gatot Kaca',
            'jenis_kelamin' => 'Laki-laki',
            'no_hp' => '0812',
            'username' => 'gatot2',
            'email' => 'gatot2@pcr.ac.id',
            'password' => Hash::make('gatotkaca'),
            'role' => 1
        ]);
    }
}
