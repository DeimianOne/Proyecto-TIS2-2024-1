<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer_Style;

class BeerStyleController extends Controller
{
    public function index()
    {
        $styles = Beer_Style::all();
        return view('beer_styles.index', compact('styles'));
    }

    public function create()
    {
        return view('beer_styles.create');
    }

    public function store(Request $request)
    {
        Beer_Style::create($request->all());
        return redirect()->route('beer-styles.index');
    }

    public function show(Beer_Style $beerStyle)
    {
        return view('beer_styles.show', compact('beerStyle'));
    }

    public function edit(Beer_Style $beerStyle)
    {
        return view('beer_styles.edit', compact('beerStyle'));
    }

    public function update(Request $request, Beer_Style $beerStyle)
    {
        $beerStyle->update($request->all());
        return redirect()->route('beer-styles.index');
    }

    public function destroy(Beer_Style $beerStyle)
    {
        $beerStyle->delete();
        return redirect()->route('beer-styles.index');
    }
}
