<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "subscription_tier_id" => $this->faker->numberBetween(1, 3),
            "created_at" => $this->faker->dateTimeBetween("-3 months", "now")->format("Y-m-d H:i:s"),
        ];
    }
}
