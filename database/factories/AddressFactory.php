<?php

namespace Database\Factories;

use App\Models\City;
use Faker\Factory as FakerFactory;
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
        $city = City::with('country')->inRandomOrder()->first();
        $faker = FakerFactory::create($city->country->main_locale);

        return [
            'city_id' => $city->id,
            'street' => $faker->streetName(),
            'house_number' => $faker->numberBetween(1, 500),
            'zipcode' => $faker->postcode(),
        ];
    }
}
