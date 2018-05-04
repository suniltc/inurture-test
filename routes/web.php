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

Route::group(['middleware' => ['auth', 'role:admin']], function() {
	Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
});

Route::group(['middleware' => ['auth', 'role:user']], function() {
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('save-course', 'HomeController@saveCourse')->name('save-course');
	Route::get('/view-courses', 'HomeController@viewCourses')->name('view-courses');
});