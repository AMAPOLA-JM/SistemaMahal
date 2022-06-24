<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class NoteDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_note_sale' => $this->faker->numberBetween(1, 10),
            'id_item' => $this->faker->numberBetween(1, 10),
            'quantity_note_detail' => $this->faker->randomNumber(3, false),
            'total_price_note_detail' => $this->faker->randomFloat(4),
        ];
    }
}
