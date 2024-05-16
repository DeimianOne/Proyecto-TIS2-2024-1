<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer_format;

class BeerFormatController extends Controller
{
    public function index()
    {
        $formats = Beer_format::all();
        return view('pages.format', compact('formats'));
    }

    public function create()
    {
        return view('beerFormat.create');
    }

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

        Beer_format::create([
            'container' => $request->input('container'),
            'liters' => $request->input('liters'),
        ]);

        return redirect()->route('format.store')->with('mensaje','Formato de cerveza agregado con éxito');

        //return redirect('beerFormat')->with('mensaje','Formato cerveza agregado con éxito');
    }

    public function show(Beer_format $beerFormat)
    {
        //return view('beerFormat.show', compact('beerFormat'));
    }

    public function edit($id)
    {
        $beerFormat = Beer_format::findOrFail($id);
        return view('beerFormat.edit', compact('beerFormat'));    
    
    }

    public function update(Request $request, Beer_format $beerFormat)
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

        $beerFormat->update([
            'container' => $request->input('container'),
            'liters' => $request->input('liters'),
        ]);

        return redirect()->route('beerFormat.index')->with('mensaje','Formato de cerveza agregado con éxito');

        //return redirect('beerFormat')->with('mensaje','Formato cerveza agregado con éxito');
    }

    public function destroy(Beer_format $id)
    {   
        $id->delete();
        return redirect()->route('pages.format');
    }
}
