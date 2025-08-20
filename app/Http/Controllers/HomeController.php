<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        // Latest posts
        $posts = Post::with('user')->latest()->take(5)->get();

        // Latest products
        $products = Product::latest()->take(5)->get();

        return view('home', compact('posts', 'products'));
    }
}
