<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beer;
use Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite(Beer $beer)
    {
        $user = Auth::user();
    
        if ($user->favorites->contains($beer)) {
            $user->favorites()->detach($beer);
            return back()->with('success', 'Cerveza eliminada de favoritos.');
        } else {
            $user->favorites()->attach($beer);
            return back()->with('success', 'Cerveza agregada a favoritos.');
        }
    }
    
}



