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

Route::group([
    "prefix" => "admin"
],function(){
    Route::group(["prefix" => "categorie"], function(){
        Route::get('index', 'CategorieController@index')->name('admin.categorie.index');
        Route::get('show/{id}', 'CategorieController@show')->name('admin.categorie.show');
        Route::post('store', 'CategorieController@store')->name('admin.categorie.store');
        Route::put('update/{id?}', 'CategorieController@update')->name('admin.categorie.update');
        Route::delete('delete/{id}', 'CategorieController@destroy')->name('admin.categorie.delete');
        Route::delete('mass_delete', 'CategorieController@massDestroy')->name('admin.categorie.mass_delete');
    });

    Route::group(["prefix" => "manga"], function(){
        Route::get('index', 'MangaController@index')->name('admin.manga.index');
        Route::get('show/{id}', 'MangaController@show')->name('admin.manga.show');
        Route::post('store', 'MangaController@store')->name('admin.manga.store');
        Route::put('update/{id?}', 'MangaController@update')->name('admin.manga.update');
        Route::delete('delete/{id}', 'MangaController@destroy')->name('admin.manga.delete');
        Route::delete('mass_delete', 'MangaController@massDestroy')->name('admin.manga.mass_delete');
    });
    
});