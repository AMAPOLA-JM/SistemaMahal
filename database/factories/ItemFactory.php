<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_category' => $this->faker->numberBetween(1, 10),
            'id_brand' => $this->faker->numberBetween(1, 10),
            'name_item' => $this->faker->randomElement(['Vikini', 'Cachetero', 'Bombacha', 'Semihilo', 'Hilo', 'Boxer', 'Tanga', 'Tobillera', 'Talonera', 'Formador', 'Tsunade', 'Loli', 'Ricardo Milos']),
            'size_item' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL', 'XXL', 'XXXL']),
            'stock' => $this->faker->numberBetween(0, 200),
            'unit_price_item' => $this->faker->randomFloat(4, 0,10),
            'wholesale_price_item' => $this->faker->randomFloat(4, 10,30),
            'description_item' => $this->faker->paragraph(),
        ];
    }
}
