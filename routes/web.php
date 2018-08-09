<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

/******************************************* DEBUT DES TESTS  ******************************/
Route::get('/login', function () {
    return view('login');
});
Route::get("/logOut", function () {
    session()->flush();
    return redirect("/login");
});

Route::get("/testlayout",function(){

    return view("new.layout-admin");
});
Route::get('/administration/liste-dossier-des-enfants',             'DossierEnfantController@listeDossierEnfant');
Route::get('/administration/create-dossier-enfant',                        'DossierEnfantController@index');

Route::get("/administration",'UserController@index');//affichage des activites par default

Route::get('/administration/DossierEnfant/{id}/Details',                'DossierEnfantController@show');
// Route::get("/administration/liste-dossiers-medicals","InfirmierController@show");
Route::get("/administration/liste-des-utilisateurs",    'UserController@show');
Route::post("/administration/save-user",         'UserController@store');
Route::get("/administration/create-utilisateur", function(){
    $login = session("login");
    return view("new.create-utilisateur",compact("login"));
});
Route::get('/administration/DossierEnfant/{id}/DossierMedical',         'DossierMedicaleController@showDetails');
Route::post("/administration/user/reset-password", "UserController@resetPassword");
Route::get("/administration/DossierEnfant/{id}/liste-des-notes", "NoteEnfantController@index");
Route::post("/administration/DossierEnfant/add-note", "NoteEnfantController@store");

/******************************************gestion des evenements *************************************/
Route::get('/administration/liste-des-evenements', 'EventStoreController@index');
/******************************************fin gestion des evenements********************************/


Route::get('/Infirmier', 'InfirmierController@show');
Route::get("/Infirmier/DossierMedicale/{idDossierEnfant}/Consultation", 'DossierMedicaleController@showDetails');
Route::post("/Infirmier/UpdateConsultationMedicale",    'ConsultationMedicaleController@update');
Route::post("/Infirmier/CreateConsultationMedicale",    'ConsultationMedicaleController@store');
Route::post("/Infirmier/CreateDossierMedicale",         'DossierMedicaleController@store');












/******************************************** FIN DES TESTS  *******************************/

Route::post('/login',           'UserController@login');

Route::get("/Administration",   'UserController@isLogin');

Route::get("/administration/agendaActivites", 'ActiviteController@agendaActivites');
Route::get('/administration/listeActivites', 'ActiviteController@show');
Route::get("/administration/editActivity/{idActivite}", "ActiviteController@edit");
Route::get("/administration/deleteActivite/{idActivite}", "ActiviteController@destroy");
// Route::get('/administration/DossierDesEnfants',             'DossierEnfantController@index');
Route::get('/Administration/liste-des-dossier-enfants',     'DossierEnfantController@listeDossierEnfant');

Route::post("/administration/addActivite","ActiviteController@store");
Route::post("/administration/updateActivite","ActiviteController@update");
Route::post("/administration/saveToAgenda","ActiviteController@saveToAgenda");
Route::post("/administration/updateActivite","ActiviteController@updateActivite");

Route::post("/administration/addActivite", "ActiviteController@create");

// Route::get('/administration/DossierEnfant/{id}/Details',                'DossierEnfantController@show');
Route::get('/administration/DossierEnfant/{id}/DossierJuridique',       'DossierEnfantController@dossierJuridiquePDF');
// Route::get("/administration/DossierEnfant/{nom}/zoneTelechargement",    'DossierEnfantController@getDossierTribunal');
Route::get("/administration/DossierEnfant/{id}/zoneTelechargement",     'DossierEnfantController@viewAllDocuments');

Route::post("/administration/DossierEnfant/zoneTelechargement/download",     'DossierEnfantController@downloadDocument');

Route::post("/administration/DossierEnfant/{id}/EditDossierEnfant",     'DossierEnfantController@update');
Route::post('/administration/DossierEnfant/addDocument',         'DossierEnfantController@addDocument');
Route::post('/administration/DossierDesEnfants',                        'DossierEnfantController@store');
Route::get("/Admin",                                    'UserController@index');
Route::get("/Admin/{id}/changeStatusToOn",              'UserController@changeStatusToON');
Route::get("/Admin/{id}/changeStatusToOff",             'UserController@changeStatusToOff');
Route::get("/Admin/{id}/deleteUser",                    'UserController@delete');


Route::get("/Infirmier/Download/{id}", 'DossierMedicaleController@consultationPDF');


/*************************************************************************************************** */