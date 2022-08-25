<?php 
/**
 * ANCHOR CompanyService
 * Responsável pela lógica e comunicação com o repositorio da company
 */
namespace App\Services;

use App\Models\Services\ServicesRepository;

class ServicesService
{
    private $repository;

    public function __construct(ServicesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return $this->repository->lists();
    }

    public function store($data)
    {
        //Lógica e ou regra para atualizar as informações de um serviço.
        return $this->repository->create($data);
    }

    public function update($data)
    {
        //Lógica e ou regra para atualizar as informações de um serviço.
        return $this->repository->update($data);
    }

    public function destroy($id)
    {
        return $this->repository->delete($id);
    }
}
