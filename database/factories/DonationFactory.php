<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => "{$this->faker->firstName()} {$this->faker->lastName()}",
            "amount" => $this->faker->randomFloat(2, 0, 1000),
            "currency" => ["USD", "EUR", "GBP"][rand(0, 2)],
            "message" => $this->faker->text(100),
            "created_at" => $this->faker->dateTimeBetween("-3 months", "now")->format("Y-m-d H:i:s"),
        ];
    }
}
