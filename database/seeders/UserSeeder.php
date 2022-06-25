<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('Secret123'),
                'level' => 1
            ],
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Secret123'),
                'level' => 2
            ],
            [
                'name' => 'Halimah Martawati S.Pd',
                'email' => 'halimah@gmail.com',
                'password' => Hash::make('Secret123'),
                'level' => 3
            ],
            [
                'name' => 'Al Azim',
                'email' => 'alazim.dev@gmail.com',
                'password' => Hash::make('Secret123'),
                'level' => 4
            ],
        ]);
    }
}
