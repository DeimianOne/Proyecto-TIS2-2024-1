<?php

namespace App\Http\Controllers;


use App\Models\Sale;
use App\Models\Region;
use App\Models\Province;
use App\Models\Commune;
use App\Models\Branch;
use App\Models\Paymentmethod;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function checkout()
    {
        // Obtén las regiones, provincias, comunas, sucursales y métodos de pago desde la base de datos
        $regions = Region::all();
        $provinces = Province::all();
        $communes = Commune::all();
        $storeBranches = Branch::all();
        $paymentMethods = Paymentmethod::all();

        return view('checkout', compact('regions', 'provinces', 'communes', 'storeBranches', 'paymentMethods'));
    }

    // public function processCheckout(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'email' => 'required|email',
    //         'name' => 'required|string|max:255',
    //         'last_name' => 'required|string|max:255',
    //         'phone_number' => 'required|string|max:20',
    //         'delivery_type' => 'required|in:home_delivery,store_pickup',
    //         'region' => 'nullable|required_if:delivery_type,home_delivery',
    //         'province' => 'nullable|required_if:delivery_type,home_delivery',
    //         'commune' => 'nullable|required_if:delivery_type,home_delivery',
    //         'address' => 'nullable|required_if:delivery_type,home_delivery',
    //         'address_number' => 'nullable|required_if:delivery_type,home_delivery',
    //         'branch' => 'nullable|required_if:delivery_type,store_pickup',
    //         'payment_method' => 'required|exists:paymentmethods,id',
    //     ]);

    //     // Crea una nueva venta
    //     $sale = new Sale();
    //     if (auth()->check()) {
    //         $sale->user_id = auth()->id();
    //     }
    //     $sale->shoppingcart_id = 1; // Asigna el ID del carrito de compras (ajusta esto según tu lógica)
    //     $sale->sale_type = 'online_sale';
    //     $sale->delivery_type = $validatedData['delivery_type'];
    //     $sale->sale_date = now();
    //     $sale->paymentmethod_id = $validatedData['payment_method'];
    //     $sale->sale_status = 'completed'; // Ajusta esto según tu lógica
    //     $sale->sale_total = 100; // Asigna el total de la venta (ajusta esto según tu lógica)
    //     $sale->save();

    //     // Redirigir a la página de pago (puedes ajustar la lógica según tus necesidades)
    //     return redirect()->route('webpay.create');
    // }
}
