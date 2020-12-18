<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VisitorModel;

class homeController extends Controller
{
    function homeIndex(){

        return view('Layout/home');
    }
}
