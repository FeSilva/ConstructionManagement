<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Services\MeansurentService;
use App\Http\Services\UsersService;
class MeansurentController extends Controller
{
    private $service;
    private $userService;

    public function __construct(MeansurentService $service, UsersService $userService) {
        $this->service = $service;
        $this->userService = $userService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $meansurents = $this->service->getMeansurentService();
        $supervisors = $this->userService->supervisor();
        return view("meansurent.index", compact('meansurents', 'supervisors'));
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
        try {
            $meansurent = $this->service->store($request->except('_token','fiscais'));
            $this->service->processMeansurent($meansurent, $request->post('fiscais'), $request->post('medicao_dt_init'), $request->post('medicao_dt_end'));
            return;
        } catch (\Exception $e) {
            return response()->josn();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
