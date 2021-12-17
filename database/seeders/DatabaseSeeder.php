<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookType;
use App\Models\City;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Publisher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $countries = Country::factory()->count(10)->create();
        City::factory()->count(50)->create();
        Address::factory()->count(50)->create();
        Language::factory()->count(10)->create();

        $countries->each(function (Country $country) {
            $randomLanguages = Language::inRandomOrder()->take(random_int(1, 3))->get()->unique();
            $country->languages()->attach($randomLanguages);
        });

        Publisher::factory()->count(5)->create();
        collect(['hardcover', 'paperback', 'e-book'])
            ->each(fn(string $bookType) => BookType::create(['name' => $bookType]));
        $books = Book::factory()->count(250)->create();

        Genre::factory()->count(7)->create();
        Author::factory()->count(150)->create();

        $books->each(function(Book $book) {
            $randomGenres = Genre::inRandomOrder()->take(random_int(1, 3))->get()->unique();
            $randomAuthors = Author::inRandomOrder()->take(random_int(1, 3))->get()->unique();

            $book->genres()->attach($randomGenres);
            $book->authors()->attach($randomAuthors);
        });
    }
}
