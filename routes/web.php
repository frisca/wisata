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

Route::get('/', 'LoginController@index');

Route::post('/login', 'LoginController@login');

Route::get('/home', 'HomeController@index');

Route::get('logout', 'LoginController@logout');

Route::get('/lokasi', 'LokasiController@index');
Route::post('/lokasi/create', 'LokasiController@create');
Route::get('/lokasi/add', 'LokasiController@add');
Route::get('/lokasi/edit/{id}', 'LokasiController@edit');
Route::post('/lokasi/change', 'LokasiController@change');
Route::get('/lokasi/detail/{id}', 'LokasiController@detail');
Route::get('/lokasi/detail/{id}', 'LokasiController@detail');
Route::get('/lokasi/delete/{id}', 'LokasiController@delete');

Route::get('/trip', 'TripController@index');
Route::post('/trip/store', 'TripController@store');
Route::get('/trip/add', 'TripController@add');
Route::get('/trip/edit/{id}', 'TripController@edit');
Route::post('/trip/change', 'TripController@change');
Route::get('/trip/detail/{id}', 'TripController@detail');
Route::get('/trip/detail/{id}', 'TripController@detail');
Route::get('/trip/delete/{id}', 'TripController@delete');

Route::get('/kategori/fasilitas', 'KategoriFasilitasController@index');
Route::post('/kategori/fasilitas/store', 'KategoriFasilitasController@store');
Route::get('/kategori/fasilitas/add', 'KategoriFasilitasController@add');
Route::get('/kategori/fasilitas/edit/{id}', 'KategoriFasilitasController@edit');
Route::post('/kategori/fasilitas/change', 'KategoriFasilitasController@change');
Route::get('/kategori/fasilitas/detail/{id}', 'KategoriFasilitasController@detail');
Route::get('/kategori/fasilitas/detail/{id}', 'KategoriFasilitasController@detail');
Route::get('/kategori/fasilitas/delete/{id}', 'KategoriFasilitasController@delete');

// Route::get('/fasilitas', 'FasilitasController@index');
Route::post('/fasilitas/store', 'FasilitasController@store');
Route::get('/fasilitas/{wisata}/add', 'FasilitasController@add');
Route::get('/fasilitas/{wisata}/edit/{id}', 'FasilitasController@edit');
Route::post('/fasilitas/change', 'FasilitasController@change');
Route::get('/fasilitas/{wisata}/detail/{id}', 'FasilitasController@detail');
Route::get('/fasilitas/{wisata}/delete/{id}', 'FasilitasController@delete');

Route::get('/wisata', 'WisataController@index');
Route::get('/wisata/add', 'WisataController@add');
Route::post('/wisata/store', 'WisataController@store');
Route::get('/wisata/edit/{id}', 'WisataController@edit');
Route::post('/wisata/change', 'WisataController@change');
Route::get('/wisata/detail/{id}', 'WisataController@detail');
Route::get('/wisata/delete/{id}', 'WisataController@delete');

Route::get('/tanggal/wisata', 'TanggalWisataController@index');
Route::post('/tanggal/wisata/store', 'TanggalWisataController@store');
Route::get('/tanggal/wisata/add', 'TanggalWisataController@add');
Route::get('/tanggal/wisata/edit/{id}', 'TanggalWisataController@edit');
Route::post('/tanggal/wisata/change', 'TanggalWisataController@change');
Route::get('/tanggal/wisata/detail/{id}', 'TanggalWisataController@detail');
Route::get('/tanggal/wisata/delete/{id}', 'TanggalWisataController@delete');

Route::get('/syarat', 'SyaratController@index');
Route::get('/syarat/add', 'SyaratController@add');
Route::post('/syarat/store', 'SyaratController@store');
Route::get('/syarat/edit/{id}', 'SyaratController@edit');
Route::post('/syarat/change', 'SyaratController@change');
Route::get('/syarat/detail/{id}', 'SyaratController@detail');
Route::get('/syarat/delete/{id}', 'SyaratController@delete');

Route::get('/itenerary', 'IteneraryController@index');
Route::get('/itenerary/add', 'IteneraryController@add');
Route::post('/itenerary/store', 'IteneraryController@store');
Route::get('/itenerary/edit/{id}', 'IteneraryController@edit');
Route::post('/itenerary/change', 'IteneraryController@change');
Route::get('/itenerary/detail/{id}', 'IteneraryController@detail');
Route::get('/itenerary/delete/{id}', 'IteneraryController@delete');

Route::get('/pemesanan', 'PemesananController@index');
Route::get('/pemesanan/{nomor_pemesanan}', 'PemesananController@detail');