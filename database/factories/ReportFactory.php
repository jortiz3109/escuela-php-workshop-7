<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->text(50),
            'status' => $this->faker->randomElement(),
        ];
    }
}
