<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;

/**
 * Class SurveyController
 * @package App\Http\Controllers
 */
class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::with("interventionProcess")
        ->with("typesInspection")
        ->with("progress")
        ->with("user")
        ->with("rhythm")
        ->orderBy('inspection_date', 'desc')
        ->paginate();

        return view('survey.index', compact('surveys'))
            ->with('i', (request()->input('page', 1) - 1) * $surveys->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $survey = new Survey();
        return view('survey.create', compact('survey'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Survey::$rules);
        $survey = Survey::create($request->all());
        return redirect()->route('surveys.index')
            ->with('success', 'Survey created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $survey = Survey::find($id);

        return view('survey.show', compact('survey'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $survey = Survey::find($id);

        return view('survey.edit', compact('survey'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Survey $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Survey $survey)
    {
        request()->validate(Survey::$rules);

        $survey->update($request->all());

        return redirect()->route('surveys.index')
            ->with('success', 'Survey updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $survey = Survey::find($id)->delete();

        return redirect()->route('surveys.index')
            ->with('success', 'Survey deleted successfully');
    }
}
