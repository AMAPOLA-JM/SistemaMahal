<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class IncomingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user' => $this->faker->numberBetween(1, 10),
            'date_incoming' => $this->faker->datetime(),
            'total_price_incoming' => $this->faker->randomFloat(4),
            'status_incoming' => $this->faker->numberBetween(0, 1),
        ];
    }
}
