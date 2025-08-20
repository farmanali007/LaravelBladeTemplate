<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(rand(4, 8));
        $isPublished = fake()->boolean(70); // 70% chance of being published

        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'title' => $title,
            'slug' => Str::slug($title),
            'excerpt' => fake()->paragraph(2),
            'content' => fake()->paragraphs(rand(5, 15), true),
            'featured_image' => fake()->boolean(60) ? 'https://picsum.photos/800/600?random=' . rand(1, 1000) : null,
            'status' => $isPublished ? 'published' : fake()->randomElement(['draft', 'published', 'archived']),
            'is_featured' => fake()->boolean(20), // 20% chance of being featured
            'views_count' => fake()->numberBetween(0, 10000),
            'published_at' => $isPublished ? fake()->dateTimeBetween('-6 months', 'now') : null,
        ];
    }

    public function published(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'published',
            'published_at' => fake()->dateTimeBetween('-6 months', 'now'),
        ]);
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
        ]);
    }
}