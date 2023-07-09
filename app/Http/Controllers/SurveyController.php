<?php

namespace App\Http\Controllers;


use App\Models\Survey;
use App\Models\User;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Services\SurveyServices;
use Illuminate\Support\Facades\Storage;
/**
 * Class SurveyController
 * @package App\Http\Controllers
 */
class SurveyController extends Controller
{
    protected $service;
    protected $fiscal;
    public function __construct(SurveyServices $service) {
        $this->service = $service;
        $this->fiscal = User::where("current_team_id", 2)->orderBy("name")->pluck("name","id");
        $this->service->getSurveysJson();
    }
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
     * Opening Create view
     * Função responsável por exibir a tela de criação de vistoria de Fiscalização - Abertura
     */
    public function opening() 
    {
        $survey = new Survey();
        return view("survey.fs.opening", compact('survey'));
    }

    /**
     * oversight Create view
     * Função responsável por exibir a tela de criação de vistoria de Fiscalização - Fiscalização
     */
    public function oversight() 
    {
        $survey = new Survey();
        return view("survey.fs.oversight", compact('survey'));
    }

     /**
     * transfer Create view
     * Função responsável por exibir a tela de criação de vistoria de Fiscalização - Fiscalização
     */
    public function transfer() 
    {
        $survey = new Survey();
        return view("survey.fs.transfer", compact('survey'));
    }

     /**
     * Specific Create view
     * Função responsável por exibir a tela de criação de vistorias específicas
     */
    public function specific() 
    {
        $fiscal = $this->fiscal;
        return view("survey.specific.index", compact('fiscal'));
    }


     /**
     * Specific Create view
     * Função responsável por exibir a tela de criação de vistorias específicas
     */
    public function management() 
    {
        $fiscal = $this->fiscal;
        return view("survey.gs.index", compact('fiscal'));
    }

    
     /**
     * Security Create view
     * Função responsável por exibir a tela de criação de vistorias de segurança do trabalho
     */
    public function security() 
    {
        $fiscal = $this->fiscal;
        return view("survey.security.index", compact('fiscal'));
    }


    /**
     * Budget Create view
     * Função responsável por exibir a tela de criação de vistorias de segurança do trabalho
     */
    public function complexo() 
    {
        $survey = new Survey();
        $programas = Program::where("ativo", 1)->pluck("name","id");
        $fiscal = $this->fiscal;
        return view("survey.budget.complexo.index", compact('survey','programas','fiscal'));
    }

      /**
     * Budget Create view
     * Função responsável por exibir a tela de criação de vistorias de segurança do trabalho
     */
    public function simple() 
    {
        $survey = new Survey();
        $programas = Program::where("ativo", 1)->pluck("name","id");
        $fiscal = $this->fiscal;
        return view("survey.budget.simple.index", compact('survey','programas','fiscal'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->flash();
            $this->service->store($request->except("_token"), $request->file("file_archive"));
            return redirect()->back()
                ->with('success', 'Vistoria Cadastrada com Sucesso.');
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
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

    public function load_intervention(Request $request) {
        try { 
            $interventionProcess = $this->service->load_intervention($request->post("intervention_code"));
            return response()->json($interventionProcess, 200);
        } catch (\Exception $e) {
            return $e->getMessage();
            return redirect()->back()
            ->with('success', 'Survey Error:'. $e->getMessage());
        }
    }
}
