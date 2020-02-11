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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//RoutesPromotion
//Search
Route::post('search', 'PromotionController@Search')->name('search');
Route::get('/search-promo', 'PromotionController@Search')->name('searchForm');;
//Create
Route::post('/create', 'PromotionController@create')->name('create');
Route::get('/promotion/create-promo', 'PromotionController@createForm')->name('createForm');
//Read
Route::get('/promotion/read-promo', 'PromotionController@Read')->name('read');
//Update
Route::post('/promotion/update{id}', 'PromotionController@update')->name('edit');
Route::get('/promotion/update-promo/{id}', 'PromotionController@updateForm')->name('editForm');
//Delete
Route::get('/promotion/delete/{promotionId}', 'PromotionController@delete');
