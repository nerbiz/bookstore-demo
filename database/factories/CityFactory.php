<?php

namespace Database\Factories;

use App\Models\Country;
use Faker\Factory as FakerFactory;
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
        $country = Country::inRandomOrder()->first();
        $faker = FakerFactory::create($country->main_locale);

        return [
            'country_id' => $country->id,
            'name' => $faker->city(),
        ];
    }
}
