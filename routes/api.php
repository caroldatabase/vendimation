<?php

use Illuminate\Http\Request;

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

<<<<<<< HEAD
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
=======

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::group(['prefix' => 'v1'],function(){
    
    Route::post('login','UsersAPIController@login');
    Route::post('register','UsersAPIController@register');
    Route::post('forgotpassword','UsersAPIController@forgotPassword');
    Route::post('changepassword','UsersAPIController@changePassword');
    Route::post('logout','UsersAPIController@logout');
    Route::post('usercard','UsersAPIController@SaveCard');
    Route::post('uploadImg','UsersAPIController@uploadImg');
});


>>>>>>> 749be5ae7e09c2da741080e084a373208e43fcf9
