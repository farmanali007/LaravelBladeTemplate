<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Technology',
                'slug' => 'technology',
                'description' => 'Latest tech trends, programming, and digital innovations',
                'color' => '#3B82F6',
                'icon' => 'fas fa-laptop-code',
            ],
            [
                'name' => 'Health & Wellness',
                'slug' => 'health-wellness',
                'description' => 'Health tips, fitness guides, and wellness advice',
                'color' => '#10B981',
                'icon' => 'fas fa-heart',
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'description' => 'Travel guides, destination reviews, and adventure stories',
                'color' => '#F59E0B',
                'icon' => 'fas fa-plane',
            ],
            [
                'name' => 'Food & Recipes',
                'slug' => 'food-recipes',
                'description' => 'Delicious recipes, cooking tips, and food reviews',
                'color' => '#EF4444',
                'icon' => 'fas fa-utensils',
            ],
            [
                'name' => 'Lifestyle',
                'slug' => 'lifestyle',
                'description' => 'Personal development, productivity, and life hacks',
                'color' => '#8B5CF6',
                'icon' => 'fas fa-star',
            ],
            [
                'name' => 'Business',
                'slug' => 'business',
                'description' => 'Entrepreneurship, business strategies, and market insights',
                'color' => '#06B6D4',
                'icon' => 'fas fa-briefcase',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

        // Create some additional random categories
        Category::factory(4)->create();
    }
}
