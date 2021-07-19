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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('sayhello','Hellocontroller@index'); 
// Route::get('sayhello',function () {
// 		return view('hello');
// 	});


// Route::get('test/{fname}/{lname?}/{age?}','Hellocontroller@newTest')->where(['fname'=>"^[a-zA-Z]+$",'lname'=>"^[a-zA-Z]+$","age"=>"[0-9]+"]);;	 

// Route::get('test/{fname}/{lname?}/{age?}',function($fname,$lname='',$age=''){
// 	echo  "$fname $lname $age"; 
// })->where(['fname'=>"^[a-zA-Z]+$",'lname'=>"^[a-zA-Z]+$","age"=>"[0-9]+"]);


// this is middle ware function 
// Route::get('middlewareHello',function(){
// 	return view('hello');
// })->middleware('test');



// this is new controller
// Route::get('test','TestController@showview');


// Route::get('sendData','Hellocontroller@sendDataFunction');




// Route::get('/','Hellocontroller@index');






Route::get('/','contactController@index');

Route::post('/contact','contactController@store')->name('contactstore');