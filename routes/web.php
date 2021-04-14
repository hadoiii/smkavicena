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
    return view('welcome');
});
/// Kumpulan Route Siswa
Route::get('/siswa', 'SiswaController@index');
Route::post('/siswa/create', 'SiswaController@create');
Route::get('/siswa/{id_siswa}/edit', 'SiswaController@edit');
Route::post('/siswa/{id_siswa}/update', 'SiswaController@update');
Route::get('/siswa/{id_siswa}/delete', 'SiswaController@delete');

/// Kumpulan Route Guru
Route::get('/guru', 'GuruController@index');
Route::post('/guru/create', 'GuruController@create');
Route::get('/guru/{id_guru}/edit', 'GuruController@edit');
Route::post('/guru/{id_guru}/update', 'GuruController@update');
Route::get('/guru/{id_guru}/delete', 'GuruController@delete');

/// Kumpulan Route Mata Pelajaran
Route::get('/mapel', 'MapelController@index');
Route::post('/mapel/create', 'MapelController@create');
Route::get('/mapel/{id_mata_pelajaran}/edit', 'MapelController@edit');
Route::post('/mapel/{id_mata_pelajaran}/update', 'MapelController@update');
Route::get('/mapel/{id_mata_pelajaran}/delete', 'MapelController@delete');