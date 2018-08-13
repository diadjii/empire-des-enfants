<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

/******************************************* DEBUT DES TESTS  ******************************/
Route::get('/login', function () {
    return view('new.login');
});

Route::get('/', function () {
    return view('new.login');
});
Route::get("/logOut", function () {
    session()->flush();
    return redirect("/login");
});
Route::get('/liste-dossier-des-enfants',             'DossierEnfantController@listeDossierEnfant');
Route::get('/create-dossier-enfant',                        'DossierEnfantController@index');
Route::post('/add-dossier-enfant',                        'DossierEnfantController@store');

Route::get("/administration",'UserController@index');//affichage des activites par default
Route::get('/DossierEnfant/{id}/Details',                'DossierEnfantController@show');
Route::get("/liste-des-utilisateurs",    'UserController@show');
Route::post("/save-user",         'UserController@store');
Route::get("/create-utilisateur", function(){
    $login = session("login");
    return view("new.create-utilisateur",compact("login"));
});
Route::get("/administrateur/{id}/changeStatusToOn",              'UserController@changeStatusToON');
Route::get("/administrateur/{id}/changeStatusToOff",             'UserController@changeStatusToOff');
Route::get("/administrateur/{id}/deleteUser",                    'UserController@delete');
Route::get('/DossierEnfant/{id}/DossierMedical',         'DossierMedicaleController@showDetails');
Route::get("/DossierEnfant/{id}/liste-des-notes", "NoteEnfantController@index");
Route::post("/DossierEnfant/add-note", "NoteEnfantController@store");
Route::get("/statistiques", "StatistiqueController@index");
Route::get("/animateur",'UserController@index');
Route::post("/user/reset-password", "UserController@resetPassword");
Route::get("/user/{login}/profil","UserController@showProfil");
Route::post("/user/{login}/edit-profil","UserController@editProfil");


/******************************************gestion des evenements *************************************/
Route::get('/liste-des-evenements', 'EventStoreController@index');
/******************************************fin gestion des evenements********************************/

/********************************************route de l'infirmier***********************************/

Route::get('/Infirmier', 'InfirmierController@show');
Route::get('/liste-des-activites', 'UserController@index');
Route::get("/DossierMedicale/{idDossierEnfant}/Consultation", 'DossierMedicaleController@showDetails');
Route::post("/UpdateConsultationMedicale",    'ConsultationMedicaleController@update');
Route::post("/CreateConsultationMedicale",    'ConsultationMedicaleController@store');
Route::post("/CreateDossierMedicale",         'DossierMedicaleController@store');
Route::get("/liste-dossiers-des-enfants",         'DossierEnfantController@listeDossierEnfant');
Route::get("/liste-dossiers-medicals","InfirmierController@show");

/******************************************************fin******************************************/


/*******************************************route de l'encadreur**********************************/

// Route::get('/encadreur/liste-dossier-des-enfants',             'DossierEnfantController@listeDossierEnfant');
// Route::get('/encadreur/create-dossier-enfant',                        'DossierEnfantController@index');
// Route::get("/encadreur",'UserController@index');//affichage des activites par default
// Route::get('/encadreur/DossierEnfant/{id}/Details',                'DossierEnfantController@show');
// Route::get("/encadreur/liste-des-utilisateurs",    'UserController@show');
// Route::get('/encadreur/DossierEnfant/{id}/DossierMedical',         'DossierMedicaleController@showDetails');
// Route::get("/encadreur/DossierEnfant/{id}/liste-des-notes", "NoteEnfantController@index");
// Route::post("/encadreur/DossierEnfant/add-note", "NoteEnfantController@store");


/******************************************************fin******************************************/



/******************************************** FIN DES TESTS  *******************************/

Route::post('/login',           'UserController@login');

Route::get("/Administration",   'UserController@isLogin');

Route::get("/agendaActivites", 'ActiviteController@agendaActivites');
Route::get('/listeActivites', 'ActiviteController@show');
Route::get("/editActivity/{idActivite}", "ActiviteController@edit");
Route::get("/deleteActivite/{idActivite}", "ActiviteController@destroy");
// Route::get('/administration/DossierDesEnfants',             'DossierEnfantController@index');
Route::get('/Administration/liste-des-dossier-enfants',     'DossierEnfantController@listeDossierEnfant');

Route::post("/updateActivite","ActiviteController@update");
Route::post("/saveToAgenda","ActiviteController@saveToAgenda");
Route::post("/updateActivite","ActiviteController@updateActivite");

Route::post("/addActivite", "ActiviteController@create");

// Route::get('/administration/DossierEnfant/{id}/Details',                'DossierEnfantController@show');
Route::get('/administration/DossierEnfant/{id}/DossierJuridique',       'DossierEnfantController@dossierJuridiquePDF');
// Route::get("/administration/DossierEnfant/{nom}/zoneTelechargement",    'DossierEnfantController@getDossierTribunal');
Route::get("/DossierEnfant/{id}/zoneTelechargement",     'DossierEnfantController@viewAllDocuments');

Route::post("/DossierEnfant/zoneTelechargement/download",     'DossierEnfantController@downloadDocument');

Route::post("/DossierEnfant/{id}/EditDossierEnfant",     'DossierEnfantController@update');
Route::post('/DossierEnfant/addDocument',         'DossierEnfantController@addDocument');
Route::post('/administration/DossierDesEnfants',                        'DossierEnfantController@store');
Route::get("/Admin",                                    'UserController@index');


Route::get("/Infirmier/Download/{id}", 'DossierMedicaleController@consultationPDF');


/*************************************************************************************************** */