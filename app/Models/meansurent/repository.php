<?php

namespace App\Models\meansurent;

use App\Models\Meansurent;

Class repository extends Meansurent {

    public function getMeansurent() {
        return $this->all();
    }

    public function updateMeansurent($id, $data) {
        return $this->update(['id' => $id],[$data]);
    }   
    public function createMeansurent($meansurent) {
        return $this->create($meansurent);
    }   
}