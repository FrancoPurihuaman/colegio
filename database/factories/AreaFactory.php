<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AreaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ARE_NOMBRE' => $this->faker->text(20),
            'ARE_DESCRIPCION' => $this->faker->text(50)
        ];
    }
}
