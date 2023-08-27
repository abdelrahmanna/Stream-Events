<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FollowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "created_at" => $this->faker->dateTimeBetween("-3 months", "now")->format("Y-m-d H:i:s"),
        ];
    }
}
