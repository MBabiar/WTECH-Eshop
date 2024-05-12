<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\Variant;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CartController extends Controller
{
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
                    'amount' => $amount,
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
        // Check if the cart is empty
        if (auth()->user()) {
            $cartProducts = Cart::where('user_id', auth()->user()->id)->get();
        } else {
            $cartProducts = session('cart');
        }
        if (!$cartProducts || count($cartProducts) == 0) {
            return back()->withErrors('Košík je prázdny');
        }

        $products = [];
        foreach ($cartProducts as $cartProduct) {
            $variant = Variant::find($cartProduct['variant_id']);
            $product = $variant->product;
            $products[] = (object) [
                'id' => $product->id,
                'variant_id' => $variant->id,
                'name' => Str::limit($product->name, 30),
                'price' => $product->price,
                'size' => $variant->size,
                'amount' => $cartProduct['amount'],
                'image' => $product->images()->first()->image
            ];
        }

        return view('order.cart', compact('products'));
    }

    /**
     * Remove the product from the cart.
     */
    public function destroy($variant_id)
    {
        if (auth()->user()) {
            Cart::where('variant_id', $variant_id)->where('user_id', auth()->id())->delete();

            // Check if the cart is empty
            if (Cart::where('user_id', auth()->id())->count() == 0) {
                return redirect()->route('homepage')->with('success', 'Košík sa vyprázdnil.');
            }
        } else {
            $cart = session('cart');
            foreach ($cart as $key => $item) {
                if ($item['variant_id'] == $variant_id) {
                    unset($cart[$key]);
                }
            }
            session()->put('cart', $cart);

            // Check if the cart is empty
            if (empty($cart)) {
                session()->forget('cart');
                return redirect()->route('homepage')->with('success', 'Košík sa vyprázdnil.');
            }
        }

        return back();
    }

    /**
     * Increment the amount of the product in the cart.
     */
    public function incrementAmount($variant_id)
    {
        if (auth()->user()) {
            $cart = Cart::query()->where('variant_id', $variant_id)->where('user_id', auth()->id())->first();
            if ($cart->amount < Variant::find($variant_id)->stock) {
                $cart->amount += 1;
                $cart->save();
            } else {
                return back()->withErrors('Vybrali ste viac kusov ako je skladom.');
            }
        } else {
            $cart = session('cart');
            foreach ($cart as $key => $item) {
                if ($item['variant_id'] == $variant_id) {
                    if ($item['amount'] < Variant::find($variant_id)->stock) {
                        $cart[$key]['amount'] += 1;
                    } else {
                        return back()->withErrors('Vybrali ste viac kusov ako je skladom.');
                    }
                }
            }
            session()->put('cart', $cart);
        }

        return back();
    }

    /**
     * Decrement the amount of the product in the cart.
     */
    public function decrementAmount($variant_id)
    {
        if (auth()->user()) {
            $cart = Cart::query()->where('variant_id', $variant_id)->where('user_id', auth()->id())->first();
            if ($cart->amount > 1) {
                $cart->amount -= 1;
                $cart->save();
            } else {
                $cart->delete();

                // Check if the cart is empty
                if (Cart::where('user_id', auth()->id())->count() == 0) {
                    return redirect()->route('homepage')->with('success', 'Košík sa vyprázdnil.');
                }
            }
        } else {
            $cart = session('cart');
            foreach ($cart as $key => $item) {
                if ($item['variant_id'] == $variant_id) {
                    if ($item['amount'] > 1) {
                        $cart[$key]['amount'] -= 1;
                    } else {
                        unset($cart[$key]);
                    }
                }
            }
            session()->put('cart', $cart);

            // Check if the cart is empty
            if (empty($cart)) {
                session()->forget('cart');
                return redirect()->route('homepage')->with('success', 'Košík sa vyprázdnil.');
            }
        }

        return back();
    }
}
