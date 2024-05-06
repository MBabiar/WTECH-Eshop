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
        $priceMin = intval($request->input('price-min') ?? 0);
        $priceMax = intval($request->input('price-max') ?? 1000);
        $sort = $request->input('sort', 'popularity');

        $query = Product::query()->where('category', $category);

        if ($anime) {
            $query->where('anime', $anime);
        }
        if ($color) {
            $query->where('color', $color);
        }

        if ($sort === 'popularity') {
            $query->orderBy('popularity', 'desc');
        } elseif ($sort === 'price-asc') {
            $query->orderBy('price', 'asc');
        } else {
            $query->orderBy('price', 'desc');
        }

        $products = $query->whereBetween('price', [$priceMin, $priceMax])->paginate(12);

        return view('product.products', compact('products', 'category', 'anime', 'color', 'sort'));
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
