<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shopping_cart;

class ShoppingCartController extends Controller
{
    public function index()
    {
        $shoppingCarts = Shopping_cart::all();
        return view('shopping_carts.index', compact('shoppingCarts'));
    }

    public function create()
    {
        return view('shopping_carts.create');
    }

    public function store(Request $request)
    {
        Shopping_cart::create($request->all());
        return redirect()->route('shopping-carts.index')->with('success', 'Shopping cart created successfully.');
    }

    public function show(Shopping_cart $shoppingCart)
    {
        return view('shopping_carts.show', compact('shoppingCart'));
    }

    public function edit(Shopping_cart $shoppingCart)
    {
        return view('shopping_carts.edit', compact('shoppingCart'));
    }

    public function update(Request $request, Shopping_cart $shoppingCart)
    {
        $shoppingCart->update($request->all());
        return redirect()->route('shopping-carts.index')->with('success', 'Shopping cart updated successfully.');
    }

    public function destroy(Shopping_cart $shoppingCart)
    {
        $shoppingCart->delete();
        return redirect()->route('shopping-carts.index')->with('success', 'Shopping cart deleted successfully.');
    }
}
