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

Route::group(['prefix'=>'products'],function (){
    Route::get('/index','ProductController@index')->name('products.index');
    Route::get('/create','ProductController@create')->name('products.create');
    Route::post('/create','ProductController@store')->name('products.store');
    Route::get('/{id}/delete','ProductController@delete')->name('products.delete');
});
Route::group(['prefix'=>'carts'], function (){
    Route::get('/index', 'ShoppingCartController@index')->name('carts.list');
    Route::get('{id}/create', 'ShoppingCartController@add')->name('carts.create');
    Route::get('{id}/destroy', 'ShoppingCartController@removeItem')->name('carts.delete');
    Route::post('{id}/update', 'ShoppingCartController@update')->name('carts.update');
});