<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;
class visitorController extends Controller
{
    function visitorIndex(){
        $visitorData=json_decode(VisitorModel::orderBy('id','desc')->take(100)->get());
        return view('Layout/visitor',['visitorData'=>$visitorData]);
    }
}
