<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merchandising;
use App\Models\Product_types;

class MerchandisingController extends Controller
{
    public function index()
    {
        $merchandisings = Merchandising::all();
        return view('merchandisings.index', compact('merchandisings'));
    }

    public function create()
    {
        $productTypes = Product_types::all();
        return view('merchandisings.create', compact('productTypes'));
    }

    public function store(Request $request)
    {
        Merchandising::create($request->all());
        return redirect()->route('merchandisings.index');
    }

    public function show(Merchandising $merchandising)
    {
        return view('merchandisings.show', compact('merchandising'));
    }

    public function edit(Merchandising $merchandising)
    {
        $productTypes = Product_types::all();
        return view('merchandisings.edit', compact('merchandising', 'productTypes'));
    }

    public function update(Request $request, Merchandising $merchandising)
    {
        $merchandising->update($request->all());
        return redirect()->route('merchandisings.index');
    }

    public function destroy(Merchandising $merchandising)
    {
        $merchandising->delete();
        return redirect()->route('merchandisings.index');
    }
}
