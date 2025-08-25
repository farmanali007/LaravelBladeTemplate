@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <!-- Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-blue-200 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <a href="{{ route('posts.index') }}" class="ml-1 text-blue-200 hover:text-white transition-colors duration-200 md:ml-2">Posts</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="ml-1 text-blue-100 md:ml-2 font-medium">{{ Str::limit($post->title, 50) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Post Header -->
            <div class="text-center">
                @if($post->category)
                    <span class="bg-blue-500 bg-opacity-50 text-blue-100 text-sm font-semibold px-3 py-1 rounded-full mb-4 inline-block">
                        {{ $post->category->name }}
                    </span>
                @endif
                
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight">
                    {{ $post->title }}
                </h1>
                
                <!-- Author & Meta Info -->
                <div class="flex flex-col sm:flex-row items-center justify-center space-y-2 sm:space-y-0 sm:space-x-6 text-blue-100">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                            <span class="text-white font-bold text-sm">
                                {{ strtoupper(substr($post->user->name, 0, 2)) }}
                            </span>
                        </div>
                        <span class="font-medium">{{ $post->user->name }}</span>
                    </div>
                    <div class="flex items-center space-x-4 text-sm">
                        <time class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            {{ $post->created_at->format('F j, Y') }}
                        </time>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ ceil(str_word_count(strip_tags($post->content ?? $post->body ?? '')) / 200) }} min read
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-12">
            <!-- Article Content -->
            <article class="lg:col-span-3">
                <!-- Post Content -->
                <div class="prose prose-lg max-w-none mb-12">
                    <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                        @if($post->content)
                            {!! nl2br(e($post->content)) !!}
                        @elseif($post->body)
                            {!! nl2br(e($post->body)) !!}
                        @else
                            <p class="text-gray-600">No content available for this post.</p>
                        @endif
                    </div>
                </div>

                <!-- Tags -->
                @if($post->tags && $post->tags->count() > 0)
                    <div class="mb-12">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Tags</h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                                <span class="bg-blue-100 text-blue-800 text-sm font-medium px-3 py-1 rounded-full hover:bg-blue-200 transition-colors duration-200">
                                    #{{ $tag->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Social Share -->
                <div class="bg-gray-50 rounded-xl p-6 mb-12">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Share this post</h3>
                    <div class="flex space-x-4">
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                            </svg>
                            Twitter
                        </button>
                        <button class="bg-blue-800 hover:bg-blue-900 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </button>
                        <button class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            LinkedIn
                        </button>
                    </div>
                </div>

                <!-- Comments Section -->
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Comments ({{ $post->comments->count() }})
                    </h3>
                    
                    @forelse($post->comments as $comment)
                        <div class="border-b border-gray-200 pb-6 mb-6 last:border-b-0 last:pb-0 last:mb-0">
                            <div class="flex items-start space-x-4">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center flex-shrink-0">
                                    <span class="text-white font-bold text-sm">
                                        {{ strtoupper(substr($comment->user->name, 0, 2)) }}
                                    </span>
                                </div>
                                <div class="flex-1">
                                    <div class="flex items-center space-x-2 mb-2">
                                        <h4 class="font-semibold text-gray-900">{{ $comment->user->name }}</h4>
                                        <time class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</time>
                                    </div>
                                    <p class="text-gray-700 leading-relaxed">{{ $comment->body }}</p>
                                    
                                    <!-- Comment Actions -->
                                    <div class="flex items-center space-x-4 mt-3">
                                        <button class="text-gray-500 hover:text-blue-600 text-sm font-medium transition-colors duration-200">
                                            <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                            </svg>
                                            Like
                                        </button>
                                        <button class="text-gray-500 hover:text-blue-600 text-sm font-medium transition-colors duration-200">
                                            Reply
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                            <h4 class="text-lg font-medium text-gray-900 mb-2">No comments yet</h4>
                            <p class="text-gray-500">Be the first to share your thoughts!</p>
                        </div>
                    @endforelse

                    <!-- Comment Form -->
                    @auth
                        <div class="mt-8 border-t border-gray-200 pt-6">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Leave a comment</h4>
                            <form class="space-y-4">
                                <div>
                                    <textarea rows="4" 
                                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none" 
                                              placeholder="Share your thoughts..."></textarea>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="text-sm text-gray-500">
                                        <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Please be respectful and constructive.
                                    </div>
                                    <button type="submit" 
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200">
                                        Post Comment
                                    </button>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="mt-8 border-t border-gray-200 pt-6 text-center">
                            <p class="text-gray-600 mb-4">Please sign in to leave a comment</p>
                            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-medium transition-colors duration-200 inline-block">
                                Sign In
                            </a>
                        </div>
                    @endauth
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:col-span-1">
                <!-- Author Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                    <div class="text-center">
                        <div class="w-20 h-20 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="text-white font-bold text-lg">
                                {{ strtoupper(substr($post->user->name, 0, 2)) }}
                            </span>
                        </div>
                        <h3 class="font-semibold text-gray-900 mb-2">{{ $post->user->name }}</h3>
                        <p class="text-sm text-gray-600 mb-4">Content Creator</p>
                        <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-medium transition-colors duration-200">
                            Follow
                        </button>
                    </div>
                </div>

                <!-- Actions -->
                @auth
                    <div class="bg-white rounded-xl shadow-lg p-6 mb-8">
                        <h3 class="font-semibold text-gray-900 mb-4">Actions</h3>
                        <div class="space-y-2">
                            <a href="{{ route('posts.edit', $post) }}" 
                               class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-medium transition-colors duration-200 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit Post
                            </a>
                        </div>
                    </div>
                @endauth

                <!-- Related Posts -->
                <div class="bg-white rounded-xl shadow-lg p-6">
                    <h3 class="font-semibold text-gray-900 mb-4">Related Posts</h3>
                    <div class="space-y-4">
                        @for($i = 1; $i <= 3; $i++)
                            <a href="#" class="block group">
                                <div class="flex space-x-3">
                                    <div class="w-16 h-16 bg-gradient-to-r from-purple-400 to-pink-400 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-sm font-medium text-gray-900 group-hover:text-blue-600 transition-colors duration-200 line-clamp-2">
                                            Related Post Title {{ $i }}
                                        </h4>
                                        <p class="text-xs text-gray-500 mt-1">2 days ago</p>
                                    </div>
                                </div>
                            </a>
                        @endfor
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <!-- Back to Posts -->
    <div class="bg-gray-50 py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <a href="{{ route('posts.index') }}" 
               class="inline-flex items-center bg-blue-600 text-white px-6 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors duration-200 shadow-lg">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Back to All Posts
            </a>
        </div>
    </div>
@endsection
