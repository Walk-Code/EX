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

Route::get('/lemon','Lemon\LemonController@index');
Route::get('/lemon/get/{filename}','Lemon\LemonController@get');
Route::post('/lemon/add',['as' => "addFile",'uses' => 'Lemon\LemonController@add']);
Route::get('/lemon/model/{filename}',['as' => "model",'uses' => 'Lemon\LemonController@model']);
Route::post('/lemon/model/{filename}',['as' => "model",'uses' => 'Lemon\LemonController@model']);

Route::post('/login','Auth\LoginController@postLogin');
Route::get('auth/geetest','Auth\LoginController@getGeetest');
Route::get('/','PagesController@index');
Route::get('t/{id}','PagesController@show')->middleware("ip");
//Verify the mailbox
Route::get('/verify/email','BaseViewController@verifyEmail');

# --------------- job -----------------
Route::get('job','BaseController@test');

# --------------- user ----------------
Route::group(['middleware' => 'auth'],function (){
    Route::get('/new','PagesController@create');
    Route::post('/new','PagesController@newT');

    Route::post('/sm/upload','PagesController@ajaxImageUpload');//ajax upload img
    Route::post('/reply','PagesController@replyOne');
    Route::get('/notification','UserNotificationController@index');

    Route::get('/s/{id}','PagesController@store');
    Route::get('/us/{id}','PagesController@unstore');

    Route::post('/profile/website','UserController@addWebSide');
    Route::get('/block/{name}','UserController@block');
    Route::get('/unblock/{name}','UserController@unBlock');
    Route::get('/attention/{name}','UserController@attention');
    Route::get('/unattention/{name}','UserController@unattention');
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

    Route::get("/topic",'Admin\TopicController@index')->middleware("ip");
    Route::post("/topic",'Admin\TopicController@index');
    Route::get("/system/ip",'Admin\IpController@index');
    Route::post("/system/ip",'Admin\IpController@index');
    Route::post("/system/ip/create",'Admin\IpController@store');
    Route::get("/system/ip/delete/{id}",'Admin\IpController@destroy');
# ---------------- log ---------------------
    Route::get('/system/logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

});
