<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\LearnItem;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/**
 * $table->increments('id');
 * $table->integer('type');
 * $table->text('content');
 * $table->integer('score');
 * $table->timestamps();
 */


$factory->define(LearnItem::class, function (Faker $faker) {

    return [
        'type' => LearnItem::LEAN_ITEM_TYPE[random_int(0, 2)],
        'content' => $faker->text,
        'score' => $faker->numberBetween(1, 100),
    ];
});
