<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

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

        $products = $query->whereBetween('price', [$price_min, $price_max])->paginate(12);

        return view('product.products', compact('products', 'category', 'anime', 'color', 'price_min', 'price_max', 'sort'));
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
    public function show(Product $product)
    {
        //
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
