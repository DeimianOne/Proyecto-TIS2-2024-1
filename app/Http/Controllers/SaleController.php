<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::all();
        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        // Aquí podrías obtener los datos necesarios para el formulario de creación
        return view('sales.create');
    }

    public function store(Request $request)
    {
        // Aquí podrías validar y procesar los datos recibidos del formulario de creación
        Sale::create($request->all());
        return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
    }

    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    public function edit(Sale $sale)
    {
        // Aquí podrías obtener los datos necesarios para el formulario de edición
        return view('sales.edit', compact('sale'));
    }

    public function update(Request $request, Sale $sale)
    {
        // Aquí podrías validar y procesar los datos recibidos del formulario de edición
        $sale->update($request->all());
        return redirect()->route('sales.index')->with('success', 'Sale updated successfully.');
    }

    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success', 'Sale deleted successfully.');
    }
}
