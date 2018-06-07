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

Route::get('/admin',function(){
  $login = session('login');
  return view("admin",compact('login'));
});

Route::post('/login','UserController@login');
