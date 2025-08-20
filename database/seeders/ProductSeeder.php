<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create some specific products
        $specificProducts = [
            [
                'name' => 'Complete Laravel Course',
                'description' => 'Master Laravel from basics to advanced concepts with this comprehensive course.',
                'short_description' => 'Learn Laravel with hands-on projects and real-world examples.',
                'price' => 99.99,
                'sale_price' => 79.99,
                'is_featured' => true,
            ],
            [
                'name' => 'PHP Developer Handbook',
                'description' => 'Essential PHP reference book for developers of all levels.',
                'short_description' => 'Complete PHP reference with modern best practices.',
                'price' => 29.99,
                'sale_price' => null,
                'is_featured' => false,
            ],
            [
                'name' => 'Web Development Toolkit',
                'description' => 'Everything you need to start your web development journey.',
                'short_description' => 'Complete toolkit for modern web development.',
                'price' => 199.99,
                'sale_price' => 149.99,
                'is_featured' => true,
            ],
        ];

        foreach ($specificProducts as $productData) {
            Product::factory()->create($productData);
        }

        // Create random products
        Product::factory(47)->create(); // Total 50 products

        // Create some featured products
        Product::factory(10)->featured()->create();

        // Create some products on sale
        Product::factory(15)->onSale()->create();
    }
}
