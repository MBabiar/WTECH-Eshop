<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddImageProductRequest;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File;

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
                'stock' => 0,
            ]);
        } else {
            $sizes = ['S', 'M', 'L', 'XL'];
            foreach ($sizes as $size) {
                $product->variants()->create([
                    'product_id' => $product->id,
                    'size' => $size,
                    'stock' => 0,
                ]);
            }
        }

        return redirect()->route('product.show', $product);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $product_id)
    {
        $product = Product::find($product_id);
        $variants = $product->variants;
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
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->validated());
        return redirect()->route('product.show', $product);
    }

    /**
     * Add images to the specified product.
     */
    public function addImage(AddImageProductRequest $request, Product $product)
    {
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
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
