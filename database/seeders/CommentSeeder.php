<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::where('status', 'published')->get();
        $users = User::all();

        foreach ($posts as $post) {
            // Create 0-10 comments per post
            $commentCount = rand(0, 10);

            for ($i = 0; $i < $commentCount; $i++) {
                $comment = Comment::factory()->approved()->create([
                    'post_id' => $post->id,
                    'user_id' => $users->random()->id,
                ]);

                // 30% chance of having replies
                if (rand(1, 100) <= 30) {
                    $replyCount = rand(1, 3);
                    for ($j = 0; $j < $replyCount; $j++) {
                        Comment::factory()->approved()->create([
                            'post_id' => $post->id,
                            'user_id' => $users->random()->id,
                            'parent_id' => $comment->id,
                        ]);
                    }
                }
            }
        }
    }
}
