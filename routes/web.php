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
		Route::get('/', 'DashboardController@index')->name('app_index');
		Route::get('dashboard', 'DashboardController@index')->name('ws_dashboard');
		Route::resource('restaurants', 'RestaurantController');
		Route::get('restaurants/{restaurant}/employees', 'EmployeeController@index_in_restaurant')->name('res.employees.index');
		Route::post('restaurants/{restaurant}/foods/{food}/update_status', 'FoodController@updateStatus')->name('res.foods.update_status');
		Route::get('restaurants/{restaurant}/foods', 'FoodController@index_in_restaurant')->name('res.foods.index');
		Route::post('restaurants/check_ready', 'RestaurantController@checkRestaurantReady')->name('restaurants.check_ready');
		Route::resource('employees', 'EmployeeController');
		Route::resource('employees/{employee}/works', 'WorkController');
		Route::resource('foods', 'FoodController');
		Route::post('foods/{food}/update_number', 'FoodController@update_food_number')->name('foods.update_number');
		Route::resource('orders', 'OrderController');
		Route::post('orders/{order}/update_status', 'OrderController@update_status')->name('orders.updateStatus');
		Route::resource('admins', 'AdminController');
	});
});