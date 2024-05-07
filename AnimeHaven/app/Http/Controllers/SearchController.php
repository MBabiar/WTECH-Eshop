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
        // Your search logic here
        // For example, if you're searching products:
        $query = $request->input('query');

        $products = Product::search($query)->paginate(5)->withQueryString();

        Log::info("Search query: {$query}");
        Log::info("Number of results: {$products->total()}");
        Log::info("Products: {$products->toJson()}");

        return response()->json($products);
    }
}
