<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Participant;
use App\Models\Round;

class RoundParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $round1 = Round::where('name', 'First Round')->first();
        $round2 = Round::where('name', 'Second Round')->first();

        $participant1 = Participant::where('email', 'k.bela@gmail.com')->first();
        $participant2 = Participant::where('email', 'n.anna@gmail.com')->first();

        if ($round1 && $participant1) {
            $round1->participants()->attach($participant1->id);
        }

        if ($round1 && $participant2) {
            $round1->participants()->attach($participant2->id);
        }

        if ($round2 && $participant1) {
            $round2->participants()->attach($participant1->id);
        }
    }
}
