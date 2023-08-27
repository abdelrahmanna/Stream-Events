<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MerchSaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_name" => $this->faker->name(),
            "merch_id" => $this->faker->numberBetween(1, 30),
            "amount" => $this->faker->numberBetween(1, 10),
            "created_at" => $this->faker->dateTimeBetween("-3 months", "now")->format("Y-m-d H:i:s"),
        ];
    }
}
