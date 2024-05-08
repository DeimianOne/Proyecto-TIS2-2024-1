<?php

namespace App\Http\Controllers;

use App\Models\Product_types;
use Illuminate\Http\Request;

class ProductTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['productTypes'] = Product_types::paginate(5);
        return view('productType.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('productType.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos antes de almacenarlos, si es necesario
        
        // Crear una nueva instancia del modelo con los datos del formulario
        $productType = new Product_types();
        $productType->name = $request->input('name');
        
        // Guardar el nuevo registro en la base de datos
        $productType->save();
    
        // Retornar la respuesta JSON con los datos guardados
        //return response()->json($productType);
        return redirect('productType')->with('mensaje','Producto agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function show(Product_types $product_types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $productType = Product_types::findOrFail($id);
        return view('productType.edit', compact('productType'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Obtener los datos del formulario excluyendo el campo _method
        $datosProductType = $request->except(['_token', '_method']);
        Product_types::where('id', '=', $id)->update($datosProductType);
    
        $productType = Product_types::findOrFail($id);
        return view('productType.edit', compact('productType'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_types  $product_types
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product_types::destroy($id);
        return redirect('productType')->with('mensaje','Tipo producto eliminado');
    }
}