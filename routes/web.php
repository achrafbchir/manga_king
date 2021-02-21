<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([],function(){
    Route::get('categories', 'CategorieController@index')->name('admin.categorie.index');
    Route::get('categorie/{id}', 'CategorieController@show')->name('admin.categorie.show');
    Route::post('categorie', 'CategorieController@store')->name('admin.categorie.store');
    Route::put('categories/{id}', 'CategorieController@update')->name('admin.categorie.update');
});