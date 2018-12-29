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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','FrontEndController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('category')->group(function() {

	Route::get('/add','CategoryController@index');
	Route::post('/save','CategoryController@addCategory');
	Route::get('/show','CategoryController@show');
	Route::get('/edit/{id}','CategoryController@edit');
	Route::post('/update','CategoryController@update');
	Route::get('/delete/{id}','CategoryController@delete');

});

Route::get('/product/add','ProductController@index');
Route::post('/product/entry','ProductController@entry');
Route::get('/product/list','ProductController@product_list');
Route::get('/product/view/{id}','ProductController@single_product_view');
Route::get('/product/edit/{id}','ProductController@edit_product');
Route::post('/product/update','ProductController@update');
Route::get('/product/delete/{id}','ProductController@delete');
// Route::get('/category/add','CategoryController@index');
// Route::post('/category/save','CategoryController@addCategory');
// Route::get('/category/show','CategoryController@show');
// Route::get('/category/edit/{id}','CategoryController@edit');
// Route::post('/category/update','CategoryController@update');
// Route::get('/category/delete/{id}','CategoryController@delete');