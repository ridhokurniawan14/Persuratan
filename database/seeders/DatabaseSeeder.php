<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'name' => 'Ridho Kurniawan',
            'email'=> 'ridho@gmail.com',
            'password' => bcrypt('ridho123'),
            'foto' => 'wk.jpg',
            'is_superadmin' => '1'            
        ]);
        // User::factory(3)->create();


    }
}
