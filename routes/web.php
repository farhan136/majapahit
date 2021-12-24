<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\LoginCOntroller@login');
Route::post('/login', 'App\Http\Controllers\LoginController@loginstore');

Route::get('/register', 'App\Http\Controllers\LoginController@register');
Route::post('/register', 'App\Http\Controllers\LoginController@registerstore');

Route::get('/logout', 'App\Http\Controllers\LoginController@logout');


Route::group(['middleware'=>'ceksession'], function(){

	Route::get('/transaksi', 'App\Http\Controllers\TransaksiController@index');

	Route::post('/store', 'App\Http\Controllers\TransaksiController@store');

	Route::get('/tampilan', 'App\Http\Controllers\TransaksiController@tampil');

});



