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
                'name' => 'Concierto 1',
                'price' => 20000,
                'stock' => 150,
                'date' => '2023-06-20',
            ],
            [
                'name' => 'Concierto 2',
                'price' => 25000,
                'stock' => 300,
                'date' => '2023-06-25',
            ],
            // Agrega más conciertos si lo deseas
        ];

        foreach ($concerts as $concert) {
            Concert::create($concert);
        }
    }
}
