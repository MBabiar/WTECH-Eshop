<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\AddImageProductRequest;
use App\Http\Requests\Product\DestroyImageProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $category, Request $request)
    {
        $anime = $request->input('anime', null);
        $color = $request->input('color', null);
        $price_min = intval($request->input('price_min') ?? 0);
        $price_max = intval($request->input('price_max') ?? 100);
        $sort = $request->input('sort') ?? 'popularity';
        $page = $request->input('page') ?? 1;

        // Create a unique cache key based on the request
        $cacheKey = "products.{$category}.{$anime}.{$color}.{$price_min}.{$price_max}.{$sort}.page{$page}";

        // Retrieve the products from the cache if they exist, otherwise execute the query and store the result in the cache
        $products = Cache::remember($cacheKey, 60, function () use ($category, $anime, $color, $price_min, $price_max, $sort) {
            $query = Product::query()->where('category', $category)->with('images');

            if ($anime) {
                $query->where('anime', $anime);
            }
            if ($color) {
                $query->where('color', $color);
            }

            if ($sort === 'popularity') {
                $query->orderBy('popularity', 'desc');
            } elseif ($sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } else {
                $query->orderBy('price', 'desc');
            }

            return $query->whereBetween('price', [$price_min, $price_max])->paginate(12)->withQueryString();
        });

        return view('product.index', compact('products'));
    }

    /**
     * Display a listing of the resource with search query.
     */
    public function indexSearch(Request $request)
    {
        $anime = $request->input('anime', null);
        $color = $request->input('color', null);
        $price_min = intval($request->input('price_min') ?? 0);
        $price_max = intval($request->input('price_max') ?? 100);
        $sort = $request->input('sort') ?? 'popularity';
        $page = $request->input('page') ?? 1;
        $filterString = $request->input('query');

        // Create a unique cache key based on the request
        $cacheKey = "products.{$filterString}.{$anime}.{$color}.{$price_min}.{$price_max}.{$sort}.page{$page}";

        // Retrieve the products from the cache if they exist, otherwise execute the query and store the result in the cache
        $products = Cache::remember($cacheKey, 60, function () use ($anime, $color, $price_min, $price_max, $sort, $filterString) {
            $query = Product::query()->with('images');

            $filterWords = explode(' ', $filterString);
            foreach ($filterWords as $word) {
                $query->where('name', 'ilike', "%{$word}%");
            }

            if ($anime) {
                $query->where('anime', $anime);
            }
            if ($color) {
                $query->where('color', $color);
            }

            if ($sort === 'popularity') {
                $query->orderBy('popularity', 'desc');
            } elseif ($sort === 'price_asc') {
                $query->orderBy('price', 'asc');
            } else {
                $query->orderBy('price', 'desc');
            }


            return $query->whereBetween('price', [$price_min, $price_max])->paginate(12)->withQueryString();
        });

        return view('product.index-search', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // Create a new product
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
            'anime' => $request->anime,
            'color' => $request->color,
            'price' => $request->price,
        ]);

        $variants = [
            'S' => $request->validated('S'),
            'M' => $request->validated('M'),
            'L' => $request->validated('L'),
            'XL' => $request->validated('XL'),
            'A' => $request->validated('A'),
        ];


        // Create a directory to store the images
        $directory = public_path("images/product/{$product->id}");
        if (!file_exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        $images = array_merge([$request->file('mainImage')], $request->file('images') ?? []);

        // Store the images in the directory and save the image paths in the database
        foreach ($images as $image) {
            $destinationPath = public_path('images/product/' . $product->id);
            $imageName = time() . '.' . $image->extension();
            $image->move($destinationPath, $imageName);

            $imagePath = 'images/product/' . $product->id . '/' . $imageName;
            $product->images()->create([
                'product_id' => $product->id,
                'image' => $imagePath,
            ]);
        }

        // Create variants based on the category
        if ($request->category === 'hat') {
            $product->variants()->create([
                'product_id' => $product->id,
                'size' => 'A',
                'stock' => $variants['A'],
            ]);
        } else {
            $sizes = ['S', 'M', 'L', 'XL'];
            foreach ($sizes as $size) {
                $product->variants()->create([
                    'product_id' => $product->id,
                    'size' => $size,
                    'stock' => $variants[$size],
                ]);
            }
        }

        $this->deleteProductCache();
        return redirect()->route('product.show', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $product_id)
    {
        $product = Cache::remember("product-$product_id", 60, function () use ($product_id) {
            return Product::with('images')->find($product_id);
        });

        $order = ['S', 'M', 'L', 'XL', 'A'];

        $variants = Cache::remember("variants-$product_id", 60, function () use ($product, $order) {
            return $product->variants->sortBy(function ($variant) use ($order) {
                return array_search($variant->size, $order);
            });
        });

        return view('product.show', compact('product', 'variants'));
    }


    /**
     * Get variants data.
     */
    public function variants(int $product_id)
    {
        $product = Product::find($product_id);
        $variants = $product->variants;
        return response()->json($variants);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $images = $product->images;
        $variants = $product->variants;
        return view('product.edit', compact('product', 'variants', 'images'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->deleteProductCache();
        Cache::forget("product-$product->id");

        $newCategory = $request->category;
        $variants = [
            'S' => $request->validated('S'),
            'M' => $request->validated('M'),
            'L' => $request->validated('L'),
            'XL' => $request->validated('XL'),
            'A' => $request->validated('A'),
        ];

        if ($newCategory !== $product->category) {
            // Delete the old variants
            $product->variants()->delete();

            // Create new variants based on the category
            if ($newCategory === 'hat') {
                $product->variants()->create([
                    'product_id' => $product->id,
                    'size' => 'A',
                    'stock' => $variants['A'],
                ]);
            } else {
                $sizes = ['S', 'M', 'L', 'XL'];
                foreach ($sizes as $size) {
                    $product->variants()->create([
                        'product_id' => $product->id,
                        'size' => $size,
                        'stock' => $variants[$size],
                    ]);
                }
            }
        } else {
            // Update the variants
            $sizes = ['S', 'M', 'L', 'XL', 'A'];
            foreach ($sizes as $size) {
                $product->variants()->where('size', $size)->update(['stock' => $variants[$size]]);
            }
        }

        return redirect()->route('product.show', $product);
    }

    /**
     * Add images to the specified product.
     */
    public function updateImage(AddImageProductRequest $request, Product $product)
    {
        Cache::forget("product-$product->id");
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $image) {
                $destinationPath = public_path('images/product/' . $product->id);
                $imageName = time() . '.' . $image->extension();
                $image->move($destinationPath, $imageName);

                $imagePath = 'images/product/' . $product->id . '/' . $imageName;
                $product->images()->create([
                    'product_id' => $product->id,
                    'image' => $imagePath,
                ]);
            }
        }

        return redirect()->route('product.show', $product);
    }

    /**
     * Remove the specified image from storage.
     */
    public function destroyImage(DestroyImageProductRequest $request, Product $product)
    {
        Cache::forget("product-$product->id");
        $image_id = $request->image_id;
        $image = Image::find($image_id);
        File::delete(public_path($image->image));
        $image->delete();
        $this->deleteProductCache();
        return redirect()->route('product.show', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $this->deleteProductCache();
        return redirect()->route('homepage')->with('success', 'Product deleted successfully');
    }

    /**
     * Delete the product cache.
     */
    private function deleteProductCache()
    {
        // Remove the cache directly from DB, since the cache key is dynamic
        // Different driver may have different way to delete cache for dynamic key
        // Or you can use Cache::flush() to delete all cache (not recommended)
        DB::table('cache')->where('key', 'like', 'products%')->delete();
    }
}
