<?php


namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->words(rand(2, 4), true);
        $price = fake()->randomFloat(2, 10, 500);
        $salePrice = fake()->boolean(30) ? fake()->randomFloat(2, 5, $price - 1) : null;

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'description' => fake()->paragraphs(3, true),
            'short_description' => fake()->sentence(15),
            'price' => $price,
            'sale_price' => $salePrice,
            'sku' => strtoupper(fake()->unique()->bothify('??###??')),
            'stock_quantity' => fake()->numberBetween(0, 100),
            'image' => 'https://picsum.photos/400/400?random=' . rand(1, 1000),
            'gallery' => fake()->boolean(60) ? [
                'https://picsum.photos/400/400?random=' . rand(1001, 2000),
                'https://picsum.photos/400/400?random=' . rand(2001, 3000),
                'https://picsum.photos/400/400?random=' . rand(3001, 4000),
            ] : null,
            'status' => fake()->randomElement(['active', 'inactive', 'out_of_stock'], [80, 15, 5]),
            'is_featured' => fake()->boolean(25), // 25% featured
            'weight' => fake()->randomFloat(2, 0.1, 50),
            'dimensions' => [
                'length' => fake()->randomFloat(2, 1, 100),
                'width' => fake()->randomFloat(2, 1, 100),
                'height' => fake()->randomFloat(2, 1, 100),
            ],
        ];
    }

    public function featured(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_featured' => true,
            'status' => 'active',
        ]);
    }

    public function onSale(): static
    {
        return $this->state(function (array $attributes) {
            $price = $attributes['price'];
            return [
                'sale_price' => fake()->randomFloat(2, $price * 0.1, $price * 0.8),
            ];
        });
    }
}