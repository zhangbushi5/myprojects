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
  
Route::get('/', 'WelcomeController@index');
Route::group(['prefix' => 'auth', 'namespace' => 'Auth'], function()
{
  Route::post('login', 'AuthController@login');
  Route::post('check', 'AuthController@check');
Route::post('regest_in', 'AuthController@regest_in');
Route::get('regest', 'AuthController@regest');
Route::post('send_mail', 'AuthController@regest');
Route::get('welcome', function(){ return view('auth.welcome');});
Route::get('contact', function(){ return view('auth.contact');});
});
// Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function()
// {
//   Route::get('/', 'AdminHomeController@index');
//   Route::resource('pages', 'PagesController');//资源控制器
// });

// Route::get('home', 'HomeController@index');
// Route::get('home', ['middleware'=>'auth',function()
// 	{

// 	}]);
Route::get('home', 'Auth\AuthController@index');
// Route::controllers([
// 	  'auth' => 'Auth\AuthController',
// 	'password' => 'Auth\PasswordController',
// ]);
 // Route::post('auth/login', 'Auth\AuthController@login');
