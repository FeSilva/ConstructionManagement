<?php

namespace App\Http\Services;

use App\Models\meansurent\repository;
use App\Models\surveys\repository as surveysRepository;
Class MeansurentService extends repository {

    public function getMeansurentService() {
        return $this->getMeansurent();
    }

    public function store($aMeansurent) {
        return $this->createMeansurent($aMeansurent);
    }

    public function processMeansurent($meansurent, $start, $end) {
        $surveys = new surveysRepository;
        $surveyQtd = $surveys->updateMeansurentSurveys($meansurent->id, $start, $end); //update vistorias com id da medição.
        repository::update($meansurent->id, $surveyQtd);
    }
}