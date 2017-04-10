<?php

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
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10)
    ];
});

$factory->define(App\Listing::class, function (Faker\Generator $faker) {
    static $password;

    return [
    	'userId' =>$faker->numberBetween($min = 1, $max = 10),
    	'catId' => $faker->numberBetween($min = 1, $max = 10),
    	'isbn' => $faker->randomNumber($nbDigits = 3),
    	'name' => $faker->bs,
    	'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 500),
    	'condition' => $faker->word,
    	'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    	'edition' => $faker->randomDigitNotNull,
    	'retailPrice' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 500),
      	'created_at' => $faker->dateTimeThisMonth($max = 'now', $timezone = date_default_timezone_get())
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'subject' => $faker->word
    ];
});






