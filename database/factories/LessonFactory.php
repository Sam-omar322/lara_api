<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id' => User::factory()->create(),

            // create user id randomly between 1 - 10 for user already exist
            'user_id' => fake()->numberBetween(1, 10),
            'title' => fake()->word,
            'body' => fake()->paragraph,
        ];
    }
}
