<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Author;
use App\Models\Book;
use App\Models\BookType;
use App\Models\City;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    protected function getRandomModels(string $modelClass, int $minimum, int $maximum): Collection
    {
        return $modelClass::inRandomOrder()
            ->take(random_int($minimum, $maximum))
            ->get()
            ->unique();
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Country::factory()->count(10)->create();
        City::factory()->count(50)->create();
        Address::factory()->count(50)->create();
        Language::factory()->count(10)->create();
        Publisher::factory()->count(5)->create();
        Author::factory()->count(150)->create();
        Customer::factory()->count(300)->create();
        Book::factory()->count(250)->create();
        collect(['hardcover', 'paperback', 'e-book'])
            ->each(fn (string $bookType) => BookType::create(['name' => $bookType]));
        Genre::factory()->count(7)->create();
        collect(['paid', 'pending', 'rejected'])
            ->each(fn (string $orderStatus) => OrderStatus::create(['name' => $orderStatus]));
        Order::factory()->count(1000)->create();

        Author::all()->each(function (Author $author) {
            $randomLanguages = $this->getRandomModels(Language::class, 1, 3);
            $author->languages()->attach($randomLanguages);
        });

        Book::all()->each(function (Book $book) {
            $book->authors()->attach($this->getRandomModels(Author::class, 1, 3));
            $book->bookTypes()->attach($this->getRandomModels(BookType::class, 1, 3));
            $book->countries()->attach($this->getRandomModels(Country::class, 1, 6));
            $book->genres()->attach($this->getRandomModels(Genre::class, 1, 3));
            $book->languages()->attach($this->getRandomModels(Language::class, 1, 4));
        });

        Country::all()->each(function (Country $country) {
            $country->languages()->attach($this->getRandomModels(Language::class, 1, 3));
        });

        Customer::all()->each(function (Customer $customer) {
            $customer->languages()->attach($this->getRandomModels(Language::class, 1, 3));
        });

        Order::all()->each(function (Order $order) {
            $randomBooks = $this->getRandomModels(Book::class, 1, 10)
                // Set the values for the intermediate table
                ->map(fn (Book $book) => [
                    'book_id' => $book->id,
                    'quantity' => random_int(1, 2),
                ]);

            $order->books()->attach($randomBooks);
        });
    }
}
