<?php 

namespace App\Models\Company;

use App\Models\Company\Company;

class CompanyRepository
{
    private $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }

    public function store($company)
    {
        try {
            return $this->model->create($company);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function lists()
    {
        return $this->model->get();
    }
}
