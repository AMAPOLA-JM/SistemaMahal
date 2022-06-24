<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_category' => $this->faker->randomElement(['Interior Dama', 'Interior Varón', 'Braziers', 'Medias Varón', 'Medias Mujer']),
            'description_category' => $this->faker->paragraph(),
            'state_category' => $this->faker->numberBetween(0, 0),
        ];
    }
}
