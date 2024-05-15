<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CalificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CLF_NOTA' => $this->faker->randomElement(['A', 'B', 'C']),
            'CLF_DESCRIPCION' => $this->faker->text(50),
            'CLS_PERIODO_ACADEMICO' => $this->faker->randomElement([
                'TRIMESTE I',
                'TRIMESTRE II',
                'TRIMESTRE III'
            ]),
            'CLS_OBSERVACION' => $this->faker->text(50),
            'MTL_CODIGO' => $this->faker->numberBetween(1, 30),
            'CPT_CODIGO' => $this->faker->numberBetween(1, 4)
        ];
    }
}
