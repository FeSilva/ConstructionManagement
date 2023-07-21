<?php 
/**
 * ANCHOR CompanyService
 * Responsável pela lógica e comunicação com o repositorio da company
 */
namespace App\Http\Services;

use App\Models\Usuarios\UsuariosRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
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

    public static function supervisor() {
        return UsuariosRepository::supervisors();
    }
     /**
     * Função responsável pela criação do json de leitura da tabela de usuários.
     */
    public function jsonUserTable($json, $dash = false)
    {
        try{
            if ($dash)
                return Storage::disk('public')->put("tables/table-dashboard-list.json", $json);
            return Storage::disk('public')->put("tables/table-users-list.json", $json);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    /**
     * Buscar um usuário pelo ID
     */
    public function getUserById($id)
    {
        return $this->repository->find($id);
    }

    /**
     * Listagem de fiscais no dashboard
     */
    public function getSupervisorList($supervisors)
    {
        foreach($supervisors as $key => $supervisor) {
            if (count($supervisor->surveys) > 1) {
                $pendentes = 0;
                $aprovado = 0;
                $enviado = 0;
                $fiscais[$key] = [
                    "id" => $supervisor->id,
                    "email" => $supervisor->email,
                    "avatar" => $supervisor->profile_photo_path,
                    "supervisor" => $supervisor->name
                ];
                foreach($supervisor->surveys as $keySurvey => $survey) {
                    $survey->status == "Cadastro" ? $pendentes++ : $pendentes;
                    $survey->status == "Aprovado" ? $aprovado++ : $aprovado;
                    $survey->status == "Enviado" ? $enviado++ : $enviado;
                }
                $fiscais[$key]['total'] = [
                    'pendentes' => $pendentes,
                    'aprovado' =>  $aprovado,
                    'enviado' => $enviado
                ];
            }
        }

        if(isset($fiscais)) {            
            foreach ($fiscais as $fiscal) {
                $return['data'][] = [
                    "id" => $fiscal['id'],
                    "email" => $fiscal['email'],
                    "avatar" => $fiscal['avatar'],
                    "supervisor" => $fiscal['supervisor'],
                    'pendentes' => $fiscal['total']['pendentes'],
                    'aprovado' =>  $fiscal['total']['aprovado'],
                    'enviado' => $fiscal['total']['enviado']
                ];
            }
            return json_encode($return, true);
        }

        $return['data'][] = [];
        return json_encode($return, true);
    }

   
}
