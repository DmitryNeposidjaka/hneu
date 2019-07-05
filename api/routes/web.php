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
    })->name('home');
    Route::get('/3d', function () {
        return view('web.3d');
    })->name('3d');
    Route::get('/introductory', function () {
        return view('web.introductory');
    })->name('introductory');
    Route::get('/training', function () {
        return view('web.training');
    })->name('training');
    Route::get('/contacts', function () {
        return view('web.contacts');
    })->name('contacts');
    Route::get('/blog', function () {
        return view('web.blog', ['posts' => \App\Models\News::where(['lang' => app()->getLocale()])->orderBy('created_at')->get()->groupBy('type')->toArray()]);
    })->name('blog');
    Route::get('/blog/advertising/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.advertising', [
            'article' => \App\Models\News::where(['link' => $link, 'lang' => app()->getLocale(), 'type' => 'advertising'])->first()->toArray()
        ]);
    })->name('advertising');
    Route::get('/blog/article/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.article', [
            'article' => \App\Models\News::where(['link' => $link, 'lang' => app()->getLocale(), 'type' => 'article'])->first()->toArray()
        ]);
    })->name('article');
    Route::get('/blog/message/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.message', [
            'article' => \App\Models\News::where(['link' => $link, 'lang' => app()->getLocale(), 'type' => 'message'])->first()->toArray()
        ]);
    })->name('message');
    Route::get('/shop', function () {
        return view('web.shop');
    })->name('shop');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::get('/admin', function () {
        return view('admin');
    });


    Route::get('/page/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.page', [
            'page' => \App\Models\Page::where(['link' => $link, 'lang' => app()->getLocale()])->first()->toArray()
        ]);
    })->name('page');

    Route::get('/product/{link}', function (\Illuminate\Http\Request $request, $lang, $link) {
        return view('web.product', [
            'product' => \App\Models\Product::where(['link' => $link, 'lang' => app()->getLocale()])->first()->toArray()
        ]);
    })->name('product');
});

