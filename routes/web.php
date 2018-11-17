<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServ iceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');
Route::get('/programtypes','ProgramTypeController@index');


Route::get('/about',function(){
return"<h1>About Us</h1>";
});

Route::group(['prefix'=>'admin'], function(){
    Route::get('/','DashboardController@index');
    Route::resource('/courses','CourseController');
    Route::resource('/bookings','BookingController');
    Route::resource('/customers','CutomerController');
    Route::resource('/map','MapController');

});
Auth::routes();
