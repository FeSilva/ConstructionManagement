<?php

namespace App\Http\Controllers;

use App\Models\Contractors\contractors;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['name' => "Listagem"]
        ];
        return view("contractors.index",compact('breadcrumbs'));
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
     * @param  \App\Models\Contractors\contractors  $contractors
     * @return \Illuminate\Http\Response
     */
    public function show(contractors $contractors)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contractors\contractors  $contractors
     * @return \Illuminate\Http\Response
     */
    public function edit(contractors $contractors)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contractors\contractors  $contractors
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, contractors $contractors)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contractors\contractors  $contractors
     * @return \Illuminate\Http\Response
     */
    public function destroy(contractors $contractors)
    {
        //
    }
}
