<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //Vaciar Tabla
        //User::truncate();


        //Crear datos falsos
        $faker = \Faker\Factory::create();


        $password = Hash::make(value: '123456'); // Crear la misma clave para todos los usuarios 

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@prueba.com',
            'password' => $password,
        ]);

        // Generar 10 usuarios para nuestra aplicacion
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }


        //
    }
}
