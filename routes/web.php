<?php

Auth::routes();

Route::group(['namespace' => 'RestaurantApp'], function () {
	Route::group(['namespace' => 'Auth'], function () {
	    Route::get('{workspace}/login','LoginController@showLoginForm')->name('workspace.login');
	    Route::post('{workspace}/login','LoginController@login');
	    Route::post('{workspace}/logout','LoginController@logout')->name('workspace.logout');
	});
});

Route::group(['middleware' => 'authenticated'],function(){
	Route::get('/', 'UserController@index');
	Route::get('profile', 'UserController@edit')->name('profile.edit');
	Route::put('profile', 'UserController@update')->name('profile.update');

	Route::resource('workspaces/{workspace}/add_admin', 'WorkspaceAdminController', [
		'only' => ['store','update','destroy'],
		'names' => [
			'store' => 'workspace_admin.store',
			'update' => 'workspace_admin.update',
			'destroy' => 'workspace_admin.destroy'
		],
	]);
	Route::resource('workspaces', 'WorkspaceController', ['except' => ['edit']]);

	Route::resource('employees', 'EmployeeController');
});
