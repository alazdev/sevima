<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            StatusSeeder::class,
            KelasSeeder::class,
            MataPelajaranSeeder::class,
            KategoriSeeder::class,
            MentorSeeder::class,
            SiswaSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
        
        $users = \App\Models\User::factory(1245)->create();
        $users->each(function ($user) {
            if($user->level == 3){
                $user->mentor()->save(\App\Models\Mentor::factory()->make());
            }
            else if ($user->level == 4)
            {
                $user->siswa()->save(\App\Models\Siswa::factory()->make());
            }
        });
    }
}
