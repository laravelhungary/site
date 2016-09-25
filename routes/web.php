<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('auth/github', 'Auth\LoginController@redirectToProvider')->name('auth.login.github');
Route::get('auth/github/callback', 'Auth\LoginController@handleProviderCallback')->name('auth.login.github.callback');

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'question'], function () {
	Route::get('/', 'Page\QuestionController@index')->name('page.question.index');
	Route::get('{public_id}/{slug}', 'Page\QuestionController@show')->name('page.question.show');
});
