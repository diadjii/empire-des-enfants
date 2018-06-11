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
Route::post('/login','UserController@login');

Route::post("/logOut",function(){
  session()->flush();
  return view("login");
});

Route::get('/admin','UserController@isLogin');
Route::get('/admin/accueil','UserController@accueil');
Route::get("/allUser",'UserController@show');
Route::get("/infoUser/{idUser}","UserController@find");
Route::post("/addUser",'UserController@store');

Route::get("/administration","UserController@isLogin");
Route::post("/administration/addActivite","ActiviteController@store");
// Route::get('/administration/accueil','AdministrationController@accueil');

Route::get("/infirmier",'InfirmierController@index');
Route::get("/infirmier/accueil",'InfirmierController@accueil');
