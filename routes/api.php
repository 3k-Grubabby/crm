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

Route::get('/self', 'Api\PostController@self');


Route::post('/posts/create', [
    'as'=>'posts.store',
    'uses'=>'Api\PostController@store'
]);



Route::post('/login', 'Api\Auth\LoginController@login');

