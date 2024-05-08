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
        $beerFormat = new Beer_format();
        $beerFormat->container = $request->input('container');
        $beerFormat->liters = $request->input('liters');
        
        // Guardar el nuevo registro en la base de datos
        $beerFormat->save();
    
        // Retornar la respuesta JSON con los datos guardados
        return response()->json($beerFormat);
        //return redirect('beerFormat')->with('mensaje','Formato cerveza agregado con éxito');
    }

    public function show(Beer_format $beerFormat)
    {
        return view('beerFormat.show', compact('beerFormat'));
    }

    public function edit($id)
    {
        $beerFormat = Beer_format::findOrFail($id);
        return view('beerFormat.edit', compact('beerFormat'));
    }

    public function update(Request $request, $id)
    {
        $datosbeerFormat = $request->except(['_token', '_method']);
        Beer_format::where('id', '=', $id)->update($datosbeerFormat);
    
        $beerFormat = Beer_format::findOrFail($id);
        return view('beerFormat.edit', compact('beerFormat'));
    }

    public function destroy($id)
    {

        Beer_format::destroy($id);
        return redirect('pages.format');
    }
}
