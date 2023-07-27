<?php

namespace App\Mail;

use Illuminate\Support\Facades\Storage;

use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

use App\Models\Survey;

Class ShippingSend extends Mailable {
    use Queueable, SerializesModels;

    private $surveys_id;
    private $shippingList_id;
    private $code;
    private $month;
    private $type;
    private $surveySend;

    public function __construct($surveys_id, $shippingList_id, $code, $month, $type, $surveySend = false)
    {
        $this->surveys_id = $surveys_id;
        $this->shippingList_id = $shippingList_id;
        $this->code   = $code;
        $this->month = $month;
        $this->type = $type;
        $this->surveySend = $surveySend;
    }

    public function build(){
        try {
            $date = date("F", mktime(0, 0, 0, $this->month, 10));
            $month = ucfirst( utf8_encode( strftime("%B", strtotime($date))));

            return $this->layout($month);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    private function layout($month) {
        $query = $this->queryConsultSend();
        $surveySend = $this->surveySend;
        $codeSplit = explode('/',$this->code);
        $seq = $codeSplit[0];
        $surveys = Survey::with('typesInspection')->whereIn('id', $this->surveys_id)->get();

        $email = $this
        ->from('lo@cespfde.com.br')
        ->subject('Vistorias de '.$surveys->typesInspection->name.' '.$month.'-'.$seq)
        ->to('felipe__silva@outlook.com')//Trocar email para um padrão
        //->Bcc('maria.santos@cespfde.com.br')
        //->Bcc('cassio.fonseca@cespfde.com.br')
        //->Bcc('luiz.junior@cespfde.com.br')
        ->view('email.layout' , compact('query', 'seq', 'surveySend'));
        foreach ($surveys as $survey) {
            $email->attach(storage_path("app/public/".$survey->archive));//colocar concatenação para storage apos excluir testes do BD
        }
        return $email;
    }

    private function queryConsultSend() {
        return DB::select(
        "SELECT list.code as codigo_lista,
                vistoria.id as id,
                vistoria.inspection_date as data_envio,
                vistoria.status as status,
                vistoria.archive as arquivo,
                tipos.name as tipos_vistorias
            FROM surveys AS vistoria
            LEFT JOIN types_inspections as tipos ON tipos.id = vistoria.type_id
            LEFT JOIN shipping_surveys AS envios ON vistoria.id = envios.survey_id
            LEFT JOIN shipping_lists AS list ON list.id = envios.shippinglist_id
            WHERE list.id =".$this->shippingList_id);
    }
}