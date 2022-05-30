<?php

namespace Database\Seeders;

use App\Models\Empleado;
use App\Models\Etiqueta;
use App\Models\Rol;
use App\Models\User;
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
        // Rol::factory(3)->has(Empleado::factory()->count(4), 'empleados')->create();
        // Empleado::factory(15)->create();
        // Rol::factory(5)->create();
        // Empleado::factory(15)->create();

        User::factory(10)->create();
        Rol::factory(5)->create();
        Empleado::factory(15)->create();
        Etiqueta::factory(3)->create();
    }
}
