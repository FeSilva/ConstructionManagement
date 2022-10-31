<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

/**
 * Class BuildingController
 * @package App\Http\Controllers
 */
class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::paginate();

        return view('building.index', compact('buildings'))
            ->with('i', (request()->input('page', 1) - 1) * $buildings->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $building = new Building();
        return view('building.create', compact('building'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Building::$rules);

        $building = Building::create($request->all());

        return redirect()->route('buildings.index')
            ->with('success', 'Building created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $building = Building::find($id);

        return view('building.show', compact('building'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $building = Building::find($id);

        return view('building.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Building $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        request()->validate(Building::$rules);

        $building->update($request->all());

        return redirect()->route('buildings.index')
            ->with('success', 'Building updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $building = Building::find($id)->delete();

        return redirect()->route('buildings.index')
            ->with('success', 'Building deleted successfully');
    }
}
