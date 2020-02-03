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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout'); // logout


Route::get('/home', 'Pages\HomeController@index')->name('home');
Route::get('/equipment', 'Pages\EquipmentController@index')->name('equipment');
Route::get('/admin', 'Pages\adminController@index')->name('admin');
Route::get('/announcement', 'Pages\AnnouncementController@index')->name('announcement');
Route::get('/history', 'Pages\HistoryController@index')->name('history');
Route::get('/request', 'Pages\RequestController@index')->name('request');