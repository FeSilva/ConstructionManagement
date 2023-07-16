<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TypesInspection;
use App\Models\Survey;

use Illuminate\Http\Request;

class ShippingListController extends Controller
{
    public function index() {
        $tipos = TypesInspection::whereNotIn("id", [1,2])->pluck('name','id');
        $surveys = Survey::where('status','Aprovado')->get(); //where("status", aprovado)->get();
        
        $fiscalization = $surveys->whereIn("type_id", [1,2,3])->count();
        $securityOfWork = $surveys->where("type_id", 8)->count();
        $budgetSimple = $surveys->where("type_id", 4)->count();
        $budgetComplex = $surveys->where("type_id", 5)->count();
        $specific = $surveys->where("type_id", 6)->count();
        $management = $surveys->where("type_id", 7)->count();

        return view("sendlist.index", compact("tipos", 'fiscalization','securityOfWork', 'budgetSimple', 'budgetComplex','specific','management'));
    }
}
