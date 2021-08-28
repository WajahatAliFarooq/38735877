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

Route::get('/', function () {
    return view('auth.login');
});
Route::get('home','dashboardController@index');
//Brand Routes
Route::get('brand', 'BrandController@index' );
Route::post('brand','BrandController@store')->name('brand');
Route::patch('brand','BrandController@update');
Route::delete('brand/{brand}','BrandController@destroy');



//Category Routes
Route::get('category', 'CatagoryController@index' );
Route::post('category', 'CatagoryController@store' )->name('category');
Route::patch('category','CatagoryController@update');
Route::delete('category/{catagory}','CatagoryController@destroy');

//Product Routes
Route::get('product', 'ProductController@index' );
Route::get('product/create','ProductController@create');
Route::post('product','ProductController@store');
Route::get('productview/{id}','ProductController@show');
Route::put('product/{id}','ProductController@update');
Route::get('product/edit/{id}','ProductController@edit');
Route::get('productdelete/{id}','ProductController@destroy');

Route::patch('activeinactive','ProductController@checkactive');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
