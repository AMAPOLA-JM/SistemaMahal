<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_client' => $this->faker->numberBetween(1, 10),
            'id_user' => $this->faker->numberBetween(1, 10),
            'date_note' => $this->faker->dateTime(),
            'state_note' => $this->faker->numberBetween(0, 2),
            'total_import_note' => $this->faker->randomFloat(4),
            'type_note_sale' => $this->faker->numberBetween(0, 1),
        ];
    }
}
