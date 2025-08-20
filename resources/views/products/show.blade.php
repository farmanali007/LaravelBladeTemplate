@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>

    <p><strong>SKU:</strong> {{ $product->sku }}</p>
    <p><strong>Status:</strong> {{ ucfirst($product->status) }}</p>
    <p><strong>Stock:</strong> {{ $product->stock_quantity }}</p>

    <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
    @if($product->sale_price)
        <p><strong>Sale Price:</strong> ${{ number_format($product->sale_price, 2) }}</p>
    @endif

    <p>{{ $product->description }}</p>
@endsection
