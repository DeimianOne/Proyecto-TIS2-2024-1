<?php

namespace App\Http\Controllers;

use App\Models\Producttype;
use Illuminate\Http\Request;

class ProducttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $producttypes = Producttype::all();
        return view('producttypes.index', compact('producttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $producttype = Producttype::all();
        return view('producttypes.create', compact('producttype'));
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
            'name' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        Producttype::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('producttypes.store')->with('mensaje','Producto agregado con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function show(Producttype $producttype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Producttype $producttype)
    {
        return view('producttypes.edit', compact('producttype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producttype $producttype)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        $producttype->update([
            'name' => $request->input('name'),
        ]);
        
        return redirect()->route('producttypes.index')->with('mensaje','Producto actualizado con éxito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producttype $producttype)
    {
        $producttype->delete();
        return redirect()->route('producttypes.index');
    }
}
