<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/')->namespace('App\Http\Controllers')->group(function (){
   Route::get('/','IndexController@index')->name('index');
    Route::get('/articles','IndexController@articles')->name('articles');
    Route::get('/articles/{articleSlug}','IndexController@articledetail')->name('articledetail');
    Route::post('/comment','HomeController@comment')->name('addcomment');
});
