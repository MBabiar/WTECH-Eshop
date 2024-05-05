<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Shirts
            [
                'name' => 'Naruto T-Shirt',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach T-Shirt',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note T-Shirt',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],

            // Hoodies
            [
                'name' => 'Naruto Hoodie',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach Hoodie',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note Hoodie',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],

            // Hats
            [
                'name' => 'Naruto Hat',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Bleach Hat',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Death Note Hat',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
        ];

        foreach ($products as $product) {
            $variants = $product['variants'];
            unset($product['variants']);

            $product = Product::factory()->create($product);

            foreach ($variants as $variant) {
                Variant::factory()->create([
                    'product_id' => $product->id,
                    'size' => $variant['size'],
                    'stock' => $variant['stock'],
                ]);
            }
        }
    }
}
