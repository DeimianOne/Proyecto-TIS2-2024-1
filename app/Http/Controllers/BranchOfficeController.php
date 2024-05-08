<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch_office;

class BranchOfficeController extends Controller
{
    public function index()
    {
        $branchOffices = Branch_office::all();
        return view('branch_offices.index', compact('branchOffices'));
    }

    public function create()
    {
        return view('branch_offices.create');
    }

    public function store(Request $request)
    {
        Branch_office::create($request->all());
        return redirect()->route('branch-offices.index');
    }

    public function show(Branch_office $branchOffice)
    {
        return view('branch_offices.show', compact('branchOffice'));
    }

    public function edit(Branch_office $branchOffice)
    {
        return view('branch_offices.edit', compact('branchOffice'));
    }

    public function update(Request $request, Branch_office $branchOffice)
    {
        $branchOffice->update($request->all());
        return redirect()->route('branch-offices.index');
    }

    public function destroy(Branch_office $branchOffice)
    {
        $branchOffice->delete();
        return redirect()->route('branch-offices.index');
    }
}
