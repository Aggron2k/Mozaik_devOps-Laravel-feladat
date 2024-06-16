<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Participant;

class ParticipantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Participant::create([
            'name' => 'Bela Kovacs',
            'email' => 'k.bela@gmail.com',
            'phone' => '06701234567',
            'address' => 'Veres Pálné u. 80.',
        ]);

        Participant::create([
            'name' => 'Anna Nagy',
            'email' => 'n.anna@gmail.com',
            'phone' => '06308786543',
            'address' => 'Tas vezér u. 58.',
        ]);
    }
}
