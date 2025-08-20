<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [
            ['name' => 'Laravel', 'color' => '#FF2D20'],
            ['name' => 'PHP', 'color' => '#777BB4'],
            ['name' => 'JavaScript', 'color' => '#F7DF1E'],
            ['name' => 'Vue.js', 'color' => '#4FC08D'],
            ['name' => 'React', 'color' => '#61DAFB'],
            ['name' => 'Tutorial', 'color' => '#6366F1'],
            ['name' => 'Beginner', 'color' => '#10B981'],
            ['name' => 'Advanced', 'color' => '#EF4444'],
            ['name' => 'Tips', 'color' => '#F59E0B'],
            ['name' => 'Guide', 'color' => '#8B5CF6'],
            ['name' => 'Review', 'color' => '#06B6D4'],
            ['name' => 'News', 'color' => '#84CC16'],
        ];

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag['name'],
                'slug' => Str::slug($tag['name']),
                'color' => $tag['color'],
            ]);
        }

        // Create additional random tags
        Tag::factory(18)->create();
    }
}
