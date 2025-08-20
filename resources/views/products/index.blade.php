@extends('layouts.app')

@section('content')
    <h1>All Products</h1>

    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product) }}">
                    {{ $product->name }}
                </a>
                - ${{ number_format($product->price, 2) }}
                @if($product->sale_price)
                    (On Sale: ${{ number_format($product->sale_price, 2) }})
                @endif
            </li>
        @endforeach
    </ul>

    {{ $products->links() }} {{-- pagination --}}
@endsection
