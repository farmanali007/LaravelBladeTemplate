<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $categories = Category::all();
        $tags = Tag::all();

        // Create 100 posts with random assignments
        Post::factory(100)->create([
            'user_id' => $users->random()->id,
            'category_id' => $categories->random()->id,
        ])->each(function ($post) use ($tags) {
            // Attach 1-5 random tags to each post
            $post->tags()->attach(
                $tags->random(rand(1, 5))->pluck('id')->toArray()
            );
        });

        // Create some specific featured posts
        Post::factory(10)->featured()->published()->create([
            'user_id' => $users->random()->id,
            'category_id' => $categories->random()->id,
        ])->each(function ($post) use ($tags) {
            $post->tags()->attach(
                $tags->random(rand(2, 4))->pluck('id')->toArray()
            );
        });
    }
}
