<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
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
            'model' => 'required|string|max:20',
            'brand' => 'required|string|max:20',
        ], [
            'model.required' => 'El modelo es obligatorio.',
            'model.max' => 'El modelo no puede superar los 20 caracteres.',
            'brand.required' => 'El modelo es obligatorio.',
            'brand.max' => 'El modelo no puede superar los 20 caracteres.',
        ]);

        Car::create([
            'model' => $request->input('model'),
            'brand' => $request->input('brand'),
            
        ]);

        return redirect()->route('cars.index')->with('success', 'Auto creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'model' => 'required|string|max:20',
            'brand' => 'required|string|max:20',
        ], [
            'model.required' => 'El modelo es obligatorio.',
            'model.max' => 'El modelo no puede superar los 20 caracteres.',
            'brand.required' => 'El modelo es obligatorio.',
            'brand.max' => 'El modelo no puede superar los 20 caracteres.',
        ]);

        $car->update([
            'model' => $request->input('model'),
            'brand' => $request->input('brand'),
            
        ]);

        return redirect()->route('cars.index')->with('success', 'Auto creado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Auto eliminado exitosamente.');
    }
}
