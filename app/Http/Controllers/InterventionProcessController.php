<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Contractor;
use App\Models\InterventionProcess;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;

/**
 * Class InterventionProcessController
 * @package App\Http\Controllers
 */
class InterventionProcessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interventionProcesses = InterventionProcess::with("contractor")->with("building")->paginate();
        return view('intervention-process.index', compact('interventionProcesses'))
            ->with('i', (request()->input('page', 1) - 1) * $interventionProcesses->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::pluck("id","name");
        $contractors = Contractor::pluck("fantasy_name","id");
        $fiscal = User::where("current_team_id", 2)->orderBy("name")->pluck("name","id");
        $programas = Program::where("ativo", 1)->pluck("name","id");

        $interventionProcess = new InterventionProcess();
        return view('intervention-process.create', compact('interventionProcess','buildings','contractors','fiscal','programas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(InterventionProcess::$rules);

        $interventionProcess = InterventionProcess::create($request->all());

        return redirect()->route('intervention_process.index')
            ->with('success', 'InterventionProcess created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $interventionProcess = InterventionProcess::find($id);

        return view('intervention-process.show', compact('interventionProcess'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interventionProcess = InterventionProcess::find($id);

        return view('intervention-process.edit', compact('interventionProcess'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InterventionProcess $interventionProcess
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InterventionProcess $interventionProcess)
    {
        request()->validate(InterventionProcess::$rules);

        $interventionProcess->update($request->all());

        return redirect()->route('intervention_process.index')
            ->with('success', 'InterventionProcess updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $interventionProcess = InterventionProcess::find($id)->delete();

        return redirect()->route('intervention_process.index')
            ->with('success', 'InterventionProcess deleted successfully');
    }
}
