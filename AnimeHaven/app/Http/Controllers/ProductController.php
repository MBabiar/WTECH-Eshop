<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $category, Request $request)
    {
        $start = microtime(true);
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
            $query = Product::query()->where('category', $category);

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
        $end = microtime(true);
        $executionTime = $end - $start;
        Log::info("Execution time: {$executionTime}");

        $viewName = 'product.products';
        return view('product.products', compact('viewName', 'products', 'category', 'anime', 'color', 'price_min', 'price_max', 'sort'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(int $product_id)
    {
        $product = Product::find($product_id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
