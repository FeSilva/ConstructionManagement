<?php 
/**
 * ANCHOR CompanyService
 * Responsável pela lógica e comunicação com o repositorio da company
 */
namespace App\Http\Services;

use App\Models\Company\CompanyRepository;
use Auth;

class CompanyService
{
    private $repository;

    public function __construct(CompanyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $companyList = $this->repository->lists();
    }

    public function store($company)
    {
        $company['responsible_id'] = Auth::id();
        return $this->repository->store($company);
    }

    public function update($data)
    {
        //Lógica e ou regra para atualizar as informações de uma empresa.
        return $this->repository->update($data);
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
