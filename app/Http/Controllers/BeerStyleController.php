<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer_Style;

class BeerStyleController extends Controller
{
    public function index()
    {
        $beerStyles = Beer_Style::all();
        return view('pages.beer_style', compact('beerStyles'));//page.beer_style --> route('beer_style.create') del boton
    }

    public function create()
    {
        
        return view('beerStyle.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        Beer_Style::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('beer_style.store')->with('mensaje','Estilo cerveza agregado con éxito');
    }

    public function show(Beer_Style $beerStyle)
    {
        return view('beerStyle.show', compact('beerStyle'));
    }

    public function edit($id)
    {
        $beerStyle = Beer_Style::findOrFail($id);
        return view('beerStyle.edit', compact('beerStyle'));
    }

    public function update(Request $request, $id)
    {
        $datosBeerStyle = $request->except(['_token', '_method']);
        Beer_Style::where('id', '=', $id)->update($datosBeerStyle);
    
        $beerStyle = Beer_Style::findOrFail($id);
        return view('beerStyle.edit', compact('beerStyle'));
    }

    public function destroy($id)
    {
        Beer_Style::destroy($id);
        return redirect('beerStyle')->with('mensaje','Estilo de cerveza eliminado');
    }
}
