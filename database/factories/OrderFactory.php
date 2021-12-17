<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id,
            'order_status_id' => OrderStatus::inRandomOrder()->first()->id,
            'date' => $this->faker->date(),
        ];
    }
}
