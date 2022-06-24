<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DetailIncomingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_item' => $this->faker->numberBetween(1, 10),
            'id_incoming' => $this->faker->numberBetween(1, 10),
            'numbers_details_incoming' => $this->faker->randomNumber(4, False),
            'total_price_details_incoming' => $this->faker->randomFloat(4),
        ];
    }
}
