<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

/// ROUTE YANG HANYA BISA DIAKSES OLEH ADMIN
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    /// Kumpulan Route Siswa
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::get('/siswa/{id_siswa}/edit', 'SiswaController@edit');
    Route::post('/siswa/{id_siswa}/update', 'SiswaController@update');
    Route::get('/siswa/{id_siswa}/delete', 'SiswaController@delete');
    Route::get('/siswa/{id_siswa}/profile', 'SiswaController@profile');

    /// Kumpulan Route Guru
    Route::get('/guru', 'GuruController@index');
    Route::post('/guru/create', 'GuruController@create');
    Route::get('/guru/{id_guru}/edit', 'GuruController@edit');
    Route::post('/guru/{id_guru}/update', 'GuruController@update');
    Route::get('/guru/{id_guru}/delete', 'GuruController@delete');
    Route::get('/guru/{id_guru}/profile', 'GuruController@profile');

});

/// ROUTE YANG BISA DIAKSES OLEH SIAPAPUN
Route::group(['middleware' => ['auth', 'checkRole:admin,siswa,guru']], function(){
    Route::get('/dashboard', 'DashboardController@index');

    /// Kumpulan Route Mata Pelajaran
    Route::get('/mapel', 'MapelController@index');
    Route::post('/mapel/create', 'MapelController@create');
    Route::get('/mapel/{id_mata_pelajaran}/edit', 'MapelController@edit');
    Route::post('/mapel/{id_mata_pelajaran}/update', 'MapelController@update');
    Route::get('/mapel/{id_mata_pelajaran}/delete', 'MapelController@delete');
});
