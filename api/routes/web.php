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

Route::group(['prefix' => '{locale?}'], function () {

    Route::get('/', function () {
        return view('web.home');
    });
    Route::get('/3d', function () {
        return view('web.3d');
    });
    Route::get('/blog', function () {
        return view('web.blog', ['posts' => \App\Models\News::where(['lang' => app()->getLocale()])->orderBy('created_at')->get()->groupBy('type')->toArray()]);
    });
    Route::get('/blog/advertising/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.advertising', [
            'article' => \App\Models\News::where(['link' => $link, 'lang' => app()->getLocale(), 'type' => 'advertising'])->first()->toArray()
        ]);
    });
    Route::get('/blog/article/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.article', [
            'article' => \App\Models\News::where(['link' => $link, 'lang' => app()->getLocale(), 'type' => 'article'])->first()->toArray()
        ]);
    });
    Route::get('/blog/message/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.message', [
            'article' => \App\Models\News::where(['link' => $link, 'lang' => app()->getLocale(), 'type' => 'message'])->first()->toArray()
        ]);
    });
    Route::get('/shop', function () {
        return view('web.shop');
    });
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('/admin', function () {
        return view('admin');
    });


    Route::get('/page/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.page', [
            'page' => \App\Models\Page::where(['link' => $link, 'lang' => app()->getLocale()])->first()->toArray()
        ]);
    });

    Route::get('/product/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.product', [
            'product' => \App\Models\Product::where(['link' => $link, 'lang' => app()->getLocale()])->first()->toArray()
        ]);
    });
});

