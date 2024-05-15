<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ColegioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CLG_CODIGO_MODULAR'    => '1352400',
            'CLG_NOMBRE'            => 'ARUTAM',
            'CLG_DIRECTOR'          => 'Galdino Ordoñes Pallano',
        ];
    }
}
