<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->text(10),
            'name' => $this->faker->text(80),
            'description' => $this->faker->text(200),
            'price' => $this->faker->randomNumber(),
            'quantity' => $this->faker->randomNumber(),
        ];
    }
}
