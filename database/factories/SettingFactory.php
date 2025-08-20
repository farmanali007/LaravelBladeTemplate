<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SettingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'key_name' => fake()->unique()->slug(2, '_'),
            'value' => fake()->sentence(),
            'type' => fake()->randomElement(['string', 'integer', 'boolean', 'json']),
            'description' => fake()->sentence(10),
        ];
    }

    public function string(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'string',
            'value' => fake()->sentence(),
        ]);
    }

    public function integer(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'integer',
            'value' => fake()->numberBetween(1, 100),
        ]);
    }

    public function boolean(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'boolean',
            'value' => fake()->boolean() ? 'true' : 'false',
        ]);
    }

    public function json(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'json',
            'value' => json_encode([
                'key1' => fake()->word(),
                'key2' => fake()->numberBetween(1, 100),
                'key3' => fake()->boolean(),
            ]),
        ]);
    }
}