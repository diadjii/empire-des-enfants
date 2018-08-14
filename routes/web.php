<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

/******************************************* DEBUT DES TESTS  ******************************/
Route::get("/login", function () {
    return view("new.login");
});

Route::post('/login',           'UserController@login');

Route::get("/", function () {
    return view("new.login");
});
Route::get("/logOut", function () {
    session()->flush();
    return redirect("/login");
});

Route::post("/add-dossier-enfant","DossierEnfantController@store");
Route::post("/add-activite", "ActiviteController@create");

Route::get("/administration","UserController@index");//affichage des activites par default
Route::get("/administrateur/{id}/changeStatusToOn",    "UserController@changeStatusToON");
Route::get("/administrateur/{id}/changeStatusToOff",      "UserController@changeStatusToOff");
Route::get("/administrateur/{id}/delete-user",             "UserController@delete");
Route::get("/agenda-activites", "ActiviteController@agendaActivites");
Route::get("/animateur","UserController@index");

Route::get("/create-dossier-enfant",              "DossierEnfantController@index");
Route::get("/create-utilisateur", function(){
    $login = session("login");
    return view("new.create-utilisateur",compact("login"));
});

Route::post("/create-dossier-medicale",         "DossierMedicaleController@store");
Route::post("/create-consultation-medicale",    "ConsultationMedicaleController@store");

Route::get("/delete-activite/{idActivite}", "ActiviteController@destroy");
Route::get("/dossier-medical/{idDossierEnfant}/consultation", "DossierMedicaleController@showDetails");
Route::get("/dossier-enfant/{id}/zoneTelechargement",     "DossierEnfantController@viewAllDocuments");
Route::get("/dossier-enfant/{id}/details",                "DossierEnfantController@show");
Route::get("/dossier-enfant/{id}/dossier-medical",         "DossierMedicaleController@showDetails");
Route::get("/dossier-enfant/{id}/liste-des-notes", "NoteEnfantController@index");

Route::get("/edit-activity/{idActivite}", "ActiviteController@edit");
Route::get("/encadreur", "UserController@index");

Route::post("/dossier-enfant/zone-telechargement/download",     "DossierEnfantController@downloadDocument");
Route::post("/dossier-enfant/{id}/edit-dossier-enfant",     "DossierEnfantController@update");
Route::post("/dossier-enfant/add-document",         "DossierEnfantController@addDocument");
Route::post("/dossier-enfant/add-note", "NoteEnfantController@store");

Route::get("/infirmier", "InfirmierController@show");

Route::get("/liste-activites", "ActiviteController@show");
Route::get("/liste-des-evenements", "EventStoreController@index");
Route::get("/liste-des-utilisateurs",    "UserController@show");
Route::get("/liste-dossiers-des-enfants",         "DossierEnfantController@listeDossierEnfant");
Route::get("/liste-dossiers-medicals","InfirmierController@show");
Route::get("/liste-des-activites", "UserController@index");
Route::get("/liste-dossier-des-enfants",             "DossierEnfantController@listeDossierEnfant");

Route::get("/statistiques", "StatistiqueController@index");

Route::post("/save-user",         "UserController@store");
Route::post("/save-to-agenda","ActiviteController@saveToAgenda");

Route::get("/user/{login}/profil","UserController@showProfil");

Route::post("/update-activite","ActiviteController@update");
Route::post("/update-consultation-medicale",    "ConsultationMedicaleController@update");
Route::post("/update-activite","ActiviteController@updateActivite");
Route::post("/user/{login}/edit-profil","UserController@editProfil");
Route::post("/user/reset-password", "UserController@resetPassword");


