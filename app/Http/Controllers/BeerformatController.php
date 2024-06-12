<?php

namespace App\Http\Controllers;

use App\Models\Beerformat;
use Illuminate\Http\Request;

class BeerformatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beerformats = Beerformat::all();
        return view('beerformats.index', compact('beerformats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beerformat = Beerformat::all();
        return view('beerformats.create', compact('beerformat'));
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
            'container' => 'required|string|max:100',
            'liters' => 'required|numeric|max:50'
        ], [
            'container.required' => 'El Contenedor es obligatorio.',
            'container.max' => 'El nombre no puede superar los 100 caracteres.',
            'liters.required' => 'Los Litros son obligatorio.',
            'liters.max' => 'Los litros no puede superar los 20 caracteres.',
        ]);

        Beerformat::create([
            'container' => $request->input('container'),
            'liters' => $request->input('liters'),
        ]);

        return redirect()->route('beerformats.index')->with('success','Formato de cerveza agregado con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beerformat  $beerformat
     * @return \Illuminate\Http\Response
     */
    public function show(Beerformat $beerformat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beerformat  $beerformat
     * @return \Illuminate\Http\Response
     */
    public function edit(Beerformat $beerformat)
    {
        
        return view('beerformats.edit', compact('beerformat'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beerformat  $beerformat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beerformat $beerformat)
    {
        //
        $request->validate([
            'container' => 'required|string|max:100',
            'liters' => 'required|numeric|max:50'
        ], [
            'container.required' => 'El Contenedor es obligatorio.',
            'container.max' => 'El nombre no puede superar los 100 caracteres.',
            'liters.required' => 'Los Litros son obligatorio.',
            'liters.max' => 'Los litros no puede superar los 20 caracteres.',
        ]);

        $beerformat->update([
            'container' => $request->input('container'),
            'liters' => $request->input('liters'),
        ]);

        return redirect()->route('beerformats.index')->with('success','Formato de cerveza actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beerformat  $beerformat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beerformat $beerformat)
    {
        $beerformat->delete();
        return redirect()->route('beerformats.index')->with('success', 'Formato de cerveza eliminado con éxito');
    }
}
