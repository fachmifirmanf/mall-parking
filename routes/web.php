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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/soal', 'Admin\SoalController@index')->name('soal');
Route::post('/addsoal', 'Admin\SoalController@store')->name('addsoal');
Route::post('/editsoal/{id}', 'Admin\SoalController@update');

Route::get('/kluster', 'Admin\KlusterController@index')->name('kluster');
Route::post('/addkluster', 'Admin\KlusterController@store')->name('addkluster');

Route::get('/soal-peserta', 'Peserta\SoalPesertaController@index')->name('soal-peserta');
Route::any('/detail-soal-peserta/{id}', 'Peserta\SoalPesertaController@show');

Route::resource('/dashboard', 'Pages\DashboardController');

//manage lantai parkir
Route::get('/lantai-parkir', 'Pages\Parkir\LantaiParkirController@index')->name('lantai-parkir');
Route::post('/add-lantai-parkir', 'Pages\Parkir\LantaiParkirController@store')->name('add-lantai-parkir');
Route::post('/update-lantai-parkir/{id}', 'Pages\Parkir\LantaiParkirController@update')->name('update-lantai-parkir');
Route::get('/delete-lantai-parkir/{id}', 'Pages\Parkir\LantaiParkirController@destroy')->name('update-lantai-parkir');
//manage blok parkir
Route::get('/blok-parkir', 'Pages\Parkir\BlokParkirController@index')->name('blok-parkir');
Route::post('/add-blok-parkir', 'Pages\Parkir\BlokParkirController@store')->name('add-blok-parkir');
Route::post('/update-blok-parkir/{id}', 'Pages\Parkir\BlokParkirController@update')->name('update-blok-parkir');
Route::get('/delete-blok-parkir/{id}', 'Pages\Parkir\BlokParkirController@destroy')->name('delete-blok-parkir');
//manage jenis kendaraan
Route::get('/jenis_kendaraan', 'Pages\Kendaraan\JenisKendaraanController@index')->name('jenis_kendaraan');
Route::post('/add-jenis_kendaraan', 'Pages\Kendaraan\JenisKendaraanController@store')->name('add-jenis_kendaraan');
Route::post('/update-jenis_kendaraan/{id}', 'Pages\Kendaraan\JenisKendaraanController@update')->name('update-jenis_kendaraan');
Route::get('/delete-jenis_kendaraan/{id}', 'Pages\Kendaraan\JenisKendaraanController@destroy')->name('delete-jenis_kendaraan');
//manage blok parkir
Route::get('/blok-parkir', 'Pages\Parkir\BlokParkirController@index')->name('blok-parkir');
Route::post('/add-blok-parkir', 'Pages\Parkir\BlokParkirController@store')->name('add-blok-parkir');
Route::post('/update-blok-parkir/{id}', 'Pages\Parkir\BlokParkirController@update')->name('update-blok-parkir');
Route::get('/delete-blok-parkir/{id}', 'Pages\Parkir\BlokParkirController@destroy')->name('delete-blok-parkir');
//manage parkir petugas
Route::get('/blok-parkir-petugas', 'Pages\Petugas\BlokParkirController@index')->name('blok-parkir-petugas');
Route::post('/data-block', 'Pages\Petugas\BlokParkirController@datablock')->name('data-block');
Route::post('/add-blok-parkir-petugas', 'Pages\Petugas\BlokParkirController@store')->name('add-blok-parkir-petugas');
Route::post('/update-blok-parkir-petugas/{id}', 'Pages\Petugas\BlokParkirController@update')->name('update-blok-parkir-petugas');
Route::get('/delete-blok-parkir-petugas/{id}', 'Pages\Petugas\BlokParkirController@destroy')->name('delete-blok-parkir-petugas');