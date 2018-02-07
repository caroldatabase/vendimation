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
 
Route::get('/', function(){
	return \Redirect::to('http://vedimations.xyz');
});
 
/*
|--------------------------------------------------------------------------
| Auth Routes for social login
|--------------------------------------------------------------------------
*/
Route::any('auth/{provider}', 'AuthController@redirectToProvider');
Route::any('{provider}/callback', 'AuthController@handleProviderCallback');
Route::any('google', 'AuthController@handleProviderCallback');
Route::get('account/login', function(){
	return \Redirect::to('admin');
});
