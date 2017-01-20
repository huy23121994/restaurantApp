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

Route::group(['middleware' => 'authenticated'],function(){
	Route::resource('employees', 'EmployeeController');
	Route::get('/', 'UserController@index');
	Route::resource('{username}/workspaces', 'WorkspaceController');
	Route::get('{username}/profile', 'UserController@edit')->name('profile.edit');
	Route::put('{username}/profile', 'UserController@update')->name('profile.update');
});
