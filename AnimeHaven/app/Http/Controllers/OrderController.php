<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{

    public function processDeliveryPayment(Request $request)
    {
        // Skontrolujte, či boli odoslané údaje z formulára
        if ($request->isMethod('post')) {
            // Získajte hodnoty z formulára
            $doprava = $request->input('doprava');
            $platba = $request->input('platba');

            // Uložte hodnoty do session premenných
            session(['doprava' => $doprava]);
            session(['platba' => $platba]);

            // Presmerujte používateľa na ďalší krok objednávky alebo kamkoľvek inam
            return redirect()->route('order-info');
        }

        // Ak nie je požiadavka typu POST, môžete urobiť inú akciu, napr. presmerovať späť
        return redirect()->back();
    }
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
}
