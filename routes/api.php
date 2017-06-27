<?php

use Illuminate\Http\Request;

// requires cors header
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout');
Route::post('/password/reset', 'Auth\AuthController@sendReset');

// Requires Token (jwt)
Route::group(['middleware' => 'jwt.auth'], function() {

	//Route::post('/register', 'Auth\AuthController@register');
	Route::get('/auth/user', 'Auth\AuthController@user');

	Route::group(['prefix' => 'user', 'namespace' => 'Users'], function() {
		Route::get('/', 'UsersController@index');
		Route::get('/{user}', 'UsersController@show');
		Route::get('/{user}/edit', 'UsersController@edit');
		Route::post('/', 'UsersController@create');
		Route::patch('/{user}', 'UsersController@update');
		Route::delete('/{user}', 'UsersController@destroy');

		Route::group(['prefix' => 'role'], function() {
			Route::get('/', 'RolesController@index');
			Route::get('/{user}', 'RolesController@show');
			Route::get('/{user}/edit', 'RolesController@edit');
			Route::post('/', 'RolesController@create');
			Route::patch('/{user}', 'RolesController@update');
			Route::delete('/{user}', 'RolesController@destroy');
		});
	});

	Route::group(['prefix' => 'customer', 'namespace' => 'Customers'], function() {
		Route::get('/', 'CustomersController@index');
		Route::get('/{customer}', 'CustomersController@show');
		Route::get('/{customer}/edit', 'CustomersController@edit');
		Route::post('/', 'CustomersController@create');
		Route::patch('/{customer}', 'CustomersController@update');
		Route::delete('/{customer}', 'CustomersController@destroy');

		Route::group(['prefix' => '{customer}/user'], function() {
			Route::get('/', 'UsersController@index');
			Route::get('/{user}', 'UsersController@show');
			Route::get('/{user}/edit', 'UsersController@edit');
			Route::post('/', 'UsersController@create');
			Route::patch('/{user}', 'UsersController@update');
			Route::delete('/{user}', 'UsersController@destroy');
		});

		Route::group(['prefix' => '{customer}/department'], function() {
			Route::get('/', 'DeparmentsController@index');
			Route::get('/{department}', 'DepartmentsController@show');
			Route::get('/{department}/edit', 'DepartmentsController@edit');
			Route::post('/', 'DepartmentsController@create');
			Route::patch('/{department}', 'DepartmentsController@update');
			Route::delete('/{department}', 'DepartmentsController@destroy');
		});
	});
});