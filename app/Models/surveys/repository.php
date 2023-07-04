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
        ->orderBy('inspection_date', 'desc')->get();

        foreach ($surveys as $survey) {
            $infoList['data'][] = [
                'id' => $survey->id,
                'code' => $survey->interventionProcess->code,
                'type' => $survey->typesInspection->name,
                'progressName' => $survey->progress->name,
                'owner' => $survey->user->name,
                'date_final' => $survey->date_close,
                'date_survey' => $survey->inspection_date,
                'progress_number' => $survey->physical_progress,
                'status' => $survey->status
            ];
        }
        return json_encode($infoList, true);
    }
}