<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GradoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'GRD_NOMBRE' => $this->faker->text(15),
            'GRD_DESCRIPCION' => $this->faker->text(255)
        ];
    }
}
