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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'user',
            'email' => 'user@g.c',
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@g.c',
        ]);

        User::factory()->create([
            'name' => 'test',
            'email' => 'test@g.c',
        ]);
    }
}
