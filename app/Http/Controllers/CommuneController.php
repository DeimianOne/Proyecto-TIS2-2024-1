<?php

namespace App\Http\Controllers;

use App\Models\Commune;
use App\Models\Province;
use Illuminate\Http\Request;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communes = Commune::all();
        return view('communes.index', compact('communes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Province::all();
        $communes = Commune::all();
        return view('communes.create', compact('communes' , 'provinces'));
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
            'province_id' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre de la comuna es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'province_id.required' => 'La provincia es obligatoria.',
        ]);

        Commune::create([
            'name' => $request->input('name'),
            'province_id' => $request->input('province_id'),
        ]);

        return redirect()->route('communes.index')->with('success','Comuna agregada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function show(Commune $commune)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function edit(Commune $commune)
    {
        $provinces = Province::all();
        return view('communes.edit', compact('commune' , 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commune $commune)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'province_id' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre de la comuna es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'province_id.required' => 'La provincia es obligatoria.',
        ]);

        $commune->update([
            'name' => $request->input('name'),
            'province_id' => $request->input('province_id'),
        ]);
        
        return redirect()->route('communes.index')->with('success','Comuna actualizada con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commune  $commune
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commune $commune)
    {
        $commune->delete();
        return redirect()->route('communes.index')->with('success','Comuna eliminada con éxito');
    }
}
