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

Route::get('/home', 'ReserveController@index');
Route::get('/', 'ReserveController@index');
//Route::get('/cadastro', 'HomeController@index');

Route::group(['prefix' => 'cadastro'], function() {
    Route::get('',                  ['as' => 'cadastro.index',  'uses' => 'HomeController@index']);
    Route::get('varios',            ['as' => 'cadastro.varios', 'uses' => 'HomeController@cadastrovarios']);
});

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
    Route::put('update/{id}',    ['as' => 'romm.update', 'uses' => 'RommController@update']);
});

Route::group(['prefix' => 'notebooks'], function() {
    Route::get('',                  ['as' => 'not.index',  'uses' => 'LaptopController@index']);
    Route::get('create',            ['as' => 'not.create', 'uses' => 'LaptopController@create']);
    Route::post('store',            ['as' => 'not.store',  'uses' => 'LaptopController@store']);
    Route::get('{id}/destroy',      ['as' => 'not.destroy', 'uses' => 'LaptopController@destroy']);
    Route::get('{id}/edit',         ['as' => 'not.edit',   'uses' => 'LaptopController@edit']);
    Route::put('update/{id}',       ['as' => 'not.update', 'uses' => 'LaptopController@update']);
});

Route::group(['prefix' => 'michofones'], function() {
    Route::get('',                  ['as' => 'mic.index',  'uses' => 'MicrophoneController@index']);
    Route::get('create',            ['as' => 'mic.create', 'uses' => 'MicrophoneController@create']);
    Route::post('store',            ['as' => 'mic.store',  'uses' => 'MicrophoneController@store']);
    Route::get('{id}/destroy',      ['as' => 'mic.destroy', 'uses' => 'MicrophoneController@destroy']);
    Route::get('{id}/edit',         ['as' => 'mic.edit',   'uses' => 'MicrophoneController@edit']);
    Route::put('update/{id}',       ['as' => 'mic.update', 'uses' => 'MicrophoneController@update']);
});

Route::group(['prefix' => 'projetores'], function() {
    Route::get('',                  ['as' => 'project.index',  'uses' => 'ProjectorController@index']);
    Route::get('create',            ['as' => 'project.create', 'uses' => 'ProjectorController@create']);
    Route::post('store',            ['as' => 'project.store',  'uses' => 'ProjectorController@store']);
    Route::get('{id}/destroy',      ['as' => 'project.destroy', 'uses' => 'ProjectorController@destroy']);
    Route::get('{id}/edit',         ['as' => 'project.edit',   'uses' => 'ProjectorController@edit']);
    Route::put('update/{id}',       ['as' => 'project.update', 'uses' => 'ProjectorController@update']);
});

Route::group(['prefix' => 'sons'], function() {
    Route::get('',                  ['as' => 'sound.index',  'uses' => 'SoundController@index']);
    Route::get('create',            ['as' => 'sound.create', 'uses' => 'SoundController@create']);
    Route::post('store',            ['as' => 'sound.store',  'uses' => 'SoundController@store']);
    Route::get('{id}/destroy',      ['as' => 'sound.destroy', 'uses' => 'SoundController@destroy']);
    Route::get('{id}/edit',         ['as' => 'sound.edit',   'uses' => 'SoundController@edit']);
    Route::put('update/{id}',       ['as' => 'sound.update', 'uses' => 'SoundController@update']);
});

Route::group(['prefix' => 'reservas'], function() {
    Route::get('',                  ['as' => 'reserve.index',  'uses' => 'ReserveController@index']);
    Route::post('create',            ['as' => 'reserve.create', 'uses' => 'ReserveController@create']);
    Route::post('store',            ['as' => 'reserve.store',  'uses' => 'ReserveController@store']);

});

