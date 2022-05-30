<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'dni' => $this->faker->unique()->randomNumber(8, true),
            'telefono' => $this->faker->unique()->e164PhoneNumber(),
            'direccion' => $this->faker->address(),
            'imagen' => '20220529053558.png',
            'estado' => $this->faker->randomElement(['activo', 'eliminado']),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('12345678'),
            'rol_id' => $this->faker->randomElement([1, 2]),
        ];
    }
}
