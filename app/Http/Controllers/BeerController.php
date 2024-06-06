<?php

namespace App\Http\Controllers;

use App\Models\Beer;
use App\Models\Beerformat;
use App\Models\Beerstyle;
use App\Models\Producttype;
use Illuminate\Http\Request;

class BeerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beers = Beer::all();
        return view('beers.index', compact('beers'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beer = Beer::all();
        $beerformats = Beerformat::all();
        $beerstyles = Beerstyle::all();
        $producttypes = Producttype::all();
        return view('beers.create', compact('beerformats','beerstyles','producttypes'));
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
            'product_id' => 'required|string|max:100',
            'beerstyle_id' => 'required|numeric|max:50',
            'beerformat_id' => 'required|numeric|max:50',
            'liter_value' => 'required|numeric|max:20000'
        ], [
            'product_id.required' => 'La selección del producto es obligatoria.',
            'product_id.max' => 'El producto no puede superar los 100 caracteres.',
            'beerstyle_id.required' => 'La selección del estilo es obligatoria.',
            'beerstyle_id.max' => 'El estilo no puede superar los 20 caracteres.',
            'beerformat_id.required' => 'La selección del formato es obligatoria.',
            'beerformat_id.max' => 'El formato no puede superar los 20 caracteres.',
            'liter_value.required' => 'El valor es obligatorio.',
            'liter_value.max' => 'El valor máximo es de 20000.',
        ]);

        Beer::create([
            'product_id' => $request->input('product_id'),
            'beerstyle_id' => $request->input('beerstyle_id'),
            'beerformat_id' => $request->input('beerformat_id'),
            'liter_value' => $request->input('liter_value'),
        ]);

        return redirect()->route('beers.store')->with('mensaje','Cerveza agregada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // Obtener todas las cervezas con sus productos relacionados cargados
        $beers = Beer::with('product')->get();
        
        // Pasar las cervezas a la vista
        return view('cervezas', compact('beers'));
    }
    
    public function show2(){

        $beers = Beer::with('product')->get();
        
        // Pasar las cervezas a la vista
        return view('product-pack6', compact('beers'));
    }

    public function show3(){

        $beers = Beer::with('product')->get();
        
        // Pasar las cervezas a la vista
        return view('product-pack12', compact('beers'));
    }
    
    public function show4(){

        $beers = Beer::with('product')->get();
        
        // Pasar las cervezas a la vista
        return view('product-pack24', compact('beers'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function edit(Beer $beer)
    {
        return view('beers.edit', compact('beer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beer $beer)
    {
        $request->validate([
            'product_id' => 'required|string|max:100',
            'beerstyle_id' => 'required|numeric|max:50',
            'beerformat_id' => 'required|numeric|max:50',
            'liter_value' => 'required|numeric|max:20000'
        ], [
            'product_id.required' => 'La selección del producto es obligatoria.',
            'product_id.max' => 'El producto no puede superar los 100 caracteres.',
            'beerstyle_id.required' => 'La selección del estilo es obligatoria.',
            'beerstyle_id.max' => 'El estilo no puede superar los 20 caracteres.',
            'beerformat_id.required' => 'La selección del formato es obligatoria.',
            'beerformat_id.max' => 'El formato no puede superar los 20 caracteres.',
            'liter_value.required' => 'El valor es obligatorio.',
            'liter_value.max' => 'El valor máximo es de 20000.',
        ]);

        $beer->update([
            'product_id' => $request->input('product_id'),
            'beerstyle_id' => $request->input('beerstyle_id'),
            'beerformat_id' => $request->input('beerformat_id'),
            'liter_value' => $request->input('liter_value'),
        ]);

        return redirect()->route('beers.index')->with('mensaje','Cerveza actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beer  $beer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beer $beer)
    {
        $beer->delete();
        return redirect()->route('beers.index');
    }
}
