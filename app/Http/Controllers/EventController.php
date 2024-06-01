<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('events.create', compact('events'));
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
            'start_date_time' => 'required|date|before:end_date_time',
            'end_date_time' => 'required|date|after:start_date_time',
            'location_latitude' => 'required|numeric|between:-90,90',
            'location_longitude' => 'required|numeric|between:-180,180',
        ], [
            'name.required' => 'El nombre del evento es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'start_date_time.required' => 'La fecha y hora de inicio son obligatorias.',
            'start_date_time.date' => 'La fecha y hora de inicio deben ser válidas.',
            'start_date_time.before' => 'La fecha y hora de inicio deben ser anteriores a la fecha y hora de finalización.',
            'end_date_time.required' => 'La fecha y hora de finalización son obligatorias.',
            'end_date_time.date' => 'La fecha y hora de finalización deben ser válidas.',
            'end_date_time.after' => 'La fecha y hora de finalización deben ser posteriores a la fecha y hora de inicio.',
            'location_latitude.required' => 'La latitud de la ubicación es obligatoria.',
            'location_latitude.numeric' => 'La latitud de la ubicación debe ser un número.',
            'location_latitude.between' => 'La latitud de la ubicación debe estar entre -90 y 90.',
            'location_longitude.required' => 'La longitud de la ubicación es obligatoria.',
            'location_longitude.numeric' => 'La longitud de la ubicación debe ser un número.',
            'location_longitude.between' => 'La longitud de la ubicación debe estar entre -180 y 180.',
        ]);
    
        Event::create([
            'name' => $request->input('name'),
            'start_date_time' => $request->input('start_date_time'),
            'end_date_time' => $request->input('end_date_time'),
            'location_latitude' => $request->input('location_latitude'),
            'location_longitude' => $request->input('location_longitude'),
        ]);
    
        return redirect()->route('events.store')->with('succes', 'Evento agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'start_date_time' => 'required|date|before:end_date_time',
            'end_date_time' => 'required|date|after:start_date_time',
            'location_latitude' => 'required|numeric|between:-90,90',
            'location_longitude' => 'required|numeric|between:-180,180',
        ], [
            'name.required' => 'El nombre del evento es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'start_date_time.required' => 'La fecha y hora de inicio son obligatorias.',
            'start_date_time.date' => 'La fecha y hora de inicio deben ser válidas.',
            'start_date_time.before' => 'La fecha y hora de inicio deben ser anteriores a la fecha y hora de finalización.',
            'end_date_time.required' => 'La fecha y hora de finalización son obligatorias.',
            'end_date_time.date' => 'La fecha y hora de finalización deben ser válidas.',
            'end_date_time.after' => 'La fecha y hora de finalización deben ser posteriores a la fecha y hora de inicio.',
            'location_latitude.required' => 'La latitud de la ubicación es obligatoria.',
            'location_latitude.numeric' => 'La latitud de la ubicación debe ser un número.',
            'location_latitude.between' => 'La latitud de la ubicación debe estar entre -90 y 90.',
            'location_longitude.required' => 'La longitud de la ubicación es obligatoria.',
            'location_longitude.numeric' => 'La longitud de la ubicación debe ser un número.',
            'location_longitude.between' => 'La longitud de la ubicación debe estar entre -180 y 180.',
        ]);

        $event->update([
            'name' => $request->input('name'),
            'start_date_time' => $request->input('start_date_time'),
            'end_date_time' => $request->input('end_date_time'),
            'location_latitude' => $request->input('location_latitude'),
            'location_longitude' => $request->input('location_longitude'),
        ]);
        
        return redirect()->route('events.index')->with('succes','Evento actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }
}
