<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kelas::insert([
            [
                'nama' => 'Kelas 1',
                'status_id' => 1,
                'urutan' => 1,
            ],
            [
                'nama' => 'Kelas 2',
                'status_id' => 1,
                'urutan' => 2,
            ],
            [
                'nama' => 'Kelas 3',
                'status_id' => 1,
                'urutan' => 3,
            ],
            [
                'nama' => 'Kelas 4',
                'status_id' => 1,
                'urutan' => 4,
            ],
            [
                'nama' => 'Kelas 5',
                'status_id' => 1,
                'urutan' => 5,
            ],
            [
                'nama' => 'Kelas 6',
                'status_id' => 1,
                'urutan' => 6,
            ],
            [
                'nama' => 'Kelas 7',
                'status_id' => 2,
                'urutan' => 1,
            ],
            [
                'nama' => 'Kelas 8',
                'status_id' => 2,
                'urutan' => 2,
            ],
            [
                'nama' => 'Kelas 9',
                'status_id' => 2,
                'urutan' => 3,
            ],
            [
                'nama' => 'Kelas 10',
                'status_id' => 3,
                'urutan' => 1,
            ],
            [
                'nama' => 'Kelas 11',
                'status_id' => 3,
                'urutan' => 2,
            ],
            [
                'nama' => 'Kelas 12',
                'status_id' => 3,
                'urutan' => 3,
            ],
        ]);
    }
}
