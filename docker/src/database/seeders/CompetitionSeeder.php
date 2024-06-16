<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Competition;

class CompetitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Competition::create([
            'name' => 'Math Competition',
            'year' => 2024,
            'available_languages' => json_encode(['en', 'hu']),
            'location' => 'Budapest',
        ]);

        Competition::create([
            'name' => 'Physics Competition',
            'year' => 2024,
            'available_languages' => json_encode(['en']),
            'location' => 'Szeged',
        ]);
    }
}
