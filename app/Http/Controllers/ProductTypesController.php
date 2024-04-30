<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product_types; // Cambio de Product_Type a ProductType

class ProductTypeController extends Controller
{
    public function index()
    {
        $types = Product_types::all(); // Cambio de Product_Type a ProductType
        return view('product_types.index', compact('types'));
    }

    public function create()
    {
        return view('product_types.create');
    }

    public function store(Request $request)
    {
        Product_types::create($request->all()); // Cambio de Product_Type a ProductType
        return redirect()->route('product-types.index');
    }

    public function show(Product_types $productType) // Cambio de Product_Type a ProductType
    {
        return view('product_types.show', compact('productType'));
    }

    public function edit(Product_types $productType) // Cambio de Product_Type a ProductType
    {
        return view('product_types.edit', compact('productType'));
    }

    public function update(Request $request, Product_types $productType) // Cambio de Product_Type a ProductType
    {
        $productType->update($request->all());
        return redirect()->route('product-types.index');
    }

    public function destroy(Product_types $productType) // Cambio de Product_Type a ProductType
    {
        $productType->delete();
        return redirect()->route('product-types.index');
    }
}
