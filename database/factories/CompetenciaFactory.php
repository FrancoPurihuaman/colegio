<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompetenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CPT_NOMBRE' => strtolower($this->faker->word(7)),
            'CPT_DESCRIPCION' => $this->faker->text(1500),
            'ARE_CODIGO' => $this->faker->numberBetween(1, 10)
        ];
    }
}
