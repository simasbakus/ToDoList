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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'TasksController@index')->name('home')->middleware('auth');

Route::get('/home', 'TasksController@index')->middleware('auth');

Route::get('/task/create', 'TasksController@create')->middleware('auth');

Route::post('/task', 'TasksController@store')->middleware('auth');

Route::get('/task/{task}/edit', 'TasksController@edit')->middleware('auth');

Route::patch('/task/{task}', 'TasksController@update')->middleware('auth');

Route::delete('/task/{task}', 'TasksController@destroy')->middleware('auth');

Route::patch('/task/{task}/isDone', 'TasksController@updateIsDone')->middleware('auth');
