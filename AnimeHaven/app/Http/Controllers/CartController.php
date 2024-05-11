<?php

namespace App\Http\Controllers;

use App\Models\Variant;
use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreCartRequest $request)
    {
        $amount = $request->validated('amount');
        $size = $request->validated('size');
        $product_id = $request->validated('product_id');

        $variant = Variant::where('product_id', $product_id)
            ->where('size', $size)
            ->first();

        if ($variant->stock < $amount) {
            return back()->withErrors('Vybrali ste viac kusov ako je skladom.');
        } else {
            if (auth()->check()) {
                $userId = auth()->id();
                if (Cart::where('user_id', $userId)->where('variant_id', $variant->id)->exists()) {
                    back()->withErrors('Produkt už je v košíku.');
                }
                Cart::create([
                    'user_id' => $userId,
                    'variant_id' => $variant->id,
                    'amount' => $amount
                ]);
            } else {
                if (session()->has('cart')) {
                    foreach (session('cart') as $key => $cart) {
                        if ($cart['variant_id'] == $variant->id) {
                            return back()->withErrors('Produkt už je v košíku.');
                        }
                    }
                }
                session()->push('cart', [
                    'variant_id' => $variant->id,
                    'amount' => $amount
                ]);
            }
        }

        return back()->with('success', 'Produkt bol pridaný do košíka.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        if (auth()->user()) {
            $cartProducts = Cart::where('user_id', auth()->user()->id)->all();
        } else {
            $cartProducts = session('cart');
        }

        return view('order.cart', compact('cartProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
