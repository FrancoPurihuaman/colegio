<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CLS_GRADO' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'CLS_SECCION' => $this->faker->randomElement(['A', 'B']),
            'CLS_YEAR' => 2023,
            'ARE_CODIGO' => $this->faker->numberBetween(1, 10),
            'PFS_CODIGO' => $this->faker->numberBetween(1, 8)
        ];
    }
}
