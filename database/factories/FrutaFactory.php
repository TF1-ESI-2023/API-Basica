<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FrutaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->word(),
            'tipo' => $this->faker->RandomElement(['Tropical', 'Citricas', 'Hoja','Flores','Acidas']),
            'precio' => $this -> faker -> numberBetween(10,500),
            'gramos' => $this -> faker -> numberBetween(1,1000)
        ];
    }
}
