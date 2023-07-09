<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TypesInspection;
use Illuminate\Http\Request;

class ShippingListController extends Controller
{
    public function index() {
        $tipos = TypesInspection::pluck('name','id');
        return view("sendlist.index", compact("tipos"));
    }
}
