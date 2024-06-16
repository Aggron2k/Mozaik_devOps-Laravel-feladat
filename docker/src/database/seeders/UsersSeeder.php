<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'phone' => '06207772211',
            'address' => 'Bécsi utca 73.',
        ]);

        User::create([
            'name' => 'Staff',
            'email' => 'staff@staff.com',
            'password' => bcrypt('password'),
            'phone' => '06309998877',
            'address' => 'Dayka Gábor u. 77.',
        ]);
    }
}
