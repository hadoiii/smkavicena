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

Route::get('/', 'SiteController@home');
Route::get('/register', 'SiteController@register');
Route::post('/postregister', 'SiteController@postregister');
Route::get('/about', 'SiteController@about');


Route::get('/login', 'AuthController@login')->name('login');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

/// ROUTE YANG HANYA BISA DIAKSES OLEH ADMIN
Route::group(['middleware' => ['auth', 'checkRole:admin']], function(){
    /// Kumpulan Route Siswa
    Route::get('/siswa', 'SiswaController@index');
    Route::post('/siswa/create', 'SiswaController@create');
    Route::get('/siswa/{siswa}/edit', 'SiswaController@edit');
    Route::post('/siswa/{siswa}/update', 'SiswaController@update');
    Route::get('/siswa/{siswa}/delete', 'SiswaController@delete');
    Route::get('/siswa/{siswa}/profile', 'SiswaController@profile');
    Route::post('/siswa/{siswa}/addnilai', 'SiswaController@addnilai');
    Route::get('/siswa/{siswa}/{idmapel}/deletenilai', 'SiswaController@deletenilai');
    Route::get('/siswa/exportexcel', 'SiswaController@exportExcel');
    Route::post('/siswa/import', 'SiswaController@importexcel')->name('siswa.import');
    Route::get('/siswa/exportpdf', 'SiswaController@exportPdf');
    Route::get('getdatasiswa', [
        'uses' => 'SiswaController@getdatasiswa',
        'as' => 'ajax.get.data.siswa'
    ]);

    /// Kumpulan Route Kelas
    Route::get('/kelas', 'KelasController@index');
    Route::post('/kelas/create', 'KelasController@create');
    Route::get('/kelas/{id}/edit', 'KelasController@edit');
    Route::post('/kelas/{id}/update', 'KelasController@update');
    Route::get('/kelas/{id}/delete', 'KelasController@delete');
    Route::get('/kelas/{id}/detail', 'KelasController@detail');

    /// Kumpulan Route Guru
    Route::get('/guru', 'GuruController@index');
    Route::post('/guru/create', 'GuruController@create');
    Route::get('/guru/{id}/edit', 'GuruController@edit');
    Route::post('/guru/{id}/update', 'GuruController@update');
    Route::get('/guru/{id}/delete', 'GuruController@delete');
    Route::get('/guru/{id}/profile', 'GuruController@profile');

    /// Kumpulan Route Postingan
    Route::get('/posts', 'PostController@index')->name('posts.index');

});

/// ROUTE YANG HANYA BISA DIAKSES OLEH SISWA
Route::group(['middleware' => ['auth', 'checkRole:siswa']], function(){
    Route::get('/profilsaya', 'SiswaController@profilsaya');
    Route::get('/forum', 'ForumController@index');
    Route::post('/forum/create', 'ForumController@create');
    Route::get('/forum/{forum}/view', 'ForumController@view');
    Route::post('/forum/{forum}/view', 'ForumController@postkomentar');
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

Route::get('/post/add', [
    'uses' => 'PostController@add',
    'as' => 'posts.add'
]);

Route::post('/post/create', [
    'uses' => 'PostController@create',
    'as' => 'posts.create'
]);

Route::get('/{slug}', [
    'uses' => 'SiteController@singlepost',
    'as' => 'site.single.post'
]);