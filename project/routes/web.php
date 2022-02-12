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

Route::get('/reflection', 'GeneralMemberController@index')->middleware('auth')->name('general_index');

Route::post('/reflection/check', 'GeneralMemberController@assignment_check')->middleware('auth')->name('reflection_check');
Route::post('/reflection/reflection_post', 'GeneralMemberController@reflection_post')->middleware('auth')->name('reflection_post');
Route::post('/reflection/study_time', 'GeneralMemberController@study_time')->middleware('auth')->name('study_time');

Route::get('/admin/reflection', 'AdminController@index')->middleware('auth')->middleware('is_admin_role')->name('admin_index');
