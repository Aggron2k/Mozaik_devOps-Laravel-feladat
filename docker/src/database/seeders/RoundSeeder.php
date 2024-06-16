<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Round;
use App\Models\Competition;

class RoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $competition1 = Competition::where('name', 'Math Competition')->first();
        $competition2 = Competition::where('name', 'Physics Competition')->first();


        Round::create([
            'competition_id' => $competition1->id,
            'name' => 'First Round',
            'date' => '2024-06-01',
            'max_points' => 100,
        ]);

        Round::create([
            'competition_id' => $competition1->id,
            'name' => 'Second Round',
            'date' => '2024-06-15',
            'max_points' => 25,
        ]);

        Round::create([
            'competition_id' => $competition2->id,
            'name' => 'First Round',
            'date' => '2024-06-02',
            'max_points' => 50,
        ]);
    }
}
