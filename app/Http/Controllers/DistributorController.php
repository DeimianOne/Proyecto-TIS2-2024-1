<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Distributor;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        return view('distributors.index', compact('distributors'));
    }

    public function create()
    {
        return view('distributors.create');
    }

    public function store(Request $request)
    {
        Distributor::create($request->all());
        return redirect()->route('distributors.index')->with('success', 'Distributor created successfully.');
    }

    public function show(Distributor $distributor)
    {
        return view('distributors.show', compact('distributor'));
    }

    public function edit(Distributor $distributor)
    {
        return view('distributors.edit', compact('distributor'));
    }

    public function update(Request $request, Distributor $distributor)
    {
        $distributor->update($request->all());
        return redirect()->route('distributors.index')->with('success', 'Distributor updated successfully.');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributors.index')->with('success', 'Distributor deleted successfully.');
    }
}
