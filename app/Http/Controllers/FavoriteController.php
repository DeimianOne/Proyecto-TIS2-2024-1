<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::all();
        return view('favorites.index', compact('favorites'));
    }

    public function create()
    {
        return view('favorites.create');
    }

    public function store(Request $request)
    {
        Favorite::create($request->all());
        return redirect()->route('favorites.index')->with('success', 'Favorite created successfully.');
    }

    public function destroy(Request $request)
    {
        // Encuentra y elimina el favorito basado en el user_id y el product_id
        Favorite::where('user_id', $request->user_id)->where('product_id', $request->product_id)->delete();
        return redirect()->route('favorites.index')->with('success', 'Favorite deleted successfully.');
    }
}
