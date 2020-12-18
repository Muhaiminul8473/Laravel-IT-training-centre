<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\VisitorModel;
use App\ServicesModel;
use App\CourseModel;
use App\contact_model;
class HomeController extends Controller
{
    function homeIndex(){
        $UserIp = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set("Asia/Dhaka");
        $timeDate = date("Y-m-d h:i:sa");
        VisitorModel::insert(['ip_address'=>$UserIp,'visit_time'=>$timeDate]);
        //getting services data
        $serviceData = json_decode(ServicesModel::all());

        //getting course data
        $courseData = json_decode(CourseModel::orderBy('id','desc')->limit(6)->get());



        return view('Layout/home',['servicesData'=>$serviceData, 'courseData'=>$courseData]);
    }
    function sendContact(Request $req){
        $contactName = $req->input('contactName');
        $contactMobile=$req->input('contactMobile');
        $contactEmail = $req->input('contactEmail');
        $contactMsg=$req->input('contactMsg');
        //$result = DB::table('contact')->insert(['contact_name'=>$contactName,'contact_mobile'=>$contactMobile,'contact_email'=>$contactEmail,'contact_mag'=>$contactMsg]);
        $result = contact_model::insert(['contact_name'=>$contactName,'contact_mobile'=>$contactMobile,'contact_email'=>$contactEmail,'contact_msg'=>$contactMsg]);
        if($result==1){
            return 1;
        }
        else{
            return 0;
        }
        
    }
}
