<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MerchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->colorName . ['pants', 'shirt'][rand(0, 1)],
            "price" => $this->faker->randomFloat(2, 0, 1000),
        ];
    }
}
