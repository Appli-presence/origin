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

Route::get('/promotion', function () {
    return view('/promotion/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/cours/addForm', 'coursController@addCoursForm')->name('addCoursForm');
Route::post('/cours/add', 'coursController@addCours')->name('addCours');

Route::get('/cours/update/{id}', 'coursController@updateCoursForm')->name('updateCoursForm');
Route::post('/cours/update', 'coursController@updateCours')->name('updateCours');

Route::get('/cours', 'coursController@getCours')->name('getCours');

Route::post('/cours/delete/{id}', 'coursController@deleteCours')->name('deleteCours');
/*Routes etudiant*/
Route::post('/student/add', 'studentController@addStudent');
Route::post('/student/update', 'studentController@updateStudent');
Route::get('/student/delete/{etudiantId}', 'studentController@deleteStudent');
Route::get('/studentList', 'studentController@getAllStudents')->name('studentList');
Route::get('/studentList/{{etudiantId}}', 'studentController@getGroupStudents');


//RoutesPromotion
//Search
Route::post('search', 'PromotionController@Search')->name('search');
Route::get('/search-promo', 'PromotionController@Search')->name('searchForm');;
//Create
Route::post('/create', 'PromotionController@create')->name('create');
Route::get('/promotion/create-promo', 'PromotionController@createForm')->name('createForm');
//Read
Route::get('/promotion/read-promo', 'PromotionController@Read')->name('read');
Route::get('/promotion/index', 'PromotionController@readIndex')->name('index');
//Update
Route::post('/promotion/update{id}', 'PromotionController@update')->name('edit');
Route::get('/promotion/update-promo/{id}', 'PromotionController@updateForm')->name('editForm');
//Delete
Route::get('/promotion/delete/{promotionId}', 'PromotionController@delete');
