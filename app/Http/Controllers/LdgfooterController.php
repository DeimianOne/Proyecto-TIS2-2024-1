<?php

namespace App\Http\Controllers;

use App\Models\Ldgfooter;
use App\Models\Company;
use Illuminate\Http\Request;

class LdgfooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerData = Ldgfooter::first();
        $companies = Company::all(); // Obtén todas las compañías
        return view('ldgfooters.index', compact('footerData', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('ldgfooters.index', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'address' => 'required|string|max:255',
            'address_number' => 'required|integer',
            'phone_number' => 'required|integer',
            'business_email' => 'required|email|max:255',
            'contact_email' => 'required|email|max:255',
            'facebook' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'terms' => 'required|string',
            'return_policy' => 'required|string',
            'company_id' => 'required|exists:companies,id', // Asegúrate de validar company_id
        ]);
    
        // Crear un nuevo registro en ldgfooters
        $ldgfooter = Ldgfooter::create([
            'address' => $request->input('address'),
            'address_number' => $request->input('address_number'),
            'phone_number' => $request->input('phone_number'),
            'business_email' => $request->input('business_email'),
            'contact_email' => $request->input('contact_email'),
            'facebook' => $request->input('facebook'),
            'x' => $request->input('x'),
            'instagram' => $request->input('instagram'),
            'tiktok' => $request->input('tiktok'),
            'youtube' => $request->input('youtube'),
            'terms' => $request->input('terms'),
            'return_policy' => $request->input('return_policy'),
            'company_id' => $request->input('company_id'), // Asegúrate de que company_id se está insertando
        ]);
    
        return redirect()->route('ldgfooters.index')->with('success', 'Datos agregados exitosamente');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ldgfooter  $ldgfooter
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $footerData = Ldgfooter::first();
        return view('layouts.footer', compact('footerData'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ldgfooter  $ldgfooter
     * @return \Illuminate\Http\Response
     */
    public function edit(Ldgfooter $ldgfooter)
    {
        {
        $companies = Company::all();
        return view('ldgfooters.index', compact('ldgfooter', 'companies'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ldgfooter  $ldgfooter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ldgfooter $ldgfooter)
    {
    
        // Validar los datos del formulario
        $request->validate([
            'address' => 'required|string|max:255',
            'address_number' => 'required|integer',
            'phone_number' => 'required|integer',
            'business_email' => 'required|email|max:255',
            'contact_email' => 'required|email|max:255',
            'facebook' => 'nullable|string|max:255',
            'x' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'tiktok' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'terms' => 'required|string',
            'return_policy' => 'required|string',
        ]);
    
        $ldgfooter->update([
            'address' => $request->input('address'),
            'address_number' => $request->input('address_number'),
            'phone_number' => $request->input('phone_number'),
            'business_email' => $request->input('business_email'),
            'contact_email' => $request->input('contact_email'),
            'facebook' => $request->input('facebook'),
            'x' => $request->input('x'),
            'instagram' => $request->input('instagram'),
            'tiktok' => $request->input('tiktok'),
            'youtube' => $request->input('youtube'),
            'terms' => $request->input('terms'),
            'return_policy' => $request->input('return_policy'),
        ]);
    
        return redirect()->route('ldgfooters.index')->with('success', 'Datos actualizados exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ldgfooter  $ldgfooter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ldgfooter $ldgfooter)
    {
        //
    }
}