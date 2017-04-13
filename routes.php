<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware'=>['web']], function(){

Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@postLogin');
Route::get('auth/logout','Auth\AuthController@getLogout');


Route::get('auth/register','Auth\AuthController@getRegister');
Route::post('auth/register','Auth\AuthController@postRegister');

Route::get('password/reset/{token?}','Auth\PasswordController@showResetForm');
Route::post('password/email','Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset','Auth\PasswordController@reset');

Route::auth();

});


Route::get('create', 'PageController@getcreate');
Route::get('recipes', 'PageController@getrecipes');
Route::get('contact', 'PageController@getcontact');
Route::get('about', 'PageController@getabout');
Route::get('welcome', 'PageController@getwelcome');
Route::get('/', 'PageController@getwelcome');
/*Route::get('/', function () {
    return view('home');
});*/
Route::resource('post','PostController');
Route::get('create', 'PostController@create');
Route::post('store', 'PostController@store');
Route::get('index','PostController@index');


Route::resource('recent','SinglepostController');
Route::resource('taglink','TaglinkController');

Route::resource('tags','TagController');
