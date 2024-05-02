<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer;

class BeerController extends Controller
{
    public function index()
    {
        $beers = Beer::all();
        return view('beers.index', compact('beers'));
    }

    public function create()
    {
        return view('beers.create');
    }

    public function store(Request $request)
    {
        Beer::create($request->all());
        return redirect()->route('beers.index')->with('success', 'Beer created successfully.');
    }

    public function show(Beer $beer)
    {
        return view('beers.show', compact('beer'));
    }

    public function edit(Beer $beer)
    {
        return view('beers.edit', compact('beer'));
    }

    public function update(Request $request, Beer $beer)
    {
        $beer->update($request->all());
        return redirect()->route('beers.index')->with('success', 'Beer updated successfully.');
    }

    public function destroy(Beer $beer)
    {
        $beer->delete();
        return redirect()->route('beers.index')->with('success', 'Beer deleted successfully.');
    }
}
