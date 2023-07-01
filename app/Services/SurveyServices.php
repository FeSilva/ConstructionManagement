<?php

namespace App\Services;

use App\Models\InterventionProcess;
use App\Models\TypesInspection;
use App\Models\Survey;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;


Class SurveyServices {

    public function __construct() {

    }

    public function store($request, $file) {
        $interventionProcess = InterventionProcess::where("code", $request["intervention_code"])->with("building")->with("user")->first();
        $inspectionType = TypesInspection::where("name", $request["type_name"])->first();
        switch ($inspectionType->id) {
            case 1: 
                $progress = 1;
                break;
            default:
                $progress = $request['progress_id'];
                break;
        }

        $filePath = null;
        if($file) {
            $filePath = $this->uploadFile($file, $request);
        }
        $array = [
            'type_id' => $inspectionType->id,
            "progress_id" => $progress,
            "owner_id" => $interventionProcess->user->id,
            "intervention_code" => $request["intervention_code"],
            "building_code" => $interventionProcess->building->codigo,
            "name_archive" => $filePath,
            'status' => "Cadastro",
            "date_close" => $request['date_close'] ?? null,
            'employess' => $request['employess'] ?? null,
            "physical_progress" => $request['physical_progress'] ?? 1.00,
            "inspection_date" => $request["inspection_date"],
        ];

        if ($inspectionType->id == 1 || $inspectionType->id == 2) {
            $survey = Survey::where("intervention_code", $request["intervention_code"])->where("type_id", $inspectionType->id)->first();
            if ($survey) { 
                return new Exception("Já existe uma vistoria de $inspectionType->name para este código, e deve existir apenas uma.");
            }
        }
        Survey::create($array);
        return true;
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

    public function load_intervention($interventionCode) {
        $interventionProcess = InterventionProcess::with("contractor")
        ->with("surveys")
        ->with("user")
        ->with('building')
        ->with("Items")
        ->where("code", $interventionCode)
        ->first();
        return $interventionProcess;
    }
}