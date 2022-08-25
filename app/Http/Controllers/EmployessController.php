<?php

namespace App\Http\Controllers;

use App\Http\Services\EmployessService;
use Illuminate\Http\Request;

class EmployessController extends Controller
{

    private $service;

    public function __construct(EmployessService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $breadcrumbs = [
            ['link' => "javascript:void(0)", 'name' => "Listagem"]
        ];
        return view("employess.index", [
            'breadcrumbs' => $breadcrumbs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $breadcrumbs = [
            ['link' => "/employess", 'name' => "Listagem"],
            ['link' => "javascript:void(0)", 'name' => "Cadastrar"]
        ];
        return view("employess.create", [
            'breadcrumbs' => $breadcrumbs
        ]);
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
     * @param  \App\Models\Employess\Employess  $employess
     * @return \Illuminate\Http\Response
     */
    public function show(Employess $employess)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employess\Employess  $employess
     * @return \Illuminate\Http\Response
     */
    public function edit(Employess $employess)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employess\Employess  $employess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employess $employess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employess\Employess  $employess
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employess $employess)
    {
        //
    }
}
