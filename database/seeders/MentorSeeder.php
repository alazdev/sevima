<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MentorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Mentor::insert(
            [
                'user_id' => 3,
                'foto' => NULL,
                'profesi' => 'Guru Matematika SMA',
                'deskripsi' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repellat exercitationem et voluptas, adipisci ex aut, iusto rerum hic odio optio fugit assumenda molestiae voluptatum quae dolores temporibus unde nesciunt. Quaerat?',
            ]
        );
    }
}
