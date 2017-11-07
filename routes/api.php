<?php

use Illuminate\Http\Request;
use Dingo\Api\Routing\Router;

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

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/testw', function (Request $request) {
    return 123;
});*/

$api = app(Router::class);
$api->version('v1',function (Router $api) {
    $api->group(['prefix' => 'auth','namespace' => 'App\Http\Controllers'], function (Router $api) {
        $api->post('login','Api\V1\Controllers\AuthController@login');

    });
    $api->get('test',function () {
       return 'Hello World';
    });

});