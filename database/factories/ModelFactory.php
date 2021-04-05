<?php


use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(GJames\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => Str::random(10),
    ];
});

$factory->define(GJames\Post::class, function (Faker\Generator $faker) {
	return [
		'slug'			=> $faker->slug,
		'title'			=> $faker->sentence,
		'body'			=> $faker->paragraphs(3, true),
		'published_at'	=> $faker->optional()->dateTime,
		'category_id'	=> 1
	];
});

$factory->define(GJames\Category::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->unique()->word
	];
});

$factory->define(GJames\Tag::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->unique()->word
	];
});