<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();


       /* $user = new User();

        $user->name ="Ítalo Donoso Barraza";
        $user->email ="italo.donoso@ucn.cl";
        $user->password ="Melody91";
        $user->role = 2;

        $user->save();*/

        $this->call(UserSeeder::class);
        $this->call(ConcertSeeder::class);
    }
}
