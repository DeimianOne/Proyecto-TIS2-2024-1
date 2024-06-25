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
    public function show(Request $request)
    {

        // Obtener todos los formatos de contenedor
        $beerformats = Beerformat::all();

        $query = Beer::with('product');

        // Aplicar filtros independientemente
        if ($request->has('min_price') || $request->has('max_price')) {
            $query = $this->applyPriceFilter($request, $query);
        }

        if ($request->has('containers')) {
            $query = $this->applyContainerFilter($request, $query);
        }

        // Obtener los resultados filtrados
        $beers = $query->get();

        // Calcular valores mínimo y máximo de precio entre las cervezas filtradas
        $minBeerPrice = Beer::with('product')->get()->min('product.value');
        $maxBeerPrice = Beer::with('product')->get()->max('product.value');

        // Pasar las cervezas a la vista
        // return view('shop', compact('beers'));
        return view('shop', compact('beers', 'minBeerPrice', 'maxBeerPrice', 'beerformats'));
    }

    private function applyPriceFilter(Request $request, $query)
    {
        $minPrice = $request->input('min_price', 0);
        $maxPrice = $request->input('max_price', INF);

        $query->whereHas('product', function ($q) use ($minPrice, $maxPrice) {
            $q->whereBetween('value', [$minPrice, $maxPrice]);
        });

        return $query;
    }

    private function applyContainerFilter(Request $request, $query)
    {
        $containers = $request->input('containers', []);

        if (!empty($containers)) {
            $query->whereHas('beerformats', function ($q) use ($containers) {
                $q->whereIn('container', $containers);
            });
        }

        return $query;
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

    public function showAndIncrement($id)
    {
        // Encuentra la cerveza
        $beer = Beer::findOrFail($id);
    
        // Incrementa el contador de visitas en el producto relacionado
        $product = $beer->product;
        $product->visualizations += 1;
        $product->save();
    
        // Redirige a la vista del catálogo con la cerveza específica
        return view('catalogue', compact('beer'));
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
