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
Route::get('/', 'TodoController@index');

Route::put('/task/{id}/{done}', 'TodoController@update');

Route::post('/task', 'TodoController@create');

Route::patch('/task/{id}/{priority}', 'TodoController@priorityControl');

Route::delete('/task/{id}', 'TodoController@delete');

Route::delete('/', 'TodoController@deleteAllCompleted');