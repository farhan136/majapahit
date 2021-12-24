<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'belumlogin'], function(){
	Route::get('/', 'App\Http\Controllers\LoginCOntroller@login');
	Route::post('/login', 'App\Http\Controllers\LoginController@loginstore');

	Route::get('/register', 'App\Http\Controllers\LoginController@register');
	Route::post('/register', 'App\Http\Controllers\LoginController@registerstore');

});

Route::group(['middleware'=>'ceksession'], function(){

	Route::get('/transaksi', 'App\Http\Controllers\TransaksiController@index');

	Route::post('/store', 'App\Http\Controllers\TransaksiController@store');

	Route::get('/tampilan', 'App\Http\Controllers\TransaksiController@tampil');

	Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');

	Route::get('/logout', 'App\Http\Controllers\LoginController@logout');

});



