@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-purple-600">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="text-center">
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6">
                    Welcome to 
                    <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">
                        {{ $settings['site_name'] ?? 'Laravel Blade Template' }}
                    </span>
                </h1>
                <p class="text-xl text-blue-100 mb-8 max-w-3xl mx-auto">
                    Discover amazing content, explore our products, and join a community of innovators. 
                    Experience the perfect blend of design and functionality.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('posts.index') }}" 
                       class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200 shadow-lg">
                        Explore Posts
                    </a>
                    <a href="{{ route('products.index') }}" 
                       class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors duration-200">
                        View Products
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $posts->count() }}+</h3>
                    <p class="text-gray-600">Quality Posts</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $products->count() }}+</h3>
                    <p class="text-gray-600">Amazing Products</p>
                </div>
                <div class="bg-gray-50 rounded-xl p-8 hover:shadow-lg transition-shadow duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">1000+</h3>
                    <p class="text-gray-600">Happy Users</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Posts Section -->
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Latest Posts</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Discover our latest articles, insights, and stories from our community of writers.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @forelse($posts as $post)
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="h-48 bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2 line-clamp-2">
                                <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-600 transition-colors duration-200">
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center mr-3">
                                    <span class="text-xs font-medium text-gray-600">
                                        {{ strtoupper(substr($post->user->name, 0, 2)) }}
                                    </span>
                                </div>
                                <span>by {{ $post->user->name }}</span>
                                <span class="mx-2">•</span>
                                <time>{{ $post->created_at->diffForHumans() }}</time>
                            </div>
                            <a href="{{ route('posts.show', $post) }}" 
                               class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium transition-colors duration-200">
                                Read more
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No posts yet</h3>
                        <p class="text-gray-500">Check back soon for amazing content!</p>
                    </div>
                @endforelse
            </div>

            @if($posts->count() > 0)
                <div class="text-center">
                    <a href="{{ route('posts.index') }}" 
                       class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 shadow-lg">
                        View All Posts
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <!-- Latest Products Section -->
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Featured Products</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    Explore our curated selection of premium products designed to enhance your experience.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                @forelse($products as $product)
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                        <div class="h-48 bg-gradient-to-r from-purple-400 to-pink-500 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white opacity-50 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">
                                <a href="{{ route('products.show', $product) }}" class="hover:text-purple-600 transition-colors duration-200">
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2">
                                    @if($product->sale_price)
                                        <span class="text-2xl font-bold text-green-600">
                                            ${{ number_format($product->sale_price, 2) }}
                                        </span>
                                        <span class="text-lg text-gray-500 line-through">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                        <span class="bg-red-100 text-red-800 text-xs font-semibold px-2 py-1 rounded-full">
                                            SALE
                                        </span>
                                    @else
                                        <span class="text-2xl font-bold text-gray-900">
                                            ${{ number_format($product->price, 2) }}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <a href="{{ route('products.show', $product) }}" 
                               class="w-full bg-purple-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-purple-700 transition-colors duration-200 inline-block text-center">
                                View Product
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No products available</h3>
                        <p class="text-gray-500">New products coming soon!</p>
                    </div>
                @endforelse
            </div>

            @if($products->count() > 0)
                <div class="text-center">
                    <a href="{{ route('products.index') }}" 
                       class="inline-flex items-center bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors duration-200 shadow-lg">
                        Browse All Products
                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                        </svg>
                    </a>
                </div>
            @endif
        </div>
    </div>
@endsection
