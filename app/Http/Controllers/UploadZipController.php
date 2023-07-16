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
                $surveys = SurveyServices::getSurveysForFileName($fileinfo['basename']);
                $filePath = $this->saveFileAndCreateDirectory($fileinfo['filename'], $surveys->user->code_fde, $file);
                $surveys->update(['archive' => $filePath, 'status' => 'Aprovado']);
            }

            DB::commit();
            return redirect()->back()->with("sucesso", "Upload Realizado com sucesso!");
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with("error", $e->getMessage());
        }

    }
  
    private function saveFileAndCreateDirectory($fileName, $codFde, $file)
    {
        $piCod = preg_replace('/\./', '-', explode('_', $fileName));
        $dateCreate = date_create($piCod[1]);
        $data = date_format($dateCreate, "d.m.y");
        $newFileName = substr($fileName, 0, 4) .".".  substr($fileName, 5, 5)."_".$data."_".$codFde;
        $fileName = substr($fileName, 0, 4) .  substr($fileName, 4, 5);
        Storage::disk('public')->put("Surveys/{$fileName}/LO_{$newFileName}.pdf", $file);
        $filePath = "Surveys/{$fileName}/LO_{$newFileName}.pdf"; //VALIDAR NOME;
        return $filePath;
    }
}
