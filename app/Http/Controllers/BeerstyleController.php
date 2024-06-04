<?php

namespace App\Http\Controllers;

use App\Models\Beerstyle;
use Illuminate\Http\Request;

class BeerstyleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beerstyles = Beerstyle::all();
        return view('beerstyles.index', compact('beerstyles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $beerstyle = Beerstyle::all();
        return view('beerstyles.create', compact('beerstyle'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre del estilo de cerveza es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        Beerstyle::create([
            'name' => $request->input('name'),
        ]);

        return redirect()->route('beerstyles.store')->with('mensaje','Estilo agregado con éxito');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beerstyle  $beerstyle
     * @return \Illuminate\Http\Response
     */
    public function show(Beerstyle $beerstyle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beerstyle  $beerstyle
     * @return \Illuminate\Http\Response
     */
    public function edit(Beerstyle $beerstyle)
    {
        return view('beerstyles.edit', compact('beerstyle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beerstyle  $beerstyle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beerstyle $beerstyle)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre del producto es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
        ]);

        $beerstyle->update([
            'name' => $request->input('name'),
        ]);
        
        return redirect()->route('beerstyles.index')->with('mensaje','Estilo actualizado con éxito');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beerstyle  $beerstyle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beerstyle $beerstyle)
    {
        $beerstyle->delete();
        return redirect()->route('beerstyles.index');
    }
}
