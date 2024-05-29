<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GrupoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'GRP_YEAR_ACADEMICO' => 2024,
            'GRP_SECCION' => $this->faker->text(5),
            'GRP_PERIODO_EVALUACION' => 'TRIMESTRE',
            'GRP_CANT_PERIODOS_EVAL' => 3,
            'GRD_CODIGO' => $this->faker->numberBetween(1,5)
        ];
    }
}
