<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Verificar si ya existe un like para este usuario y producto
        $existingLike = Like::where('product_id', $request->product_id)
            ->where('user_id', $request->user_id)
            ->first();

        // Si ya existe un like, incrementar el contador
        if ($existingLike) {
            $existingLike->increment('like_count');
            return redirect()->back()->with('success', 'Like updated successfully.');
        }

        // Si no existe un like, crear uno nuevo
        $like = new Like();
        $like->product_id = $request->product_id;
        $like->user_id = $request->user_id;
        $like->like_count = 1;
        $like->save();

        return redirect()->back()->with('success', 'Like created successfully.');
    }

    public function destroy(Request $request)
    {
        // Validación de datos
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
        ]);

        // Buscar y eliminar el like basado en el product_id y user_id
        Like::where('product_id', $request->product_id)
            ->where('user_id', $request->user_id)
            ->delete();

        return redirect()->back()->with('success', 'Like deleted successfully.');
    }
}
