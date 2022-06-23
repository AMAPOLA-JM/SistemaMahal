<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_supplier' => $this->faker->company(),
            'seller_supplier' => $this->faker->name(),
            'city_supplier' => $this->faker->state(),
            'contact_supplier' => $this->faker->numberBetween(9,9).$this->faker->numberBetween(11111111, 99999999),
            'status_supplier' => $this->faker->numberBetween(0, 1),
        ];
    }
}
