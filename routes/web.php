<?php

use App\Entities\SuperAdmin;
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

Route::get('/login', function () {
    return view('login');
});

Route::get("/logOut",function(){
  session()->flush();
  $status="ok";
  return $status;
});

Route::get('/admin','UserController@isLogin');
Route::get("/administration","AdministrationController@index");
Route::get('/administration/accueil','AdministrationController@accueil');

Route::post('/login','UserController@login');
Route::post("/addUser",'UserController@store');
