<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Obd2Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codigo'      => $this->faker->numberBetween(1000000, 9000000),
            'descripcion' => $this->faker->sentence,


        ];
    }
}
