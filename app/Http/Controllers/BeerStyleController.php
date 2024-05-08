<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer_Style;

class BeerStyleController extends Controller
{
    public function index()
    {
        $beerStyles = Beer_Style::all();
        return view('beerStyle.index', compact('beerStyles'));
    }

    public function create()
    {
        return view('beerStyle.create');
    }

    public function store(Request $request)
    {
        $beerStyle = new Beer_Style();
        $beerStyle->name = $request->input('name');
        
        // Guardar el nuevo registro en la base de datos
        $beerStyle->save();
    
        // Retornar la respuesta JSON con los datos guardados
        return response()->json($beerStyle);
        //return redirect('beerStyle')->with('mensaje','Estilo cerveza agregado con éxito');
    }

    public function show(Beer_Style $beerStyle)
    {
        return view('beer_styles.show', compact('beerStyle'));
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
