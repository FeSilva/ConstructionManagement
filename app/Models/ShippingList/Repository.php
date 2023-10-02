<?php 

namespace App\Models\ShippingList;

use App\Models\ShippingList;

Class Repository {

    public function getShippingList() {
        $shippingList = ShippingList::with('users')->with("typeInspection")->with("surveys")->get();
        $json = [];
        foreach ($shippingList as $list) {
            setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            $date = date("F", mktime(0, 0, 0, $list->month, 10));
            $month = ucfirst( utf8_encode( strftime("%B", strtotime($date))));
            $json['data'][] = [
                'id' => $list->id,
                'code' => $list->code,
                'monthsend' => $month,
                'type' => $list->typeInspection->name,
                'countSurvey' => count($list->surveys),
                'owner' => $list->users->name,
                'status' => 'Enviado'
            ];
        }
        return json_encode($json, true);
     }
}
