<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingEdit;

class startController extends Controller
{
    public function index()
    {
        $datos = LandingEdit::all();
        
        return view('startview', compact('datos'));
        
    }
}
