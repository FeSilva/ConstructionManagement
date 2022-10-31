<?php

namespace App\Http\Controllers;

use App\Models\TypesInspection;
use Illuminate\Http\Request;

/**
 * Class TypesInspectionController
 * @package App\Http\Controllers
 */
class TypesInspectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typesInspections = TypesInspection::paginate();

        return view('types-inspection.index', compact('typesInspections'))
            ->with('i', (request()->input('page', 1) - 1) * $typesInspections->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typesInspection = new TypesInspection();
        return view('types-inspection.create', compact('typesInspection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TypesInspection::$rules);

        $typesInspection = TypesInspection::create($request->all());

        return redirect()->route('types_inspection.index')
            ->with('success', 'TypesInspection created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $typesInspection = TypesInspection::find($id);

        return view('types-inspection.show', compact('typesInspection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typesInspection = TypesInspection::find($id);

        return view('types-inspection.edit', compact('typesInspection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TypesInspection $typesInspection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TypesInspection $typesInspection)
    {
        request()->validate(TypesInspection::$rules);

        $typesInspection->update($request->all());

        return redirect()->route('types_inspection.index')
            ->with('success', 'TypesInspection updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $typesInspection = TypesInspection::find($id)->delete();

        return redirect()->route('types_inspection.index')
            ->with('success', 'TypesInspection deleted successfully');
    }
}
