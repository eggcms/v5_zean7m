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

Route::get('/', 'FrontController@index');
Route::get('/allnews', 'FrontController@allnews');
Route::get('/news/{id}', 'FrontController@news');
Route::get('/allanalyze', 'FrontController@allvicrow');
Route::get('/analyze/{id}/', 'FrontController@vicrow');
Route::post('/line-notify', 'FrontController@lineNotify');
Route::get('/tdstep', 'FrontController@tdstep');
Route::get('/tdstep2', 'FrontController@tdstep2');
Route::get('/lotto', 'FrontController@lotto');

Route::get('/live', function () {
    return view('page.live');
});

Route::get('/news', function () {
    return view('page.news');
});

Route::get('/vicrow', function () {
    return view('page.vicrow');
});

Route::get('/tded', function () {
    return view('page.tded');
});

Route::get('/tdedstep', function () {
    return view('page.tdedstep');
});

Route::resource('/api/{cid}/','ApiController');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('/', 'HomeController@index');
    });
});
Route::get('/clear-cache', function() {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    return 'FINISHED';  
});