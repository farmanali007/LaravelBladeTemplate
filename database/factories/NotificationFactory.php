<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NotificationFactory extends Factory
{
    public function definition(): array
    {
        $types = ['info', 'success', 'warning', 'error'];
        $type = fake()->randomElement($types);

        $titles = [
            'info' => ['New Update Available', 'System Maintenance', 'Welcome Message'],
            'success' => ['Order Completed', 'Payment Successful', 'Account Verified'],
            'warning' => ['Payment Due', 'Profile Incomplete', 'Security Alert'],
            'error' => ['Payment Failed', 'System Error', 'Access Denied'],
        ];

        return [
            'user_id' => User::factory(),
            'title' => fake()->randomElement($titles[$type]),
            'message' => fake()->paragraph(2),
            'type' => $type,
            'is_read' => fake()->boolean(60), // 60% read
            'data' => fake()->boolean(50) ? [
                'action_url' => fake()->url(),
                'action_text' => 'View Details',
                'metadata' => fake()->words(3, true),
            ] : null,
        ];
    }

    public function unread(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_read' => false,
        ]);
    }

    public function withAction(): static
    {
        return $this->state(fn (array $attributes) => [
            'data' => [
                'action_url' => fake()->url(),
                'action_text' => fake()->randomElement(['View Order', 'Update Profile', 'Make Payment', 'View Details']),
                'metadata' => fake()->words(3, true),
            ],
        ]);
    }
}