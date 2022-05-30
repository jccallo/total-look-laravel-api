<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EtiquetaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->randomElement(['Bata', 'Bubblegummers', 'Hawk']),
            'estado' => $this->faker->randomElement(['activo', 'eliminado']),
        ];
    }
}
