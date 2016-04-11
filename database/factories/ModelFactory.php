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

$factory->define(InterComm\User::class, function (Faker\Generator $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'username' => $faker->userName,
        'email' => $faker->email,
        'google_id' => $faker->md5,
    ];
});
/*
$table->increments('id');
            $table->integer('user_id');
            $table->string('hunch');
            $table->text('description')->nullable()->default(NULL);
            $table->integer('asset_id');
            $table->timestamps();*/


$factory->define(InterComm\Asset::class, function (Faker\Generator $faker) {
    return [
    	'path' => 'img/hunches',
        'filename' => $faker->imageUrl(),
    ];
});
	

$factory->define(InterComm\Hunch::class, function (Faker\Generator $faker) {
    $date = $faker->dateTimeThisMonth();
    return [
        'hashtag' => implode(" ", $faker->words),
        'created_at' => $date,
        'created_at' => $date,
    ];
});
