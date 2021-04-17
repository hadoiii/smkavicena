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
    Route::get('/siswa/{id}/edit', 'SiswaController@edit');
    Route::post('/siswa/{id}/update', 'SiswaController@update');
    Route::get('/siswa/{id}/delete', 'SiswaController@delete');
    Route::get('/siswa/{id}/profile', 'SiswaController@profile');

    /// Kumpulan Route Guru
    Route::get('/guru', 'GuruController@index');
    Route::post('/guru/create', 'GuruController@create');
    Route::get('/guru/{id}/edit', 'GuruController@edit');
    Route::post('/guru/{id}/update', 'GuruController@update');
    Route::get('/guru/{id}/delete', 'GuruController@delete');
    Route::get('/guru/{id}/profile', 'GuruController@profile');

});

/// ROUTE YANG BISA DIAKSES OLEH SIAPAPUN
Route::group(['middleware' => ['auth', 'checkRole:admin,siswa,guru']], function(){
    Route::get('/dashboard', 'DashboardController@index');

    /// Kumpulan Route Mata Pelajaran
    Route::get('/mapel', 'MapelController@index');
    Route::post('/mapel/create', 'MapelController@create');
    Route::get('/mapel/{id}/edit', 'MapelController@edit');
    Route::post('/mapel/{id}/update', 'MapelController@update');
    Route::get('/mapel/{id}/delete', 'MapelController@delete');
});
