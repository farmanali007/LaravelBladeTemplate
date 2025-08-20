<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

use App\Http\Controllers\OrderController;

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
