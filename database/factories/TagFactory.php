<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TagFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->word();
        $colors = ['#FF2D20', '#777BB4', '#F7DF1E', '#4FC08D', '#6366F1', '#10B981', '#EF4444'];

        return [
            'name' => ucfirst($name),
            'slug' => Str::slug($name),
            'color' => fake()->randomElement($colors),
        ];
    }
}