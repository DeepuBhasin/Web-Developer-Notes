<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::post(
    '/submit',
    function () {
        return "Form has been submited";
    }
);

Route::get('/Index', 'HomeController@index');
Route::get('/create', 'HomeController@create');
Route::get('/edit/{id}', 'HomeController@edit');
Route::post('/store', 'HomeController@store');
Route::post('/update/{id}', 'HomeController@update');
Route::post('/delete/{id}', 'HomeController@destroy');