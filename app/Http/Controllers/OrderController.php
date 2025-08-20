<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    // Show all orders
    public function index()
    {
        $orders = Order::with('user')->latest()->paginate(10);

        return view('orders.index', compact('orders'));
    }

    // Show single order with items
    public function show(Order $order)
    {
        // eager load items and products
        $order->load(['items.product', 'user']);

        return view('orders.show', compact('order'));
    }
}
