<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('equipment','Api\EquipmentController');
Route::resource('user','Api\UserController');
Route::resource('lab','Api\LabController');
Route::resource('student','Api\StudentController');
Route::resource('ta','Api\TaController');
Route::resource('request','Api\Request_listController');