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
        \App\Models\TipoUsuario::factory(2)->create();
        \App\Models\User::factory(10)->create();
        \App\Models\Colegio::factory(1)->create();
        \App\Models\Profesor::factory(10)->create();
        \App\Models\Estudiante::factory(50)->create();
        \App\Models\Area::factory(10)->create();
        \App\Models\Competencia::factory(20)->create();
        \App\Models\Capacidad::factory(30)->create();
        \App\Models\Clase::factory(8)->create();
        \App\Models\Matricula::factory(30)->create();
        \App\Models\Calificacion::factory(30)->create();
    }
}
