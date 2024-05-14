<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\County;

class CountyController extends Controller
{
    public function index()
    {
        $counties = County::all();
        return view('counties.index', compact('counties'));
    }

    public function create()
    {
        return view('counties.create');
    }

    public function store(Request $request)
    {
        County::create($request->all());
        return redirect()->route('counties.index')->with('success', 'County created successfully.');
    }

    public function show(County $county)
    {
        return view('counties.show', compact('county'));
    }

    public function edit(County $county)
    {
        return view('counties.edit', compact('county'));
    }

    public function update(Request $request, County $county)
    {
        $county->update($request->all());
        return redirect()->route('counties.index')->with('success', 'County updated successfully.');
    }

    public function destroy(County $county)
    {
        $county->delete();
        return redirect()->route('counties.index')->with('success', 'County deleted successfully.');
    }
}
