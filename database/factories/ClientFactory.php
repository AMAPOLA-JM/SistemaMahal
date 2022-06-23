<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni_client' => $this->faker->numberBetween(10000000, 99999999),
            'name_client' => $this->faker->firstName(),
            'surname_client' => $this->faker->lastName()." ".$this->faker->lastName(),
            'tel_client' => $this->faker->numberBetween(9,9).$this->faker->numberBetween(00000000, 99999999),
            'buys_client' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
