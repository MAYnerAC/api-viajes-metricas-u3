<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Itinerario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(class: UsersTableSeeder::class);
        //
        $this->call(class: RutasTableSeeder::class);
        $this->call(class: ViajesTableSeeder::class);
        $this->call(class: ItinerariosTableSeeder::class);



        //COMANDO: php artisan db:seed





        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
