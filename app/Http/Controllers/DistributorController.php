<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use App\Models\Company;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributors = Distributor::all();
        return view('distributors.index', compact('distributors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        $distributors = Distributor::all();
        return view('distributors.create', compact('distributors','companies'));
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
            'address' => 'required|string|max:100',
            'address_number' => 'required|numeric',
            'phone_number' => 'required|string|max:11',
            'email' => 'required|string|email|max:100',
            'company_id' => 'required|array',
            'company_id.*' => 'exists:companies,id',
        ], [
            'name.required' => 'El nombre de la compañía de cerveza es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'address.required' => 'La dirección es obligatoria.',
            'address.max' => 'La dirección no puede superar los 100 caracteres.',
            'address_number.required' => 'El número de la dirección es obligatorio.',
            'address_number.numeric' => 'El número de la dirección debe ser un valor numérico.',
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El correo electrónico no puede superar los 100 caracteres.',
        ]);
    
        $distributor = Distributor::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'address_number' => $request->input('address_number'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'), // Asegúrate de que esto esté presente
        ]);

        
        $distributor->companies()->sync($request->input('company_id'));
    
        return redirect()->route('distributors.index')->with('success', 'Distribuidor agregado con éxito');
    }
        /**
     * Display the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function show(Distributor $distributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function edit(Distributor $distributor)
    {
        $companies = Company::all();
        return view('distributors.edit', compact('distributor'));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:100',
            'address_number' => 'required|numeric',
            'phone_number' => 'required|numeric',
            'email' => 'required|string|email|max:100',
            'company_id' => 'required|array',
            'company_id.*' => 'exists:companies,id',
        ], [
            'name.required' => 'El nombre de la compañía de cerveza es obligatorio.',
            'name.max' => 'El nombre no puede superar los 100 caracteres.',
            'address.required' => 'La dirección es obligatoria.',
            'address.max' => 'La dirección no puede superar los 100 caracteres.',
            'address_number.required' => 'El número de la dirección es obligatorio.',
            'address_number.numeric' => 'El número de la dirección debe ser un valor numérico.',
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El correo electrónico no puede superar los 100 caracteres.',
        ]);

        $distributor->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'address_number' => $request->input('address_number'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
        ]);

        $distributor->companies()->sync($request->input('company_id'));
        
        return redirect()->route('distributors.index')->with('succes','Compañía actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Distributor  $distributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributors.index');
    }
}
