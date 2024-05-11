<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use App\Models\Variant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductSeeder extends Seeder
{
    /**
     * Get shirts data.
     */
    public function get_shirts(): array
    {
        return [
            [
                'name' => 'Naruto T-Shirt Black',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto T-Shirt Black V2',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto T-Shirt White',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto T-Shirt White V2',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto T-Shirt Blue',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto T-Shirt Blue V2',
                'description' => 'Naruto T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Naruto',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach T-Shirt Black',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach T-Shirt Black V2',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach T-Shirt White',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach T-Shirt White V2',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach T-Shirt Blue',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach T-Shirt Blue V2',
                'description' => 'Bleach T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Bleach',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note T-Shirt Black',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'Black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note T-Shirt Black V2',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'Black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note T-Shirt White',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'White',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note T-Shirt White V2',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'White',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note T-Shirt Blue',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note T-Shirt Blue V2',
                'description' => 'Death Note T-Shirt description',
                'category' => 'shirt',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ]
        ];
    }

    /**
     * Get hoodies data.
     */
    public function get_hoodies(): array
    {
        return [
            [
                'name' => 'Naruto Hoodie Black',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto Hoodie Black V2',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto Hoodie White',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto Hoodie White V2',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto Hoodie Blue',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Naruto Hoodie Blue V2',
                'description' => 'Naruto Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Naruto',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach Hoodie Black',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach Hoodie Black V2',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach Hoodie White',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach Hoodie White V2',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach Hoodie Blue',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Bleach Hoodie Blue V2',
                'description' => 'Bleach Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Bleach',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note Hoodie Black',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'Black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note Hoodie Black V2',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'Black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note Hoodie White',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'White',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note Hoodie White V2',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'White',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note Hoodie Blue',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ],
            [
                'name' => 'Death Note Hoodie Blue V2',
                'description' => 'Death Note Hoodie description',
                'category' => 'hoodie',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]
            ]
        ];
    }

    /**
     * Get hats data.
     */
    public function get_hats(): array
    {
        return [
            [
                'name' => 'Naruto Hat Black',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Naruto Hat Black V2',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Naruto Hat White',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Naruto Hat White V2',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Naruto Hat Blue',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Naruto Hat Blue V2',
                'description' => 'Naruto Hat description',
                'category' => 'hat',
                'anime' => 'Naruto',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Bleach Hat Black',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Bleach Hat Black V2',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Bleach Hat White',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Bleach Hat White V2',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'white',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Bleach Hat Blue',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Bleach Hat Blue V2',
                'description' => 'Bleach Hat description',
                'category' => 'hat',
                'anime' => 'Bleach',
                'color' => 'blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Death Note Hat Black',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'Black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Death Note Hat Black V2',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'Black',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Death Note Hat White',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'White',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Death Note Hat White V2',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'White',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Death Note Hat Blue',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

            ],
            [
                'name' => 'Death Note Hat Blue V2',
                'description' => 'Death Note Hat description',
                'category' => 'hat',
                'anime' => 'Death Note',
                'color' => 'Blue',
                'images' => [
                    'images/tricko-bleach-1.png',
                    'images/tricko-bleach-2.png',
                ]

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

        // Define the sizes for each product type
        $sizes = [
            'shirt' => ['S', 'M', 'L', 'XL'],
            'hoodie' => ['S', 'M', 'L', 'XL'],
            'hat' => ['A'],
        ];

        // Add a random price, popularity, and variants to each product type
        $productTypes = ['shirt' => &$shirts, 'hoodie' => &$hoodies, 'hat' => &$hats];
        foreach ($productTypes as $productType => &$products) {
            foreach ($products as &$product) {
                $product['price'] = rand(1000, 6000) / 100;
                $product['popularity'] = rand(1, 100);

                // Add variants to each product
                foreach ($sizes[$productType] as $size) {
                    $product['variants'][] = [
                        'size' => $size,
                        'stock' => rand(0, 10),
                    ];
                }
            }
            unset($product);
        }
        unset($products);

        $products = array_merge($shirts, $hoodies, $hats);

        foreach ($products as $product) {
            $variants = $product['variants'];
            unset($product['variants']);
            $images = $product['images'];
            unset($product['images']);

            $product = Product::factory()->create($product);
            $directory = public_path("images/product/{$product->id}");

            // Delete the directory if it already exists
            if (File::isDirectory($directory)) {
                File::deleteDirectory($directory);
            }
            // Create the directory
            File::makeDirectory($directory, 0755, true);

            foreach ($variants as $variant) {
                Variant::factory()->create([
                    'product_id' => $product->id,
                    'size' => $variant['size'],
                    'stock' => $variant['stock'],
                ]);
            }
            foreach ($images as $image) {
                $sourcePath = public_path($image);
                $imagePath = "{$directory}/" . basename($image);
                $relativePath = "images/product/{$product->id}/" . basename($image);

                File::copy($sourcePath, $imagePath);

                Image::factory()->create([
                    'product_id' => $product->id,
                    'image' => $relativePath,
                ]);
            }
        }
    }
}
