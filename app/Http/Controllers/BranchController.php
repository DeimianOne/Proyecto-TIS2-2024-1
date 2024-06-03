<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Commune;
use App\Models\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $communes = Commune::all();
        $companies = Company::all();
        $branches = Branch::all();
        return view('branches.index', compact('branches','companies','communes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $branches = Branch::all();
        $communes = Commune::all();
        $companies = Company::all();
        return view('branches.create', compact('branches','communes','companies'));
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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'address_number' => 'required|integer',
            'phone_number' => 'required|integer',
            'branch_type' => 'required|in:factory,retail_store,office',
            'company_id' => 'required|exists:companies,id',
            'commune_id' => 'required|exists:communes,id',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'address.required' => 'La dirección es obligatoria.',
            'address.string' => 'La dirección debe ser una cadena de texto.',
            'address.max' => 'La dirección no puede tener más de 255 caracteres.',
            'address_number.required' => 'El número de dirección es obligatorio.',
            'address_number.integer' => 'El número de dirección debe ser un número entero.',
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.integer' => 'El número de teléfono debe ser un número entero.',
            'branch_type.required' => 'El tipo de sucursal es obligatorio.',
            'branch_type.in' => 'El tipo de sucursal debe ser una de las siguientes opciones: fábrica, tienda minorista, oficina.',
            'company_id.required' => 'El ID de la empresa es obligatorio.',
            'company_id.exists' => 'El ID de la empresa no existe en la base de datos.',
            'commune_id.required' => 'El ID de la comuna es obligatorio.',
            'commune_id.exists' => 'El ID de la comuna no existe en la base de datos.',
        ]);

        Branch::create([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'address_number' => $request->input('address_number'),
            'phone_number' => $request->input('phone_number'),
            'branch_type' => $request->input('branch_type'),
            'company_id' => $request->input('company_id'),
            'commune_id' => $request->input('commune_id'),
        ]);

        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $communes = Commune::all();
        $companies = Company::all();
        return view('branches.edit', compact('branch','companies','communes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'address_number' => 'required|integer',
            'phone_number' => 'required|integer',
            'branch_type' => 'required|in:factory,retail_store,office',
            'company_id' => 'required|exists:companies,id',
            'commune_id' => 'required|exists:communes,id',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no puede tener más de 255 caracteres.',
            'address.required' => 'La dirección es obligatoria.',
            'address.string' => 'La dirección debe ser una cadena de texto.',
            'address.max' => 'La dirección no puede tener más de 255 caracteres.',
            'address_number.required' => 'El número de dirección es obligatorio.',
            'address_number.integer' => 'El número de dirección debe ser un número entero.',
            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.integer' => 'El número de teléfono debe ser un número entero.',
            'branch_type.required' => 'El tipo de sucursal es obligatorio.',
            'branch_type.in' => 'El tipo de sucursal debe ser una de las siguientes opciones: fábrica, tienda minorista, oficina.',
            'company_id.required' => 'El ID de la empresa es obligatorio.',
            'company_id.exists' => 'El ID de la empresa no existe en la base de datos.',
            'commune_id.required' => 'El ID de la comuna es obligatorio.',
            'commune_id.exists' => 'El ID de la comuna no existe en la base de datos.',
        ]);

        $branch->update([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'address_number' => $request->input('address_number'),
            'phone_number' => $request->input('phone_number'),
            'branch_type' => $request->input('branch_type'),
            'company_id' => $request->input('company_id'),
            'commune_id' => $request->input('commune_id'),
        ]);
        
        return redirect()->route('branches.index')->with('success','Comuna actualizado con éxito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->route('branches.index');
    }
}
