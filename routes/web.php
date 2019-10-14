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




Route::get('/login', 'loginController@index');
Route::post('/login', 'loginController@login');

Route::middleware(['checklogin'])->group(function () {
    Route::get('/', 'indexController@index');
    Route::get('/menu', 'indexController@menu');
    Route::get('/boss/index', 'bossController@index');
    Route::get('/task/superior', 'taskController@superior');
    Route::get('/finance/import', 'financeController@import');
});
