<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//
use App\Models\Itinerario;
use App\Models\Ruta;
use Illuminate\Support\Facades\DB;

class ItinerariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Vaciar Tabla
        //Itinerario::truncate();


        //Crear datos falsos
        $faker = \Faker\Factory::create();

        //$destinosIds = DB::table('destinos')->pluck('id')->toArray();

        // Obtener todas las rutas
        $rutas = Ruta::all();

        foreach ($rutas as $ruta) {

            for ($i = 0; $i < 10; $i++) {
                Itinerario::create([
                    'ruta_id' => $ruta->id,
                    'actividad' => $faker->text(50),
                    'fecha' => $faker->date,
                    'hora' => $faker->time,
                ]);
            }
        }
    }
}
