<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ZipArchive;
use Illuminate\Support\Facades\DB;
use App\Services\SurveyServices; 
use Illuminate\Support\Facades\Storage;

class UploadZipController extends Controller
{
    //

    private $messages = [];

    public function index()
    {
        return view('uploadzip.index');
    }

    public function descompactZip(Request $request){
        try {
            $file = $request->file('zipArchive');
            $zip = new ZipArchive();
            $logs = null;
            DB::beginTransaction();
            if ($zip->open($file) === false) {
                $this->logs($file, 'falha', $file);
                return redirect()->back()->with("error", "Não foi possivel abrir o arquivo");
            }
            for ($i = 0; $i < $zip->numFiles; $i++) {
                $archive = $zip->getNameIndex($i);
                $fileinfo = pathinfo($archive);
                $file = $zip->getFromName($fileinfo['basename']);
                $surveyServices = new SurveyServices();
                $surveys = $surveyServices->getSurveysForFileName($fileinfo['basename']);
                $this->validationZip($surveys, $fileinfo, $file);
            }
            DB::commit();
            return redirect()->back()->with("success", "Upload Realizado com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", $e->getMessage());
        }

    }
  
    private function validationZip($surveys, $fileinfo, $file) {
        if ($surveys) {
            $filePath = $this->saveFileAndCreateDirectory($fileinfo['filename'], $surveys->user['code_fde'], $file, $surveys);
            $surveys->update(['archive' => $filePath, 'status' => 'Aprovado']);
        } 
    }

    private function saveFileAndCreateDirectory($fileName, $codFde, $file, $survey)
    {

        $name_archive = '';

        $piCod = preg_replace('/\./', '-', explode('_', $fileName));
        $dateCreate = date_create($piCod[1]);
        $data = date_format($dateCreate, "d.m.y");

        switch ($survey->type_id){
            case 4:
                $name_archive = 'OS_'.str_replace(".","",$survey->building->codigo).'_'.$data;
                break;
            case 5:
                $name_archive = 'OC_'.str_replace(".","",$survey->building->codigo).'_'.$data;
                break;
            case 6:
                $name_archive = 'RI_'.str_replace(".","",$survey->building->codigo).'_'.$data;
                break;
            case 7:
                $name_archive = 'GS_'.str_replace("/",".",$survey->interventionProcess->code).'_'.$data;
                break;
            case 8:
                return;
                break;
            default: 
                $name_archive = "LO_".str_replace("/",".",$survey->interventionProcess->code).'_'.$data;
                break;
        }
        $fileName = substr($fileName, 0, 4) .  substr($fileName, 4, 5);
        Storage::disk('public')->put("Surveys/{$fileName}/{$name_archive}.pdf", $file);
        $filePath = "Surveys/{$fileName}/{$name_archive}.pdf"; //VALIDAR NOME;
        return $filePath;
    }
}
