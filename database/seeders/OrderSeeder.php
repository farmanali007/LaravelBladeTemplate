<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $products = Product::all();

        // Create 50 orders
        for ($i = 0; $i < 50; $i++) {
            $order = Order::factory()->create([
                'user_id' => $users->random()->id,
            ]);

            // Add 1-5 items to each order
            $itemCount = rand(1, 5);
            $totalAmount = 0;

            for ($j = 0; $j < $itemCount; $j++) {
                $product = $products->random();
                $quantity = rand(1, 3);
                $unitPrice = $product->sale_price ?? $product->price;
                $totalPrice = $quantity * $unitPrice;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'unit_price' => $unitPrice,
                    'total_price' => $totalPrice,
                ]);

                $totalAmount += $totalPrice;
            }

            // Update order total
            $taxAmount = $totalAmount * 0.08;
            $shippingAmount = $totalAmount > 100 ? 0 : 10;
            $discountAmount = 0;

            $order->update([
                'total_amount' => $totalAmount + $taxAmount + $shippingAmount - $discountAmount,
                'tax_amount' => $taxAmount,
                'shipping_amount' => $shippingAmount,
                'discount_amount' => $discountAmount,
            ]);
        }
    }
}
