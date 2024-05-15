<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CapacidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CPC_DESCRIPCION' => $this->faker->text(50),
            'CPT_CODIGO' => $this->faker->numberBetween(1, 18)
        ];
    }
}
