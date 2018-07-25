<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

// Route::get('/admin','UserController@isLogin');
// Route::get('/admin/accueil','UserController@accueil');
// Route::get("/allUser",'UserController@show');
// Route::get("/infoUser/{idUser}","UserController@find");

// Route::get("/administration","UserController@isLogin");
// Route::get("/administration/dossier","DossierController@index");
// Route::get('/administration/Activites',function(){
//   $login = session('login');
//   return view("Activite",compact('login'));
// });

// Route::post("/administration/addActivite","ActiviteController@store");
// Route::post("/administration/updateActivite","ActiviteController@update");
// Route::post("/administration/saveToAgenda","ActiviteController@saveToAgenda");
// Route::post("/administration/updateActivite","ActiviteController@updateActivite");

// Route::get("/infirmier",'InfirmierController@index');
// Route::get("/infirmier/accueil",'InfirmierController@accueil');

/**
 *TEst de vue
 **/

Route::get('/login', function () {
    return view('login');
});
Route::get("/logOut", function () {
    session()->flush();
    return redirect("/login");
});

Route::post('/login',           'UserController@login');
Route::post("/addUser",         'UserController@store');

Route::get("/Administration",   'UserController@isLogin');

Route::get("/administration/agendaActivites", 'ActiviteController@agendaActivites');
Route::get('/administration/listeActivites', 'ActiviteController@show');
Route::get("/administration/editActivity/{idActivite}", "ActiviteController@edit");
Route::get("/administration/deleteActivite/{idActivite}", "ActiviteController@destroy");
Route::get('/administration/DossierDesEnfants',             'DossierEnfantController@index');
Route::get('/Administration/liste-des-dossier-enfants',     'DossierEnfantController@listeDossierEnfant');

Route::post("/administration/addActivite", "ActiviteController@create");

Route::get('/administration/DossierEnfant/{id}/Details',                'DossierEnfantController@show');
Route::get('/administration/DossierEnfant/{id}/DossierMedical',         'DossierMedicaleController@showDetails');
Route::get('/administration/DossierEnfant/{id}/DossierJuridique',       'DossierEnfantController@dossierJuridiquePDF');
// Route::get("/administration/DossierEnfant/{nom}/zoneTelechargement",    'DossierEnfantController@getDossierTribunal');
Route::get("/administration/DossierEnfant/{id}/zoneTelechargement",     'DossierEnfantController@viewAllDocuments');

Route::post("/administration/DossierEnfant/zoneTelechargement/download",     'DossierEnfantController@downloadDocument');

Route::post("/administration/DossierEnfant/{id}/EditDossierEnfant",     'DossierEnfantController@update');
Route::post('/administration/DossierEnfant/addDocument',         'DossierEnfantController@addDocument');
Route::post('/administration/DossierDesEnfants',                        'DossierEnfantController@store');
Route::get('/administration/supervision-operations', 'EventStoreController@index');
Route::get("/Admin",                                    'UserController@index');
Route::get("/Administration/liste-des-utilisateurs",    'UserController@show');
Route::get("/Admin/{id}/changeStatusToOn",              'UserController@changeStatusToON');
Route::get("/Admin/{id}/changeStatusToOff",             'UserController@changeStatusToOff');
Route::get("/Admin/{id}/deleteUser",                    'UserController@delete');

Route::get('/Infirmier', 'InfirmierController@show');
Route::get("/Infirmier/DossierMedicale/{idDossierEnfant}/Consultation", 'DossierMedicaleController@showDetails');
Route::get("/Infirmier/Download/{id}", 'DossierMedicaleController@consultationPDF');

Route::post("/Infirmier/CreateDossierMedicale",         'DossierMedicaleController@store');
Route::post("/Infirmier/CreateConsultationMedicale",    'ConsultationMedicaleController@store');
Route::post("/Infirmier/UpdateConsultationMedicale",    'ConsultationMedicaleController@update');
