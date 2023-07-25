<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TypesInspection;
use App\Models\Survey;
use App\Models\ShippingList;

use App\Services\ShippingListServices as Services;
/** 
 * NOTE Classe Responsável pelo armanzanemaneto das listas que forem enviadas para o cliente, atualizando o status e realizando disparo de email.
 */
class ShippingListController extends Controller
{

    protected $services; 

    public function __construct(Services $services) {
        $this->services = $services;
        $this->services->getShippingListJson();
    }

    public function index() {
        return view("sendlist.index");
    }

    public function send() {
        $tipos = TypesInspection::whereNotIn("id", [1,2])->pluck('name','id');
        $surveys = Survey::where('status','Aprovado')->get(); //where("status", aprovado)->get();
        
        $fiscalization = $surveys->whereIn("type_id", [1,2,3])->count();
        $securityOfWork = $surveys->where("type_id", 8)->count();
        $budgetSimple = $surveys->where("type_id", 4)->count();
        $budgetComplex = $surveys->where("type_id", 5)->count();
        $specific = $surveys->where("type_id", 6)->count();
        $management = $surveys->where("type_id", 7)->count();


        return view("sendlist.send", compact("tipos", 'fiscalization','securityOfWork', 'budgetSimple', 'budgetComplex','specific','management'));
    }

    public function getList(Request $request) 
    {
        $approveds = Survey::with("interventionProcess")->where('status', 'Aprovado')->where("type_id", $request->post("typeId"))->get();
        $surveys = [];
        $totalSize = 0;
        $totalBytesSize = 0;
        $maxSize = 10485760; //10MB
        foreach ($approveds as $approved) {
            $archiveNotStorage = str_replace("storage/", "", $approved->archive);
            $size = Storage::disk('public')->size($archiveNotStorage);
            $totalSize += $size;
            if ($totalSize <= $maxSize) {
                $totalBytesSize += $size;
                $surveys[] = [
                    'id' => $approved->id,
                    'size' => $size,
                    'archive' => $approved->archive,
                    'codigo' => $approved->interventionProcess->code,
                    'data' => $approved->inspection_date,
                    'status' => $approved->status
                ];
            }
        }

        $surveys['totalSizeBytes'] = $totalBytesSize;
        $surveys['totalSizeMb'] = $this->convert_bytes_to_specified($surveys['totalSizeBytes']);
        return response()->json($surveys);
    }

    private function convert_bytes_to_specified($bytes, $decimal_places = 1)
    {
        $formulas = array(
            'K' => number_format($bytes / 1024, $decimal_places),
            'M' => number_format($bytes / 1048576, $decimal_places),
        );

        if ($formulas['K'] > '0.0' and $formulas['M'] > '0.0') {
            return $formulas['M'] . " MB";
        } else {
            return $formulas['K'] . " KB";
        }
    }

    public function getMonth(Request $request) {
        $data = $request->all();
        $mes = intval($data['month']);
        $countSeq = ShippingList::Select(DB::RAW('count(id) +1 as seq'))->where('month', $mes)->where("type_id", $data['typeId'])->get();
        $seq = null;
        switch ($countSeq[0]->seq) {
            case $countSeq[0]->seq < 10:
                $seq = '00'.$countSeq[0]->seq;
                break;
            case $countSeq[0]->seq > 9:
                $seq = '0'.$countSeq[0]->seq;
                break;
            case $countSeq[0]->seq > 100:
                $seq = $countSeq[0]->seq;
                break;
        }
        return $seq."/".date('Y');
    }

    public function store(Request $request) {
        try {
            $this->services->store($request->except('_token'));
            return redirect()->back()->with("success", "Lista Enviada & Cadastrada com Sucesso.");
        } catch (\Exception $e) {
            return redirect()->back()->with("error", $e->getMessage());
        }
    }
}
