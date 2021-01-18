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

Route::get('/', 'HomeUserController@index');

Route::get('/admin/login', 'LoginController@index');

Route::post('/admin/process/login', 'LoginController@loginAdmin');

Route::get('/admin/home', 'HomeController@index');

Route::get('logout', 'LoginController@logout');

Route::get('/lokasi', 'LokasiController@index');
Route::post('/lokasi/store', 'LokasiController@store');
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
Route::get('/pemesanan/detail/{nomor_pemesanan}', 'PemesananController@detail');

Route::get('/reschedule', 'RescheduleController@index');
Route::get('/reschedule/detail/{nomor_pemesanan}', 'RescheduleController@detail');

Route::get('/refund', 'RefundController@index');
Route::get('/refund/detail/{nomor_pemesanan}', 'RefundController@detail');

Route::get('/profil', 'ProfilController@index');
Route::post('/profil/change', 'ProfilController@change');

Route::get('/list/trip/{id}', 'TripUserController@index');
Route::get('/list/wisata/{id}', 'WisataUserController@index');

Route::get('/itenerary/{id}', 'IteneraryUserController@index');
Route::get('/syarat/{id}', 'SyaratUserController@index');

Route::get('/login', 'LoginUserController@index');
Route::get('/daftar', 'DaftarController@index');
Route::post('/daftar/store', 'DaftarController@store');

Route::post('/user/process/login', 'LoginController@loginUser');

Route::get('/user/home', 'HomeUserController@home');
Route::get('/user/logout', 'LoginController@logoutUser');

Route::get('/user/trip/{id}', 'TripUserController@trip');
Route::get('/user/wisata/{id}', 'WisataUserController@wisata');
Route::get('/user/itenerary/{id}', 'IteneraryUserController@itenerary');
Route::get('/user/syarat/{id}', 'SyaratUserController@syarat');
Route::post('/user/pemesanan/store/{id}', 'PemesananController@pesan');
Route::get('/user/pembayaran/{nomor}/wisata/{id}', 'PemesananController@pembayaran');
Route::post('/user/proses/pembayaran/{nomor}/wisata/{id}', 'PemesananController@prosesPembayaran');
Route::get('/user/pembayaran/info/{nomor}/wisata/{id}', 'PemesananController@info');


Route::get('/user/konfirmasi', 'KonfirmasiController@index');
Route::post('/user/konfirmasi/upload/gambar', 'KonfirmasiController@uploadGambar');
Route::post('/user/konfirmasi/lunas/upload/gambar', 'KonfirmasiController@uploadLunasGambar');
Route::get('/user/refund', 'RefundUserController@index');
Route::get('/user/reschedule', 'RescheduleUserController@index');
Route::get('/user/reschedule/add/{nomor}', 'RescheduleUserController@add');
Route::post('/user/reschedule/store/{nomor}', 'RescheduleUserController@store');
Route::post('/user/refund/add', 'RefundUserController@add');
Route::get('/user/konfirmasi/detail/{id}', 'KonfirmasiController@detail');
Route::get('/user/refund/detail/{id}', 'RefundUserController@detail');
Route::get('/user/reschedule/detail/{id}', 'RescheduleUserController@detail');

Route::get('/about-us', 'AboutUsController@index');
Route::get('user/about-us', 'AboutUsController@about');
Route::post('user/proses/cari', 'HomeUserController@prosesCari');
Route::get('user/cari', 'HomeUserController@cari');

Route::get('/testimoni', 'KomentarController@index');
Route::get('user/testimoni', 'KomentarController@testimoni');
Route::post('user/testimoni/store', 'KomentarController@store');

Route::post('proses/cari', 'HomeUserController@prosesCariUser');
Route::get('cari', 'HomeUserController@cariUser');

Route::get('obrolan', 'ObrolanController@index');
Route::get('obrolan/detail/{id}/{id1}', 'ObrolanController@detail');
Route::get('obrolan/store/{id}', 'ObrolanController@store');

Route::get('pemesanan/approve/{id}', 'PemesananController@approve');
Route::get('pemesanan/reject/{id}', 'PemesananController@reject');

Route::get('refund/approve/{id}', 'RefundController@approve');
Route::get('refund/reject/{id}', 'RefundController@reject');

Route::get('reschedule/approve/{id}', 'RescheduleController@approve');
Route::get('reschedule/reject/{id}', 'RescheduleController@reject');