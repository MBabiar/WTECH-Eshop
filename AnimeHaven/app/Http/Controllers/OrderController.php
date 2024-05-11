<?php

namespace App\Http\Controllers;

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
    public function showDeliveryPayment()
    {
        return view('order.delivery-payment');
    }

    /**
     * Process the delivery and payment method.
     */
    public function storeDeliveryPayment(Request $request)
    {
        // Skontrolujte, či boli odoslané údaje z formulára
        if ($request->isMethod('post')) {
            // Získajte hodnoty z formulára
            $transportation = $request->input('transportation');
            $payment_method = $request->input('payment_method');

            // Uložte hodnoty do session premenných
            session(['transportation' => $transportation]);
            session(['payment_method' => $payment_method]);

            // Presmerujte používateľa na ďalší krok objednávky alebo kamkoľvek inam
            return redirect()->route('order-info');
        }

        // Ak nie je požiadavka typu POST, môžete urobiť inú akciu, napr. presmerovať späť
        return redirect()->back();
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
    public function processOrder()
    {
        //
    }
}
