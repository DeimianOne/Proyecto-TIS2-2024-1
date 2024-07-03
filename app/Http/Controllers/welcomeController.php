<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ldgfooter;

class welcomeController extends Controller
{
    public function index()
    {
        $footerDatas = Ldgfooter::first(); // Obtener el primer registro de la tabla
        return view('/', compact('footerDatas'));
    }
}
