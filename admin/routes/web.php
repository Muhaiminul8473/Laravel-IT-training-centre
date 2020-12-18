<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','homeController@homeIndex');
Route::get('/visitor','visitorController@visitorIndex');

//Admin panel service management
Route::get('/services','ServiceController@serviceIndex');
Route::get('/getServicesData','ServiceController@getServiceData');
Route::post('/serviceDelete','ServiceController@deleteServiceData');
Route::post('/serviceDetails','ServiceController@getServiceDetails');
Route::post('/serviceUpdate','ServiceController@serviceUpdate');
Route::post('/serviceAdd','ServiceController@serviceAdd');


//Admin panel courses management
Route::get('/courses','CoursesController@CourseIndex');
Route::get('/getCourseData','CoursesController@getCourseData');
Route::post('/courseAdd','CoursesController@addCourseData');
Route::post('/courseDelete','CoursesController@deleteCourseData');
Route::post('/courseDetails','CoursesController@getCourseDetails');
Route::post('/courseUpdate','CoursesController@courseUpdate');

