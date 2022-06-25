<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Status::insert([
            [
                'nama' => 'Pelajar SD/setara',
                'tipe' => 1,
                'urutan' => 1,
                'status' => 1
            ],
            [
                'nama' => 'Pelajar SMP/setara',
                'tipe' => 1,
                'urutan' => 2,
                'status' => 1
            ],
            [
                'nama' => 'Pelajar SMA/setara',
                'tipe' => 1,
                'urutan' => 3,
                'status' => 1
            ],
            [
                'nama' => 'Mahasiswa',
                'tipe' => 0,
                'urutan' => 4,
                'status' => 1
            ],
            [
                'nama' => 'Tamat/Pekerja',
                'tipe' => 0,
                'urutan' => 5,
                'status' => 1
            ]
        ]);
    }
}
