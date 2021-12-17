<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'address_id' => Address::inRandomOrder()->first()->id,
            'first_name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'date_of_birth' => $this->faker->date(
                'Y-m-d',
                Carbon::now()->subYears(25)->format('Y-m-d')
            ),
        ];
    }
}
