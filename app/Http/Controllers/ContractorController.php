<?php

namespace App\Http\Controllers;

use App\Models\Contractor;
use Illuminate\Http\Request;

/**
 * Class ContractorController
 * @package App\Http\Controllers
 */
class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contractors = Contractor::paginate();

        return view('contractor.index', compact('contractors'))
            ->with('i', (request()->input('page', 1) - 1) * $contractors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contractor = new Contractor();
        return view('contractor.create', compact('contractor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Contractor::$rules);

        $contractor = Contractor::create($request->all());

        return redirect()->route('contractors.index')
            ->with('success', 'Contractor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contractor = Contractor::find($id);

        return view('contractor.show', compact('contractor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contractor = Contractor::find($id);

        return view('contractor.edit', compact('contractor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Contractor $contractor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contractor $contractor)
    {
        request()->validate(Contractor::$rules);

        $contractor->update($request->all());

        return redirect()->route('contractors.index')
            ->with('success', 'Contractor updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $contractor = Contractor::find($id)->delete();

        return redirect()->route('contractors.index')
            ->with('success', 'Contractor deleted successfully');
    }
}
