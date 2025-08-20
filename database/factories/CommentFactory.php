<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        return [
            'post_id' => Post::factory(),
            'user_id' => User::factory(),
            'parent_id' => null, // Will be set for replies
            'content' => fake()->paragraph(rand(1, 3)),
            'status' => fake()->randomElement(['pending', 'approved', 'rejected'], [10, 80, 10]), // 80% approved
        ];
    }

    public function approved(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'approved',
        ]);
    }

    public function reply(): static
    {
        return $this->state(fn (array $attributes) => [
            'parent_id' => 1, // Will be overridden in seeder
        ]);
    }
}