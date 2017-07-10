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

Route::get('home', function () {
    return view('hello');
});

Auth::routes();

//Route::get('/', 'HomeController@index');middleware('web')

Route::post('/login','Auth\LoginController@postLogin');
Route::get('/','PagesController@index');
Route::get('t/{id}','PagesController@show')->middleware("ip");
//Verify the mailbox
Route::get('/verify/email','BaseViewController@verifyEmail');

# --------------- user ----------------
Route::group(['middleware' => 'auth'],function (){
    Route::get('/new','PagesController@create');
    Route::post('/new','PagesController@newT');

    Route::post('/sm/upload','PagesController@ajaxImageUpload');//ajax upload img
    Route::post('/reply','PagesController@replyOne');
    Route::get('/notification','UserNotificationController@index');

    Route::get('/s/{id}','PagesController@store');
    Route::get('/us/{id}','PagesController@unstore');

    Route::resource('/profile','UserController');
});

# --------------- error ----------------
Route::get("/error/ip",'BaseViewController@notAllowIpAccess');


Route::post('/admin/login','AdminAuth\LoginController@postLogin');
Route::get('/admin/login','AdminAuth\LoginController@showLoginForm');
Route::get('/admin/register', 'AdminAuth\RegisterController@showRegistrationForm');
Route::post('/admin/register', 'AdminAuth\RegisterController@register');

# --------------- admin ----------------

Route::group(['prefix'=>'admin','middleware'=>'admin'],function (){

    Route::get('/','Admin\HomeController@index');

    # 用户
    Route::post("/user",'Admin\UserController@index');
    Route::get("/user",'Admin\UserController@index');

    Route::get("/user/w/{name}",'Admin\UserController@watch');
    Route::post("/user/w/{name}",'Admin\UserController@watch');

    Route::get('/session',function(){
        return session()->flush();
    });

    Route::get("/topic",'Admin\TopicController@index');
    Route::post("/topic",'Admin\TopicController@index');
    Route::get("/ip",'Admin\IpController@index');
    Route::post("/ip",'Admin\IpController@index');
    Route::post("/ip/create",'Admin\IpController@store');
    Route::get("/ip/delete/{id}",'Admin\IpController@destroy');

});
