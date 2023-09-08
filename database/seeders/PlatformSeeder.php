<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $platforms = [
            ['name' => 'PS4', 'color' => 'primary'],
            ['name' => 'PS5', 'color' => 'light'],
            ['name' => 'Xbox', 'color' => 'success'],
            ['name' => 'PC', 'color' => 'warning'],
            ['name' => 'Switch', 'color' => 'danger'],
        ];

        foreach ($platforms as $platform) {
            $newPlatform = new Platform();
            $newPlatform->name = $platform['name'];
            $newPlatform->color = $platform['color'];
            $newPlatform->save();
        }
    }
}
