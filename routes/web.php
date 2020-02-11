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

/*Routes etudiant*/
Route::post('/student/add', 'studentController@addStudent');
Route::post('/student/update', 'studentController@updateStudent');
Route::get('/student/delete/{etudiantId}', 'studentController@deleteStudent');
Route::get('/studentList', 'studentController@getAllStudents')->name('studentList');
Route::get('/studentList/{{etudiantId}}', 'studentController@getGroupStudents');

