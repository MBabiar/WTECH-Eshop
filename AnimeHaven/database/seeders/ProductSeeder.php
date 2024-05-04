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
                'color' => 'red',
                'price' => 100.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'One Piece T-Shirt',
                'description' => 'One Piece T-Shirt description',
                'category' => 'shirt',
                'anime' => 'One Piece',
                'color' => 'yellow',
                'price' => 120.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Dragon Ball T-Shirt',
                'description' => 'Dragon Ball T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Dragon Ball',
                'color' => 'orange',
                'price' => 110.00,
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
                'color' => 'red',
                'price' => 100.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'One Piece Hoodie',
                'description' => 'One Piece Hoodie description',
                'category' => 'hoodie',
                'anime' => 'One Piece',
                'color' => 'yellow',
                'price' => 120.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Dragon Ball Hoodie',
                'description' => 'Dragon Ball Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Dragon Ball',
                'color' => 'orange',
                'price' => 110.00,
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
                'color' => 'red',
                'price' => 100.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'One Piece Hat',
                'description' => 'One Piece Hat description',
                'category' => 'hat',
                'anime' => 'One Piece',
                'color' => 'yellow',
                'price' => 120.00,
                'image' => 'images/tricko-bleach-1.png',
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Dragon Ball Hat',
                'description' => 'Dragon Ball Hat description',
                'category' => 'hat',
                'anime' => 'Dragon Ball',
                'color' => 'orange',
                'price' => 110.00,
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
