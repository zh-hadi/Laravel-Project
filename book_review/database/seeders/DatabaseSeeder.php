<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Review;
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
        // Book::factory(20)->create();
        // Review::factory(20)->good()->create();

        Book::factory(33)->create()->each(function ($book){
            $revCount = random_int(5, 30);

            Review::factory()->count($revCount)
                ->good()
                ->for($book)
                ->create();
        });

        Book::factory(33)->create()->each(function ($book){
            $revCount = random_int(5, 30);

            Review::factory()->count($revCount)
                ->avarage()
                ->for($book)
                ->create();
        });

        Book::factory(34)->create()->each(function ($book){
            $revCount = random_int(5, 30);

            Review::factory()->count($revCount)
                ->bad()
                ->for($book)
                ->create();
        });

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
