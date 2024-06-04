<?php

namespace App\Http\Controllers;

use App\Models\CompanyDistributor;
use App\Models\Distributor;
use Illuminate\Http\Request;

class CompanyDistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companydistributors = CompanyDistributor::all();
        $distributors = Distributor::all();
        return view('companydistributors.index', compact('companydistributors', 'distributors'));
    }

    
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
     * @param  \App\Models\CompanyDistributor  $companyDistributor
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyDistributor $companyDistributor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyDistributor  $companyDistributor
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyDistributor $companyDistributor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyDistributor  $companyDistributor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyDistributor $companyDistributor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDistributor  $companyDistributor
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDistributor $companyDistributor)
    {
        //
    }
}