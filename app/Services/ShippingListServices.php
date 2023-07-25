<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

use App\Models\Survey;
use App\Models\TypesInspection;
use App\Models\ShippingList;
use App\Models\ShippingList\Repository;

use App\Mail\ShippingSend as ShippingSend;
use Exception;

Class ShippingListServices {
    protected $repository;

    public function __construct(Repository $repository) {
        $this->repository = $repository;
    }
     /**
     * Count type surveys open for send by FDE.
     * @author Felipe Feitosa da Silva <felipe.silva@cespfde.com.br>
     */
    public function countTypeSurveys() {
        $tipos = TypesInspection::whereNotIn("id", [1,2])->pluck('name','id');
        $surveys = Survey::where('status','Aprovado')->get();
        $fiscalization = $surveys->whereIn("type_id", [1,2,3])->count();
        $securityOfWork = $surveys->where("type_id", 8)->count();
        $budgetSimple = $surveys->where("type_id", 4)->count();
        $budgetComplex = $surveys->where("type_id", 5)->count();
        $specific = $surveys->where("type_id", 6)->count();
        $management = $surveys->where("type_id", 7)->count();

        return [
            'types' => $tipos,
            'surveys' => $surveys,
            'fiscalization' => $fiscalization,
            'securityOfWork' => $securityOfWork,
            'budgetSimple' => $budgetSimple,
            'budgetComplex' => $budgetComplex,
            'specific' => $specific,
            'management' => $management
        ];
    }

    /**
     * Create Json for list in datatable.
     * @author Felipe Feitosa da Silva <felipe.silva@cespfde.com.br>
     */
    public function getShippingListJson() {
        return $this->jsonShippingListTable($this->repository->getShippingList());
    }


    private function jsonShippingListTable($json) {
        try{
            return Storage::disk('public')->put("tables/table-shipping-list.json", $json);
        }catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
    public function store($request) {
        try {
            DB::beginTransaction();
            $surveysSend = isset($data['survey_send']) ? true : false;
            
            //Verifica se já existe uma lista de envio com este código/mês.
            $this->validateShippingSend($request);
            //Criando o registro da lista na base de dados;
    
            $shippingList = $this->create($request);

        
            //Envio da Lista
            $this->sendMail($request, $shippingList, $surveysSend);
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return throw new \Exception($e->getMessage(), 400);
        }
    }

    private function validateShippingSend($request) {
        $shippingConsult = ShippingList::where('code', $request['code'])->where('month', $request['month'])->first();
        if($shippingConsult){
            return throw new Exception('A lista de envio '.$request['code'].' do mês de '.$request['month'].'já foi enviada para a FDE, por favor olhe na lista de envio.', 400);
        }
    }

    private function create($request) {

        $shippingList = ShippingList::create(
        [
            'code' => $request['code'],
            'type_id' => $request['type_id'],
            'month' => (int)$request['month'],
            'owner_id' => Auth()->user()->id
        ]);

        foreach ($request['surveys_id'] as $survey_id) {
            $survey = Survey::find($survey_id);
            DB::SELECT("INSERT INTO shipping_surveys (`shippinglist_id`, `survey_id`) VALUES ('$shippingList->id','$survey->id')");
            //$shippingList->surveys()->attach($survey_id);
            $survey->status = 'Enviado';
            $survey->save();
        }
        return $shippingList;
    }

    private function sendMail($request, $shippingList, $surveysSend) {
        try {
            return Mail::to("felipe.silva@cespfde.com.br")->send(new ShippingSend(
                $request['surveys_id'], 
                $shippingList->id, 
                $request['code'], 
                $request['month'],
                'SIMPLES', 
                $surveysSend)
            );
        } catch (\Exception $e) {
            return throw new \Exception($e->getMessage(), 400);
        }
    }
}