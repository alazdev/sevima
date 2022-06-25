<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Siswa::insert(
            [
                'user_id' => 4,
                'foto' => NULL,
            ],
        );
    }
}
