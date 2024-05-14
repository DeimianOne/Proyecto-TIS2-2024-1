<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'comment' => 'required|string',
        ]);

        // Crear el comentario
        $comment = new Comment();
        $comment->product_id = $request->product_id;
        $comment->user_id = $request->user_id;
        $comment->comment = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comment created successfully.');
    }

    public function destroy(Comment $comment)
    {
        // Eliminar el comentario
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
