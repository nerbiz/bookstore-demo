<?php

namespace Database\Factories;

use App\Models\BookType;
use App\Models\Language;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'book_type_id' => BookType::inRandomOrder()->first()->id,
            'publisher_id' => Publisher::inRandomOrder()->first()->id,
            'language_id' => Language::inRandomOrder()->first()->id,
            'isbn' => $this->faker->isbn13(),
            'title' => ucfirst(implode(' ', $this->faker->words(random_int(1, 6)))),
            'price' => random_int(5, 90) * 100,
            'summary' => $this->faker->text(random_int(50, 200)),
            'pages' => random_int(40, 750),
            'published_at' => $this->faker->date(),
        ];
    }
}
