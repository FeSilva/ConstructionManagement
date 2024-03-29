<?php

namespace App\Services;

use App\Models\Building;
use App\Models\InterventionProcess;
use App\Models\TypesInspection;
use App\Models\SurveyItemProgress;
use App\Models\Survey;

use App\Models\surveys\repository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;

use Exception;
use Illuminate\Support\Facades\Auth;

Class SurveyServices {

    protected $repository;
    public function __construct() {
        $this->repository = new repository();
    }

    public function store($request, $file) {
        try {
        $filePath = null;
        $interventionProcess = InterventionProcess::where("code", $request["intervention_code"])->with("building")->with("user")->first();
        $building = Building::where("codigo", $request['building_code'])->first();
        $inspectionType = TypesInspection::where("name", $request["type_name"])->first();
        switch ($inspectionType->id) {
            case 1: 
                $progress = 1;
                break;
            case 3:
                $progress = $request['progress_id'];
            default:
                $progress = null;
                break;
        }

        $name_archive = '';
        switch ($inspectionType->id){
            case 4:
                $name_archive = 'OS_'.str_replace(".","",$building->codigo).'_'.$request["inspection_date"];
                break;
            case 5:
                $name_archive = 'OC_'.str_replace(".","",$building->codigo).'_'.$request["inspection_date"];
                break;
            case 6:
                $name_archive = 'RI_'.str_replace(".","",$building->codigo).'_'.$request["inspection_date"];
                break;
            case 9:
                $name_archive = 'RIP_'.str_replace(".","",$building->codigo).'_'.$request["inspection_date"];
                break;
            case 7:
                $name_archive = 'GS_'.str_replace("/",".",$interventionProcess->code).'_'.$request["inspection_date"];
                break;
            case 8:
                $name_archive = 'ST_'.str_replace("/",".",$interventionProcess->code).'_'.$request["inspection_date"];
                if($file){
                    $pastaName = str_replace("/",".",$interventionProcess->code);
                    Storage::putFileAs('public/Surveys/'.$pastaName, $file, $name_archive.'.pdf');
                    $filePath = "Surveys/{$pastaName}/{$name_archive}.pdf"; //VALIDAR NOME
                }
                break;
            default: 
                $name_archive = "LO_".str_replace("/",".",$interventionProcess->code).'_'.$request["inspection_date"];
                break;
        }

        $array = [
            'type_id' => $inspectionType->id,
            'intervention_id'=> $interventionProcess->id,
            "progress_id" => $progress,
            "owner_id" => $request['owner_id'] ?? $interventionProcess->user->id,
            "intervention_code" => $request["intervention_code"],
            'building_id' => $building->id,
            "building_code" => $interventionProcess->building->codigo,
            "arquivo" => $filePath,
            "name_archive" => $name_archive,
            'status' => "Cadastro",
            "date_close" => $request['date_close'] ?? null,
            'employess' => $request['employess'] ?? null,
            'advance_work' => $request['advance_work'] ?? null,
            "physical_progress" => $request['physical_progress'] ?? 1.00,
            "inspection_date" => $request["inspection_date"],
            'created_by' => Auth::user()->id,
        ];

        if ($inspectionType->id == 1 || $inspectionType->id == 2) {
            $survey = Survey::where("intervention_code", $request["intervention_code"])->where("type_id", $inspectionType->id)->first();
            if ($survey) { 
                return ["message" => "Já existe uma vistoria de $inspectionType->name para este código, e deve existir apenas uma.", "code" => 400];
            }
        }
        $survey = Survey::create($array); // Create Vistoria;
        if($inspectionType->id == 3 || $inspectionType->id == 2) { //Fiscalização
            $items = SurveyItemProgress::where("intervention_id", $interventionProcess->id)->get();
            foreach($items as $item) {
                if($request["item_$item->id"]){
                    $itemId = $item->id;
                }
            }
            SurveyItemProgress::create([
                'pi_id' => $interventionProcess->id,
                'item_id' => $itemId,
                'vistoria_id' => $survey->id,
                'date_vistoria' => $survey->inspection_date,
                'progress' => str_replace(',', '.', $request["item_$itemId"]),
                'created_at' => now()
            ]);
        }
        return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    public function getSurveysJson() {
        return $this->jsonSurveyTable($this->repository->getSurveys());
    }

    public function uploadFile($file, $info) {
        $intervention = InterventionProcess::where("code", $info["intervention_code"])->with("user")->first();
        $date = Carbon::now();
        $dateFormat = date('d-m-y', strtotime($date));
        $date = str_replace("-", ".", $dateFormat); //dd.mm.y
        $codigoPi = str_replace("/", ".", $info['intervention_code']);// return xxxx_xxxx
        $fileName = 'Surveys/'.$codigoPi . '/LO_' . $codigoPi . '_' . $date . '_' . $intervention->user->cod_user_fde . '.pdf';
        //Storage::putFileAs('public', $file, $fileName);
        Storage::disk('public')->put($fileName, $file);
        $fileName = 'LO_' . $codigoPi . '_' . $date . '_' . $intervention->user->cod_user_fde . '.pdf';
        return "{$fileName}";
    }
    private function jsonSurveyTable($json) {
        try{

            return Storage::disk('public')->put("tables/table-surveys-list.json", $json);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    
    public function load_intervention($interventionCode) {
        $interventionProcess = InterventionProcess::with("contractor")
        ->with("surveys")
        ->with("user")
        ->with('building')
        ->with("Items")
        ->with("Items.SurveyItemProgress")
        ->where("code", $interventionCode)
        ->first();
        return $interventionProcess;
    }

    public function getSurveysForFileName($fileName) {
        try{
			$piCod = preg_replace('/\./', '-', explode('_', $fileName));
			$dateCreate = date_create(str_replace("-pdf", "", $piCod[1]));
			$data = date_format($dateCreate, "Y-m-d");
			$codigo = substr($piCod[0], 0, 4) . '/' . substr($piCod[0], 5, 11);
			return Survey::with('interventionProcess')
						->with('user')
						->where('intervention_code', $codigo)
						->where('inspection_date', $data)
						->where('status', 'Cadastro')
						->first();
		} catch (\Exception $e) {
			return $e->getMessage();
		}
    }
}