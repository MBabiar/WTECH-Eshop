<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Variant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

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
                }
            }

            return view('profile.orders', compact('orders'));
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {

        // Check for variant amounts
        if (auth()->user()) {
            $cartProducts = Cart::where('user_id', auth()->user()->id)->get();
        } else {
            $cartProducts = session('cart');
        }

        // Check if the product is still in stock
        foreach ($cartProducts as $cartProduct) {
            $variant = Variant::find($cartProduct['variant_id']);
            if ($variant->stock < $cartProduct['amount']) {
                // If the product is out of stock, delete it from the cart
                // Else update the amount to the maximum available
                if ($variant->stock == 0) {
                    if (auth()->user()) {
                        Cart::where('user_id', auth()->user()->id)->where('variant_id', $cartProduct['variant_id'])->delete();
                    } else {
                        foreach (session('cart') as $key => $cart) {
                            if ($cart['variant_id'] == $cartProduct['variant_id']) {
                                session()->forget('cart.' . $key);
                            }
                        }
                    }
                    return redirect()->route('homepage')->withErrors('Produkt ' . $variant->product->name . ' s veľkosťou ' . $variant->size . ' nie je dostupný. Bol odstránený z košíka.');
                } else {
                    if (auth()->user()) {
                        Cart::where('user_id', auth()->user()->id)->where('variant_id', $cartProduct['variant_id'])->update(['amount' => $variant->stock]);
                    } else {
                        foreach (session('cart') as $key => $cart) {
                            if ($cart['variant_id'] == $cartProduct['variant_id']) {
                                session()->put('cart.' . $key . '.amount', $variant->stock);
                            }
                        }
                    }
                    return redirect()->route('homepage')->withErrors('Produkt ' . $variant->product->name . ' s veľkosťou ' . $variant->size . ' je momentálne skladom len v počte ' . $variant->stock . ' kusov. Zmenili sme počet na.' . $variant->stock);
                }
            }
        }

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

        session()->forget('transportation');
        session()->forget('payment_method');

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
            $product = $variant->product()->first();
            Cache::forget('product-' . $product->id);
            $product->update(['popularity' => $product->popularity + $cartProduct['amount']]);
            $variant->update(['stock' => $variant->stock - $cartProduct['amount']]);
        }

        return redirect()->route('homepage')->with('success', 'Objednávka bola úspešne dokončená. Ďakujeme za nákup!');
    }

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
        if (!session()->has('transportation') || !session()->has('payment_method')) {
            return redirect()->back()->withErrors('Najprv vyplňte spôsob dopravy a platby');
        }

        return view('order.order-info');
    }
}
