<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
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
            'email' => $this->faker->email(),
        ];
    }
}
