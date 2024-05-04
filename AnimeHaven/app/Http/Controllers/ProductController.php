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
        $sort = $request->input('sort', 'popularity');

        if ($sort === 'popularity') {
            $products = Product::where('category', $category)->orderBy('popularity', 'desc')->get();
        } elseif ($sort === 'asc') {
            $products = Product::where('category', $category)->orderBy('price', 'asc')->get();
        } else {
            $products = Product::where('category', $category)->orderBy('price', 'desc')->get();
        }

        return view('product.products', compact('products', 'category'));
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
