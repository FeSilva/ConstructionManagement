<?php

namespace App\Models\Employess;

use App\Models\Employess\Employess;

class EmployessRepository
{
    private $model;

    public function __construct(Employess $model)
    {
        $this->model = $model;
    }
}
