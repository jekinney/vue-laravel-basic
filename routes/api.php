<?php

use Illuminate\Http\Request;

Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout');
Route::post('/password/reset', 'Auth\AuthController@sendReset');

Route::group(['middleware' => 'jwt.auth'], function() {
	Route::get('/user', 'Auth\AuthController@user');

	Route::get('/users', 'UsersController@index');
	Route::get('/user/{user}', 'UsersController@show');
	Route::get('/user/{user}/edit', 'UsersController@edit');

	Route::get('/customers', 'CustomersController@index');
	Route::get('/customer/{customer}', 'UsersController@show');
	Route::get('/customer/{customer}/edit', 'UsersController@edit');
});