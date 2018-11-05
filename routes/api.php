<?php

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
*/

Route::get('clients/{id?}', 'ClientController@show');
Route::post('client', 'ClientController@store');
Route::delete('client/{id}', 'ClientController@delete');

/*
|--------------------------------------------------------------------------
| Project Routes
|--------------------------------------------------------------------------
*/

Route::get('projects/{id?}', 'ProjectController@show');
Route::post('project', 'ProjectController@store');
Route::put('project/{id}', 'ProjectController@update');
Route::delete('project/{id}', 'ProjectController@delete');
