<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Beer;

class FavoriteController extends Controller
{


    public function index()
    {
        $favorites = Auth::user()->favorites()->with('product')->get();
        return view('favorites.index', compact('favorites'));
    }
    public function toggleFavorite($beerId)
    {
        $user = Auth::user();
        $beer = Beer::findOrFail($beerId);

        if ($user->favorites()->where('beer_id', $beerId)->exists()) {
            $user->favorites()->detach($beerId);
            return response()->json(['status' => 'removed']);
        } else {
            $user->favorites()->attach($beerId);
            return response()->json(['status' => 'added']);
        }
    }
}




