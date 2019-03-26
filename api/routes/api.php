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

    Route::post('/temporary', function (\App\Http\Requests\TemporaryStorageImageRequest $request) {
        $path = $request->file('image')
            ->storeAs(
                $request->type.'/'.$request->entity,
                uniqid().'.'.\Carbon\Carbon::now()->format('Y-m-d_H:i:s').'.'.$request->image->extension(),
                'temporary');

        return '/storage/temporary/'.$path;
    });

    Route::post('/login', 'LoginController@login');
    Route::get('/refresh', function () {})->middleware('jwt.refresh');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/me', 'UserController@getMe');
            Route::get('/all', 'UserController@getAll');
            Route::get('/{user}', 'UserController@getUser');
            Route::post('/', 'UserController@create');
            Route::delete('/{user}', 'UserController@delete');
            Route::post('/{user}', 'UserController@update');
        });
        Route::group(['prefix' => 'news'], function () {
            Route::get('/all', 'NewsController@getAll');
            Route::get('/{item}', 'NewsController@getItem');
            Route::post('/', 'NewsController@create');
            Route::delete('/{item}', 'NewsController@delete');
            Route::post('/{item}', 'NewsController@update');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/all', 'ProductController@getAll');
            Route::get('/{product}', 'ProductController@getProduct');
            Route::post('/', 'ProductController@create');
            Route::delete('/{product}', 'ProductController@delete');
            Route::post('/{product}', 'ProductController@update');
        });
    });
});

Route::group(['namespace' => 'Student', 'prefix' => 'student'], function () {
    Route::post('/login', 'LoginController@login');
    Route::get('/refresh', function () {})->middleware('jwt.refresh');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/me', 'UserController@getMe');
            Route::get('/courses', 'UserController@getCourses');
        });
    });
});