<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Concert;

class ConcertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concerts = [
            [
                'name' => 'Tomorrowland',
                'price' => 20000,
                'stock' => 150,
                'date' => '2023-07-24',
                'originalStock' => 150,
            ],
            [
                'name' => 'Ultra Miami',
                'price' => 25000,
                'stock' => 300,
                'date' => '2023-07-25',
                'originalStock' => 300,
            ],
            [
                'name' => 'Tom Morello',
                'price' => 36000,
                'stock' => 200,
                'date' => '2023-06-21',
                'originalStock' => 200,
            ],
            // Agrega más conciertos si lo deseas
        ];

        foreach ($concerts as $concert) {
            Concert::create($concert);
        }
    }
}
