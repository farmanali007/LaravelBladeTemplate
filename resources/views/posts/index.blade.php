@extends('layouts.app')

@section('content')
    <h1>Posts</h1>

    @forelse($posts as $post)
        <div>
            <h2>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
            </h2>
            <p>By {{ $post->user->name }}</p>
        </div>
    @empty
        <p>No posts found.</p>
    @endforelse
@endsection
