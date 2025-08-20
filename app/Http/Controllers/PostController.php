<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with(['user', 'category', 'tags'])->latest()->paginate(10);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        // eager load relationships
        $post->load(['user', 'category', 'tags', 'comments.user']);

        return view('posts.show', compact('post'));
    }
}
