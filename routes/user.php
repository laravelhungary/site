<?php

Route::group(['prefix' => 'question'], function () {
	Route::get('create', 'QuestionController@create')->name('user.question.create');
	Route::post('create', 'QuestionController@store')->name('user.question.store');

	Route::group(['prefix' => 'comment'], function () {
		Route::post('create', 'QuestionCommentController@store')->name('user.question.comment.store');

		Route::post('like', 'QuestionCommentController@like')->name('user.question.comment.like');
		Route::post('solved', 'QuestionCommentController@solved')->name('user.question.comment.solved');
	});

});
