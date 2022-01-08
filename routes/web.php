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

Route::resource('/dashboard', 'Pages\DashboardController');

