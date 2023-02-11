<?php

namespace App\Http\Controllers;

use App\Http\Services\UsersService;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\Bus;
use Illuminate\Http\Request;

use App\Models\Survey;

class UserController extends Controller
{
    private $service;

    public function __construct(UsersService $service)
    {
        $this->service = $service;
        $this->service->getUsersJson();
    }

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
        return view('users.index', compact('breadcrumbs'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->service->getUserById($id);

        $aSurveys = Survey::with("typesInspection")->where("owner_id", $id)->get();
        $accomplished = $aSurveys->whereIn("status",['aprovado','Enviado'])->count();
        $outstanding = $aSurveys->where("status", 'cadastro')->count();
        $supervisors = UsersService::supervisor();
        $surveys = Survey::with("typesInspection")->where("owner_id", $id)->orderBy("inspection_date","desc")->paginate();
        return view("users.account", compact("user","accomplished","outstanding","surveys","supervisors"));
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
