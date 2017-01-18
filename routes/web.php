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

Auth::routes();

Route::group(['namespace' => 'Admin'], function () {
    Route::post('demo','DashboardController@index');
});

Route::group(['domain' => '{subdomain}.restaurant.dev'], function () {
    Route::get('/', function($subdomain){
        return 'Subdomain ' . $subdomain;
    });
});

Route::group(['middleware' => 'authenticated'],function(){
	Route::resource('employees', 'EmployeeController');
	Route::resource('', 'UserController', [
		'only' => ['index', 'show', 'edit', 'update'],
		'names' => ['show' => 'users.show'],
		'parameters' => ['' => 'username']
	]);
});
