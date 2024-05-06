<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function get_shirts(): array
    {
        return [
            [
                'name' => 'Naruto T-Shirt Black',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto T-Shirt Black V2',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 5,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto T-Shirt White',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'white',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 7,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto T-Shirt White V2',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'white',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto T-Shirt Blue',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'blue',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 9,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto T-Shirt Blue V2',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'blue',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach T-Shirt Black',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'black',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach T-Shirt Black V2',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'black',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 5,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach T-Shirt White',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 7,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach T-Shirt White V2',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach T-Shirt Blue',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'blue',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach T-Shirt Blue V2',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'blue',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note T-Shirt Black',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'Black',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 4,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note T-Shirt Black V2',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'Black',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 5,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note T-Shirt White',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'White',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note T-Shirt White V2',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'White',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note T-Shirt Blue',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note T-Shirt Blue V2',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 6,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ]
        ];
    }

    public function get_hoodies(): array
    {
        return [
            [
                'name' => 'Naruto Hoodie Black',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto Hoodie Black V2',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto Hoodie White',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'white',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto Hoodie White V2',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'white',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 5,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto Hoodie Blue',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'blue',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 6,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Naruto Hoodie Blue V2',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'blue',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 7,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach Hoodie Black',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'black',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 8,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach Hoodie Black V2',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'black',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 9,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach Hoodie White',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach Hoodie White V2',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach Hoodie Blue',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'blue',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 4,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Bleach Hoodie Blue V2',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'blue',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note Hoodie Black',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'Black',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 6,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note Hoodie Black V2',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'Black',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 7,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note Hoodie White',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'White',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note Hoodie White V2',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'White',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note Hoodie Blue',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ],
            [
                'name' => 'Death Note Hoodie Blue V2',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'S', 'stock' => 5],
                    ['size' => 'M', 'stock' => 8],
                    ['size' => 'L', 'stock' => 10],
                    ['size' => 'XL', 'stock' => 12],
                ],
            ]
        ];
    }

    public function get_hats(): array
    {
        return [
            [
                'name' => 'Naruto Hat Black',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 4,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Naruto Hat Black V2',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'black',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Naruto Hat White',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'white',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Naruto Hat White V2',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'white',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Naruto Hat Blue',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'blue',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Naruto Hat Blue V2',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'blue',
                'price' => 25.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Bleach Hat Black',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'black',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 6,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Bleach Hat Black V2',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'black',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Bleach Hat White',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Bleach Hat White V2',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'white',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Bleach Hat Blue',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'blue',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 7,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Bleach Hat Blue V2',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'blue',
                'price' => 30.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Death Note Hat Black',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'Black',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 4,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Death Note Hat Black V2',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'Black',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 6,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Death Note Hat White',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'White',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Death Note Hat White V2',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'White',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 2,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Death Note Hat Blue',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 3,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ],
            [
                'name' => 'Death Note Hat Blue V2',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'price' => 50.00,
                'image' => 'images/tricko-bleach-1.png',
                'popularity' => 1,
                'variants' => [
                    ['size' => 'A', 'stock' => 10]
                ],
            ]
        ];
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shirts = $this->get_shirts();
        $hoodies = $this->get_hoodies();
        $hats = $this->get_hats();
        $products = array_merge($shirts, $hoodies, $hats);

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
