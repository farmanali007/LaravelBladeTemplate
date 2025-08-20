<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->words(2, true);
        $colors = ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#06B6D4', '#84CC16', '#F97316'];

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => fake()->sentence(10),
            'color' => fake()->randomElement($colors),
            'icon' => fake()->randomElement(['fas fa-code', 'fas fa-heart', 'fas fa-plane', 'fas fa-utensils', 'fas fa-star']),
            'is_active' => fake()->boolean(90), // 90% chance of being active
        ];
    }
}