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
            'points_correct_answer' => 5,
            'points_wrong_answer' => -2,
            'points_empty_answer' => 0,
        ]);

        Competition::create([
            'name' => 'Physics Competition',
            'year' => 2024,
            'available_languages' => json_encode(['en']),
            'points_correct_answer' => 4,
            'points_wrong_answer' => -1,
            'points_empty_answer' => 0,
        ]);
    }
}
