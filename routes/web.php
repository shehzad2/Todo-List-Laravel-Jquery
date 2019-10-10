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

Route::any('/','TaskController@index');
Route::any('/save-add-task','TaskController@saveAddTask');
Route::any('/change-status','TaskController@changeStatus');
Route::any('/login','LoginController@login');
Route::any('/get-login','LoginController@getLogin');
Route::any('/save-register','LoginController@saveRegister');
Route::any('/logout','LoginController@logout');
