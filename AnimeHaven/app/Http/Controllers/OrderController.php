<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()) {
            $orders = Order::with('variants')->where('user_id', auth()->user()->id)->get();

            foreach ($orders as $order) {
                foreach ($order->variants as $variant) {
                    $pivotData = $variant->pivot;
                    Log::info($pivotData);
                }
            }

            return view('profile.orders', compact('orders'));
        } else {
            return redirect()->route('login');
        }
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
        $order = new Order();
        if (auth()->user()) {
            $order->user_id = auth()->user()->id;
        }
        $order->user_name = $request->validated('user_name');
        $order->user_email = $request->validated('user_email');
        $order->user_phone = $request->validated('user_phone');
        $order->transportation = session('transportation');
        $order->payment_method = session('payment_method');
        $order->user_country = $request->validated('user_country');
        $order->user_city = $request->validated('user_city');
        $order->user_zip = $request->validated('user_zip');
        $order->user_street = $request->validated('user_street');
        $order->user_house_number = $request->validated('user_house_number');
        $order->price = 0;
        $order->save();

        // Store the order products
        if (auth()->user()) {
            $cartProducts = Cart::where('user_id', auth()->user()->id)->get();
            Cart::where('user_id', auth()->user()->id)->delete();
        } else {
            $cartProducts = session('cart');
            session()->forget('cart');
        }

        $priceSum = 0;
        foreach ($cartProducts as $cartProduct) {
            $price = Variant::find($cartProduct['variant_id'])->product->price;
            $priceSum += $price * $cartProduct['amount'];
            $order->variants()->attach($cartProduct['variant_id'], ['amount' => $cartProduct['amount']]);
        }
        $order->update(['price' => $priceSum]);

        foreach ($cartProducts as $cartProduct) {
            $variant = Variant::find($cartProduct['variant_id']);
            $variant->update(['stock' => $variant->stock - $cartProduct['amount']]);
        }

        return redirect()->route('homepage')->with('success', 'Objednávka bola úspešne dokončená. Ďakujeme za nákup!');
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
}
