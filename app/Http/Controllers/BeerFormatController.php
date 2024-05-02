<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer_format;

class BeerFormatController extends Controller
{
    public function index()
    {
        $formats = Beer_format::all();
        return view('beer_format.index', compact('formats'));
    }

    public function create()
    {
        return view('beer_format.create');
    }

    public function store(Request $request)
    {
        Beer_format::create($request->all());
        return redirect()->route('beer-format.index');
    }

    public function show(Beer_format $beerFormat)
    {
        return view('beer_format.show', compact('beerFormat'));
    }

    public function edit(Beer_format $beerFormat)
    {
        return view('beer_format.edit', compact('beerFormat'));
    }

    public function update(Request $request, Beer_format $beerFormat)
    {
        $beerFormat->update($request->all());
        return redirect()->route('beer-format.index');
    }

    public function destroy(Beer_format $beerFormat)
    {
        $beerFormat->delete();
        return redirect()->route('beer-format.index');
    }
}
