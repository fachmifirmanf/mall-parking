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
Route::get('/blok-parkir-pengunjung', 'Pages\Pengunjung\BlokParkirController@index')->name('blok-parkir-pengunjung');
Route::post('/data-block-pengunjung', 'Pages\Pengunjung\BlokParkirController@datablock')->name('data-block-pengunjung');
Route::post('/add-blok-parkir-pengunjung', 'Pages\Pengunjung\BlokParkirController@store')->name('add-blok-parkir-pengunjung');
Route::post('/update-blok-parkir-pengunjung/{id}', 'Pages\Pengunjung\BlokParkirController@update')->name('update-blok-parkir-pengunjung');
Route::get('/delete-blok-parkir-pengunjung/{id}', 'Pages\Pengunjung\BlokParkirController@destroy')->name('delete-blok-parkir-pengunjung');
Route::any('/export-blok-parkir-pengunjung/{id}', 'Pages\Pengunjung\BlokParkirController@pdf')->name('export-blok-parkir-pengunjung');
Route::post('/update-monitor-parkir-pengunjung', 'Pages\Pengunjung\BlokParkirController@update_monitor')->name('update-monitor-parkir-pengunjung');
// Route::post('/data-status-parkir-pengunjung', 'Pages\Pengunjung\BlokParkirController@monitor')->name('data-status-parkir-pengunjung');
Route::get('/monitor-parkir-pengunjung', 'Pages\Pengunjung\BlokParkirController@index_monitor')->name('monitor-parkir-pengunjung');

Auth::routes();






Route::group(['middleware' => ['web', 'auth', 'roles']],function(){

Route::resource('/dashboard', 'Pages\DashboardController');


 Route::group(['roles'=>'Petugas'],function(){

  //manage parkir petugas
Route::get('/blok-parkir-petugas', 'Pages\Petugas\BlokParkirController@index')->name('blok-parkir-petugas');
Route::post('/data-block', 'Pages\Petugas\BlokParkirController@datablock')->name('data-block');
Route::post('/add-blok-parkir-petugas', 'Pages\Petugas\BlokParkirController@store')->name('add-blok-parkir-petugas');
Route::post('/update-blok-parkir-petugas/{id}', 'Pages\Petugas\BlokParkirController@update')->name('update-blok-parkir-petugas');
Route::get('/delete-blok-parkir-petugas/{id}', 'Pages\Petugas\BlokParkirController@destroy')->name('delete-blok-parkir-petugas');
Route::any('/export-blok-parkir-petugas/{id}', 'Pages\Petugas\BlokParkirController@pdf')->name('export-blok-parkir-petugas');
 });
 
 Route::group(['roles'=>'Admin'],function(){


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
 });
 //monitor parkir
Route::get('/monitor-parkir', 'Pages\Monitor\MonitorParkirController@index')->name('monitor-parkir');
Route::post('/update-monitor-parkir', 'Pages\Monitor\MonitorParkirController@store')->name('update-monitor-parkir');
// Route::post('/data-status-parkir', 'Pages\Monitor\MonitorParkirController@dataparkir')->name('data-status-parkir');
 //Ganti Sandi
Route::get('/ganti-sandi', 'Pages\Akun\AkunController@changepassword')->name('ganti-sandi');
Route::post('/update-ganti-sandi/{id}', 'Pages\Akun\AkunController@updatechangepassword')->name('update-ganti-sandi');
 //list user
Route::get('/list-user', 'Pages\Akun\AkunController@index')->name('list-user');
Route::post('/add-list-user', 'Pages\Akun\AkunController@store')->name('add-list-user');
Route::post('/update-list-user/{id}', 'Pages\Akun\AkunController@update')->name('update-list-user');
Route::get('/delete-list-user/{id}', 'Pages\Akun\AkunController@destroy')->name('delete-list-user');
});