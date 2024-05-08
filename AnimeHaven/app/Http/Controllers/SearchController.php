<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    /**
     * Display a listing of search results.
     */
    public function search(Request $request)
    {
        $query = $request->input('query');

        $products = Product::search($query)->orderBy('popularity')->paginate(5)->withQueryString();

        // Eager load the images relationship for each product
        $products->load('images');

        // Add the URL of the first image to each product
        $products->getCollection()->transform(function ($product) {
            $product->image = $product->images->first() ? $product->images->first()->image : null;
            unset ($product->images);
            return $product;
        });

        return response()->json($products);
    }
}
