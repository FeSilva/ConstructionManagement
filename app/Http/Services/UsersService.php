<?php 
/**
 * ANCHOR CompanyService
 * Responsável pela lógica e comunicação com o repositorio da company
 */
namespace App\Http\Services;

use App\Models\Usuarios\UsuariosRepository;
use Illuminate\Support\Facades\Storage;

class UsersService
{
    private $repository;

    public function __construct(UsuariosRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getUsersJson()
    {
        return $this->jsonUserTable($this->repository->getUserTeam());
    }

     /**
     * Função responsável pela criação do json de leitura da tabela de usuários.
     */
    private function jsonUserTable($json)
    {
        try{
           return Storage::disk('public')->put("/tables/table-users-list.json", $json);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
