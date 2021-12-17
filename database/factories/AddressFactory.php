<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'city_id' => City::inRandomOrder()->first()->id,
            'street' => ucfirst($this->faker->word()),
            'housenumber' => $this->faker->regexify('\d{1,4}[a-z]?'),
            'zipcode' => $this->faker->regexify('\d{4,8}-[A-Z]{1,3}'),
        ];
    }
}
