<?php

use App\Entities\SuperAdmin;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', function () {
    return view('login');
});
Route::post('/login','UserController@login');

Route::get("/logOut",function(){
  session()->flush();
  return redirect("/login");
});

Route::get('/admin','UserController@isLogin');
Route::get('/admin/accueil','UserController@accueil');
Route::get("/allUser",'UserController@show');
Route::get("/infoUser/{idUser}","UserController@find");

Route::post("/addUser",'UserController@store');

Route::get("/administration","UserController@isLogin");
Route::get("/administration/dossier","DossierController@index");
Route::get('/administration/Activites',function(){
  $login = session('login');
  return view("Activite",compact('login'));
});

Route::post("/administration/addActivite","ActiviteController@store");
Route::post("/administration/updateActivite","ActiviteController@update");
Route::post("/administration/saveToAgenda","ActiviteController@saveToAgenda");
Route::post("/administration/updateActivite","ActiviteController@updateActivite");

Route::get("/infirmier",'InfirmierController@index');
Route::get("/infirmier/accueil",'InfirmierController@accueil');


/**
*TEst de vue
**/

Route::get("/administration",'UserController@isLogin');

Route::get("/administration/agendaActivites",'ActiviteController@agendaActivites');
Route::get('/administration/listeActivites','ActiviteController@show');
Route::get("/administration/editActivity/{idActivite}","ActiviteController@edit");
Route::get("/administration/deleteActivite/{idActivite}","ActiviteController@destroy");
Route::get('/administration/DossierDesEnfants','DossierEnfantController@index');
Route::get('/administration/ListeDossierEnfants','DossierEnfantController@listeDossierEnfant');
Route::get('/administration/DossierEnfant/{id}/Details','DossierEnfantController@show');
Route::get('/administration/DossierEnfant/{id}/DossierMedical','DossierMedicaleController@show');

// Route::get('/administration/DetailDossier','DossierEnfantController@detailDossier');

Route::post('/administration/DossierDesEnfants','DossierEnfantController@store');


Route::get("/Admin",'UserController@isLogin');

Route::get("/Admin/ListeUser",'UserController@show');
Route::get("/Admin/{id}/changeStatusToOn",'UserController@changeStatusToON');
Route::get("/Admin/{id}/changeStatusToOff",'UserController@changeStatusToOff');
Route::get("/Admin/{id}/deleteUser",'UserController@delete');

Route::get('/Infirmier','InfirmierController@show');
Route::post("/Infirmier/CreateDossierMedicale",'DossierMedicaleController@store');