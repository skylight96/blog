<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->realText(),
            'excerpt' => fake()->realText(100),
            'slug' => fake()->slug(),
            'status' => fake()->randomElement(['draft', 'published', 'scheduled']),
            'category' => fake()->randomElement(['personal', 'trucking', 'programming', 'content']),
            'body' => fake()->realText(1000),

        ];
    }
}
