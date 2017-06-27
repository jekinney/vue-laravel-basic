<?php

Route::get('/', function () {
	return phpinfo();
    return view('welcome');
});
