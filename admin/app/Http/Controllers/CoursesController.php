<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseModel;

class CoursesController extends Controller
{
    function CourseIndex(){
        return view('Layout/courses');
    }
    function getCourseData(){

        $result = json_encode(CourseModel::all()) ;

        return $result;

    }
    function addCourseData(Request $req){

        $CourseName = $req->input('CourseName');
        $CourseDes = $req->input('CourseDes');
        $CourseFee = $req->input('CourseFee');
        $CourseEnroll = $req->input('CourseEnroll');
        $CourseClass = $req->input('CourseClass');
        $CourseLink = $req->input('CourseLink');
        $CourseImg = $req->input('CourseImg');
        $result= CourseModel::insert(['course_name'=>$CourseName,'course_des'=>$CourseDes,'course_fee'=>$CourseFee,'course_totalenroll'=>$CourseEnroll,'course_totalclass'=>$CourseClass,'course_link'=>$CourseLink,'course_img'=>$CourseImg]);
        
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }


    }
    function deleteCourseData(Request $req){
        $id = $req->input('id');
        $result= CourseModel::where('id','=',$id)->delete();
        
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }

    }

    function getCourseDetails(Request $req){

        $id = $req->input('id');
        $result=json_encode(CourseModel::where('id','=',$id)->get()) ;
        return $result;



    }
    function courseUpdate(Request $req){
        $id = $req->input('id');
        $name = $req->input('name');
        $desc = $req->input('des');
        $fee = $req->input('fee');
        $enroll = $req->input('enroll');
        $classes = $req->input('classes');
        $link = $req->input('link');
        $img = $req->input('img');
        $result= CourseModel::where('id','=',$id)->update(['course_name'=>$name,'course_des'=>$desc,'course_fee'=>$fee,'course_totalenroll'=>$enroll,'course_totalclass'=>$classes,'course_link'=>$link,'course_img'=>$img]);
        
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }

    }
    

}
