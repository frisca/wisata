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

Route::get('/', [
		'as' => 'index', 'uses' => 'LoginController@index'
	]);

Route::post('/login', [
		'as' => 'login', 'uses' => 'LoginController@login'
	]);

Route::get('/home', [
		'as' => 'home', 'uses' => 'HomeController@index'
	]);

Route::get('logout', [
		'as' => 'logout', 'uses' => 'LoginController@logout'
	]);

Route::get('customer', [
		'as' => 'customer', 'uses' => 'CustomerController@index'
	]);

Route::get('category', [
		'as' => 'category', 'uses' => 'CategoryController@index'
	]);

Route::get('wisata', [
		'as' => 'wisata', 'uses' => 'WisataController@index'
	]);

Route::get('pemesanan', [
		'as' => 'pemesanan', 'uses' => 'PemesananController@index'
	]);