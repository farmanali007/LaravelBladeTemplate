@extends('layouts.app')

@section('content')
    <h1>Welcome to the Homepage</h1>

    <h2>Latest Posts</h2>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a>
                by {{ $post->user->name }}
            </li>
        @endforeach
    </ul>

    <h2>Latest Products</h2>
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product) }}">{{ $product->name }}</a>
                - ${{ number_format($product->price, 2) }}
            </li>
        @endforeach
    </ul>
@endsection
