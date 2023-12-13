<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//
use App\Models\Viaje;
use App\Models\Ruta;
use Illuminate\Support\Facades\DB;

class ViajesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Vaciar Tabla
        //Viaje::truncate();


        //Crear datos falsos
        $faker = \Faker\Factory::create();

        //$destinosIds = DB::table('destinos')->pluck('id')->toArray();

        // Obtener todas las rutas
        $rutas = Ruta::all();

        foreach ($rutas as $ruta) {

            for ($i = 0; $i < 10; $i++) {
                Viaje::create([
                    'destino' => $faker->city,
                    'fecha_salida' => $faker->date,
                    'fecha_regreso' => $faker->date,
                    'ruta_id' => $ruta->id,
                    'asiento' => $faker->numberBetween(1, 100),
                    'estado' => $faker->randomElement(['Programado', 'En curso', 'Completado']),
                ]);
            }
        }
    }
}
