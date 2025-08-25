@extends('layouts.app')

@section('content')
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-white mb-4">
                    Explore Our Posts
                </h1>
                <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                    Discover insights, stories, and knowledge shared by our community of writers and experts.
                </p>
            </div>
        </div>
    </div>

    <!-- Posts Grid -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @forelse($posts as $post)
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8 mb-8">
                @foreach($posts as $post)
                    <article class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group">
                        <!-- Post Image/Header -->
                        <div class="h-48 bg-gradient-to-r from-blue-400 via-purple-500 to-pink-500 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-black opacity-20 group-hover:opacity-30 transition-opacity duration-300"></div>
                            <svg class="w-16 h-16 text-white opacity-50 group-hover:scale-110 transition-transform duration-300 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>

                        <!-- Post Content -->
                        <div class="p-6">
                            <!-- Category & Date -->
                            <div class="flex items-center justify-between mb-3">
                                @if($post->category)
                                    <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-3 py-1 rounded-full">
                                        {{ $post->category->name }}
                                    </span>
                                @endif
                                <time class="text-sm text-gray-500">
                                    {{ $post->created_at->format('M j, Y') }}
                                </time>
                            </div>

                            <!-- Post Title -->
                            <h3 class="text-xl font-bold text-gray-900 mb-3 line-clamp-2 group-hover:text-blue-600 transition-colors duration-200">
                                <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                    {{ $post->title }}
                                </a>
                            </h3>

                            <!-- Post Excerpt -->
                            @if($post->content)
                                <p class="text-gray-600 mb-4 line-clamp-3">
                                    {{ Str::limit(strip_tags($post->content), 120) }}
                                </p>
                            @endif

                            <!-- Author Info -->
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                        <span class="text-white font-bold text-sm">
                                            {{ strtoupper(substr($post->user->name, 0, 2)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $post->user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
                                    </div>
                                </div>

                                <!-- Read More Link -->
                                <a href="{{ route('posts.show', $post) }}" 
                                   class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium text-sm group-hover:translate-x-1 transition-all duration-200">
                                    Read more
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>

                            <!-- Tags -->
                            @if($post->tags && $post->tags->count() > 0)
                                <div class="flex flex-wrap gap-2 mt-4">
                                    @foreach($post->tags->take(3) as $tag)
                                        <span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded-md">
                                            #{{ $tag->name }}
                                        </span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Pagination -->
            @if(method_exists($posts, 'links'))
                <div class="mt-12">
                    {{ $posts->links() }}
                </div>
            @endif

        @empty
            <!-- Empty State -->
            <div class="text-center py-16">
                <div class="max-w-md mx-auto">
                    <svg class="w-24 h-24 text-gray-300 mx-auto mb-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">No Posts Found</h3>
                    <p class="text-gray-600 mb-8">
                        We haven't published any posts yet. Check back soon for amazing content!
                    </p>
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Back to Home
                    </a>
                </div>
            </div>
        @endforelse

        <!-- Call to Action -->
        @if($posts->count() > 0)
            <div class="bg-gray-50 rounded-2xl p-8 mt-16 text-center">
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Want to stay updated?</h3>
                <p class="text-gray-600 mb-6 max-w-2xl mx-auto">
                    Subscribe to our newsletter and never miss our latest posts, insights, and updates.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center max-w-md mx-auto">
                    <input type="email" 
                           placeholder="Enter your email address" 
                           class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit" 
                            class="bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 whitespace-nowrap">
                        Subscribe
                    </button>
                </div>
            </div>
        @endif
    </div>
@endsection
