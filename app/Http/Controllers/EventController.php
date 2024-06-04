<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Company;
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
        $companies = Company::all();
        return view('events.create', compact('events','companies'));
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
        'company_id' => 'required|array',
        'company_id.*' => 'exists:companies,id',
    ], [

    ]);

    $event = Event::create([
        'name' => $request->input('name'),
        'start_date_time' => $request->input('start_date_time'),
        'end_date_time' => $request->input('end_date_time'),
        'location_latitude' => $request->input('location_latitude'),
        'location_longitude' => $request->input('location_longitude'),
    ]);

    $event->companies()->sync($request->input('company_id'));

    return redirect()->route('events.index')->with('success', 'Evento agregado con éxito');
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
        $companies = Company::all();
        return view('events.edit', compact('event', 'companies'));
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
        'company_id' => 'required|array',
        'company_id.*' => 'exists:companies,id',
    ], [
        // Mensajes de error personalizados
    ]);

    $event->update([
        'name' => $request->input('name'),
        'start_date_time' => $request->input('start_date_time'),
        'end_date_time' => $request->input('end_date_time'),
        'location_latitude' => $request->input('location_latitude'),
        'location_longitude' => $request->input('location_longitude'),
    ]);

    $event->companies()->sync($request->input('company_id'));
    
    return redirect()->route('events.index')->with('success', 'Evento actualizado con éxito');
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
