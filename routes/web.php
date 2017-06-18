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
    return view('layouts.app');
});


Auth::routes();

//Route::get('/', 'HomeController@index');
Route::post('login','Auth\LoginController@postLogin');
Route::get('/','PagesController@index');
Route::get('t/{id}','PagesController@show');
Route::get('new','PagesController@create');
Route::post('sm/upload','PagesController@ajaxImageUpload');//ajax upload img
Route::post('reply','PagesController@replyOne');
Route::get('notification','UserNotificationController@index');