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

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::post('/login', 'LoginController@login');
    Route::get('/refresh', function () {})->middleware('jwt.refresh');

    Route::get('/user/me', 'UserController@getMe');
    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/me', 'UserController@getMe');
            Route::get('/all', 'UserController@getAll');
            Route::get('/{user}', 'UserController@getUser');
            Route::post('/', 'UserController@create');
            Route::patch('/{user}', 'UserController@update');
        });
    });
});

Route::group(['namespace' => 'Student', 'prefix' => 'student'], function () {
    Route::post('/login', 'LoginController@login');
});