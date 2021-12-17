<?php

namespace Database\Factories;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\Factory;

class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'country_id' => Country::inRandomOrder()->first()->id,
            'name' => ucfirst($this->faker->unique()->word()),
        ];
    }
}
