<?php

namespace Database\Factories;

use App\Models\JobVacancy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobVacancy>
 */
class JobVacancyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(),
            'description' =>fake()->paragraphs(3,true),
            'salary' => fake()->numberBetween(5000, 15000),
            'location' => fake()->city(),
            'category' => fake()->randomElement(JobVacancy::$category),
            'experience' => fake()->randomElement(JobVacancy::$experience)
        ];
    }
}
