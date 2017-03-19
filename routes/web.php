<?php

Auth::routes();

Route::group(['middleware' => 'authenticated'],function(){
	Route::get('/', 'UserController@index');
	Route::get('profile', 'UserController@edit')->name('profile.edit');
	Route::put('profile', 'UserController@update')->name('profile.update');

	Route::resource('workspaces/{workspace}/add_admin', 'WorkspaceAdminController', [
		'only' => ['store','update','destroy'],
		'parameters' => ['add_admin' => 'admin'],
		'names' => [
			'store' => 'workspace_admin.store',
			'update' => 'workspace_admin.update',
			'destroy' => 'workspace_admin.destroy'
		],
	]);
	Route::resource('workspaces', 'WorkspaceController', ['except' => ['edit']]);
});

Route::group(['namespace' => 'RestaurantApp','middleware' => 'check_workspace','prefix' => '{workspace}'], function () {
	Route::group(['namespace' => 'Auth'], function () {
	    Route::get('login','LoginController@showLoginForm')->name('workspace.login');
	    Route::post('login','LoginController@login');
	    Route::post('logout','LoginController@logout')->name('workspace.logout');
	});
	Route::group(['middleware' => 'workspace_logged'],function(){
		Route::get('/', 'DashboardController@index');
		Route::get('dashboard', 'DashboardController@index')->name('ws_dashboard');
		Route::resource('restaurants', 'RestaurantController');
		Route::resource('employees', 'EmployeeController');
		Route::get('restaurants/{id}/employees', 'EmployeeController@index_in_restaurant')->name('res.employees.index');
		Route::get('restaurants/{id}/employees/create', 'EmployeeController@create_in_restaurant')->name('res.employees.create');
		Route::get('restaurants/{id}/employees/edit', 'EmployeeController@edit_in_restaurant')->name('res.employees.edit');
	});
});
