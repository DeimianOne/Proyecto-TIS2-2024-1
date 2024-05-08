<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer;

class BeerController extends Controller
{
    public function index()
    {
        $datos['beers'] = Beer::paginate(5);
        return view('beer.index',$datos);
    }

    public function create()
    {
        return view('beer.create');
    }

    public function store(Request $request)
    {
        // Validar los datos antes de almacenarlos, si es necesario
    
        // Crear una nueva instancia del modelo con los datos del formulario
        $beer = new Beer();
        $datos = request()->except('_token');
        // $beer->name = $request->input('name');
        // $beer->beer_style = $request->input('beer_style'); // Asumiendo que 'style' es el nombre del campo en el formulario
        // $beer->format = $request->input('format'); // Asumiendo que 'format' es el nombre del campo en el formulario
        // $beer->litre_value = $request->input('litre_value'); // Asumiendo que 'price_per_liter' es el nombre del campo en el formulario
        // $beer->image = $request->input('image');
        // $beer->count_views = $request->input('count_views');
        // $beer->stock = $request->input('stock');
        // $beer->type_product = $request->input('type_product'); // Asumiendo que 'stock' es el nombre del campo en el formulario
        // Asignar la imagen si se cargó una
        /*if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $beer->image = $imageName;
        }*/

        
        // Guardar el nuevo registro en la base de datos
        $beer->save();
    
        // Retornar la respuesta de redireccionamiento con un mensaje
        return redirect('beer')->with('mensaje', 'Producto agregado con éxito');
    }

    public function show(Beer $beer)
    {
        return view('beers.show', compact('beer'));
    }

    public function edit($id)
    {
        $beer = Beer::findOrFail($id);
        return view('beer.edit', compact('beer'));
    }

    public function update(Request $request,$id)
    {
        $datosBeer = $request->except(['_token', '_method']);
        Beer::where('id', '=', $id)->update($datosBeer);
    
        $beer = Beer::findOrFail($id);
        return view('beer.edit', compact('beer'))->with('mensaje', 'Producto actualizado con éxito');
    }

    public function destroy($id)
    {
        Beer::destroy($id);
        return redirect('beer')->with('mensaje','Cerveza eliminada');
    }
}
