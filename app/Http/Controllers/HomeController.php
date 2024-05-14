<?php

namespace App\Http\Controllers;

use App\Models\LandingEdit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $landingDatos = LandingEdit::all();
        
        return view('layouts.footer', compact('landingDatos'));
        
    }
}
