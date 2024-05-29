<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('products.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name ' => 'required|string|max:100',
            'description ' => 'required|string|max:100',
            'value ' => 'required|numeric|max:10000',
            'image ' => 'required|string|max:100',
            'stock' => 'required|numeric|max:50',
            'visualizations' => 'required|numeric|max:50',
            'visibility' => 'required|numeric|max:50'
        ], [
            'name.required' => 'El Nombre del producto es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'description.required' => 'La descripción del producto es obligatorio.',
            'description.max' => 'La descripción del producto no puede superar los 100 caracteres.',
            'value.required' => 'El valor del producto es obligatorio.',
            'value.max' => 'El valor del producto no puede superar 10000 pesos.',
            'stock.required' => 'El stock del producto es obligatorio.',
            'visualizations.required' => 'La visualización del producto es obligatorio.',
            'visibility.required' => 'La visibilidad del producto es obligatorio.',            
        ]);

        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'value' => $request->input('value'),
            'image' => $request->input('image'),
            'stock' => $request->input('stock'),
            'visualizations' => $request->input('visualizations'),
            'visibility' => $request->input('visibility'),
        ]);

        return redirect()->route('products.store')->with('mensaje','Formato de cerveza agregado con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name ' => 'required|string|max:100',
            'description ' => 'required|string|max:100',
            'value ' => 'required|numeric|max:10000',
            'image ' => 'required|string|max:100',
            'stock' => 'required|numeric|max:50',
            'visualizations' => 'required|numeric|max:50',
            'visibility' => 'required|numeric|max:50'
        ], [
            'name.required' => 'El Nombre del producto es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'description.required' => 'La descripción del producto es obligatorio.',
            'description.max' => 'La descripción del producto no puede superar los 100 caracteres.',
            'value.required' => 'El valor del producto es obligatorio.',
            'value.max' => 'El valor del producto no puede superar 10000 pesos.',
            'stock.required' => 'El stock del producto es obligatorio.',
            'visualizations.required' => 'La visualización del producto es obligatorio.',
            'visibility.required' => 'La visibilidad del producto es obligatorio.',            
        ]);

        $product->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'value' => $request->input('value'),
            'image' => $request->input('image'),
            'stock' => $request->input('stock'),
            'visualizations' => $request->input('visualizations'),
            'visibility' => $request->input('visibility'),
        ]);

        return redirect()->route('products.index')->with('mensaje','Formato de cerveza actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
