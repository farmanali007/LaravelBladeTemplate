@extends('layouts.app')

@section('content')
    <h1>Order #{{ $order->order_number }}</h1>
    <p>User: {{ $order->user->name }}</p>
    <p>Status: {{ ucfirst($order->status) }}</p>
    <p>Total: ${{ number_format($order->total_amount, 2) }}</p>
    <p>Payment: {{ ucfirst($order->payment_status) }} ({{ $order->payment_method ?? 'N/A' }})</p>

    <h3>Items</h3>
    <ul>
        @foreach($order->items as $item)
            <li>
                {{ $item->product->name }} —
                {{ $item->quantity }} × ${{ number_format($item->unit_price, 2) }} =
                ${{ number_format($item->total_price, 2) }}
            </li>
        @endforeach
    </ul>
@endsection
