<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobVacancy;
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
            'name' => 'Akshay',
            'email' => 'akshay@gmail.com'
        ]);
       User::factory(200)->create();

        $users = User::all()->shuffle();

        for($i = 0 ; $i <=20 ; $i++){
            Employer::factory()->create([
            'user_id' =>  $users->pop()->id

            ]);
        }
        $employers = Employer::all();

        for($i = 0 ; $i <= 100 ; $i ++){
        JobVacancy::factory()->create([
            'employer_id' => $employers->random()->id,
        ]);
        }

        foreach($users as $user){

            $jobVacancies = JobVacancy::inRandomOrder()->take(rand(1,4))->get();

            foreach($jobVacancies as $jobVacancy){
                JobApplication::factory()->create([
                    'user_id' => $user->id,
                    'job_vacancy_id' => $jobVacancy->id
                ]);
            }
        }
    }
}
