<?php

namespace Database\Factories;

use App\Models\BookType;
use App\Models\Language;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected static $images = [
        [
            'https://www.internetboekhandel.nl/base/73/CBcover/groot/9402709673.jpg',
            'https://www.internetboekhandel.nl/base/73/CBachterkant/9402709673.jpg',
        ],
        [
            'https://www.internetboekhandel.nl/base/21/CBcover/groot/9044635921.jpg',
            'https://www.internetboekhandel.nl/base/21/CBachterkant/9044635921.jpg',
        ],
        [
            'https://www.internetboekhandel.nl/base/94/CBcover/groot/9026346794.jpg',
            'https://www.internetboekhandel.nl/base/94/CBachterkant/9026346794.jpg',
        ],
        [
            'https://www.internetboekhandel.nl/base/6X/CBcover/groot/902259646X.jpg',
            'https://www.internetboekhandel.nl/base/6X/CBachterkant/902259646X.jpg',
        ],
        [
            'https://www.internetboekhandel.nl/base/4X/CBcover/groot/902909494X.jpg',
            'https://www.internetboekhandel.nl/base/4X/CBachterkant/902909494X.jpg',
        ],
        [
            'https://www.internetboekhandel.nl/base/84/CBcover/groot/9022594084.jpg',
            'https://www.internetboekhandel.nl/base/84/CBachterkant/9022594084.jpg',
        ],
        [
            'https://www.internetboekhandel.nl/base/13/CBcover/groot/9038811713.jpg',
            'https://www.internetboekhandel.nl/base/13/CBachterkant/9038811713.jpg'
        ],
        [
            'https://www.internetboekhandel.nl/base/44/CBcover/groot/9402709444.jpg',
            'https://www.internetboekhandel.nl/base/44/CBachterkant/9402709444.jpg',
        ],
        [
            'https://www.internetboekhandel.nl/base/85/CBcover/groot/9022594785.jpg',
            'https://www.internetboekhandel.nl/base/85/CBachterkant/9022594785.jpg'
        ],
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $img = $this->faker->boolean() ? $this->faker->randomElement(self::$images) : null;
        return [
            'publisher_id' => Publisher::inRandomOrder()->first()->id,
            'isbn' => $this->faker->isbn13(),
            'title' => ucfirst($this->faker->words($this->faker->numberBetween(1, 3), true)),
            'price' => $this->faker->randomFloat(2, 12.50, 59.99),
            'summary' => $this->faker->text(random_int(50, 200)),
            'pages' => random_int(40, 750),
            'cover_picture' => $img[0] ?? 'https://cdn.discordapp.com/attachments/970674109337972806/978584574118490132/template.png',
            'back_picture' => $img[1] ?? 'https://cdn.discordapp.com/attachments/970674109337972806/978584574118490132/template.png',
            'published_at' => $this->faker->date(),
        ];
    }
}
