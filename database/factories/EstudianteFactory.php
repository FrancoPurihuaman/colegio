<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'STD_COD_ESTUDIANTE' => $this->faker->numberBetween(400000, 9000000),
            'STD_NOMBRE' => strtolower($this->faker->firstName()),
            'STD_APELLIDO_PAT' => strtolower($this->faker->lastName()),
            'STD_APELLIDO_MAT' => strtolower($this->faker->lastName()),
            'STD_SEXO' => $this->faker->randomElement(['M', 'F']),
            'STD_FECHA_NACIMIENTO' => $this->faker->dateTimeBetween()
        ];
    }
}
