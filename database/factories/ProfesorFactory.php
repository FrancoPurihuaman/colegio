<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'PFS_DNI' => $this->faker->randomNumber(8, false),
            'PFS_NOMBRE' => strtolower($this->faker->firstName()),
            'PFS_APELLIDO_PAT' => strtolower($this->faker->lastName()),
            'PFS_APELLIDO_MAT' => strtolower($this->faker->lastName()),
            'PFS_SEXO' => $this->faker->randomElement(['M', 'F']),
            'PFS_FECHA_NACIMIENTO' => $this->faker->dateTimeBetween(),
            'PFS_EMAIL' => $this->faker->email(),
            'PFS_TELEFONO' => $this->faker->phoneNumber(),
            'PFS_ESPECIALIDAD' => $this->faker->word()
        ];
    }
}
