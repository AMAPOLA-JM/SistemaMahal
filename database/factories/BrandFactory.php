<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BrandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_supplier' => $this->faker->numberBetween(1, 10),
            'name_brand' => $this->faker->streetSuffix(),
            'status_brand' => $this->faker->numberBetween(0, 1),
        ];
    }
}
