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

Route::get('writer', function () {
    
    return view('writer');
});


Route::any('home/writer', 'GetDataController@GetWriter');

Route::post('home/editwriter', 'GetDataController@EditWriter');

Route::post('home/delwriter', 'GetDataController@DelWriter');
