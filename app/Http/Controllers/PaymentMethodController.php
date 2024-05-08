<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment_method;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = Payment_method::all();
        return view('payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('payment_methods.create');
    }

    public function store(Request $request)
    {
        Payment_method::create($request->all());
        return redirect()->route('payment-methods.index');
    }

    public function show(Payment_method $paymentMethod)
    {
        return view('payment_methods.show', compact('paymentMethod'));
    }

    public function edit(Payment_method $paymentMethod)
    {
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, Payment_method $paymentMethod)
    {
        $paymentMethod->update($request->all());
        return redirect()->route('payment-methods.index');
    }

    public function destroy(Payment_method $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('payment-methods.index');
    }
}
