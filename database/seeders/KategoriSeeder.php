<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Kategori::insert([
            [
                'nama' => 'Bisnis dan Keuangan',
            ],
            [
                'nama' => 'Sales dan Marketing',
            ],
            [
                'nama' => 'Pengembangan Diri',
            ],
            [
                'nama' => 'Teknologi dan Perangkat Lunak',
            ],
            [
                'nama' => 'Pengajar',
            ],
            [
                'nama' => 'Bahasa',
            ],
            [
                'nama' => 'Hobi dan Gaya Hidup',
            ],
            [
                'nama' => 'Desain',
            ],
            [
                'nama' => 'Multimedia',
            ],
            [
                'nama' => 'Lainnya',
            ],
        ]);
    }
}
