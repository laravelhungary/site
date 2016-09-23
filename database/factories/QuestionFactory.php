<?php

$factory->define(App\Models\Question::class, function (Faker\Generator $faker) {
	$title = $faker->sentence;
    return [
        'title' => $title,
        'slug' => $title,
        'content' => $faker->paragraph,
        'public_id' => $faker->numberBetween(1000000000,9999999999),
        'user_id' => factory(App\User::class)->create()->id,
    ];
});