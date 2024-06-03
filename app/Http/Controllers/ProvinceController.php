<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\Region;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        return view('provinces.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $regions = Region::all();
        $provinces = Province::all();
        return view('provinces.create', compact('provinces' , 'regions'));
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
            'region_id' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre de la provincia es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'region_id.required' => 'La región es obligatoria.',
        ]);

        Province::create([
            'name' => $request->input('name'),
            'region_id' => $request->input('region_id'),
        ]);

        return redirect()->route('provinces.store')->with('mensaje','Provincia agregada con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(Province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(Province $province)
    {
        $regions = Region::all();
        return view('provinces.edit', compact('province' , 'regions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Province $province)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'region_id' => 'required|string|max:100',
        ], [
            'name.required' => 'El nombre de la provincia es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'region_id.required' => 'La región es obligatoria.',
        ]);

        $province->update([
            'name' => $request->input('name'),
            'region_id' => $request->input('region_id'),
        ]);
        
        return redirect()->route('provinces.index')->with('mensaje','Provincia actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(Province $province)
    {
        $province->delete();
        return redirect()->route('provinces.index');
    }
}
