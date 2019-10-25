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

        return \Storage::disk('temporary')->url($path);
    });

    Route::post('/login', 'LoginController@login');
    Route::get('/refresh', function () {})->middleware('jwt.refresh');

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::group(['prefix' => 'student'], function () {
            Route::get('/all', 'CommonController@getAllStudents');
        });
        Route::group(['prefix' => 'user'], function () {
            Route::get('/me', 'UserController@getMe');
            Route::get('/all', 'UserController@getAll');
            Route::get('/{user}', 'UserController@getUser');
            Route::post('/', 'UserController@create');
            Route::delete('/{user}', 'UserController@delete');
            Route::post('/{user}', 'UserController@update');
            Route::post('/{user}/change-password', 'UserController@changePassword');
        });
        Route::group(['prefix' => 'news'], function () {
            Route::get('/all', 'NewsController@getAll');
            Route::get('/categories/all', 'NewsController@getAllCategories');
            Route::get('/{item}', 'NewsController@getItem');
            Route::post('/', 'NewsController@create');
            Route::delete('/{item}', 'NewsController@delete');
            Route::post('/{item}', 'NewsController@update');
        });
        Route::group(['prefix' => 'pages'], function () {
            Route::get('/all', 'PagesController@getAll');
            Route::get('/categories/all', 'NewsController@getAllCategories');
            Route::get('/{page}', 'PagesController@getItem');
            Route::post('/', 'PagesController@create');
            Route::delete('/{page}', 'PagesController@delete');
            Route::post('/{page}', 'PagesController@update');
        });
        Route::group(['prefix' => 'product'], function () {
            Route::get('/all', 'ProductController@getAll');
            Route::get('/categories/all', 'ProductController@getAllCategories');
            Route::get('/{product}', 'ProductController@getProduct');
            Route::post('/', 'ProductController@create');
            Route::delete('/{product}', 'ProductController@delete');
            Route::post('/{product}', 'ProductController@update');
        });
        Route::group(['prefix' => 'document'], function () {
            Route::get('/all', 'DocumentController@getAll');
            Route::get('/categories/all', 'DocumentController@getAllCategories');
            Route::get('/{product}', 'DocumentController@getDocument');
            Route::post('/', 'DocumentController@create');
            Route::delete('/{product}', 'DocumentController@delete');
            Route::post('/{product}', 'DocumentController@update');
        });
        Route::group(['prefix' => 'memo'], function () {
            Route::get('/all', 'MemoController@getAll');
            Route::get('/categories/all', 'MemoController@getAllCategories');
            Route::get('/{product}', 'MemoController@getMemo');
            Route::post('/', 'MemoController@create');
            Route::delete('/{product}', 'MemoController@delete');
            Route::post('/{product}', 'MemoController@update');
        });
        Route::group(['prefix' => 'permissions'], function () {
            Route::get('/roles', 'PermissionsController@getRoles');
            Route::get('/abilities', 'PermissionsController@getAbilities');
            Route::get('/user/{user}', 'PermissionsController@getUserPermissions');
            Route::get('/role/{role}', 'PermissionsController@getRolePermissions');
            Route::post('/user/{user}', 'PermissionsController@applyPermissions');
            Route::post('/role/{role}', 'PermissionsController@applyRolePermissions');
        });
    });
});

Route::group(['namespace' => 'Student', 'prefix' => 'student'], function () {
    Route::post('/login', 'LoginController@login');
    Route::get('/logout', function() {
        \Auth::logout();
        return response()->json('You were unsuccessful logouted!');
    });
    Route::get('/refresh', function () {})->middleware('jwt.refresh');

    Route::get('/webservice/pluginfile.php/{n1}/mod_resource/content/{i}/{filename}', function (Request $request) {
        return response()->streamDownload(function () use ($request){
            echo file_get_contents('https://pns.hneu.edu.ua/'. preg_replace('~/api/student/~', '', $request->getRequestUri()));
        }, $request->filename);
    });

    Route::group(['middleware' => 'jwt.auth'], function () {
        Route::group(['prefix' => 'user'], function () {
            Route::get('/me', 'UserController@getMe');
            Route::patch('/me', 'UserController@updateMe');
            Route::patch('/change-thumbnail', 'UserController@changeThumbnail');
            Route::get('/courses', 'UserController@getCourses');
            Route::get('/articles', 'UserController@getArticles');
            Route::get('/advertising', 'UserController@getAdvertising');
            Route::get('/messages', 'UserController@getMessages');
            Route::get('/products', 'UserController@getProducts');
            Route::get('/schedule', 'UserController@getSchedule');
            Route::get('/marks', 'UserController@getMarks');
            Route::get('/like/{model}/{id}', 'UserController@like');
        });
    });
});

Route::group(['prefix' => 'web', 'namespace' => 'Web'], function () {
    Route::get('/news', 'NewsController@getAll');
});