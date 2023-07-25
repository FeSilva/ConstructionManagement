<?php

namespace App\Models\surveys;

use App\Models\Survey;

Class repository extends Survey {

    public function updateMeansurentSurveys($meansurent_id, $start, $end) {
        return Survey::whereBetween('dt_vistoria', [$start, $end])
        ->whereIn('status', ['Aprovado', 'Enviado'])
        ->where("medicao_id", "=", '0')
        ->update(['medicao_id' => $meansurent_id])->count();
    }

    public function getSurveys() {
        $surveys = Survey::with("interventionProcess")
        ->with("typesInspection")
        ->with("progress")
        ->with("user")
        ->with("rhythm")
        ->orderBy("created_at", 'desc')
        ->get();


        foreach ($surveys as $survey) {
            $infoList['data'][] = [
                'id' => $survey->id,
                'code' => $survey->interventionProcess->code,
                'type' => $survey->typesInspection->name,
                'type_id' => $survey->typesInspection->id,
                'progressName' => $survey->progress->name ?? null,
                'owner' => $survey->user->name,
                'date_final' => date_format(date_create($survey->date_close), 'd/m/Y'),
                'date_survey' => date_format(date_create($survey->inspection_date), 'd/m/Y'),
                'progress_number' => $survey->physical_progress,
                'status' => $survey->status,
                'created' => date_format(date_create($survey->created_at), 'd/m/Y H:i:s')
            ];

        }

        
        return json_encode($infoList, true);
    }
}