<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', 'AuthController@login');
Route::get('project', 'ProjectController@index');
Route::post('project/create', 'ProjectController@create');
Route::post('project/delete', 'ProjectController@delete');

Route::get('data', 'DataController@index');
Route::post('data/create', 'DataController@create');
Route::post('data/update', 'DataController@update');
Route::post('data/delete', 'DataController@delete');

Route::get('pole', 'DataController@indexPole');

Route::get('data/download/excel/{id}', 'DataController@downloadExcel');
