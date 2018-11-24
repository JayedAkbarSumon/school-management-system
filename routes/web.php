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

Route::get('/', 'AdminController@login');
Route::post('user_login', 'AdminController@userLogin');
Route::post('user_regis', 'AdminController@userInfoSave');
Route::get('/adminpanel','AdminController@admin');
Route::get('/userMaintainance','AdminController@userMaintain');
Route::get('/logout','AdminController@userLogout');
//Route::get('/login','AdminController@login');
Route::get('/addUser','AdminController@addNewUser');




