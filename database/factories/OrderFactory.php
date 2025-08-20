<?php
namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        $subtotal = fake()->randomFloat(2, 20, 500);
        $taxRate = 0.08; // 8% tax
        $taxAmount = $subtotal * $taxRate;
        $shippingAmount = fake()->randomFloat(2, 0, 25);
        $discountAmount = fake()->boolean(30) ? fake()->randomFloat(2, 5, 50) : 0;
        $totalAmount = $subtotal + $taxAmount + $shippingAmount - $discountAmount;

        return [
            'user_id' => User::factory(),
            'order_number' => 'ORD-' . strtoupper(fake()->bothify('####??##')),
            'status' => fake()->randomElement(['pending', 'processing', 'shipped', 'delivered', 'cancelled'], [10, 20, 30, 35, 5]),
            'total_amount' => $totalAmount,
            'tax_amount' => $taxAmount,
            'shipping_amount' => $shippingAmount,
            'discount_amount' => $discountAmount,
            'payment_status' => fake()->randomElement(['pending', 'paid', 'failed', 'refunded'], [15, 70, 10, 5]),
            'payment_method' => fake()->randomElement(['credit_card', 'paypal', 'stripe', 'bank_transfer']),
            'notes' => fake()->boolean(30) ? fake()->sentence() : null,
            'shipping_address' => [
                'name' => fake()->name(),
                'street' => fake()->streetAddress(),
                'city' => fake()->city(),
                'state' => fake()->state(),
                'zip' => fake()->postcode(),
                'country' => fake()->country(),
            ],
            'billing_address' => [
                'name' => fake()->name(),
                'street' => fake()->streetAddress(),
                'city' => fake()->city(),
                'state' => fake()->state(),
                'zip' => fake()->postcode(),
                'country' => fake()->country(),
            ],
        ];
    }

    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'delivered',
            'payment_status' => 'paid',
        ]);
    }
}