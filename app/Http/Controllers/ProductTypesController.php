<?php

namespace App\Http\Controllers;

use App\Models\Product_types;
use Illuminate\Http\Request;

class ProductTypesController extends Controller
{

    public function index()
    {
        $productTypes = Product_types::all();
        return view('pages.type_product', compact('productTypes'));
    }
    
    public function create()
    {
        return view('productType.create');

    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        Product_types::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('type_product.store')->with('mensaje','Tipo de producto agregado con éxito');
    }


 
    public function show(Product_types $product_types)
    {
        //
    }


    public function edit($id)
    {
        //
        $productType = Product_types::findOrFail($id);
        return view('productType.edit', compact('productType'));

    }


    public function update(Request $request, $id)
    {
        // Obtener los datos del formulario excluyendo el campo _method
        $datosProductType = $request->except(['_token', '_method']);
        Product_types::where('id', '=', $id)->update($datosProductType);
    
        $productType = Product_types::findOrFail($id);
        return view('productType.edit', compact('productType'));
    }

    public function destroy($id)
    {
        //
        Product_types::destroy($id);
        return redirect('productType')->with('mensaje','Tipo producto eliminado');
    }
}