<?php

namespace Database\Seeders;

use App\Models\Videogame;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        for ($i = 0; $i < 15; $i++) {
            $videogame = new Videogame();
            $videogame->title = $faker->text(50);
            $videogame->cover = $faker->imageUrl(250, 250);
            $videogame->genre = $faker->word();
            $videogame->release_date = $faker->dateTime();
            $videogame->price = $faker->randomFloat(2, 10, 100);
            $videogame->platform = $faker->word();
            $videogame->description = $faker->paragraph(30, true);
            $videogame->age_rating = $faker->randomElement([3, 6, 9, 12, 16, 18]);
            $videogame->vote = $faker->numberBetween(0, 100);
            $videogame->save();
        }
    }
}
