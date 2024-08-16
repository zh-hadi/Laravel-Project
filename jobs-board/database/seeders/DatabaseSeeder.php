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
        //\App\Models\Job::factory(20)->create();
        User::factory(100)->create();

        $users = User::all();

        for($i = 0; $i < 20; $i++){
            \App\Models\Employer::factory()->create([
                'user_id' => $users->shuffle()->pop()->id
            ]);
        }

        $employes = \App\Models\Employer::all();

        for($i = 0; $i <200; $i++){
            \App\Models\Job::factory()->create([
                'employer_id' => $employes->random()->id
            ]);
        }


        foreach($users as $user){
            $jobs = \App\Models\Job::inRandomOrder()->take(rand(1, 4))->get();

            foreach($jobs as $job){
                \App\Models\JobApplication::factory()->create([
                    'user_id' => $user->id,
                    'jobs_board_id' => $job->id
                ]);
            }
        }


        User::factory()->create([
            'name' => 'hadi',
            'email' => 'h@g.c'
        ]);
        

    }
}
