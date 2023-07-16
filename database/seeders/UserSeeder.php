<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Italo',
            'email' => 'italo.donoso@ucn.cl',
            'password' => bcrypt('Melody91'),
            'role' => 2
        ]);
        DB::table('users')->insert([
            'name' => 'Thomas',
            'email' => 'thomas@gmail.com',
            'password' => bcrypt('thomas123'),
            'role' => 1
        ]);

    }
}
