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

/*Route::get('/', function () {
    //return view('welcome');
    return view('home');
});*/

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'usuarios'], function() {
    Route::get('',                  ['as' => 'user.index',  'uses' => 'UserController@index']);
    Route::get('create',            ['as' => 'user.create', 'uses' => 'UserController@create']);
    Route::post('store',            ['as' => 'user.store',  'uses' => 'UserController@store']);
    Route::get('{id}/destroy', 		['as' => 'user.destroy', 'uses' => 'UserController@destroy']);
    Route::get('{id}/edit',         ['as' => 'user.edit',   'uses' => 'UserController@edit']);
    Route::put('update/{users}',    ['as' => 'user.update', 'uses' => 'UserController@update']);
});

Route::group(['prefix' => 'salas'], function() {
    Route::get('',                  ['as' => 'romm.index',  'uses' => 'RommController@index']);
    Route::get('create',            ['as' => 'romm.create', 'uses' => 'RommController@create']);
    Route::post('store',            ['as' => 'romm.store',  'uses' => 'RommController@store']);
    Route::get('{id}/destroy', 		['as' => 'romm.destroy', 'uses' => 'RommController@destroy']);
    Route::get('{id}/edit',         ['as' => 'romm.edit',   'uses' => 'RommController@edit']);
    Route::put('update/{romm}',    ['as' => 'romm.update', 'uses' => 'RommController@update']);
});

Route::group(['prefix' => 'reservas'], function() {
    Route::get('',                  ['as' => 'reservas.index',  'uses' => 'ReserveController@index']);
});