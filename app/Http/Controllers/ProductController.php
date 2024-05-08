<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_types;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $productTypes = Product_types::all();
        return view('product.create', compact('productTypes'));
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->type_product = $request->input('type_product');
        $product->value = $request->input('value');
        $product->image = $request->input('image');
        $product->view_count = $request->input('view_count');
        $product->stock = $request->input('stock');
        
        // Guardar el nuevo registro en la base de datos
        $product->save();
    
        // Retornar la respuesta JSON con los datos guardados
        return response()->json($product);
        //return redirect('product')->with('mensaje','Producto agregado con éxito');
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $productTypes = Product_types::all();
        return view('product.edit', compact('product', 'productTypes'));
    }

    public function update(Request $request,$id)
    {
        $datosProduct = $request->except(['_token', '_method']);
        Product_types::where('id', '=', $id)->update($datosProduct);
    
        $product = Product_types::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
