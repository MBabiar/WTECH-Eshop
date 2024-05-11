<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
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
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    /**
     * Show the delivery and payment method.
     */
    /**
     * Show the delivery and payment method.
     */
    public function showDeliveryPaymentForm()
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

        $transportation = null;
        $payment_method = null;

        if (session()->has('transportation')) {
            $transportation = session('transportation');
        }
        if (session()->has('payment_method')) {
            $payment_method = session('payment_method');
        }

        return view('order.delivery-payment', compact('transportation', 'payment_method'));
    }

    /**
     * Process the delivery and payment method.
     */
    public function storeDeliveryPayment(Request $request)
    {
        // Validácia údajov
        $request->validate([
            'transportation' => 'required',
            'payment_method' => 'required',
        ]);

        // Uloženie údajov do session
        session([
            'transportation' => $request->transportation,
            'payment_method' => $request->payment_method,
        ]);

        // Presmerovanie na ďalší krok
        return redirect()->route('order-info');
    }

    /**
     * Show the order information.
     */
    public function showOrderInfo()
    {
        return view('order.order-info');
    }

    /**
     * Process the order.
     */
    public function processOrderInfo()
    {
        //
    }
}
