<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServicesModel;

class ServiceController extends Controller
{
    function serviceIndex(){

        return view('Layout/services');
    }
    function getServiceData(){
        
        $result = json_encode(ServicesModel::all()) ;
        return $result;

    }
    function deleteServiceData(Request $req){
        $id = $req->input('id');
        $result= ServicesModel::where('id','=',$id)->delete();
        
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }

    }

    function getServiceDetails(Request $req){
        $id = $req->input('id');
        $result=json_encode(ServicesModel::where('id','=',$id)->get()) ;
        return $result;
    }
    function serviceUpdate(Request $req){
        $id = $req->input('id');
        $name = $req->input('name');
        $desc = $req->input('des');
        $img = $req->input('img');
        $result= ServicesModel::where('id','=',$id)->update(['service_name'=>$name,'service_des'=>$desc,'service_img'=>$img]);
        
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }

    }

    function serviceAdd(Request $req){
        $name = $req->input('name');
        $desc = $req->input('des');
        $img = $req->input('img');
        $result= ServicesModel::insert(['service_name'=>$name,'service_des'=>$desc,'service_img'=>$img]);
        
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }

    }

}
