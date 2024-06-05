<?php

namespace App\Http\Controllers;

use App\Models\CompanyEvent;
use App\Models\Company;
use App\Models\Event;
use Illuminate\Http\Request;

class CompanyEventController extends Controller
{
    public function index()
    {
        $companyevents = CompanyEvent::all();
        return view('companyevents.index', compact('companyevents'));
    }

    public function create()
    {
        $companies = Company::all();
        $events = Event::all();
        return view('companyevents.create', compact('companies', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|integer|exists:companies,id',
            'event_id' => 'required|integer|exists:events,id',
        ], [
            'company_id.required' => 'La selección de la compañía es obligatoria.',
            'company_id.integer' => 'El ID de la compañía debe ser un número entero.',
            'company_id.exists' => 'La compañía seleccionada no existe.',
            'event_id.required' => 'La selección del evento es obligatoria.',
            'event_id.integer' => 'El ID del evento debe ser un número entero.',
            'event_id.exists' => 'El evento seleccionado no existe.',
        ]);
    
        CompanyEvent::create([
            'company_id' => $request->input('company_id'),
            'event_id' => $request->input('event_id'),
        ]);
    
        return redirect()->route('companyevents.index')->with('success', 'Relación agregada con éxito');
    }
    
    public function show(CompanyEvent $companyEvent)
    {
        // No se necesita implementación específica para show en este caso.
    }

    public function edit(CompanyEvent $companyEvent)
    {
        $companies = Company::all();
        $events = Event::all();
        return view('companyevents.edit', compact('companyEvent', 'companies', 'events'));
    }

    public function update(Request $request, CompanyEvent $companyEvent)
    {
        $request->validate([
            'company_id' => 'required|integer|exists:companies,id',
            'event_id' => 'required|integer|exists:events,id',
        ], [
            'company_id.required' => 'La selección de la compañía es obligatoria.',
            'company_id.integer' => 'El ID de la compañía debe ser un número entero.',
            'company_id.exists' => 'La compañía seleccionada no existe.',
            'event_id.required' => 'La selección del evento es obligatoria.',
            'event_id.integer' => 'El ID del evento debe ser un número entero.',
            'event_id.exists' => 'El evento seleccionado no existe.',
        ]);

        $companyEvent->update([
            'company_id' => $request->input('company_id'),
            'event_id' => $request->input('event_id'),
        ]);
        
        return redirect()->route('companyevents.index')->with('success','Relación actualizada con éxito');
    }

    public function destroy(CompanyEvent $companyEvent)
    {
        $companyEvent->delete();
        return redirect()->route('companyevents.index')->with('success', 'Relación eliminada con éxito');
    }
}
