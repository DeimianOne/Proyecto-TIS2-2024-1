<?php

namespace App\Http\Controllers;

use App\Models\Ldgfooter;
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
        return view('ldgfooters.index', compact('footerData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $footerDatas = Ldgfooter::all();
        return view('ldgfooters.index',compact('ldgfooter'));
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
