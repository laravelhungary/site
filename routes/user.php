<?php

Route::group(['prefix' => 'question'], function () {
	Route::get('create', 'QuestionController@create')->name('user.question.create');
	Route::post('create', 'QuestionController@store')->name('user.question.store');

	Route::post('comment/create', 'QuestionCommentController@store')->name('user.question.comment.store');
});
