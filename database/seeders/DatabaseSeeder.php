<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@exploravoyages.ca',
        ]);

        User::factory(10)->create();
    }
}
