<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        \App\Models\Fruta::factory(500)->create();
        \App\Models\Fruta::factory(1)->create([
            "id" => 1001,
            "nombre" => "Frula",
            "tipo" => "polvito magico",
            "precio" => 3000,
            "gramos" => 1
        ]);
        \App\Models\Fruta::factory(1)->create([
            "id" => 1002,
            "nombre" => "Banana",
            "tipo" => "Tropical",
            "precio" => 100,
            "gramos" => 1000
        ]);
        \App\Models\Fruta::factory(1)->create([
            "id" => 1003,
            "nombre" => "Manzana",
            "tipo" => "Malus domestica",
            "precio" => 70,
            "gramos" => 1000
        ]);
    }
}
