<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//
use App\Models\Ruta;
use Illuminate\Support\Facades\DB;

class RutasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Vaciar Tabla
        //Ruta::truncate();


        //Crear datos falsos
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {
            Ruta::create([
                'origen' => $faker->city,
                'destino' => $faker->city,
                'duracion' => $faker->time(),
                'distancia' => $faker->randomFloat(2, 100, 1000),
                'medio_transporte' => $faker->word,
            ]);
        }
    }
}
