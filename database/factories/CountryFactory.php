<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => ucfirst($this->faker->unique()->word()),
        ];
    }
}
