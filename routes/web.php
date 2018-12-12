<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home','HomeController@index')->name('home');
Route::get('accueil', function (){
    return view('Acceuil');
});
Route::get('master', function (){
    return view('layouts.master');
});
Route::get('cv', function (){
    return view('cv');
});
Route::get('detail', function (){
    return view('detail');
});
Route::get('cvs','cvsController@index');
Route::get('cvs/create','cvsController@create');
Route::post('cvs','cvsController@store');
Route::get('cvs/{id}/edit','cvsController@edit');
Route::put('cvs/{id}/update','cvsController@update');
Route::delete('cvs/{id}','CvsController@destroy');