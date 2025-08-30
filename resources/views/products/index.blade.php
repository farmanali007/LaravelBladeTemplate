@extends('layouts.app')

@section('content')
    <!-- Header Section -->

    <div class="bg-gradient-to-r from-blue-600 to-purple-600">

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4">
                    Our Products
                </h1>
                <p class="text-xl text-purple-100 max-w-2xl mx-auto">
                    Discover our carefully curated collection of premium products designed to enhance your lifestyle.
                </p>
            </div>
        </div>
    </div>

    <!-- Filters & Search Bar -->
    <div class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- Search Bar -->
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <input type="text"
                               placeholder="Search products..."
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Filter Buttons -->
                <div class="flex items-center space-x-4">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option>Sort by</option>
                        <option>Price: Low to High</option>
                        <option>Price: High to Low</option>
                        <option>Newest</option>
                        <option>Most Popular</option>
                    </select>
                    <button class="bg-gray-100 hover:bg-gray-200 px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"></path>
                        </svg>
                        Filters
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Products Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @forelse($products as $product)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                    <!-- Product Image -->
                    <div class="relative h-64 bg-gradient-to-br from-purple-400 via-pink-400 to-red-400 overflow-hidden">
                        @if($product->sale_price)
                            <div class="absolute top-4 left-4 z-10">
                                <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                    SALE
                                </span>
                            </div>
                        @endif

                        <div class="absolute top-4 right-4 z-10">
                            <button class="w-8 h-8 bg-white bg-opacity-80 rounded-full flex items-center justify-center hover:bg-opacity-100 transition-all duration-200">
                                <svg class="w-4 h-4 text-gray-600 hover:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                        </div>

                        <div class="flex items-center justify-center h-full">
                            <svg class="w-20 h-20 text-white opacity-50 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                        </div>
                    </div>

                    <!-- Product Details -->
                    <div class="p-6">
                        <!-- Product Title -->
                        <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors duration-200">
                            <a href="{{ route('products.show', $product) }}" class="hover:underline">
                                {{ $product->name }}
                            </a>
                        </h3>

                        <!-- Product Description -->
                        @if($product->description)
                            <p class="text-sm text-gray-600 mb-3 line-clamp-2">
                                {{ Str::limit($product->description, 80) }}
                            </p>
                        @endif

                        <!-- Price -->
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-2">
                                @if($product->sale_price)
                                    <span class="text-xl font-bold text-green-600">
                                        ${{ number_format($product->sale_price, 2) }}
                                    </span>
                                    <span class="text-sm text-gray-500 line-through">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                    <span class="text-xs text-red-600 font-semibold">
                                        {{ round((($product->price - $product->sale_price) / $product->price) * 100) }}% OFF
                                    </span>
                                @else
                                    <span class="text-xl font-bold text-gray-900">
                                        ${{ number_format($product->price, 2) }}
                                    </span>
                                @endif
                            </div>

                            <!-- Rating Stars -->
                            <div class="flex items-center">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                @endfor
                                <span class="text-xs text-gray-500 ml-1">(4.0)</span>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex space-x-2">
                            <button class="flex-1 bg-purple-600 text-white py-2 px-4 rounded-lg font-medium hover:bg-purple-700 transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17M17 13v4a2 2 0 01-2 2H9a2 2 0 01-2-2v-4m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01"></path>
                                </svg>
                                Add to Cart
                            </button>
                            <a href="{{ route('products.show', $product) }}"
                               class="bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors duration-200 flex items-center justify-center">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <!-- Empty State -->
                <div class="col-span-full text-center py-16">
                    <div class="max-w-md mx-auto">
                        <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                        <h3 class="text-2xl font-bold text-gray-900 mb-4">No Products Found</h3>
                        <p class="text-gray-600 mb-8">
                            We're currently updating our inventory. Check back soon for amazing products!
                        </p>
                        <a href="{{ route('home') }}"
                           class="inline-flex items-center bg-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors duration-200 shadow-lg">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Back to Home
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if(method_exists($products, 'links') && $products->hasPages())
            <div class="mt-12 flex justify-center">
                {{ $products->links() }}
            </div>
        @endif

        <!-- Newsletter Signup -->
        @if($products->count() > 0)
            <div class="bg-gradient-to-r from-purple-600 to-pink-600 rounded-2xl p-8 mt-16 text-center text-white">
                <h3 class="text-2xl font-bold mb-4">Stay in the Loop!</h3>
                <p class="mb-6 max-w-2xl mx-auto opacity-90">
                    Be the first to know about new products, exclusive deals, and special promotions.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                    <input type="email"
                           placeholder="Enter your email address"
                           class="flex-1 px-4 py-3 rounded-lg text-gray-900 focus:ring-2 focus:ring-white focus:outline-none">
                    <button type="submit"
                            class="bg-white text-purple-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors duration-200 whitespace-nowrap">
                        Subscribe
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection
