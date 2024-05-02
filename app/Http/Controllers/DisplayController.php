<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Display;

class DisplayController extends Controller
{
    public function index()
    {
        $displays = Display::all();
        return view('displays.index', compact('displays'));
    }

    public function create()
    {
        return view('displays.create');
    }

    public function store(Request $request)
    {
        Display::create($request->all());
        return redirect()->route('displays.index')->with('success', 'Display created successfully.');
    }

    public function show(Display $display)
    {
        return view('displays.show', compact('display'));
    }

    public function edit(Display $display)
    {
        return view('displays.edit', compact('display'));
    }

    public function update(Request $request, Display $display)
    {
        $display->update($request->all());
        return redirect()->route('displays.index')->with('success', 'Display updated successfully.');
    }

    public function destroy(Display $display)
    {
        $display->delete();
        return redirect()->route('displays.index')->with('success', 'Display deleted successfully.');
    }
}
