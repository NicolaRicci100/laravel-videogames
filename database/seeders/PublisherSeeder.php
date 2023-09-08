<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublisherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Generator $faker): void
    {
        $labels = ['Activision', 'Capcom', 'Bandai Namco', 'Konami', 'Rockstar Games', 'Nintendo'];

        foreach ($labels as $label) {
            $publishers = new Publisher();
            $publishers->label = $label;
            $publishers->color = $faker->hexColor();
            $publishers->save();
        }
    }
}
