<?php

namespace App\Models\surveys;

use App\Models\Survey;

Class repository extends Survey {

    public function updateMeansurentSurveys($meansurent_id, $start, $end) {
        return $this
        ->whereBetween('dt_vistoria', [$start, $end])
        ->whereIn('status', ['Aprovado', 'Enviado'])
        ->where("medicao_id", "=", '0')
        ->update(['medicao_id' => $meansurent_id])->count();
    }
}