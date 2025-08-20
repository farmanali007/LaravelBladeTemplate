@extends('layouts.app')

@section('content')
    <h1>Orders</h1>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Order #</th>
                <th>User</th>
                <th>Status</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>${{ number_format($order->total_amount, 2) }}</td>
                    <td>{{ ucfirst($order->payment_status) }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('orders.show', $order) }}">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $orders->links() }}
@endsection
