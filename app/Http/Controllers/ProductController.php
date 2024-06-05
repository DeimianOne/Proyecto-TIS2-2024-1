<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Beer;
use App\Models\Beerformat;
use App\Models\Beerstyle;
use App\Models\Merchandise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('Iniciando el método store', $request->all());

        $request->validate([
            'name' => 'required|string|max:125|unique:products,name',
            'description' => 'required|string',
            'image' => 'nullable|url',
            'stock' => 'required|integer|min:0',
            'product-type' => 'required|string|in:beer,merchandise'
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'name.unique' => 'El nombre del producto debe ser único.',
            'description.required' => 'La descripción es obligatoria.',
            'image.url' => 'La URL de la imagen no es válida.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock no puede ser negativo.',
            'product-type.required' => 'El tipo de producto es obligatorio.',
            'product-type.in' => 'El tipo de producto debe ser "beer" o "merchandise".',
        ]);

        // Manejar la creación específica de cerveza
        if($request->input('product-type') == 'beer'){

            Log::info('Iniciando la creación de cerveza');

            $request->validate([
                'liter-value' => 'required|numeric|min:0',
                'beer-style' => 'required|integer|exists:beerstyles,id',
                'beer-format' => 'required|integer|exists:beerformats,id'
            ], [
                'liter-value.required' => 'El valor por litro es obligatorio.',
                'liter-value.numeric' => 'El valor por litro debe ser un número.',
                'liter-value.min' => 'El valor por litro no puede ser negativo.',
                'beer-style.required' => 'El estilo de la cerveza es obligatorio.',
                'beer-style.integer' => 'El estilo de la cerveza debe ser un ID válido.',
                'beer-style.exists' => 'El estilo de la cerveza no existe.',
                'beer-format.required' => 'El formato de la cerveza es obligatorio.',
                'beer-format.integer' => 'El formato de la cerveza debe ser un ID válido.',
                'beer-format.exists' => 'El formato de la cerveza no existe.'
            ]);

            Log::info('Validaciones de cerveza pasadas', $request->all());

            $beerFormat = BeerFormat::findOrFail($request->input('beer-format'));
            $beerValue = $request->input('liter-value') * $beerFormat->liters;

            $producto = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'value' => $request->input('product-type') == 'beer' ? $beerValue : $request->input('value'),
                'image' => $request->input('image'),
                'stock' => $request->input('stock'),
                'visualizations' => 0, // Valor inicial
                'visibility' => true // Asumiendo que los productos nuevos son visibles por defecto
            ]);

            Log::info('Producto creado', ['product_id' => $producto->id]);

            $beer = Beer::create([
                'product_id' => $producto->id,
                'beerstyle_id' => $request->input('beer-style'),
                'beerformat_id' => $request->input('beer-format'),
                'liter_value' => $request->input('liter-value')
            ]);

            Log::info('Cerveza creada', ['beer_id' => $beer->id]);
        }

        // Manejar la creación específica de merchandise
        if($request->input('product-type') == 'merchandise'){

            Log::info('Iniciando la creación de merchandise');

            $request->validate([
                'value' => 'required|numeric|min:0',
            ], [
                'value.required' => 'El valor es obligatorio.',
                'value.numeric' => 'El valor debe ser un número.',
                'value.min' => 'El valor no puede ser negativo.',
            ]);

            Log::info('Validaciones de merchandise pasadas', $request->all());

            $producto = Product::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'value' => $request->input('value'),
                'image' => $request->input('image'),
                'stock' => $request->input('stock'),
                'visualizations' => 0, // Valor inicial
                'visibility' => true // Asumiendo que los productos nuevos son visibles por defecto
            ]);

            Log::info('Producto creado', ['product_id' => $producto->id]);

            Merchandise::create([
                'product_id' => $producto->id
            ]);
            Log::info('Merchandise creado', ['product_id' => $producto->id]);
        }

        return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
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
        // $beerStyles = Beerstyle::all();
        // $beerFormats = Beerformat::all();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        // if ($product->beer) {
        //     // Beer::find($product->beer->id->destroy());
        //     $product->delete();
        //     Beer::where("product_id", $product->id)->delete();
        // }
            Beer::where('product_id', $product->id)->delete();
            $product->delete();
        return redirect()->route('products.index')->with('success', 'Producto eliminado exitosamente.');
    }
}
