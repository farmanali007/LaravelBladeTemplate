@extends('layouts.app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <p>{{ $post->body }}</p>

    <p>Tags:</p>
    <ul>
        @foreach($post->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>

    <h3>Comments</h3>
    <ul>
        @foreach($post->comments as $comment)
            <li>
                {{ $comment->body }} — by {{ $comment->user->name }}
            </li>
        @endforeach
    </ul>

    @auth
        <a href="{{ route('posts.edit', $post) }}">Edit Post</a>
    @endauth
@endsection
