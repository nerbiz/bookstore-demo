<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Book;
use App\Models\BookType;
use App\Models\City;
use App\Models\Country;
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
        $languages = Language::factory()->count(10)->create();

        $countries->each(function (Country $country) use ($languages) {
            $randomLanguageIds = collect([]);
            for ($i = 0; $i < random_int(1, 2); $i++) {
                $randomLanguageIds->push($languages->random()->id);
            }

            $country->languages()->attach($randomLanguageIds->unique());
        });

        Publisher::factory()->count(5)->create();
        collect(['hardcover', 'paperback', 'e-book'])->each(function(string $bookType) {
            BookType::create(['name' => $bookType]);
        });
        Book::factory()->count(200)->create();
    }
}
